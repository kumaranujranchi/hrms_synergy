<?php
/**
 * IceHrm Production Configuration File
 * Configured for Hostinger Deployment - WishLuv HR Patna
 * 
 * INSTRUCTIONS:
 * 1. Update BASE_URL with your actual domain
 * 2. Copy this file as config.php: cp config-hostinger.php config.php
 * 3. Upload to Hostinger
 */

// Error logging
ini_set('error_log', dirname(__FILE__) . '/data/icehrm.log');
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);

// Application Settings
define('APP_NAME', 'WishLuv HR Patna - HR Management System');
define('FB_URL', 'https://www.facebook.com/wishluvhrpatna');
define('TWITTER_URL', 'https://twitter.com/wishluvhrpatna');

// Client Configuration
define('CLIENT_NAME', 'app');
define('APP_BASE_PATH', dirname(__FILE__) . '/');
define('CLIENT_BASE_PATH', APP_BASE_PATH);

// Base URL - Hostinger Domain
define('BASE_URL', 'https://hrms.wishluvbuildcon.com/');
define('CLIENT_BASE_URL', BASE_URL . 'app/');

// Database Configuration - Hostinger Credentials
define('APP_DB', 'u743570205_wishluvhrpatna');           // Database name
define('APP_USERNAME', 'u743570205_wishluvhrpatna');     // Database username
define('APP_PASSWORD', 'Anuj@2025@2026');                // Database password
define('APP_HOST', 'localhost');                          // Database host
define('APP_CON_STR', 'mysqli://' . APP_USERNAME . ':' . APP_PASSWORD . '@' . APP_HOST . '/' . APP_DB);

// File Upload Settings
define('FILE_TYPES', 'jpg,png,jpeg,gif,pdf,doc,docx,xls,xlsx,txt,zip');
define('MAX_FILE_SIZE_KB', 10 * 1024); // 10MB

// Timezone - India Standard Time
date_default_timezone_set('Asia/Kolkata');

// Session Configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Set to 1 after enabling HTTPS

// Security Settings
define('SESSION_EXPIRE_TIME', 3600); // 1 hour

// Email Configuration (Optional - configure later if needed)
// define('SMTP_HOST', 'smtp.hostinger.com');
// define('SMTP_USER', 'your-email@yourdomain.com');
// define('SMTP_PASS', 'your-email-password');
// define('SMTP_PORT', 587);
