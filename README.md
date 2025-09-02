# Tywyn Spirit Link - Mautic Marketing Platform

Self-hosted Mautic marketing automation platform for Tywyn Spirit Link. Built with Docker for easy deployment and scaling.

## Features

- 🚀 One-command deployment with Docker Compose
- 📧 Email marketing with Amazon SES integration
- 🔒 Production-ready with Cloudflare SSL support
- 💾 Redis caching for performance
- 🔐 MySQL 8.0 database with optimized configuration
- 📊 Landing page builder and contact management

## Requirements

- Docker & Docker Compose installed
- Domain name (for production deployment)
- 2GB+ RAM recommended
- Amazon SES account (for email sending)

## Quick Start

```bash
# 1. Clone repository
git clone https://github.com/edwardselby/tywynspiritlink.git
cd tywynspiritlink

# 2. Configure environment
cp .env.example .env
# Edit .env with your settings (see Configuration section)

# 3. Generate secret key
openssl rand -hex 16  # Add this to MAUTIC_SECRET_KEY in .env

# 4. Start the stack
docker-compose up -d

# 5. Access Mautic installer
# Local: http://localhost:8080
# Production: https://tywynspiritlink.com
```

## Configuration

### Environment Variables

Copy `.env.example` to `.env` and configure:

**Required Settings:**
- `MYSQL_ROOT_PASSWORD` - Strong MySQL root password
- `MYSQL_PASSWORD` - Strong MySQL user password  
- `MAUTIC_SECRET_KEY` - 32-character random string

**Production Settings:**
- `MAUTIC_SITE_URL=https://tywynspiritlink.com`
- `MAUTIC_PORT=80` (for Cloudflare integration)

### Email Configuration (Amazon SES)

1. **Set up Amazon SES:**
   - Create AWS account and SES service
   - Verify domain (tywynspiritlink.com)
   - Create SMTP credentials
   - Request production access

2. **Configure in Mautic UI:**
   - Go to Settings > Configuration > Email Settings
   - Transport: Other SMTP Server
   - Host: `email-smtp.eu-north-1.amazonaws.com`
   - Port: `587`
   - Encryption: TLS
   - Add your SES username/password

## Production Deployment

### DigitalOcean + Cloudflare Setup

1. **Server Setup:**
   ```bash
   # On your DigitalOcean droplet
   git clone https://github.com/edwardselby/tywynspiritlink.git
   cd tywynspiritlink
   cp .env.example .env
   # Configure .env for production
   docker-compose up -d
   ```

2. **Cloudflare Configuration:**
   - Point tywynspiritlink.com A record to droplet IP
   - Enable "Full" SSL mode
   - Enable proxy (orange cloud icon)

3. **Update .env for production:**
   ```bash
   MAUTIC_SITE_URL=https://tywynspiritlink.com
   MAUTIC_PORT=80
   # Add strong passwords and SES credentials
   ```

## Container Architecture

- **mautic**: Main application (Apache + PHP)
- **mysql**: Database with MySQL 8.0
- **redis**: Caching and session storage

## Development vs Production

**Local Development:**
- Port 8080 (avoid conflicts)
- Use localhost URLs
- Test email functionality before production

**Production:**
- Port 80 (Cloudflare handles HTTPS on 443)
- Use https://tywynspiritlink.com
- Real email sending via Amazon SES

## Common Commands

```bash
# View logs
docker-compose logs -f mautic

# Check container status
docker-compose ps

# Restart all services
docker-compose restart

# Stop all services
docker-compose down

# Update containers
docker-compose pull && docker-compose up -d

# Database backup
docker exec mautic_mysql mysqldump -u root -p"${MYSQL_ROOT_PASSWORD}" mautic > backup.sql
```

## Troubleshooting

**Container won't start?**
- Check available ports: `docker ps`
- View container logs: `docker-compose logs [service]`
- Verify .env file exists with proper values

**Database connection error?**
- Ensure MySQL container is running: `docker-compose ps mysql`
- Check MySQL logs: `docker-compose logs mysql`
- Verify database credentials in .env

**Email not sending?**
- Confirm SES domain verification in AWS Console
- Check SES sending limits (sandbox vs production)
- Test SMTP settings in Mautic Configuration

**Cloudflare SSL issues?**
- Verify SSL mode is set to "Full" in Cloudflare
- Ensure MAUTIC_SITE_URL uses https://
- Check DNS propagation

## Security Notes

- Always use strong, unique passwords in production
- Keep .env file secure and never commit to version control
- Regularly update Docker images for security patches
- Monitor failed login attempts in Mautic

## Repository

- **GitHub**: https://github.com/edwardselby/tywynspiritlink
- **Issues**: Report bugs and feature requests via GitHub Issues
- **License**: Open source project

## Resources

- [Mautic Documentation](https://docs.mautic.org)
- [Amazon SES Documentation](https://docs.aws.amazon.com/ses/)
- [Docker Compose Documentation](https://docs.docker.com/compose/)
- [Cloudflare SSL/TLS Documentation](https://developers.cloudflare.com/ssl/)