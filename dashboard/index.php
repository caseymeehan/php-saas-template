<?php
/**
 * Dashboard
 * Main dashboard page for authenticated users
 */

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Auth.php';

$auth = new Auth();

// Require authentication
$auth->requireAuth();

// Get current user
$user = $auth->getCurrentUser();

if (!$user) {
    flashMessage('error', 'Unable to load user data.');
    redirect('../auth/logout.php');
}

// Page title
$pageTitle = 'Dashboard';
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
            padding-top: 80px; /* Account for fixed header */
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .welcome-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem;
            border-radius: 12px;
            margin-bottom: 2rem;
        }
        
        .welcome-section h1 {
            margin: 0 0 0.5rem 0;
            font-size: 2.5rem;
        }
        
        .welcome-section p {
            margin: 0;
            opacity: 0.9;
            font-size: 1.1rem;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid white;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .stat-card h3 {
            margin: 0 0 0.5rem 0;
            color: #666;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .stat-card .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }
        
        .quick-actions {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .quick-actions h2 {
            margin: 0 0 1.5rem 0;
        }
        
        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        
        .action-button {
            display: block;
            padding: 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }
        
        .header {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 0;
        }
        
        .nav-item {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <a href="/">
                    <span class="logo-icon">🚀</span>
                    <span class="logo-text"><?php echo SITE_NAME; ?></span>
                </a>
            </div>
            
            <nav class="nav">
                <div class="nav-menu">
                    <a href="../dashboard/" class="nav-item">📊 Dashboard</a>
                    <a href="../auth/logout.php" class="nav-item">🚪 Log out</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Flash Messages -->
    <?php if (hasFlashMessages()): ?>
        <div class="flash-messages">
            <?php foreach (getFlashMessages() as $flash): ?>
                <div class="flash-message <?php echo escape($flash['type']); ?>">
                    <?php echo escape($flash['message']); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Dashboard Content -->
    <div class="dashboard-container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1>Welcome back, <?php echo escape($user['full_name']); ?>! 👋</h1>
            <p>Here's what's happening with your account today.</p>
            
            <div class="user-info">
                <?php if ($user['avatar_url']): ?>
                    <img src="<?php echo escape($user['avatar_url']); ?>" alt="Profile" class="user-avatar">
                <?php endif; ?>
                <div>
                    <div><strong>Email:</strong> <?php echo escape($user['email']); ?></div>
                    <div><strong>Username:</strong> <?php echo escape($user['username']); ?></div>
                    <div><strong>Member since:</strong> <?php echo formatDate($user['created_at']); ?></div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Subscription Plan</h3>
                <div class="stat-value"><?php echo ucfirst(escape($user['subscription_tier'])); ?></div>
            </div>
            
            <div class="stat-card">
                <h3>Account Status</h3>
                <div class="stat-value"><?php echo $user['is_active'] ? '✅ Active' : '❌ Inactive'; ?></div>
            </div>
            
            <div class="stat-card">
                <h3>Email Verified</h3>
                <div class="stat-value"><?php echo $user['email_verified'] ? '✅ Yes' : '⏳ Pending'; ?></div>
            </div>
            
            <div class="stat-card">
                <h3>Last Login</h3>
                <div class="stat-value" style="font-size: 1.2rem;">
                    <?php echo $user['last_login'] ? timeAgo($user['last_login']) : 'Just now'; ?>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="action-grid">
                <a href="../" class="action-button">
                    🏠 Back to Home
                </a>
                <a href="../auth/logout.php" class="action-button">
                    🚪 Sign Out
                </a>
            </div>
        </div>
    </div>
</body>
</html>

