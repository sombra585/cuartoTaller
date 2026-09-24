#!/bin/sh
set -e

echo "Corriendo migraciones..."
php artisan migrate --force

echo "Cacheando configuración..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Iniciando supervisord (nginx + php-fpm)..."
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
