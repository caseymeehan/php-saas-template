# Setup Guide

## ⚠️ IMPORTANT: You MUST Set Up Google OAuth First

**The auth buttons won't work until you add your Google credentials!**

## Quick Setup (15 minutes)

### Step 1: Get Google OAuth Credentials

1. Go to [https://console.cloud.google.com/](https://console.cloud.google.com/)
2. Create a new project (or select existing)
3. Go to "APIs & Services" > "Credentials"
4. Click "Create Credentials" > "OAuth client ID"
5. Choose "Web application"
6. Add **Authorized redirect URIs**:
   ```
   http://localhost:9000/auth/google-callback.php
   ```
7. Copy your **Client ID** and **Client Secret**

### Step 2: Add Credentials to config.php

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

### Step 3: Start Server

```bash
php -S localhost:9000
```

### Step 4: Test

Open `http://localhost:9000` and click "Sign in with Google"

## Common Issues

**404 errors on auth buttons?**
- Make sure you're running the server from the project root
- Paths are now fixed to be relative

**"Error 400: redirect_uri_mismatch"?**
- Your redirect URI in Google Console must EXACTLY match:
  `http://localhost:9000/auth/google-callback.php`
- Note the port `:9000` and no trailing slash

**"This app isn't verified"?**
- Normal during development
- Click "Advanced" then "Go to [app name] (unsafe)"

## That's It!

Once you have your Google credentials configured, everything should work.

