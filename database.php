<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'novalighting');

define('mysql', mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME));
$pdo_string = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
define('pdo', new PDO($pdo_string, DB_USER, DB_PASSWORD))
?>