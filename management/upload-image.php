<?php
require('../database.php');

$info = "";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $info = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $info = "File is not an image.";
        $uploadOk = 0;
    }

    if ($_POST['name'] != NULL) {
        $target_file = $target_dir . basename($_POST['name']) . "." . $imageFileType;
    }

    $query_image = "INSERT INTO images (idimage, url) values ('".$_POST['id']."', '$target_file')";
    $stmt = PDO->query($query_image);
}

if (file_exists($target_file)) {
    $info = "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $info = "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $info = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    $info = "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $info = "The file ". htmlspecialchars( basename( $target_file)). " has been uploaded.";
    } else {
        $info = "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/select-images.css">
</head>
<body>
<h1>New Image</h1>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="id" id="id" maxlength="20" placeholder="ID" required>
    <input type="text" name="name" id="name" maxlength="50" placeholder="New File Name">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Fertig" name="submit">
</form>
<div><?php echo $info ?></div>
</body>
</html>
