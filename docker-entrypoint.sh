#!/bin/sh
set -e

if [ -n "$APP_KEY" ] && [ "$APP_KEY" != "base64:" ]; then
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
fi

exec "$@"
