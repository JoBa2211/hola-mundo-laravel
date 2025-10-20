#!/usr/bin/env bash
set -euo pipefail

# dokploy-deploy.sh
# Idempotent deploy helper that ensures the SQLite database file exists
# and runs migrations before clearing caches. Works when executed from
# the repo root or from inside the container at /app.

echo "[deploy] starting dokploy-deploy.sh"

# Resolve the script directory to an absolute path (project root)
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
APP_DIR="${SCRIPT_DIR}"
DB_DIR="${APP_DIR}/database"
DB_FILE="${DB_DIR}/database.sqlite"

echo "[deploy] project dir: ${APP_DIR}"
echo "[deploy] db file: ${DB_FILE}"

mkdir -p "${DB_DIR}"

if [ ! -f "${DB_FILE}" ]; then
  echo "[deploy] creating sqlite database file"
  touch "${DB_FILE}"
fi

echo "[deploy] setting permissions on database file"
chmod 0664 "${DB_FILE}" || true

# Try to chown to common web user if it exists (www-data or apache)
if id -u www-data >/dev/null 2>&1; then
  chown www-data:www-data "${DB_FILE}" || true
elif id -u apache >/dev/null 2>&1; then
  chown apache:apache "${DB_FILE}" || true
fi

echo "[deploy] running migrations (ensures database tables exist)"
php "${APP_DIR}/artisan" migrate --force || true

echo "[deploy] clearing and regenerating caches"
# clear config and cache; allow cache:clear to fail gracefully if something is still not ready
php "${APP_DIR}/artisan" config:clear || true
php "${APP_DIR}/artisan" cache:clear || true
php "${APP_DIR}/artisan" config:cache || true

echo "[deploy] ensuring storage link"
php "${APP_DIR}/artisan" storage:link || true

echo "[deploy] finished"