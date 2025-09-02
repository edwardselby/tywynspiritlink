#!/bin/bash
set -e

# Start cron daemon
echo "Starting cron daemon..."
service cron start

# Install cron jobs
echo "Installing Mautic cron jobs..."
crontab /etc/cron.d/mautic-cron

# Start Apache in foreground (original CMD)
echo "Starting Apache..."
exec "$@"