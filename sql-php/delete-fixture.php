<?php
require('../database.php');
$fixture_id = $_GET['id'];

$query_images = "DELETE FROM fixtures WHERE idfixture = '".$fixture_id."';";
$stmt = PDO->query($query_images);