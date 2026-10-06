<?php

// Aktifkan error reporting untuk mendiagnosis jika ada kendala serverless
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$tmpDir = sys_get_temp_dir();
$storageDir = $tmpDir . '/storage';

// Pastikan semua direktori writable yang dibutuhkan Laravel ada di /tmp
$requiredDirs = [
    $storageDir . '/framework/views',
    $storageDir . '/framework/cache/data',
    $storageDir . '/framework/sessions',
    $storageDir . '/logs',
    $storageDir . '/app/public',
    $tmpDir . '/bootstrap/cache',
];

foreach ($requiredDirs as $dir) {
    if (! is_dir($dir)) {
        @mkdir($dir, 0777, true);
    }
}

// Inisialisasi Environment Variables esensial
$appKey = getenv('APP_KEY') ?: 'base64:RisTj59YSmVRmf1ctHk73j8T/Rq9KvGOTKXWkQtZ3nA=';

$serverlessEnv = [
    'APP_KEY' => $appKey,
    'APP_NAME' => getenv('APP_NAME') ?: 'LaporPak PTPN IV',
    'APP_ENV' => getenv('APP_ENV') ?: 'production',
    'APP_DEBUG' => getenv('APP_DEBUG') ?: 'false',
    'APP_STORAGE' => $storageDir,
    'VIEW_COMPILED_PATH' => $storageDir . '/framework/views',
    'APP_CONFIG_CACHE' => $tmpDir . '/config.php',
    'APP_EVENTS_CACHE' => $tmpDir . '/events.php',
    'APP_PACKAGES_CACHE' => $tmpDir . '/packages.php',
    'APP_ROUTES_CACHE' => $tmpDir . '/routes.php',
    'APP_SERVICES_CACHE' => $tmpDir . '/services.php',
    'CACHE_DRIVER' => 'array',
    'SESSION_DRIVER' => 'cookie',
    'LOG_CHANNEL' => 'stderr',
    'DB_CONNECTION' => getenv('DB_CONNECTION') ?: 'mysql',
    'DB_HOST' => getenv('DB_HOST') ?: 'gateway01.ap-southeast-1.prod.aws.tidbcloud.com',
    'DB_PORT' => getenv('DB_PORT') ?: '4000',
    'DB_DATABASE' => getenv('DB_DATABASE') ?: 'test',
    'DB_USERNAME' => getenv('DB_USERNAME') ?: '4D9cPBexdHqC9Z3.root',
    'DB_PASSWORD' => getenv('DB_PASSWORD') ?: '8d427pN1twjgcWLs',
    'MYSQL_ATTR_SSL_CA' => 'true',
];

foreach ($serverlessEnv as $key => $val) {
    putenv("{$key}={$val}");
    $_ENV[$key] = $val;
    $_SERVER[$key] = $val;
}

require __DIR__ . '/../public/index.php';
