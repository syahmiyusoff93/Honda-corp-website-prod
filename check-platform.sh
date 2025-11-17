#!/bin/bash

# Platform compatibility test script

echo "🔍 Checking Docker and platform compatibility..."

# Check Docker version
echo "📦 Docker version:"
docker --version

# Check if buildx is available
echo ""
echo "🏗️  Docker buildx status:"
if docker buildx version > /dev/null 2>&1; then
    echo "✅ Docker buildx is available"
    docker buildx version
    
    # List available builders
    echo ""
    echo "🛠️  Available builders:"
    docker buildx ls
else
    echo "❌ Docker buildx is not available"
    echo "Consider updating Docker Desktop or installing buildx plugin"
fi

# Check current platform
echo ""
echo "💻 Current system architecture:"
echo "   $(uname -m)"

# Check if we can inspect the current image
echo ""
echo "🔍 Checking existing images for platform info:"
if docker images | grep -q "hmsbcorpwebdev"; then
    EXISTING_IMAGE=$(docker images --format "table {{.Repository}}:{{.Tag}}" | grep hmsbcorpwebdev | head -1)
    echo "   Found: $EXISTING_IMAGE"
    docker image inspect $EXISTING_IMAGE --format '{{.Architecture}}/{{.Os}}' 2>/dev/null || echo "   Could not inspect architecture"
else
    echo "   No existing hmsbcorpwebdev images found"
fi

echo ""
echo "💡 Recommendations:"
echo "   1. Use Docker Desktop with buildx for multi-platform builds"
echo "   2. Build images with --platform linux/amd64 for AWS compatibility"
echo "   3. Test locally: docker run --platform linux/amd64 your-image"
