# Mautic Docker Stack - Self-Hosted Marketing Automation

Quick-deploy Mautic marketing automation platform with Docker. Replace expensive SaaS newsletter services with your own self-hosted solution for email campaigns, SMS, and social media.

## Requirements

- Docker & Docker Compose installed
- Domain name (for production)
- 2GB+ RAM recommended
- Port 8080 available (or modify docker-compose.yml)

## Quick Start (5 minutes)

```bash
# 1. Clone repository
git clone https://github.com/yourusername/mautic-docker.git
cd mautic-docker

# 2. Configure environment
cp .env.example .env
# Edit .env with your settings (especially passwords!)

# 3. Start the stack
docker-compose up -d

# 4. Wait for containers to initialize (check logs)
docker-compose logs -f mautic

# 5. Access Mautic
# Local: http://localhost:8080
# Production: https://your-domain.com
```

## Initial Setup

1. Open browser to `http://localhost:8080`
2. Follow Mautic installation wizard
3. Database settings are auto-filled from environment
4. Create admin account
5. Configure email settings (SMTP)

## Default Ports

- **8080**: Mautic web interface
- **3306**: MySQL (internal only)
- **6379**: Redis cache (internal only)

## Common Commands

```bash
# View logs
docker-compose logs -f

# Stop services
docker-compose down

# Restart services
docker-compose restart

# Update Mautic
docker-compose pull
docker-compose up -d

# Backup database
docker exec mautic_mysql mysqldump -u root -p mautic > backup.sql
```

## Production Deployment

1. **Configure Domain**: Point your domain to server IP
2. **Update .env**: Set `MAUTIC_SITE_URL` to your domain
3. **Add SSL**: Use reverse proxy (Nginx/Caddy) or Cloudflare
4. **Configure SMTP**: Add real email credentials in .env
5. **Set Cron Jobs**: Already configured in Docker

## Troubleshooting

**Container won't start?**
- Check ports: `docker ps`
- View logs: `docker-compose logs mautic`

**Can't access web interface?**
- Verify port 8080 is not blocked
- Check container status: `docker-compose ps`

**Database connection error?**
- Ensure MySQL is running: `docker-compose ps mysql`
- Check credentials in .env match docker-compose.yml

**Email not sending?**
- Configure SMTP settings in .env
- Test from Mautic Configuration > Email Settings

## Support

- [Mautic Documentation](https://docs.mautic.org)
- [Docker Hub - Mautic](https://hub.docker.com/r/mautic/mautic)
- Report issues in this repository