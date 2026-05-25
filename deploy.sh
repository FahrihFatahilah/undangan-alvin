#!/bin/bash

# Deploy script untuk Wedding Invitation Imah & Alvin
echo "🚀 Starting deployment..."

# Stop existing containers
echo "📦 Stopping existing containers..."
docker compose down

# Remove old images
echo "🗑️ Cleaning up old images..."
docker image prune -f

# Build and start containers
echo "🔨 Building and starting containers..."
docker compose up -d --build

# Wait for containers to be ready
echo "⏳ Waiting for containers to be ready..."
sleep 30

# Run migrations
echo "🗄️ Running migrations..."
docker compose exec app php artisan migrate --force

# Resize gallery images
echo "🖼️ Resizing gallery images..."
docker compose exec app php artisan gallery:resize 2>/dev/null || true

# Cache config, routes, views
echo "⚡ Caching..."
docker compose exec app php artisan config:cache
docker compose exec app php artisan route:cache
docker compose exec app php artisan view:cache

# Check container status
echo "📊 Container status:"
docker compose ps

# Show logs
echo "📝 Recent logs:"
docker compose logs --tail=50

echo "✅ Deployment completed!"
echo "🌐 Application is running on: http://your-vps-ip:8080"

# Health check
echo "🏥 Running health check..."
if curl -f http://localhost:8080 > /dev/null 2>&1; then
    echo "✅ Application is healthy!"
else
    echo "❌ Application health check failed!"
    echo "📝 Check logs with: docker compose logs app"
fi