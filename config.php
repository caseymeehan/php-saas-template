<?php
/**
 * Configuration file for PHP SaaS Template
 */

// Autoload Composer dependencies
require_once __DIR__ . '/vendor/autoload.php';

// Database configuration
define('DB_PATH', __DIR__ . '/database/saas.db');

// Site configuration
define('SITE_NAME', 'YourSaaS');
define('SITE_URL', 'http://localhost:9000');
define('SITE_EMAIL', 'hello@yoursaas.com');

// Google OAuth Configuration
// Set these in your environment or replace with your actual credentials
define('GOOGLE_CLIENT_ID', getenv('GOOGLE_CLIENT_ID') ?: 'YOUR_GOOGLE_CLIENT_ID');
define('GOOGLE_CLIENT_SECRET', getenv('GOOGLE_CLIENT_SECRET') ?: 'YOUR_GOOGLE_CLIENT_SECRET');
define('GOOGLE_REDIRECT_URI', SITE_URL . '/auth/google-callback.php');

// Stripe Configuration (to be configured in Milestone 3)
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_YOUR_KEY');
define('STRIPE_SECRET_KEY', 'sk_test_YOUR_KEY');
define('STRIPE_WEBHOOK_SECRET', 'whsec_YOUR_WEBHOOK_SECRET');

// Security
define('SESSION_LIFETIME', 86400); // 24 hours
define('PASSWORD_MIN_LENGTH', 8);

// Features
define('ENABLE_REGISTRATION', true);
define('REQUIRE_EMAIL_VERIFICATION', false);

// Pricing
define('FREE_TIER_ENABLED', true);

// Pricing Plans
define('PRICING_PLANS', [
    'free' => [
        'name' => 'Free',
        'price' => 0,
        'currency' => 'USD',
        'billing_cycle' => 'month',
        'stripe_price_id' => null
    ],
    'pro' => [
        'name' => 'Pro',
        'price' => 29,
        'currency' => 'USD',
        'billing_cycle' => 'month',
        'stripe_price_id' => 'price_YOUR_PRO_PRICE_ID'
    ],
    'enterprise' => [
        'name' => 'Enterprise',
        'price' => 99,
        'currency' => 'USD',
        'billing_cycle' => 'month',
        'stripe_price_id' => 'price_YOUR_ENTERPRISE_PRICE_ID'
    ]
]);

// Timezone
date_default_timezone_set('UTC');

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Session configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 0); // Set to 1 in production with HTTPS
ini_set('session.use_strict_mode', 1);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

