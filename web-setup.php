<?php
// IceHrm Web Setup (Hostinger Edition)
// Use this to initialize your configuration after uploading files

error_reporting(E_ALL);
ini_set('display_errors', 1);

$source = __DIR__ . '/app/config-hostinger.php';
$dest = __DIR__ . '/app/config.php';
$dataDir = __DIR__ . '/app/data';
$installDir = __DIR__ . '/app/install';

if (isset($_POST['action']) && $_POST['action'] == 'setup') {
    // 1. Copy Config
    if (copy($source, $dest)) {
        $msg = "✅ Config file created successfully!";
        // Set Permissions
        @chmod($dest, 0644);
        @chmod($dataDir, 0755);
        if (!is_dir($dataDir))
            mkdir($dataDir, 0755, true);
    } else {
        $error = "❌ Failed to copy config file. Check permissions.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IceHrm Setup</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-96 text-center">
        <h1 class="text-xl font-bold mb-4">IceHrm Setup</h1>

        <?php if (isset($msg))
            echo "<div class='bg-green-100 text-green-700 p-2 rounded mb-4'>$msg</div>"; ?>
        <?php if (isset($error))
            echo "<div class='bg-red-100 text-red-700 p-2 rounded mb-4'>$error</div>"; ?>

        <form method="post">
            <input type="hidden" name="action" value="setup">
            <button class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700 w-full">
                Run Setup
            </button>
        </form>

        <div class="mt-4 border-t pt-2">
            <a href="/app/install/" class="text-blue-500 hover:underline block mb-1">Go to Installer</a>
            <a href="/app/" class="text-gray-500 hover:underline block text-sm">Go to Login</a>
        </div>
    </div>
</body>

</html>