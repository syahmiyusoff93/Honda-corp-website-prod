#!/bin/bash

# ECR Deployment Script for Laravel Honda Dev

set -e

# Configuration
AWS_REGION=ap-southeast-5
ECR_REGISTRY=119071858278.dkr.ecr.ap-southeast-5.amazonaws.com
REPOSITORY_NAME="hmsbcorpwebdev"
IMAGE_TAG=${1:-latest}

echo "🚀 Starting ECR deployment for Honda Dev Laravel application..."

# Environment selection
echo ""
echo "🌍 Select deployment environment:"
echo "   1) local    - Local development environment"
echo "   2) staging  - Staging environment"
echo "   3) production - Production environment"
echo ""
read -p "Enter your choice (1-3): " env_choice

case $env_choice in
    1)
        ENVIRONMENT="local"
        ENV_NAME="Local"
        ;;
    2)
        ENVIRONMENT="staging"
        ENV_NAME="Staging"
        ;;
    3)
        ENVIRONMENT="production"
        ENV_NAME="Production"
        ;;
    *)
        echo "❌ Invalid choice. Please select 1, 2, or 3."
        exit 1
        ;;
esac

echo "✅ Selected environment: $ENV_NAME ($ENVIRONMENT)"
echo ""

# Generate unique tag with environment and timestamp
UNIQUE_TAG="${ENVIRONMENT}-${IMAGE_TAG}-$(date +%Y%m%d-%H%M%S)"
FINAL_IMAGE_NAME="${REPOSITORY_NAME}:${UNIQUE_TAG}"

echo "🏷️  Image will be tagged as: $FINAL_IMAGE_NAME"
echo ""

# Confirm before proceeding
read -p "Continue with deployment? (y/N): " -n 1 -r
echo
if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo "❌ Deployment cancelled."
    exit 1
fi

# Check if AWS CLI is configured
if ! aws sts get-caller-identity > /dev/null 2>&1; then
    echo "❌ AWS CLI not configured. Please run 'aws configure' first."
    exit 1
fi

# Check if ECR registry is set
if [ -z "$ECR_REGISTRY" ]; then
    echo "❌ AWS_ECR_REGISTRY environment variable is not set."
    echo "Please set it to your ECR registry URL (e.g., 123456789012.dkr.ecr.us-east-1.amazonaws.com)"
    exit 1
fi

# Create ECR repository if it doesn't exist
echo "📦 Checking if ECR repository exists..."
if ! aws ecr describe-repositories --repository-names $REPOSITORY_NAME --region $AWS_REGION > /dev/null 2>&1; then
    echo "📦 Creating ECR repository: $REPOSITORY_NAME"
    aws ecr create-repository --repository-name $REPOSITORY_NAME --region $AWS_REGION
else
    echo "✅ ECR repository $REPOSITORY_NAME already exists"
fi

# Login to ECR
echo "🔐 Logging into ECR..."
aws ecr get-login-password --region $AWS_REGION | docker login --username AWS --password-stdin $ECR_REGISTRY

# Build the Docker image using build.sh script
echo "🔨 Building Docker image for $ENV_NAME environment (linux/amd64)..."
if ! ./build.sh "$ENVIRONMENT" "$REPOSITORY_NAME" "linux/amd64"; then
    echo "❌ Build failed!"
    exit 1
fi

echo "✅ Build completed successfully!"
echo ""

# Tag the image for ECR
FULL_ECR_IMAGE_NAME="$ECR_REGISTRY/$REPOSITORY_NAME:$UNIQUE_TAG"
echo "🏷️  Tagging image for ECR: $FULL_ECR_IMAGE_NAME"
docker tag "$REPOSITORY_NAME:latest" "$FULL_ECR_IMAGE_NAME"

# Push the image to ECR
echo "📤 Pushing image to ECR..."
docker push "$FULL_ECR_IMAGE_NAME"

# Create CloudFront invalidation if distribution is configured
if [ ! -z "$AWS_CLOUDFRONT_DISTRIBUTION_ID" ]; then
    echo "🌐 Creating CloudFront invalidation..."
    aws cloudfront create-invalidation \
        --distribution-id $AWS_CLOUDFRONT_DISTRIBUTION_ID \
        --paths "/*" \
        --region $AWS_REGION > /dev/null 2>&1 || echo "⚠️  CloudFront invalidation failed (continuing anyway)"
fi

echo "✅ Deployment completed successfully!"
echo "📋 Image details:"
echo "   Environment: $ENV_NAME ($ENVIRONMENT)"
echo "   Repository: $ECR_REGISTRY/$REPOSITORY_NAME"
echo "   Tag: $UNIQUE_TAG"
echo "   Full image: $FULL_ECR_IMAGE_NAME"
echo "   Ports: 80 (HTTP only)"

# Show platform information
echo ""
echo "🏗️  Architecture info:"
echo "   Built for: $(uname -m) (single platform)"
echo "   ℹ️  Uses build.sh script for consistent builds across environments"

echo ""
echo "🔒 SSL/HTTPS Configuration:"
echo "   • HTTPS/SSL is DISABLED for this deployment."
echo "   • Only HTTP (port 80) is exposed."
echo "   • For production SSL, use a load balancer or reverse proxy to terminate SSL."

# Show how to pull the image
echo ""
echo "📖 To pull this image:"
echo "   aws ecr get-login-password --region $AWS_REGION | docker login --username AWS --password-stdin $ECR_REGISTRY"
echo "   docker pull $FULL_ECR_IMAGE_NAME"
echo ""
echo "🚀 To run with HTTP only:"
echo "   docker run -p 80:80 $FULL_ECR_IMAGE_NAME"
echo ""
echo "🌐 Access URLs:"
echo "   Local development: http://localhost"
echo "   Production: Configure your domain and load balancer for HTTP (port 80)"