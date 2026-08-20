#!/bin/sh
set -e

# Optimize Laravel cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations automatically on startup
php artisan migrate --force
php artisan db:seed --force || true

# Storage link
php artisan storage:link || true

# Start processes via supervisord
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
