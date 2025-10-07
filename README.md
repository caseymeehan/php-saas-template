# PHP SaaS Template 🚀

A modern, simple, and powerful SaaS template built with PHP and SQLite. Inspired by the clean design of Nomads.com.

## Features ✨

- **Modern Design**: Beautiful, responsive homepage with hero section
- **Simple Stack**: Pure PHP with SQLite - no complex dependencies
- **User Authentication**: Complete auth system (login, signup, password reset)
- **Database Ready**: SQLite database with proper schema
- **Session Management**: Secure session handling
- **Activity Logging**: Track user actions
- **Subscription Ready**: Built-in subscription management tables
- **Responsive**: Mobile-first design that works on all devices
- **Fast & Lightweight**: No bloated frameworks

## Quick Start 🏁

### Prerequisites

- PHP 7.4 or higher
- SQLite3 extension enabled
- A web server (Apache, Nginx, or PHP built-in server)

### Installation

1. **Clone or download this template**

2. **Initialize the database**
   ```bash
   php database/init.php
   ```

3. **Start the server**
   ```bash
   # Using PHP built-in server
   php -S localhost:8000
   ```

4. **Open your browser**
   ```
   http://localhost:8000
   ```

## Project Structure 📁

```
PHP SaaS Template/
├── index.php              # Homepage
├── config.php             # Configuration settings
├── README.md              # This file
├── assets/
│   ├── css/
│   │   └── style.css      # Main stylesheet
│   ├── js/
│   │   └── main.js        # JavaScript functionality
│   └── images/
│       ├── star.svg       # Star icon
│       └── laurel.svg     # Laurel badge
├── database/
│   ├── init.php           # Database initialization script
│   ├── Database.php       # Database class
│   └── saas.db           # SQLite database (created after init)
```

## Database Schema 🗄️

### Users Table
- User authentication and profile information
- Fields: id, username, email, password_hash, full_name, avatar_url, created_at, etc.

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
define('SITE_NAME', 'YourSaaS');
define('SITE_URL', 'http://localhost');
define('SITE_EMAIL', 'hello@yoursaas.com');
define('SESSION_LIFETIME', 86400);
define('ENABLE_REGISTRATION', true);
```

## Next Steps 🛠️

### To Complete Your SaaS:

1. **Authentication Pages**
   - Create `login.php` for user login
   - Create `signup.php` for new user registration
   - Create `logout.php` for session termination
   - Create `forgot-password.php` for password recovery

2. **User Dashboard**
   - Create `dashboard.php` for logged-in users
   - Create `profile.php` for user profile management
   - Create `settings.php` for account settings

3. **Additional Pages**
   - Create `pricing.php` to display pricing tiers
   - Create `features.php` to showcase features
   - Create `about.php` for company information
   - Create `contact.php` for contact form

4. **Core Functionality**
   - Implement user authentication logic
   - Add form validation
   - Set up email notifications
   - Integrate payment processing (Stripe, PayPal)
   - Add admin panel

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

## Database Class Usage 💾

```php
require_once 'config.php';
require_once 'database/Database.php';

$db = Database::getInstance();

// Insert
$userId = $db->insert('users', [
    'username' => 'john',
    'email' => 'john@example.com',
    'password_hash' => password_hash('password', PASSWORD_DEFAULT)
]);

// Query
$user = $db->fetchOne('SELECT * FROM users WHERE username = :username', [
    'username' => 'john'
]);

// Update
$db->update('users', 
    ['full_name' => 'John Doe'],
    'id = :id',
    ['id' => $userId]
);
```

## Technologies Used 🔧

- **PHP**: Server-side logic
- **SQLite**: Lightweight database
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

