<?php
require('../database.php');
$post_id = $_GET['id'];

$query = "DELETE FROM posts WHERE idpost = '$post_id'";
$stmt = PDO->query($query);