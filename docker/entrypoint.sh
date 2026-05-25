#!/bin/sh
set -e

# Pastikan database SQLite ada dan bisa ditulis
if [ ! -f /var/www/html/database/database.sqlite ]; then
    touch /var/www/html/database/database.sqlite
fi

chmod 664 /var/www/html/database/database.sqlite
chmod 775 /var/www/html/database
chown -R www-data:www-data /var/www/html/database
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache

php artisan migrate --force

php-fpm -D
exec nginx -g "daemon off;"
