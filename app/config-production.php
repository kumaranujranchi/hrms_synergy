<?php
/**
 * IceHrm Production Configuration File
 * 
 * IMPORTANT: Update these values with your Hostinger database credentials
 * You can find these in your Hostinger control panel under MySQL Databases
 */

// Error logging
ini_set('error_log', dirname(__FILE__) . '/data/icehrm.log');
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);

// Application Settings
define('APP_NAME', 'IceHrm - HR Management System');
define('FB_URL', 'https://www.facebook.com/yourpage');
define('TWITTER_URL', 'https://twitter.com/yourhandle');

// Client Configuration
define('CLIENT_NAME', 'app');
define('APP_BASE_PATH', dirname(__FILE__) . '/');
define('CLIENT_BASE_PATH', APP_BASE_PATH);

// Base URL - IMPORTANT: Update this with your actual domain
// Example: https://yourdomain.com/ or https://subdomain.yourdomain.com/
define('BASE_URL', 'https://yourdomain.com/');
define('CLIENT_BASE_URL', BASE_URL . 'app/');

// Database Configuration - UPDATE THESE VALUES
// Get these from Hostinger Control Panel > MySQL Databases
define('APP_DB', 'your_database_name');           // Database name
define('APP_USERNAME', 'your_database_username'); // Database username
define('APP_PASSWORD', 'your_database_password'); // Database password
define('APP_HOST', 'localhost');                  // Usually 'localhost' for Hostinger
define('APP_CON_STR', 'mysqli://' . APP_USERNAME . ':' . APP_PASSWORD . '@' . APP_HOST . '/' . APP_DB);

// File Upload Settings
define('FILE_TYPES', 'jpg,png,jpeg,gif,pdf,doc,docx,xls,xlsx,txt');
define('MAX_FILE_SIZE_KB', 10 * 1024); // 10MB

// Timezone
date_default_timezone_set('Asia/Kolkata');

// Session Configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Set to 1 if using HTTPS

// Security Settings
define('SESSION_EXPIRE_TIME', 3600); // 1 hour
