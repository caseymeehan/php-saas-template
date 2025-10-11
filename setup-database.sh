#!/bin/bash
# Database initialization script for Railway

echo "🚀 Initializing database..."
php database/init.php

echo "📦 Running Google OAuth migration..."
php database/migrate_google_oauth.php

echo "📦 Running Items migration..."
php database/migrate_items.php

echo "📦 Running Stripe migration..."
php database/migrate_stripe.php

echo "✅ Database setup complete!"

