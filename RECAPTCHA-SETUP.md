# reCAPTCHA Setup Instructions

## Error: "Missing required parameters: sitekey"

This error occurs when the Google reCAPTCHA environment variables are not configured.

## Solution

Add the following environment variables to your `.env` file:

```env
# Google reCAPTCHA Configuration
NOCAPTCHA_SECRET=your-recaptcha-secret-key-here
NOCAPTCHA_SITEKEY=your-recaptcha-site-key-here
```

## How to Get reCAPTCHA Keys

1. Go to https://www.google.com/recaptcha/admin
2. Register your site (if not already registered)
3. Choose reCAPTCHA v2 "I'm not a robot" checkbox
4. Add your domain(s)
5. Copy the **Site Key** and **Secret Key**
6. Add them to your `.env` file as shown above

## After Adding Keys

1. Clear the Laravel configuration cache:
   ```bash
   docker-compose exec app php artisan config:clear
   ```

2. Restart your Docker containers (optional):
   ```bash
   docker-compose restart
   ```

## Verification

The reCAPTCHA widget should now appear correctly on:
- Enquiry Form (`/customer-service/contact-us`)
- Newsletter Form
- HIP Form
- Corporate Fleet Sale Form

## Configuration File

The reCAPTCHA configuration is located at:
- `web/config/captcha.php`

This file reads from the environment variables:
- `NOCAPTCHA_SECRET` - Your reCAPTCHA secret key
- `NOCAPTCHA_SITEKEY` - Your reCAPTCHA site key
