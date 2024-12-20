<?php
require('../database.php');
$fixture_id = $_GET['fixtureid'];
$image_id = $_GET['imageid'];

$query_images = "DELETE FROM fixture_images WHERE idimage = '".$image_id."' AND idfixture = '".$fixture_id."';";
$stmt = PDO->query($query_images);
?>