<?php
const DB_HOST = '10.10.1.1';
const DB_USER = 'web';
const DB_PASSWORD = 'mysql';
const DB_NAME = 'novalighting';
const PDO = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
?>