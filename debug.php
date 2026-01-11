<?php
// IceHrm Advanced Debugger
// Place this in your root directory or /app directory
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>🐞 IceHrm Debugger</h1>";

// 1. Check PHP Version
echo "<h2>1. PHP Version</h2>";
echo "Current Version: " . phpversion() . "<br>";
if (version_compare(phpversion(), '7.4.0', '<')) {
    echo "<span style='color:red;'>❌ PHP 7.4 or higher required!</span><br>";
} else {
    echo "<span style='color:green;'>✅ PHP Version OK</span><br>";
}

// 2. Check Config File
echo "<h2>2. Configuration File</h2>";
$configFile = __DIR__ . '/app/config.php';
if (file_exists($configFile)) {
    echo "<span style='color:green;'>✅ app/config.php exists</span><br>";
    include $configFile;
    echo "DB Host: " . APP_HOST . "<br>";
    echo "DB User: " . APP_USERNAME . "<br>";
    echo "DB Name: " . APP_DB . "<br>";
    echo "Base URL: " . BASE_URL . "<br>";
} else {
    echo "<span style='color:red;'>❌ app/config.php NOT FOUND!</span><br>";
    echo "Please copy app/config-hostinger.php to app/config.php<br>";
}

// 3. Database Connection Test
echo "<h2>3. Database Connection</h2>";
if (defined('APP_HOST')) {
    $conn = new mysqli(APP_HOST, APP_USERNAME, APP_PASSWORD, APP_DB);
    if ($conn->connect_error) {
        echo "<span style='color:red;'>❌ Connection Failed: " . $conn->connect_error . "</span><br>";
    } else {
        echo "<span style='color:green;'>✅ Database Connected Successfully!</span><br>";
        $conn->close();
    }
} else {
    echo "Skipped (Config missing)<br>";
}

// 4. File Permissions
echo "<h2>4. File Permissions</h2>";
$paths = [
    'app/data' => 'drwxr-xr-x',
    'app/config.php' => '-rw-r--r--',
];

foreach ($paths as $path => $perm) {
    if (file_exists(__DIR__ . '/' . $path)) {
        if (is_writable(__DIR__ . '/' . $path)) {
            echo "<span style='color:green;'>✅ $path is writable</span><br>";
        } else {
            echo "<span style='color:red;'>❌ $path is NOT writable! (Run chmod 755)</span><br>";
        }
    } else {
        echo "<span style='color:red;'>❌ $path does not exist!</span><br>";
    }
}

// 5. Check Required Extensions
echo "<h2>5. PHP Extensions</h2>";
$extensions = ['mysqli', 'gd', 'curl', 'mbstring', 'xml', 'json'];
foreach ($extensions as $ext) {
    if (extension_loaded($ext)) {
        echo "<span style='color:green;'>✅ $ext loaded</span><br>";
    } else {
        echo "<span style='color:red;'>❌ $ext MISSING!</span><br>";
    }
}

echo "<h2>6. Testing Application Load...</h2>";
echo "Attempting to include app/index.php...<br>";

// Try to verify if we can bootstrap the app
try {
    if (file_exists(__DIR__ . '/app/index.php')) {
        echo "Found app/index.php<br>";
        // We won't include it here as it might redirect or stop execution, 
        // but we'll check for common fatal error sources

        // Check core directory
        if (!is_dir(__DIR__ . '/core')) {
            echo "<span style='color:red;'>❌ /core directory missing! Did git upload everything?</span><br>";
        } else {
            echo "<span style='color:green;'>✅ /core directory exists</span><br>";
        }

    } else {
        echo "<span style='color:red;'>❌ app/index.php missing!</span><br>";
    }
} catch (Exception $e) {
    echo "<span style='color:red;'>❌ Exception: " . $e->getMessage() . "</span><br>";
}

echo "<hr><h3>END OF DEBUG</h3>";
?>