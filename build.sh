#!/bin/bash

# Build script for Honda Corp Website Docker image with environment selection
# Usage: ./build.sh [local|staging|production] [tag] [platform]

ENVIRONMENT=${1:-local}
TAG=${2:-honda-dev}
PLATFORM=${3:-linux/amd64}

# Validate environment
if [[ ! "$ENVIRONMENT" =~ ^(local|staging|production)$ ]]; then
    echo "❌ Invalid environment. Use: local, staging, or production"
    echo "Usage: $0 [local|staging|production] [tag] [platform]"
    exit 1
fi

echo "🏗️  Building Honda Corp Website Docker image"
echo "   Environment: $ENVIRONMENT"
echo "   Tag: $TAG"
echo "   Platform: $PLATFORM"
echo ""

# Check if buildx is available for multi-platform builds
if [[ "$PLATFORM" != "local" ]] && docker buildx version > /dev/null 2>&1; then
    echo "🔨 Building with buildx for platform: $PLATFORM"

    # Create buildx builder if it doesn't exist
    docker buildx create --use --name multiarch-builder --driver docker-container 2>/dev/null || true

    # Build with buildx
    docker buildx build \
        --platform $PLATFORM \
        --build-arg ENVIRONMENT=$ENVIRONMENT \
        -t $TAG \
        -f docker/Dockerfile \
        --load \
        .
else
    echo "🔨 Building with standard docker build"
    # Build the image with the specified environment
    docker build \
        --build-arg ENVIRONMENT=$ENVIRONMENT \
        -t $TAG \
        -f docker/Dockerfile \
        .
fi

if [ $? -eq 0 ]; then
    echo ""
    echo "✅ Build successful!"
    echo "   Image: $TAG"
    echo "   Environment: $ENVIRONMENT"
    echo ""
    echo "🚀 To run the container:"
    echo "   docker run -d -p 80:80 -p 443:443 --name honda-$ENVIRONMENT $TAG"
else
    echo ""
    echo "❌ Build failed!"
    exit 1
fi