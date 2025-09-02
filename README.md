# Tywyn Spirit Link - Spiritualist Church Community Platform

Self-hosted Mautic marketing automation platform for Tywyn Spirit Link Spiritualist Church Community. Built with Docker for easy deployment and scaling, supporting our mission to provide a welcoming place of worship based on spiritualist church beliefs.

## Features

- 🚀 One-command deployment with Docker Compose
- 📧 Email marketing with Amazon SES integration
- 🔒 Production-ready with Cloudflare SSL support
- 💾 Redis caching for performance
- 🔐 MySQL 8.0 database with optimized configuration
- 📊 Landing page builder and contact management
- 🏛️ Pre-designed spiritualist church landing page templates
- 🎯 Conversion-optimized responsive design

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

2. **Cloudflare DNS Configuration:**
   - Log into Cloudflare Dashboard (https://dash.cloudflare.com)
   - Select your domain `tywynspiritlink.com`
   - Go to DNS > Records
   - Create A record:
     ```
     Type: A
     Name: @ (for root domain)
     IPv4 address: [Your DigitalOcean Reserved IP]
     Proxy status: Proxied (orange cloud - ENABLED)
     TTL: Auto
     ```
   - Optional: Add WWW record:
     ```
     Type: A
     Name: www
     IPv4 address: [Your DigitalOcean Reserved IP]
     Proxy status: Proxied (orange cloud - ENABLED)
     TTL: Auto
     ```

3. **Cloudflare SSL Configuration:**
   - Go to SSL/TLS tab in Cloudflare
   - Set encryption mode to "Full"
   - Enable "Always Use HTTPS"
   - Verify proxy is enabled (orange cloud icon)

4. **Update .env for production:**
   ```bash
   MAUTIC_SITE_URL=https://tywynspiritlink.com
   MAUTIC_PORT=80
   # Add strong passwords and SES credentials
   ```

## Landing Page Templates

Pre-designed HTML templates are available in `assets/landing-pages/`:

### **Spiritualist Church Landing Page**
- **File**: `assets/landing-pages/spiritualist-church-landing.html`
- **Purpose**: Main community welcome page for Tywyn Spirit Link
- **Features**: 
  - Minimalistic, church-focused design
  - Mobile-responsive layout
  - Contact form integration ready
  - Mission statement and community values
  - Professional non-profit presentation

### **Using Landing Page Templates**

1. **Copy HTML content** from template file
2. **Create new landing page** in Mautic (Channels → Landing Pages → New)
3. **Switch to code view** in Mautic editor
4. **Paste template HTML** and save
5. **Add Mautic forms** in designated placeholder areas
6. **Publish** and test

## Domain Redirection Setup

### **Redirect Root Domain to Landing Page**

**Option 1: Mautic Root URL Redirect (Recommended)**
1. **Create your landing page** using template above and publish it
2. **Get the landing page URL** (e.g., `https://tywynspiritlink.com/spiritualist-church`)
3. **Go to Mautic Settings** → Configuration → System Settings
4. **Set "Mautic's root URL"** to your landing page URL
5. **Save configuration** - Root domain will now redirect to your landing page instead of login screen

*This is a security best practice to prevent exposing the Mautic login screen to casual visitors*

**Option 2: Cloudflare Page Rules**
1. **Go to Cloudflare Dashboard** → Your domain → Page Rules
2. **Create Page Rule**:
   - URL Pattern: `tywynspiritlink.com/*`
   - Setting: Forwarding URL (301 redirect)
   - Destination: `https://tywynspiritlink.com/your-landing-page-url`
3. **Save and Deploy**

**Option 3: Apache .htaccess (Advanced)**
```apache
# Add to Mautic's .htaccess file
RewriteEngine On
RewriteRule ^$ /s/your-landing-page-alias [R=301,L]
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