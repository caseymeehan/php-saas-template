# PHP SaaS Template 🚀

A modern, simple, and powerful SaaS template built with PHP and SQLite. Inspired by the clean design of Nomads.com.

## Features ✨

- **Modern Design**: Beautiful, responsive homepage with hero section
- **Simple Stack**: Pure PHP with SQLite - no complex dependencies
- **Google OAuth Authentication**: One-click sign-in with Google (no passwords!)
- **User Dashboard**: Personalized dashboard for authenticated users
- **Database Ready**: SQLite database with proper schema
- **Secure Session Management**: Database-backed session handling with token authentication
- **Activity Logging**: Track user actions and events
- **Subscription Ready**: Built-in subscription management tables for Stripe integration
- **Responsive**: Mobile-first design that works on all devices
- **Fast & Lightweight**: Minimal dependencies, maximum performance

## Quick Start 🏁

### Prerequisites

- PHP 7.4 or higher
- SQLite3 extension enabled
- Composer (for dependency management)
- A Google Cloud account (for OAuth)
- A web server (Apache, Nginx, or PHP built-in server)

### Installation

1. **Clone or download this template**

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Initialize the database**
   ```bash
   php database/init.php
   php database/migrate_google_oauth.php
   ```

4. **Set up Google OAuth** (required)
   
   Follow the detailed guide in `GOOGLE_OAUTH_SETUP.md` to:
   - Create a Google Cloud project
   - Configure OAuth consent screen
   - Get your Client ID and Client Secret
   - Update `config.php` with your credentials

5. **Start the server**
   ```bash
   # Using PHP built-in server
   php -S localhost:9000
   ```

6. **Open your browser**
   ```
   http://localhost:9000
   ```

7. **Sign in with Google**
   
   Click "Sign in with Google" and authenticate. Your account will be created automatically!

## Project Structure 📁

```
PHP SaaS Template/
├── index.php                     # Homepage
├── config.php                    # Configuration settings
├── composer.json                 # Dependency management
├── README.md                     # This file
├── GOOGLE_OAUTH_SETUP.md        # Google OAuth setup guide
├── .gitignore                   # Git ignore rules
├── auth/
│   ├── google-login.php         # Initiate Google OAuth
│   ├── google-callback.php      # OAuth callback handler
│   └── logout.php               # Logout handler
├── dashboard/
│   └── index.php                # User dashboard
├── includes/
│   ├── Auth.php                 # Authentication class
│   ├── GoogleOAuth.php          # Google OAuth handler
│   ├── helpers.php              # Helper functions
├── assets/
│   ├── css/
│   │   └── style.css            # Main stylesheet
│   ├── js/
│   │   └── main.js              # JavaScript functionality
│   └── images/                  # Your image assets
├── database/
│   ├── init.php                 # Database initialization
│   ├── migrate_google_oauth.php # OAuth migration
│   ├── Database.php             # Database class
│   └── saas.db                  # SQLite database
├── uploads/
│   └── avatars/                 # User avatar uploads
└── vendor/                      # Composer dependencies
```

## Database Schema 🗄️

### Users Table
- User authentication and profile information
- Fields: id, username, email, password_hash (nullable), full_name, avatar_url, google_id, oauth_provider, created_at, etc.

### Sessions Table
- Manage user sessions securely
- Fields: id, user_id, session_token, ip_address, user_agent, expires_at

### Subscriptions Table
- Handle user subscriptions and billing
- Fields: id, user_id, plan_name, status, amount, currency, billing_cycle

### Activity Log Table
- Track user actions and events
- Fields: id, user_id, action, description, ip_address, created_at

### Password Resets Table
- Manage password reset tokens
- Fields: id, user_id, token, created_at, expires_at, used

## Configuration ⚙️

Edit `config.php` to customize:

```php
// Site settings
define('SITE_NAME', 'YourSaaS');
define('SITE_URL', 'http://localhost:9000');
define('SITE_EMAIL', 'hello@yoursaas.com');

// Google OAuth (REQUIRED - see GOOGLE_OAUTH_SETUP.md)
define('GOOGLE_CLIENT_ID', 'YOUR_GOOGLE_CLIENT_ID');
define('GOOGLE_CLIENT_SECRET', 'YOUR_GOOGLE_CLIENT_SECRET');

// Security
define('SESSION_LIFETIME', 86400); // 24 hours
define('ENABLE_REGISTRATION', true);
```

