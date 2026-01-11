<?php
// IceHrm Web Setup Fixer v2 - Force Fix Edition
error_reporting(E_ALL);
ini_set('display_errors', 1);

$baseDir = __DIR__;
$appDir = $baseDir . '/app';
$configSource = $appDir . '/config-hostinger.php';
$configDest = $appDir . '/config.php';
$dataDir = $appDir . '/data';

$messages = [];
$action = $_POST['action'] ?? '';

// Helper function to log messages
function logMsg($msg, $isError = false)
{
    global $messages;
    $class = $isError ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800';
    $icon = $isError ? '❌' : '✅';
    $messages[] = "<div class='$class p-3 rounded mb-2 border'>$icon $msg</div>";
}

if ($action === 'fix') {
    // 1. Force Copy Config
    if (file_exists($configSource)) {
        if (copy($configSource, $configDest)) {
            logMsg("FIXED: Successfully overwrote app/config.php with production config.");
            // Verify content
            $content = file_get_contents($configDest);
            if (strpos($content, 'config-dev.php') !== false) {
                logMsg("CRITICAL ERROR: New config still contains reference to config-dev.php! Check source file.", true);
            } else {
                logMsg("VERIFIED: Config file is now correct.");
            }
        } else {
            logMsg("Error: Failed to copy config-hostinger.php. Check permissions.", true);
        }
    } else {
        logMsg("Error: Source file app/config-hostinger.php not found!", true);
    }

    // 2. Fix Directory
    if (!is_dir($dataDir)) {
        mkdir($dataDir, 0755, true);
        logMsg("Created app/data directory");
    }

    // 3. Permissions
    @chmod($configDest, 0644);
    @chmod($dataDir, 0755);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IceHrm Force Fixer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-lg shadow-2xl max-w-lg w-full">
        <h1 class="text-3xl font-bold mb-2 text-gray-800">🚑 Repair Kit</h1>
        <p class="mb-6 text-gray-600">Your config file is incorrect. This tool will force overwrite it with the correct
            version.</p>

        <?php if (!empty($messages)): ?>
            <div class="mb-6">
                <?php foreach ($messages as $msg)
                    echo $msg; ?>
            </div>

            <div class="mt-6 border-t pt-4">
                <p class="text-center font-bold text-gray-700 mb-2">🚀 Now Try Opening:</p>
                <a href="/app/install/" target="_blank"
                    class="block text-center w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition">
                    Open Installation Wizard
                </a>
            </div>
        <?php else: ?>
            <div class="bg-yellow-50 border border-yellow-200 p-4 rounded mb-6 text-sm text-yellow-800">
                <strong>Current Status:</strong> We detected that your <code>config.php</code> is trying to load
                <code>config-dev.php</code> which doesn't exist. This causes the fatal error.
            </div>

            <form method="post">
                <input type="hidden" name="action" value="fix">
                <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-4 px-4 rounded shadow-lg transform transition hover:scale-105">
                    🚨 FORCE FIX CONFIGURATION
                </button>
            </form>
        <?php endif; ?>

    </div>
</body>

</html>