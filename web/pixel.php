<?php
require_once __DIR__ . '/../app/bootstrap.php';

use AdwPixel\Pixel;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

// PNG PIXEL RENDER
Pixel::generate();

// LOG
$array = [
    // Client
    'HTTP_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
    'HTTP_COOKIE' => $_SERVER['HTTP_COOKIE'],
    'REMOTE_ADDR' => $_SERVER['REMOTE_ADDR'],
    'REMOTE_HOST' => $_SERVER['REMOTE_HOST'],
    'REMOTE_PORT' => $_SERVER['REMOTE_PORT'],

    //Server
    'REQUEST_METHOD' => $_SERVER['REQUEST_METHOD'],
    'HTTP_REFERER' => $_SERVER['HTTP_REFERER'],
    'HTTP_HOST' => $_SERVER['HTTP_HOST'],
    'SERVER_ADDR' => $_SERVER['SERVER_ADDR'],
    'SERVER_NAME' => $_SERVER['SERVER_NAME'],
    'SERVER_PORT' => $_SERVER['SERVER_PORT'],
    'REQUEST_URI' => $_SERVER['REQUEST_URI'],
    'REQUEST_TIME' => $_SERVER['REQUEST_TIME'],
];

$lines = [];
foreach ($array as $key => $value) {
    $lines[] = "{$key}={$value}";
}
$logString = implode(', ', $lines);


$clientLogger = new Logger('clients');
$clientLogger->pushHandler(new StreamHandler(__DIR__ . '/../var/logs/clients.log', Logger::INFO));
$clientLogger->addInfo($logString);