**Important**: You must set up Google OAuth credentials before the authentication will work. See `GOOGLE_OAUTH_SETUP.md` for detailed instructions.

## Current Status 📊

### ✅ Completed (Milestone 1)

- **Google OAuth Authentication**: One-click sign-in with Google
- **User Management**: Automatic user creation and profile updates
- **Session Management**: Secure database-backed sessions with tokens
- **Activity Logging**: Track user login/logout events
- **Basic Dashboard**: Personalized dashboard for authenticated users
- **Security**: CSRF protection, XSS prevention, secure session handling

### 🚧 In Progress

- **Custom Dashboard**: Design and implement custom dashboard features (Milestone 2)
- **Profile Management**: Advanced profile editing and avatar uploads (Milestone 2)
- **Account Settings**: Comprehensive account management (Milestone 2)

### 📋 Upcoming (Milestone 3)

- **Stripe Integration**: Full subscription and payment processing
- **Pricing Page**: Display pricing tiers with checkout
- **Subscription Management**: Upgrade, downgrade, and cancel subscriptions
- **Payment History**: View invoices and payment records
- **Webhook Handling**: Process Stripe subscription events

## Next Steps 🛠️

### Phase 1: Complete Dashboard (Milestone 2)
After discussing your specific requirements:
- Custom dashboard layout and features
- Profile management interface
- Account settings page
- Activity feed and notifications

### Phase 2: Add Stripe Payments (Milestone 3)
- Set up Stripe account and get API keys
- Create pricing page with tier comparison
- Implement Stripe Checkout integration
- Build subscription management interface
- Set up webhook handlers for subscription events

## Customization 🎨

### Change Colors
Edit the CSS variables in `assets/css/style.css`:
```css
:root {
    --primary-color: #6366f1;
    --secondary-color: #10b981;
    --text-color: #1f2937;
}
```

### Change Hero Gradient
Edit the `.hero` class background:
```css
.hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
```

### Update Content
Edit `index.php` to change:
- Site name and tagline
- Hero headline and subtitle
- Features and benefits
- Call-to-action buttons

## Security Notes 🔒

- **Passwords**: Always hash passwords using `password_hash()` and verify with `password_verify()`
- **SQL Injection**: Use prepared statements (already implemented in Database class)
- **XSS**: Sanitize all user input with `htmlspecialchars()`
- **CSRF**: Implement CSRF tokens for forms
- **Sessions**: Regenerate session IDs after login
- **Production**: Disable error display in production

## Authentication Usage 🔐

### Using the Auth Class

```php
require_once 'config.php';
require_once 'includes/Auth.php';

$auth = new Auth();

// Check if user is logged in
if ($auth->isLoggedIn()) {
    // Get current user data
    $user = $auth->getCurrentUser();
    echo "Welcome, " . $user['full_name'];
}

// Protect a page (requires authentication)
$auth->requireAuth();

// Get the Google OAuth URL
$googleOAuth = $auth->getGoogleOAuth();
$authUrl = $googleOAuth->getAuthUrl();

// Logout
$auth->logout();
```

### Using the Database Class

```php
require_once 'config.php';
require_once 'database/Database.php';

$db = Database::getInstance();

// Fetch user data
$user = $db->fetchOne('SELECT * FROM users WHERE id = :id', [
    'id' => 1
]);

// Insert data
$id = $db->insert('activity_log', [
    'user_id' => 1,
    'action' => 'page_view',
    'description' => 'Viewed pricing page'
]);

// Update data
$db->update('users', 
    ['full_name' => 'John Doe'],
    'id = :id',
    ['id' => 1]
);
```

## Technologies Used 🔧

- **PHP 7.4+**: Server-side logic
- **Composer**: Dependency management
- **Google API Client**: OAuth 2.0 authentication
- **SQLite**: Lightweight database
- **Stripe PHP SDK**: Payment processing (Milestone 3)
- **CSS3**: Modern styling with CSS Grid and Flexbox
- **JavaScript**: Interactive features
- **SVG**: Scalable icons

## Design Inspiration 🎨

This template is inspired by the clean, modern design of Nomads.com (formerly Nomad List) by @levelsio.

## License 📄

Free to use for personal and commercial projects.

## Support 💬

For questions or issues, please create an issue in the repository.

---

**Built with ❤️ for the indie maker community**

Happy building! 🚀

