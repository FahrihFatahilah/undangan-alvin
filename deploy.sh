#!/bin/bash

# ============================================
# deploy.sh - Docker Deploy Script
# Usage: bash deploy.sh
# ============================================

set -e

APP_NAME="wedding-invitation"
IMAGE_NAME="wedding-invitation"

echo "🚀 Starting Docker deployment..."

# ── 1. Pull latest code ──────────────────────
echo "📦 Pulling latest code..."
git pull origin main

# ── 2. Build Docker image ────────────────────
echo "🐳 Building Docker image..."
docker build -t $IMAGE_NAME:latest .

# ── 3. Stop & remove container lama ─────────
echo "🛑 Stopping old containers..."
docker compose down --remove-orphans

# ── 4. Jalankan container baru ───────────────
echo "▶️  Starting new containers..."
docker compose up -d

# ── 5. Tunggu container ready ────────────────
echo "⏳ Waiting for container to be ready..."
sleep 5

# ── 6. Jalankan migration ────────────────────
echo "🗄️  Running migrations..."
docker compose exec app php artisan migrate --force

# ── 7. Resize gallery images ─────────────────
echo "🖼️  Resizing gallery images..."
docker compose exec app php artisan gallery:resize 2>/dev/null || true

# ── 8. Clear & cache ulang ───────────────────
echo "⚡ Caching config, routes, views..."
docker compose exec app php artisan config:cache
docker compose exec app php artisan route:cache
docker compose exec app php artisan view:cache

# ── 9. Set permissions ───────────────────────
echo "🔒 Setting permissions..."
docker compose exec app chown -R www-data:www-data storage bootstrap/cache

echo ""
echo "✅ Deployment complete!"
echo "🌐 Running at: http://localhost:8080"
docker compose ps
