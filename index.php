<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/Auth.php';

// Configuration
define('SITE_TAGLINE', 'Powerful SaaS Solution');

// Check authentication
$auth = new Auth();
$isLoggedIn = $auth->isLoggedIn();
$user = $isLoggedIn ? $auth->getCurrentUser() : null;
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Transform your business with our powerful SaaS solution. Join thousands of satisfied customers worldwide.">
    
    <title><?php echo SITE_NAME; ?> - <?php echo SITE_TAGLINE; ?></title>
    
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="assets/css/style.css">
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
                <button class="nav-toggle" id="navToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                
                <div class="nav-menu" id="navMenu">
                    <?php if ($isLoggedIn): ?>
                        <a href="dashboard/" class="nav-item">📊 Dashboard</a>
                        <a href="pricing.php" class="nav-item">💰 Pricing</a>
                        <a href="auth/logout.php" class="nav-item">🚪 Log out</a>
                    <?php else: ?>
                        <a href="#features" class="nav-item">✨ Features</a>
                        <a href="pricing.php" class="nav-item">💰 Pricing</a>
                        <a href="auth/google-login.php" class="nav-item nav-item-cta">👋 Sign in with Google</a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </header>

    <!-- Flash Messages -->
    <?php if (hasFlashMessages()): ?>
        <style>
            .flash-messages {
                max-width: 1200px;
                margin: 1rem auto;
                padding: 0 2rem;
            }
            
            .flash-message {
                padding: 1rem 1.5rem;
                border-radius: 8px;
                margin-bottom: 1rem;
                animation: slideIn 0.3s ease-out;
            }
            
            @keyframes slideIn {
                from {
                    transform: translateY(-20px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
            
            .flash-message.success {
                background: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
            }
            
            .flash-message.error {
                background: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
            }
            
            .flash-message.warning {
                background: #fff3cd;
                color: #856404;
                border: 1px solid #ffeaa7;
            }
            
            .flash-message.info {
                background: #d1ecf1;
                color: #0c5460;
                border: 1px solid #bee5eb;
            }
        </style>
        <div class="flash-messages">
            <?php foreach (getFlashMessages() as $flash): ?>
                <div class="flash-message <?php echo escape($flash['type']); ?>">
                    <?php echo escape($flash['message']); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content-wrapper">
                <!-- Left Column: Text Content -->
                <div class="hero-content">
                    <!-- Main Headline -->
                    <h1 class="hero-title">
                        🚀 Transform Your Business
                    </h1>
                    
                    <!-- Key Benefits as Bullet Points -->
                    <div class="benefits">
                        <div class="benefit">
                            ✅ <a href="/features.php">Take a screenshot</a> of your workflow and let AI optimize it in seconds
                        </div>
                        <div class="benefit">
                            🎨 <a href="/features.php">Choose a solution style</a> from Modern, Minimalist to Enterprise
                        </div>
                        <div class="benefit">
                            ⚡️ <a href="/features.php">Transform your ideas</a> and sketches into production-ready features
                        </div>
                    </div>
                </div>

                <!-- Right Column: Signup Card -->
                <div class="hero-signup-card">
                    <?php if ($isLoggedIn): ?>
                        <div class="signup-bubble">
                            👋 Welcome back, <?php echo escape($user['full_name']); ?>!
                        </div>
                        
                        <div class="signup-form">
                            <a href="dashboard/" class="btn btn-cta">Go to Dashboard →</a>
                            <a href="pricing.php" class="btn btn-google">
                                💎 View Pricing Plans
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="signup-bubble">
                            ✨ Get your first results in less than a minute!
                        </div>
                        
                        <div class="signup-form">
                            <a href="auth/google-login.php" class="btn btn-cta">Get started now →</a>
                            <a href="auth/google-login.php" class="btn btn-google">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.64 9.20443C17.64 8.56625 17.5827 7.95262 17.4764 7.36353H9V10.8449H13.8436C13.635 11.9699 13.0009 12.9231 12.0477 13.5613V15.8194H14.9564C16.6582 14.2526 17.64 11.9453 17.64 9.20443Z" fill="#4285F4"/>
                                    <path d="M8.99976 18C11.4298 18 13.467 17.1941 14.9561 15.8195L12.0475 13.5613C11.2416 14.1013 10.2107 14.4204 8.99976 14.4204C6.65567 14.4204 4.67158 12.8372 3.96385 10.71H0.957031V13.0418C2.43794 15.9831 5.48158 18 8.99976 18Z" fill="#34A853"/>
                                    <path d="M3.96409 10.7098C3.78409 10.1698 3.68182 9.59301 3.68182 8.99983C3.68182 8.40665 3.78409 7.82983 3.96409 7.28983V4.95801H0.957273C0.347727 6.17301 0 7.54755 0 8.99983C0 10.4521 0.347727 11.8266 0.957273 13.0416L3.96409 10.7098Z" fill="#FBBC05"/>
                                    <path d="M8.99976 3.57955C10.3211 3.57955 11.5075 4.03364 12.4402 4.92545L15.0216 2.34409C13.4629 0.891818 11.4257 0 8.99976 0C5.48158 0 2.43794 2.01682 0.957031 4.95818L3.96385 7.29C4.67158 5.16273 6.65567 3.57955 8.99976 3.57955Z" fill="#EA4335"/>
                                </svg>
                                Continue with Google
                            </a>
                            <p class="signup-hint">If you already have an account, we'll log you in</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-preview">
        <div class="container">
            <h2 class="section-title">Why Choose <?php echo SITE_NAME; ?>?</h2>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <h3>Easy to Use</h3>
                    <p>Intuitive interface designed for everyone, from beginners to experts.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🚄</div>
                    <h3>Blazing Fast</h3>
                    <p>Optimized performance ensures your work gets done quickly.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🔐</div>
                    <h3>Secure & Reliable</h3>
                    <p>Bank-level encryption keeps your data safe and secure.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🌍</div>
                    <h3>Global Reach</h3>
                    <p>Serve customers worldwide with our global infrastructure.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📈</div>
                    <h3>Scalable</h3>
                    <p>Grow from startup to enterprise without missing a beat.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">💡</div>
                    <h3>Smart Insights</h3>
                    <p>AI-powered analytics help you make better decisions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Product</h4>
                    <ul>
                        <li><a href="/features.php">Features</a></li>
                        <li><a href="/pricing.php">Pricing</a></li>
                        <li><a href="/changelog.php">Changelog</a></li>
                        <li><a href="/roadmap.php">Roadmap</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="/about.php">About</a></li>
                        <li><a href="/blog.php">Blog</a></li>
                        <li><a href="/careers.php">Careers</a></li>
                        <li><a href="/contact.php">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="/docs.php">Documentation</a></li>
                        <li><a href="/api.php">API Reference</a></li>
                        <li><a href="/help.php">Help Center</a></li>
                        <li><a href="/community.php">Community</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="/privacy.php">Privacy Policy</a></li>
                        <li><a href="/terms.php">Terms of Service</a></li>
                        <li><a href="/security.php">Security</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>

