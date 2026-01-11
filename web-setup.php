<?php
// Web Setup Script for Hostinger Shared Hosting
// Use this when SSH access is not available

error_reporting(E_ALL);
ini_set('display_errors', 1);

$baseDir = __DIR__;
$appDir = $baseDir . '/app';
$configSource = $appDir . '/config-hostinger.php';
$configDest = $appDir . '/config.php';
$dataDir = $appDir . '/data';

$messages = [];
$success = true;

// Helper function to log messages
function logMsg($msg, $isError = false)
{
    global $messages, $success;
    $class = $isError ? 'text-red-600 font-bold' : 'text-green-600';
    $icon = $isError ? '❌' : '✅';
    $messages[] = "<div class='$class'>$icon $msg</div>";
    if ($isError)
        $success = false;
}

// Action Handler
if (isset($_POST['action']) && $_POST['action'] === 'fix') {

    // 1. Create config.php
    if (file_exists($configDest)) {
        logMsg("Checking: config.php already exists.");
    } else {
        if (file_exists($configSource)) {
            if (copy($configSource, $configDest)) {
                logMsg("Success: Created app/config.php from template.");
            } else {
                logMsg("Error: Failed to copy config-hostinger.php to config.php", true);
            }
        } else {
            logMsg("Error: Source file app/config-hostinger.php not found!", true);
        }
    }

    // 2. Create data directory
    if (!is_dir($dataDir)) {
        if (mkdir($dataDir, 0755, true)) {
            logMsg("Success: Created app/data directory.");
        } else {
            logMsg("Error: Failed to create app/data directory.", true);
        }
    } else {
        logMsg("Checking: app/data directory exists.");
    }

    // 3. Set Permissions (Best effort, might be limited by host)
    try {
        @chmod($configDest, 0644);
        @chmod($dataDir, 0755);
        @chmod($appDir, 0755);
        logMsg("Success: Attempted to set file permissions.");
    } catch (Exception $e) {
        logMsg("Warning: Could not change permissions (Host restriction), but continuing.", true);
    }

    // 4. Check .htaccess
    if (file_exists($baseDir . '/.htaccess')) {
        logMsg("Checking: .htaccess exists.");
    } else {
        logMsg("Warning: .htaccess missing in root. URLs might not work properly.", true);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IceHrm Web Setup Fixer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">🛠️ IceHrm Setup Fixer</h1>
        <p class="mb-4 text-gray-600">Use this tool to fix "500 Errors" on Hostinger Shared Hosting by creating missing
            configuration files.</p>

        <?php if (!empty($messages)): ?>
            <div class="bg-gray-50 border border-gray-200 rounded p-4 mb-4 space-y-2">
                <?php foreach ($messages as $msg)
                    echo $msg; ?>
            </div>
        <?php endif; ?>

        <form method="post" class="mt-6">
            <input type="hidden" name="action" value="fix">
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition duration-200">
                Run Auto-Fix
            </button>
        </form>

        <div class="mt-6 border-t pt-4">
            <h2 class="font-semibold text-gray-700 mb-2">Check Result:</h2>
            <a href="/app/" target="_blank"
                class="block text-center w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-2">
                Open Application
            </a>
            <a href="/app/install/" target="_blank"
                class="block text-center w-full border border-green-600 text-green-600 hover:bg-green-50 font-bold py-2 px-4 rounded">
                Go to Installation Wizard
            </a>
        </div>

        <p class="text-xs text-red-500 mt-4 text-center">
            Security Warning: Delete this file (web-setup.php) after setup is complete!
        </p>
    </div>
</body>

</html>