FROM mautic/mautic:v4-apache

# Install cron
RUN apt-get update && apt-get install -y cron && rm -rf /var/lib/apt/lists/*

# Copy cron jobs and entrypoint script
COPY docker/cron/mautic-cron /etc/cron.d/mautic-cron
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# Set permissions
RUN chmod 0644 /etc/cron.d/mautic-cron
RUN chmod +x /usr/local/bin/entrypoint.sh

# Create cron log file
RUN touch /var/log/cron.log

# Set custom entrypoint
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["apache2-foreground"]