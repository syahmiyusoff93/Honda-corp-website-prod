# Honda Corp Website - Environment-Based Docker Build

This project now supports building Docker images for different environments (local, staging, production) with appropriate configuration files.

## Environment Files

- **`.env.local`** - Local development environment
  - Debug enabled, local database, relaxed security
  - URL: `http://localhost`

- **`.env.staging`** - Staging environment
  - Debug enabled, staging database, moderate security
  - URL: `https://staging.honda-corp.com/deltaecho`

- **`.env.production`** - Production environment
  - Debug disabled, production database, strict security
  - URL: `https://honda-corp.com/deltaecho`

## Building for Different Environments

### Using the Build Script (Recommended)

```bash
# Build for local development (default)
./build.sh

# Build for staging
./build.sh staging

# Build for production
./build.sh production

# Build with custom tag
./build.sh staging honda-staging-v1.0

# Build for specific platform (for deployment)
./build.sh production honda-prod-v1.0 linux/amd64
```

### Using Docker Build Directly

```bash
# Local environment
docker build --build-arg ENVIRONMENT=local -t honda-local -f docker/Dockerfile .

# Staging environment
docker build --build-arg ENVIRONMENT=staging -t honda-staging -f docker/Dockerfile .

# Production environment
docker build --build-arg ENVIRONMENT=production -t honda-prod -f docker/Dockerfile .
```

## Platform Architecture

The build script automatically detects and uses the appropriate platform:

- **Local development**: Uses your current platform (may be ARM64 on Apple Silicon Macs)
- **Deployment**: Uses `linux/amd64` for AWS compatibility

If you encounter platform-related errors when pulling images, ensure you're building with the correct platform:

```bash
# For AWS deployment (always use linux/amd64)
./build.sh production my-image linux/amd64

# For local development on Apple Silicon
./build.sh local my-image local
```

## Running the Container

```bash
# Run local environment
docker run -d -p 80:80 -p 443:443 --name honda-local honda-local

# Run staging environment
docker run -d -p 80:80 -p 443:443 --name honda-staging honda-staging

# Run production environment
docker run -d -p 80:80 -p 443:443 --name honda-prod honda-prod
```

## Environment Configuration Details

### Local Environment
- **Database**: Local MySQL/MariaDB
- **Debug**: Enabled
- **HTTPS**: Disabled
- **Cache**: File-based
- **Queue**: Synchronous

### Staging Environment
- **Database**: AWS RDS staging instance
- **Debug**: Enabled
- **HTTPS**: Enabled
- **Cache**: File-based
- **Queue**: Database

### Production Environment
- **Database**: AWS RDS production instance
- **Debug**: Disabled
- **HTTPS**: Enabled
- **Cache**: Redis
- **Session**: Redis
- **Mail**: AWS SES

## Troubleshooting

### Platform Architecture Issues

If you encounter errors like `CannotPullContainerError: pull image manifest has been retried 7 time(s): image Manifest does not contain descriptor matching platform 'linux/amd64'`, this means there's a platform mismatch.

**Solutions:**

1. **For AWS Deployment**: Always build with `linux/amd64` platform:
   ```bash
   ./build.sh production my-image linux/amd64
   ```

2. **For Local Development on Apple Silicon**: Use the deployment script which automatically builds for the correct platform.

3. **Clear ECR Cache**: If you have old images in ECR with wrong platforms:
   ```bash
   # List images
   aws ecr list-images --repository-name hmsbcorpwebdev --region ap-southeast-5
   
   # Delete specific image
   aws ecr batch-delete-image --repository-name hmsbcorpwebdev --image-ids imageTag=old-tag --region ap-southeast-5
   ```

4. **Check Current Platform**:
   ```bash
   docker system info | grep -i architecture
   uname -m
   ```

---

How to generate and mount an nginx htpasswd for local dev

1. Generate an htpasswd file (example creates ./docker/.htpasswd):

```bash
# Make the helper executable once
chmod +x docker/generate_htpasswd.sh

# Generate an htpasswd for user 'deployuser' and copy into running nginx container (if running):
./docker/generate_htpasswd.sh deployuser
```

