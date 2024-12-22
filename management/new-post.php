<?php
require('../database.php');

if (isset($_POST["submit"])) {
    $name_post = $_POST["name"];
    $body_post = $_POST["body"];

    $query_fixture = "INSERT INTO posts (idpost, name, body) values (0, '$name_post', '$body_post')";
    $stmt = PDO->query($query_fixture);
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/select-images.css">
</head>
<body>
<h1>New Fixture</h1>
<form action="?tab=new-post" method="post" enctype="multipart/form-data">
    <input type="text" name="name" id="name" maxlength="200" placeholder="Name" required>
    <textarea name="body" id="body" cols="30" rows="10" maxlength="1000"
              placeholder="Body" required></textarea>
    <input type="submit" value="Fertig" name="submit">
</form>
</body>
</html>

