<?php
// Database settings for MySQL / MariaDB
define('DB_HOST', 'localhost');
define('DB_NAME', 'gamevault');
define('DB_USER', 'root');
define('DB_PASS', '');

define('SITE_URL', 'http://localhost/gamevault/public');
define('SITE_NAME', 'GameVault');

ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>