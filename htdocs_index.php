<?php
// Sembunyikan deprecated notice PHP 8.4
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED & ~E_NOTICE);
ini_set('display_errors', '0');

define('LARAVEL_START', microtime(true));

$baseDir = __DIR__ . '/app-ptpn4dos';

// Konfigurasi resmi dan jalur aset publik otomatis
$envVars = [
    'APP_NAME' => 'LaporPak PTPN IV',
    'APP_ENV' => 'production',
    'APP_KEY' => 'base64:RisTj59YSmVRmf1ctHk73j8T/Rq9KvGOTKXWkQtZ3nA=',
    'APP_DEBUG' => 'false',
    'APP_URL' => 'http://laporpak-ptpn4.site.je',
    'ASSET_URL' => 'http://laporpak-ptpn4.site.je/app-ptpn4dos/public',
    'SESSION_DRIVER' => 'cookie',
    'SESSION_LIFETIME' => '120',
    'SESSION_SECURE_COOKIE' => 'false',
    'DB_CONNECTION' => 'mysql',
    'DB_HOST' => 'sql207.infinityfree.com',
    'DB_PORT' => '3306',
    'DB_DATABASE' => 'if0_43103833_lapor',
    'DB_USERNAME' => 'if0_43103833',
    'DB_PASSWORD' => 'r8CKCu6VDOf',
    'TELEGRAM_BOT_TOKEN' => '8988419771:AAF_k9Vh6nuGxSAYMWuM54_5FUAi0WKyYAw',
    'TELEGRAM_CHAT_ID' => '-5018068402',
];

foreach ($envVars as $k => $v) {
    putenv("{$k}={$v}");
    $_ENV[$k] = $v;
    $_SERVER[$k] = $v;
}

// Pastikan direktori storage esensial tersedia
@mkdir($baseDir . '/storage/framework/sessions', 0777, true);
@mkdir($baseDir . '/storage/framework/views', 0777, true);
@mkdir($baseDir . '/storage/framework/cache', 0777, true);
@mkdir($baseDir . '/storage/logs', 0777, true);

// Bersihkan cache bootstrap lama jika ada
@unlink($baseDir . '/bootstrap/cache/packages.php');
@unlink($baseDir . '/bootstrap/cache/services.php');
@unlink($baseDir . '/bootstrap/cache/config.php');

// Jalankan Laravel
if (file_exists($maintenance = $baseDir . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

require $baseDir . '/vendor/autoload.php';

$app = require_once $baseDir . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);
