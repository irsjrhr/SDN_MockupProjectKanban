<?php
// Vercel Serverless Entry Point & Router for PHP Mockup
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = ltrim($uri, '/');

// If empty or root, load default project page
if (empty($uri) || $uri === 'index.php') {
    $target = __DIR__ . '/../Workspace/KanbanProject.php';
    if (file_exists($target)) {
        chdir(dirname($target));
        require $target;
        exit;
    }
}

$filePath = __DIR__ . '/../' . $uri;

if (file_exists($filePath) && is_file($filePath)) {
    // If it's a PHP file, execute it in its own directory context
    if (pathinfo($filePath, PATHINFO_EXTENSION) === 'php') {
        chdir(dirname($filePath));
        require $filePath;
        exit;
    }

    // Static assets fallback
    $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    $mimes = [
        'css'  => 'text/css',
        'js'   => 'application/javascript',
        'png'  => 'image/png',
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'webp' => 'image/webp',
        'svg'  => 'image/svg+xml',
        'woff' => 'font/woff',
        'woff2'=> 'font/woff2',
        'ttf'  => 'font/ttf',
        'json' => 'application/json'
    ];
    if (isset($mimes[$ext])) {
        header('Content-Type: ' . $mimes[$ext]);
    }
    readfile($filePath);
    exit;
}

// 404 handler
http_response_code(404);
echo "404 Not Found: " . htmlspecialchars($uri);
