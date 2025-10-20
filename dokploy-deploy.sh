#!/usr/bin/env bash
set -euo pipefail

# Create sqlite database file and set permissions, then run migrations.
# This script is intended to be run in the project root on the server or inside the app container.

mkdir -p database
if [ ! -f database/database.sqlite ]; then
  touch database/database.sqlite
fi
chmod 0664 database/database.sqlite || true

# Clear cached config, run migrations and link storage
php artisan config:clear
php artisan cache:clear
php artisan migrate --force
php artisan storage:link || true

echo "Deploy script finished."