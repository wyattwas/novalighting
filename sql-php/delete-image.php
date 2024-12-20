<?php
require('../database.php');
$image_id = $_GET['id'];

$query_images = "DELETE FROM images WHERE idimage = '".$image_id."';";
$stmt = PDO->query($query_images);