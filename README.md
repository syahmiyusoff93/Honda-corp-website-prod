# Honda Development Environment Setup Complete

## ✅ Successfully Implemented:

### Core Application
- **Laravel 12** with PHP 8.4-FPM automatically installed
- **React.js + TypeScript** compatibility through Laravel Breeze
- **Tailwind CSS** for styling
- **Vite** for asset compilation

### Database & Storage
- **AWS RDS** for managed database service (MySQL/PostgreSQL)
- **AWS S3** integration for file storage
- **AWS EFS** volume mounted for persistent storage
- Redis removed as requested

### AWS Services Integration
- **AWS SDK for PHP** installed and configured
- **ECR (Elastic Container Registry)** service class for container management
- **AWS Secrets Manager** service class for secure credential storage
- **AWS CloudFront** service class for CDN management
- **RDS connection** configured for managed database service

### Docker Configuration
- Multi-container setup with app, nginx, vite services
- Optimized PHP 8.4-FPM container with Node.js 20
- Nginx reverse proxy configuration
- AWS RDS for managed database (external)
- Volume persistence for application files

## 🌐 Application Access:
- **Web Application**: http://localhost:80 (or 8080 if port changed)
- **Database**: AWS RDS (configure endpoint in .env)
- **Vite Dev Server**: localhost:5173

## 📁 Project Structure:
```
honda-dev/
├── docker-compose.yml          # Main orchestration file
├── docker/
│   ├── Dockerfile             # PHP 8.4-FPM + Node.js 20 + AWS CLI
│   ├── default.conf           # Nginx configuration
│   └── ssl/                   # SSL certificates
├── app/Services/AWS/          # AWS service classes
│   ├── EcrService.php         # Container registry management
│   ├── SecretsManagerService.php # Secure credential storage
│   └── CloudFrontService.php  # CDN management
└── .env.example              # AWS configuration template
```

## 🔧 Configuration Files:
- **Environment Variables**: Copy `.env.example` to `.env` and configure AWS credentials
- **Database**: AWS RDS configured for Laravel (set DB_HOST to RDS endpoint)
- **File Storage**: Configured for S3 (set FILESYSTEM_DISK=s3)
- **AWS Services**: ECR, Secrets Manager, CloudFront ready to use

## 🚀 Next Steps:
1. Copy `.env.example` to `.env` and add your AWS credentials
2. Configure AWS services with your actual values:
   - AWS_ACCESS_KEY_ID
   - AWS_SECRET_ACCESS_KEY
   - AWS_BUCKET (S3 bucket name)
   - AWS_ECR_REGISTRY
   - AWS_CLOUDFRONT_DISTRIBUTION_ID
   - AWS_CLOUDFRONT_DOMAIN
   - DB_HOST (RDS endpoint)
   - DB_DATABASE, DB_USERNAME, DB_PASSWORD (RDS credentials)

## 📦 Packages Installed:
- aws/aws-sdk-php
- league/flysystem-aws-s3-v3
- laravel/breeze (with React + TypeScript)
- react, react-dom, @vitejs/plugin-react
- tailwindcss, postcss, autoprefixer

The development environment is now ready for Laravel 12 + React.js development with full AWS integration!

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## ▶️ Start (local)

Prerequisites: Docker (Docker Desktop), docker-compose, Node (if building assets locally), and AWS CLI (for deployment).

1. Copy environment file and edit secrets:
```bash
cp .env.example .env
# edit .env: set DB_*, AWS_*, APP_KEY etc.
# For development/debugging, ensure APP_DEBUG=true
```

2. Start with Docker Compose (recommended):
```bash
docker-compose up --build -d
```
Or build/run single combined image:
```bash
docker build -t hmsbcorpwebdev:latest -f docker/Dockerfile .
docker rm -f honda-dev 2>/dev/null || true
docker run -p 443:443 --name honda-dev -d hmsbcorpwebdev:latest
```

3. Generate app key / run migrations (inside running container):
```bash
# if using docker-compose (service name `app`)
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --force

# or with container name
docker exec -it honda-dev php artisan key:generate
docker exec -it honda-dev php artisan migrate --force
```

4. Build frontend assets (if needed inside container):
```bash
docker-compose exec app sh -c "cd /var/www/web && npm install --legacy-peer-deps && npm run build --legacy-peer-deps"
# or
docker exec -it honda-dev sh -c "cd /var/www/web && npm install --legacy-peer-deps && npm run build --legacy-peer-deps"
```

## ✔️ Health check & quick tests

- Health endpoint (used by NLB/ALB):  
  `GET /health` should return HTTP 200 JSON.
```bash
curl -I http://localhost/health
# or inside container:
docker exec -it honda-dev curl -sS -f http://localhost/health || echo "health failed"
```

- Check logs:
```bash
docker logs -f honda-dev     # or docker-compose logs -f
```

- Fix storage permissions (if permission errors appear):
```bash
docker exec -it honda-dev chown -R nginx:nginx /var/www/web/storage /var/www/web/bootstrap/cache
docker exec -it honda-dev chmod -R 775 /var/www/web/storage /var/www/web/bootstrap/cache
```

- Enable Laravel debug mode (for development):
```bash
# Edit .env file and set APP_DEBUG=true, or run this command inside container:
docker exec -it honda-dev sed -i 's/APP_DEBUG=false/APP_DEBUG=true/' /var/www/web/.env
# Or with docker-compose:
docker-compose exec app sed -i 's/APP_DEBUG=false/APP_DEBUG=true/' /var/www/web/.env
```

## ⚙️ Common troubleshooting

- 502 Bad Gateway → ensure PHP-FPM is running and listening on 127.0.0.1:9000 and Nginx uses `fastcgi_pass 127.0.0.1:9000;`.
- Vite manifest errors → run `npm run build` inside container to generate `public/build/manifest.json`.
- DB connection refused → ensure `DB_HOST` points to your AWS RDS endpoint and that your RDS security group allows connections from your application.

## 🚀 Deploy to ECR

Prerequisites: AWS CLI configured (aws configure), Docker logged to ECR (script will handle login), buildx available for multi-arch builds (recommended).

1. Ensure `.env` contains your ECR values or export them:
```bash
export AWS_REGION=ap-southeast-5
export AWS_ECR_REGISTRY=119071858278.dkr.ecr.ap-southeast-5.amazonaws.com
export AWS_ECR_REPOSITORY=hmsbcorpwebdev
```

2. Make the deploy script executable and run it (script builds multi-arch and pushes to ECR):
```bash
chmod +x deploy-ecr.sh
./deploy-ecr.sh latest
```

3. Confirm image in ECR, then update ECS:
- Register/update task definition image URI to:
  `119071858278.dkr.ecr.ap-southeast-5.amazonaws.com/hmsbcorpwebdev:latest`
- Update the ECS service to use the new task definition (via Console or CLI). Example CLI (adjust cluster/service/task-def names):
```bash
# After creating/updating task definition JSON, register it:
aws ecs register-task-definition --cli-input-json file://taskdef.json --region $AWS_REGION

# Update service to new task definition:
aws ecs update-service --cluster MyCluster --service MyService --task-definition your-task-def:revision --region $AWS_REGION
```

4. Ensure Target Group health check uses:
- Protocol: HTTP
- Port: 80
- Path: `/health`
- Success codes: 200

## 🔐 Notes

- This README assumes HTTP (port 80) for container health checks and NLB/ALB target groups. For HTTPS termination, offload SSL at the load balancer and keep container listening on port 80.
- For production, use proper certificates (ACM + ALB/CloudFront) instead of self-signed certs.
