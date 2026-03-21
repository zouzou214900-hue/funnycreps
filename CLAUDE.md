# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Website for "Funny Crèche," a French private childcare network with 13+ nursery locations. The site is a PHP-based marketing/informational site hosted on OVH shared hosting.

## Architecture

### Routing

- Single entry point: `www/index.php` — renders the full page shell (navbar, header, footer)
- `www/configuration.php` — maps `$_GET['mode']` values to page titles and variables
- `www/.htaccess` — Apache rewrite rules convert clean `.html` URLs to `?mode=` query parameters
- Page content is injected between the global header and footer via `require("views/$mode.php")`

### Views

All page templates live in `www/views/`. Key views:
- `home.php` — homepage
- `contact.php` — contact form with PHPMailer integration (per-location email routing)
- `creches.php` — all nursery locations overview
- `creche-*.php` (13 files) — individual nursery detail pages
- `recrutement.php`, `projet-pedagogique.php`, `mentions-legales.php` — static content pages

### Email System

Contact form (`www/views/contact.php`) uses PHPMailer with SMTP credentials from `.env`:
- `SMTP_USER` / `SMTP_PASS` — Gmail app-specific credentials
- Routes emails to center-specific addresses with CC/BCC based on selected location
- Anti-spam: honeypot field + security question + RGPD checkbox

### Frontend

- Bootstrap 4, jQuery 2.2.0, and plugins in `www/js/`
- Base styles in `www/css/style.css`; 12 color theme variants in `www/css/skins/`
- Theme switching logic in `www/js/app.js` (lines 390–419)
- Leaflet.js for maps, Slick.js for carousels, Magnific Popup for image lightboxes

## Development

No build system — this is plain PHP/HTML/CSS/JS. To develop locally:

1. Serve the `www/` directory with a PHP-capable web server (e.g., `php -S localhost:8000` from `www/`)
2. Ensure mod_rewrite equivalent is active (or access pages via `?mode=<pagename>` directly)
3. Copy `.env` values into environment or set them directly for email testing

To test email sending locally, update `www/views/phpmailer/` credentials or use a mail trap.

## Adding a New Nursery Page

1. Create `www/views/creche-<slug>.php` based on an existing nursery file
2. Add the route in `www/configuration.php` (add a `case` in the switch)
3. Add the rewrite rule in `www/.htaccess` (follow existing patterns)
4. Add email recipient in `www/views/contact.php` (in the location switch block)
5. Add the nursery to the listing in `www/views/creches.php`
