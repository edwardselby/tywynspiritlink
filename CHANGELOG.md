# Changelog

All notable changes to the Tywyn Spirit Link Mautic platform will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
### Changed
### Deprecated
### Removed
### Fixed
### Security

## [1.1.0] - 2025-09-02

### Added
- Pre-designed spiritualist church landing page template (`assets/landing-pages/spiritualist-church-landing.html`)
- Minimalistic, mobile-responsive church community design
- Ready-to-use HTML template with Mautic form integration placeholders
- Domain redirection documentation for root domain to landing page setup
- Three methods for domain redirection (Mautic built-in, Cloudflare, Apache)
- Comprehensive landing page template documentation in README
- Professional non-profit footer with association status

### Changed
- Updated project branding from generic marketing platform to "Spiritualist Church Community Platform"
- Refined README to reflect spiritualist church mission and community focus
- Enhanced features list to include landing page templates and conversion optimization
- Updated configuration documentation with landing page deployment instructions

## [1.0.0] - 2025-09-02

### Added
- Initial Docker Compose setup for Mautic v4 with Apache
- MySQL 8.0 database with optimized configuration
- Redis caching for improved performance
- Amazon SES email integration support
- Cloudflare SSL/HTTPS production setup
- Environment-based configuration (.env.example template)
- Flexible port configuration for development (8080) and production (80)
- Production-ready Docker Compose configuration
- Comprehensive README with setup and deployment instructions
- Security-focused .gitignore configuration
- MySQL configuration optimized for Mautic workloads
- Development and production environment separation
- Troubleshooting guide for common deployment issues

### Security
- Environment variables for sensitive configuration
- Strong password requirements documented
- Trusted proxy configuration for Cloudflare integration
- Secure SMTP configuration guidelines

---

## Release History

**[1.0.0]** - Initial release with complete Docker setup, Amazon SES integration, and production deployment support for Tywyn Spirit Link marketing platform.

---

## Contributing

When contributing to this project, please update this changelog with your changes in the `[Unreleased]` section using the categories:
- `Added` for new features
- `Changed` for changes in existing functionality  
- `Deprecated` for soon-to-be removed features
- `Removed` for now removed features
- `Fixed` for any bug fixes
- `Security` for vulnerability fixes

## Links

- [Project Repository](https://github.com/edwardselby/tywynspiritlink)
- [Mautic Documentation](https://docs.mautic.org)
- [Docker Hub - Mautic](https://hub.docker.com/r/mautic/mautic)