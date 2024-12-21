<?php
require('../database.php');
$fixture_id = $_GET['id'];

$query_fixture_images = "DELETE FROM fixture_images WHERE idfixture = '$fixture_id'";
$stmt = PDO->query($query_fixture_images);

$query_images = "DELETE FROM fixtures WHERE idfixture = '".$fixture_id."';";
$stmt = PDO->query($query_images);