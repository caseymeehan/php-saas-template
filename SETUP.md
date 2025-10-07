# Setup Guide

## ⚠️ IMPORTANT: Google OAuth Required

**Authentication won't work until you configure Google OAuth credentials.**

---

## Quick Setup (15 minutes)

### Step 1: Install Dependencies

```bash
composer install
```

### Step 2: Initialize Database

```bash
php database/init.php
php database/migrate_google_oauth.php
```

### Step 3: Create Google Cloud Project

1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Click the project dropdown at the top
3. Click "New Project"
4. Enter a project name (e.g., "YourSaaS")
5. Click "Create"

### Step 4: Enable Google+ API

1. In your project, go to "APIs & Services" > "Library"
2. Search for "Google+ API"
3. Click on it and click "Enable"

### Step 5: Configure OAuth Consent Screen

1. Go to "APIs & Services" > "OAuth consent screen"
2. Select "External" user type
3. Click "Create"
4. Fill in the required information:
   - **App name**: YourSaaS (or your app name)
   - **User support email**: Your email
   - **Developer contact information**: Your email
5. Click "Save and Continue"
6. On the "Scopes" page, click "Add or Remove Scopes"
7. Select:
   - `../auth/userinfo.email`
   - `../auth/userinfo.profile`
8. Click "Update" and then "Save and Continue"
9. On "Test users" page, you can add test users if needed
10. Click "Save and Continue"
11. Review and click "Back to Dashboard"

### Step 6: Create OAuth Credentials

1. Go to "APIs & Services" > "Credentials"
2. Click "Create Credentials" > "OAuth client ID"
3. Select "Web application"
4. Enter a name (e.g., "Web Client")
5. Under "Authorized JavaScript origins", add:
   - `http://localhost:9000` (for local development)
   - Your production URL (e.g., `https://yoursaas.com`)
6. Under "Authorized redirect URIs", add:
   - `http://localhost:9000/auth/google-callback.php` (for local)
   - Your production callback URL (e.g., `https://yoursaas.com/auth/google-callback.php`)
7. Click "Create"
8. **Copy your Client ID and Client Secret** - you'll need them next!

### Step 7: Update Configuration

Open `config.php` and replace these lines:

```php
define('GOOGLE_CLIENT_ID', 'YOUR_GOOGLE_CLIENT_ID');
define('GOOGLE_CLIENT_SECRET', 'YOUR_GOOGLE_CLIENT_SECRET');
```

With your actual credentials:

```php
define('GOOGLE_CLIENT_ID', 'your-actual-client-id-here.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 'your-actual-secret-here');
```

If you're running on a different port or domain, also update:

```php
define('SITE_URL', 'http://localhost:9000'); // Change if needed
```

### Step 8: Start Server

```bash
php -S localhost:9000
```

### Step 9: Test Authentication

1. Open your browser and go to: `http://localhost:9000`
2. Click "Sign in with Google" or "Continue with Google"
3. Sign in with your Google account
4. Grant permissions to your app
5. You should be redirected to your dashboard!

---

## Common Issues

### "Error 400: redirect_uri_mismatch"

**Solution**: The redirect URI in your Google Cloud Console doesn't match the one in your config.

- Make sure the redirect URI in Google Console exactly matches: `http://localhost:9000/auth/google-callback.php`
- Don't forget the protocol (`http://` or `https://`)
- Don't forget the port (`:9000`)
- Make sure there's no trailing slash

### "This app isn't verified"

**Solution**: This is normal during development.

- Click "Advanced" or "Show Advanced"
- Click "Go to [App Name] (unsafe)"
- This warning won't appear once you publish your app

### "Access blocked: This app's request is invalid"

**Solution**: Check your OAuth consent screen configuration.

- Make sure you've selected the correct scopes
- Make sure your app domain is authorized

### Session/Cookie Issues

**Solution**: Check your browser's cookie settings.

- Make sure cookies are enabled
- Try clearing your browser cache
- Check if you're in incognito/private mode (sessions work differently)

### 404 Errors on Auth Buttons

**Solution**: Make sure you're running the server from the project root directory.

---

## Production Deployment

When deploying to production:

### 1. Update config.php

```php
define('SITE_URL', 'https://yoursaas.com'); // Your production URL
```

### 2. Add Production URLs to Google Console

- Authorized JavaScript origins: `https://yoursaas.com`
- Authorized redirect URIs: `https://yoursaas.com/auth/google-callback.php`

### 3. Enable HTTPS

In `config.php`, change:

```php
ini_set('session.cookie_secure', 1); // Already set to 0, change to 1
```

### 4. Verify OAuth Consent Screen

- If you want to remove the "unverified app" warning, you need to verify your app
- Go to "OAuth consent screen" and click "Publish App"
- For wider distribution, you may need to go through Google's verification process

### 5. Turn Off Error Display

```php
error_reporting(0);
ini_set('display_errors', '0');
```

---

## Security Notes

- **Never commit** your Client Secret to version control
- Consider using environment variables for credentials in production
- Regularly rotate your credentials
- Monitor OAuth usage in Google Cloud Console
- Set up rate limiting if needed

---

## Resources

- [Google OAuth 2.0 Documentation](https://developers.google.com/identity/protocols/oauth2)
- [Google Cloud Console](https://console.cloud.google.com/)
- [OAuth 2.0 Playground](https://developers.google.com/oauthplayground/) (for testing)

---

**That's it!** Once Google OAuth is configured, your authentication system is ready to use. 🚀
