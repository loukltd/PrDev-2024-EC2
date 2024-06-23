<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Log errors to a specific file
ini_set('log_errors', 1);
ini_set('error_log', '/var/www/html/php_errors.log');

// Function to load environment variables from a .env file
function loadEnv($path) {
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

// Load environment variables
loadEnv('/var/www/html/conf/.env');

// Use the loaded environment variables
require '/var/www/html/aws-sdk/aws-autoloader.php';

use Aws\S3\S3Client;

// Instantiate an Amazon S3 client.
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => getenv('AWS_REGION'),
    'credentials' => [
        'key'    => getenv('AWS_KEY'),
        'secret' => getenv('AWS_SECRET_KEY'),
    ],
]);

// List the buckets
try {
    $result = $s3->listBuckets();
    echo "Buckets:\n";
    foreach ($result['Buckets'] as $bucket) {
        echo $bucket['Name'] . "\n";
    }
} catch (Aws\Exception\AwsException $e) {
    // Output error message if fails
    echo $e->getMessage();
    echo "\n";
}
?>

