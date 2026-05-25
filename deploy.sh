#!/bin/bash

# ============================================
# deploy.sh - Wedding Invitation Deploy Script
# Usage: bash deploy.sh
# ============================================

set -e

echo "🚀 Starting deployment..."

# ── 1. Pull latest code ──────────────────────
echo "📦 Pulling latest code..."
git pull origin main

# ── 2. Install/update dependencies ──────────
echo "📚 Installing composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# ── 3. Copy .env jika belum ada ──────────────
if [ ! -f .env ]; then
    echo "⚙️  Creating .env from .env.example..."
    cp .env.example .env
    php artisan key:generate
fi

# ── 4. Optimasi Laravel ──────────────────────
echo "⚡ Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# ── 5. Jalankan migration ────────────────────
echo "🗄️  Running migrations..."
php artisan migrate --force

# ── 6. Storage link ──────────────────────────
echo "🔗 Creating storage link..."
php artisan storage:link --force 2>/dev/null || true

# ── 7. Set permissions ───────────────────────
echo "🔒 Setting permissions..."
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true

# ── 8. Resize gallery images ─────────────────
echo "🖼️  Resizing gallery images..."
php artisan gallery:resize 2>/dev/null || true

echo ""
echo "✅ Deployment complete!"
echo "🌐 App URL: $(grep APP_URL .env | cut -d '=' -f2)"
