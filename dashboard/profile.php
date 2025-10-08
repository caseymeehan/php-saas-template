<?php
/**
 * Profile Page
 * User profile information and account details
 */

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Auth.php';

$auth = new Auth();
$auth->requireAuth();

$user = $auth->getCurrentUser();
if (!$user) {
    flashMessage('error', 'Unable to load user data.');
    redirect('../auth/logout.php');
}

$pageTitle = 'Profile';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle . ' - ' . SITE_NAME; ?></title>
    <link rel="stylesheet" href="<?php echo url('assets/css/style.css'); ?>">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: #f9fafb;
            color: #1f2937;
            min-height: 100vh;
        }

        .top-header {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 1rem 2rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .header-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .site-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #6366f1;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .back-link {
            color: #6366f1;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .main-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
        }

        .profile-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            text-align: center;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            margin: 0 auto 1rem;
            display: block;
        }

        .profile-name {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .profile-email {
            font-size: 1.125rem;
            opacity: 0.9;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .info-card h3 {
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #6b7280;
            margin-bottom: 0.75rem;
        }

        .info-value {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }

        .info-label {
            font-size: 0.875rem;
            color: #6b7280;
            margin-top: 0.5rem;
        }

        .actions-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .actions-card h2 {
            margin-bottom: 1.5rem;
            color: #1f2937;
        }

        .action-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            margin-right: 1rem;
            margin-bottom: 1rem;
            background: #6366f1;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: background 0.2s;
        }

        .action-button:hover {
            background: #4f46e5;
        }

        .action-button.secondary {
            background: #f3f4f6;
            color: #6b7280;
        }

        .action-button.secondary:hover {
            background: #e5e7eb;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }

            .profile-header {
                padding: 2rem 1.5rem;
            }

            .profile-name {
                font-size: 1.5rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .action-button {
                display: block;
                width: 100%;
                text-align: center;
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
    <header class="top-header">
        <div class="header-content">
            <a href="<?php echo url('/dashboard/'); ?>" class="site-logo">
                <span>🚀</span>
                <span><?php echo SITE_NAME; ?></span>
            </a>
            <a href="<?php echo url('/dashboard/'); ?>" class="back-link">
                ← Back to Dashboard
            </a>
        </div>
    </header>

    <main class="main-container">
        <div class="profile-header">
            <?php if ($user['avatar_url']): ?>
                <img src="<?php echo escape($user['avatar_url']); ?>" alt="<?php echo escape($user['full_name']); ?>" class="profile-avatar">
            <?php endif; ?>
            <div class="profile-name"><?php echo escape($user['full_name']); ?></div>
            <div class="profile-email"><?php echo escape($user['email']); ?></div>
        </div>

        <div class="info-grid">
            <div class="info-card">
                <h3>Account Status</h3>
                <div class="info-value">
                    <?php echo $user['is_active'] ? '✅ Active' : '❌ Inactive'; ?>
                </div>
            </div>

            <div class="info-card">
                <h3>Subscription Plan</h3>
                <div class="info-value"><?php echo ucfirst(escape($user['subscription_tier'])); ?></div>
            </div>

            <div class="info-card">
                <h3>Email Status</h3>
                <div class="info-value">
                    <?php echo $user['email_verified'] ? '✅ Verified' : '⏳ Pending'; ?>
                </div>
            </div>

            <div class="info-card">
                <h3>Member Since</h3>
                <div class="info-value"><?php echo formatDate($user['created_at']); ?></div>
                <div class="info-label">
                    <?php echo $user['last_login'] ? 'Last login: ' . timeAgo($user['last_login']) : 'Just logged in'; ?>
                </div>
            </div>
        </div>

        <div class="actions-card">
            <h2>Quick Actions</h2>
            <a href="<?php echo url('/dashboard/'); ?>" class="action-button">
                📋 View Items
            </a>
            <a href="<?php echo url('/'); ?>" class="action-button secondary">
                🏠 Back to Home
            </a>
            <a href="<?php echo url('/auth/logout.php'); ?>" class="action-button secondary">
                🚪 Sign Out
            </a>
        </div>
    </main>
</body>
</html>

