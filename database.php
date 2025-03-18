<?php
const DB_HOST = '172.0.0.1';
const DB_USER = 'web';
const DB_PASSWORD = 'mysql';
const DB_NAME = 'novalighting';
const PDO = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
?>