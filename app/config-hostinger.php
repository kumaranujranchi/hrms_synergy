<?php
// IceHrm Simple Config (Hostinger Production)
// This file is simplified to prevent duplicate constant errors

// Prevent loading twice
if (defined('APP_NAME'))
    return;

// --- 1. Database Settings ---
define('APP_DB', 'u743570205_wishluvhrpatna');
define('APP_USERNAME', 'u743570205_wishluvhrpatna');
define('APP_PASSWORD', 'Anuj@2025@2026');
define('APP_HOST', 'localhost');
define('APP_CON_STR', 'mysqli://' . APP_USERNAME . ':' . APP_PASSWORD . '@' . APP_HOST . '/' . APP_DB);

// --- 2. URL & Paths ---
define('BASE_URL', 'https://hrms.wishluvbuildcon.com/');
define('CLIENT_BASE_URL', BASE_URL . 'app/');
define('APP_BASE_PATH', dirname(__FILE__) . '/');
define('CLIENT_BASE_PATH', APP_BASE_PATH);

// --- 3. App Basic Info ---
define('APP_NAME', 'WishLuv HR');
define('FB_URL', 'https://www.facebook.com/wishluvhrpatna');
define('TWITTER_URL', 'https://twitter.com/wishluvhrpatna');

// --- 4. File Uploads ---
define('FILE_TYPES', 'jpg,png,jpeg,gif,pdf,doc,docx,xls,xlsx,txt,zip');
define('MAX_FILE_SIZE_KB', 10240); // 10MB

// --- 5. Session & Time ---
date_default_timezone_set('Asia/Kolkata');
ini_set('session.cookie_httponly', 1);
define('SESSION_EXPIRE_TIME', 3600);

// --- 6. Logging ---
ini_set('error_log', dirname(__FILE__) . '/data/icehrm.log');
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
