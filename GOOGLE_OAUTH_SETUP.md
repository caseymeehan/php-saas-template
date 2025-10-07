# Google OAuth Setup Guide

This guide will help you set up Google OAuth authentication for your SaaS application.

## Prerequisites

- A Google account
- Your application running locally or on a server

## Step 1: Create a Google Cloud Project

1. Go to the [Google Cloud Console](https://console.cloud.google.com/)
2. Click on the project dropdown at the top
3. Click "New Project"
4. Enter a project name (e.g., "YourSaaS")
5. Click "Create"

## Step 2: Enable Google+ API

1. In your project, go to "APIs & Services" > "Library"
2. Search for "Google+ API"
3. Click on it and click "Enable"

## Step 3: Configure OAuth Consent Screen

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

## Step 4: Create OAuth Credentials

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
8. A dialog will show your Client ID and Client Secret
9. **Copy these values** - you'll need them next!

## Step 5: Update Your Configuration

1. Open `config.php` in your project
2. Find these lines:
   ```php
   define('GOOGLE_CLIENT_ID', 'YOUR_GOOGLE_CLIENT_ID');
   define('GOOGLE_CLIENT_SECRET', 'YOUR_GOOGLE_CLIENT_SECRET');
   ```
3. Replace `YOUR_GOOGLE_CLIENT_ID` with your actual Client ID
4. Replace `YOUR_GOOGLE_CLIENT_SECRET` with your actual Client Secret
5. Save the file

## Step 6: Update Site URL (if needed)

If you're running on a different port or domain:

1. Open `config.php`
2. Update the `SITE_URL` constant:
   ```php
   define('SITE_URL', 'http://localhost:8000'); // Change port if needed
   ```

## Step 7: Test Authentication

1. Start your PHP server:
   ```bash
   php -S localhost:9000
   ```

2. Open your browser and go to: `http://localhost:9000`

3. Click "Sign in with Google" or "Continue with Google"

4. You should be redirected to Google's login page

5. Sign in with your Google account

6. Grant permissions to your app

7. You should be redirected back to your dashboard!

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

## Production Deployment

When deploying to production:

1. **Update config.php**:
   ```php
   define('SITE_URL', 'https://yoursaas.com'); // Your production URL
   ```

2. **Add production URLs to Google Console**:
   - Authorized JavaScript origins: `https://yoursaas.com`
   - Authorized redirect URIs: `https://yoursaas.com/auth/google-callback.php`

3. **Enable HTTPS**:
   - In `config.php`, change:
     ```php
     ini_set('session.cookie_secure', 1); // Already set to 0, change to 1
     ```

4. **Verify OAuth Consent Screen**:
   - If you want to remove the "unverified app" warning, you need to verify your app
   - Go to "OAuth consent screen" and click "Publish App"
   - For wider distribution, you may need to go through Google's verification process

5. **Turn off error display**:
   ```php
   error_reporting(0);
   ini_set('display_errors', '0');
   ```

## Security Notes

- **Never commit** your Client Secret to version control
- Consider using environment variables for credentials in production
- Regularly rotate your credentials
- Monitor OAuth usage in Google Cloud Console
- Set up rate limiting if needed

## Next Steps

After authentication is working:

1. Customize the dashboard (`dashboard/index.php`)
2. Add profile management features
3. Implement subscription/payment integration
4. Add additional OAuth providers if needed

## Resources

- [Google OAuth 2.0 Documentation](https://developers.google.com/identity/protocols/oauth2)
- [Google Cloud Console](https://console.cloud.google.com/)
- [OAuth 2.0 Playground](https://developers.google.com/oauthplayground/) (for testing)

## Support

If you encounter any issues not covered here, check:
- Browser console for JavaScript errors
- PHP error logs for backend errors
- Google Cloud Console > "APIs & Services" > "Credentials" for OAuth errors

