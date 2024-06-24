<?php
// Set Error Logging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', '/var/www/html/php_errors.log');

// Load Environment Variables
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception("The .env file does not exist.");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);
        putenv(sprintf('%s=%s', $key, $value));
    }
}

loadEnv('/var/www/html/conf/.env');

// Set Timezone & Memory
ini_set('memory_limit', getenv('MEMORY_LIMIT'));
date_default_timezone_set(getenv('DEFAULT_TIMEZONE'));

// Load AWS SDK
require '/var/www/html/libraries/aws-sdk/aws-autoloader.php';

// Database connection using PDO
try {
    $db = new PDO(
        'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME'),
        getenv('DB_USER'),
        getenv('DB_PASS')
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log('Connection failed: ' . $e->getMessage());
    die('Database connection failed');
}