2. docker-compose mounts the file at /etc/nginx/.htpasswd so nginx uses it for Basic Auth.

3. If you prefer to create the file manually:

```bash
# Using htpasswd (from apache2-utils / httpd package)
htpasswd -c docker/.htpasswd deployuser

# Then start or reload your containers
docker-compose up -d webserver
docker exec nginx_web nginx -t && docker exec nginx_web nginx -s reload
```

4. Example placeholder: see `docker/.htpasswd.example` for format.

Security note: Do not commit sensitive credentials to git. Use this for local dev only or add the file to .gitignore.

Image behavior: the Dockerfile will copy `docker/.htpasswd` into the image at `/etc/nginx/.htpasswd` during build so nginx Basic Auth works out-of-the-box.
If you want to override the baked-in htpasswd at runtime, mount your host file into the container (docker-compose.yml already contains the mount):

```bash
# Use your host file and restart the container
docker-compose down && docker-compose up -d webserver
```

If you prefer not to bake secrets into the image at all, remove the `COPY docker/.htpasswd` line from the Dockerfile and rely on a mounted file or secrets manager.

EFS mount (optional)
--------------------
This project includes an `efs_storage` volume configured to mount an AWS EFS endpoint using the local NFS driver. Provide the EFS DNS name and optional path via environment variables before running docker-compose:

```bash
export EFS_DNS=fs-12345678.efs.us-east-1.amazonaws.com
export EFS_PATH=/path/inside/efs
docker-compose up -d
```

If your host cannot reach the EFS endpoint (for local dev), use a host directory fallback by changing the volume to a bind mount in `docker-compose.yml`:

```yaml
  efs_storage:
    driver: local
    driver_opts:
      type: "none"
      o: "bind"
      device: "${PWD}/storage/efs"
```

Make sure the EFS mount or fallback directory has correct permissions for the container's `nginx` and `php-fpm` users.

Deploy custom nginx image to AWS (ECR + ECS/Fargate)
--------------------------------------------------
# 1. Build and tag the image (replace <aws_account_id> and <region>)
docker build -t honda-nginx:latest -f docker/nginx.Dockerfile .

docker tag honda-nginx:latest <aws_account_id>.dkr.ecr.<region>.amazonaws.com/honda-nginx:latest

# 2. Push to ECR (login first)
aws ecr get-login-password --region <region> | docker login --username AWS --password-stdin <aws_account_id>.dkr.ecr.<region>.amazonaws.com

docker push <aws_account_id>.dkr.ecr.<region>.amazonaws.com/honda-nginx:latest

# 3. Update ECS task definition to use the new image
# - Edit your task definition JSON to point the webserver container image to the pushed ECR image
# - Register the new task definition and update the service to use it

# Example (simplified):
aws ecs register-task-definition --cli-input-json file://taskdef.json
aws ecs update-service --cluster <cluster-name> --service <service-name> --task-definition <new-task-def>

# Note: If you're using Fargate, ensure container definitions mount any needed volumes (EFS) and have correct IAM/task role permissions.

Faster builds (use BuildKit)
---------------------------
# Enable BuildKit and build the app image which uses cache mounts for composer/npm
DOCKER_BUILDKIT=1 docker build -t hmsbcorpwebdev:latest -f docker/Dockerfile .

# With docker-compose (faster parallel builds)
DOCKER_BUILDKIT=1 COMPOSE_DOCKER_CLI_BUILD=1 docker compose build --parallel

# Notes:
# - The Dockerfile uses cache mounts for composer and npm. BuildKit must be enabled for these to take effect.
# - Use the .dockerignore to avoid sending large unneeded context to the daemon.
# - For local iterative development, consider mounting vendor and node_modules as volumes.

Providing htpasswd at build time (BuildKit secret)
-------------------------------------------------
# Keep the file out of the image and out of git; provide it at build time as a secret:
DOCKER_BUILDKIT=1 docker build --secret id=htpasswd,src=docker/.htpasswd -t hmsbcorpwebdev:latest -f docker/Dockerfile .

# If you don't provide the secret, the image build will continue and nginx will start without a baked htpasswd; you can still mount it at runtime or use the baked-in default if present.
