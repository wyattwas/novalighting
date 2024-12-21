<?php
require('../database.php');
$image_id = $_GET['id'];

$query_images = "SELECT url FROM images WHERE idimage = '$image_id'";
$stmt = PDO->query($query_images);
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($images as $image) {
    echo '../'.$image['url'];

    unlink('../'.$image['url']);
}

$query_fixture_images = "DELETE FROM fixture_images WHERE idimage = '$image_id'";
$stmt = PDO->query($query_fixture_images);

$query_images = "DELETE FROM images WHERE idimage = '$image_id'";
$stmt = PDO->query($query_images);