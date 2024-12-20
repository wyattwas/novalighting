<?php
require('database.php');

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    $name_fixture = $_POST["name"];
    $description_fixture = $_POST["description"];
    $id_fixture = $_POST["id"];

    $query_fixture = "INSERT INTO fixtures (idfixture, name, info) values ('$id_fixture', '$name_fixture', '$description_fixture')";
    $query_image = "INSERT INTO images (idimage, url) values ('" . basename($_FILES["fileToUpload"]["name"]) . "', '$target_file')";
    $query_image_to_fixture = "INSERT INTO fixture_images (idfixture, idimage) values ('$id_fixture', '" . basename($_FILES["fileToUpload"]["name"]) . "')";

    mysqli_query(mysql, $query_fixture);
    mysqli_query(mysql, $query_image);
    mysqli_query(mysql, $query_image_to_fixture);
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="name">Name:</label><input type="text" name="name" id="name" maxlength="50" required>
    <label for="description">Beschreibung:</label><input type="text" name="description" id="description"
                                                         maxlength="500">
    <label for="id">ID:</label><input type="text" name="id" id="id" maxlength="20" required>
    <label for="fileToUpload">Wähle ein Bild aus:</label><input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Fertig" name="submit">
</form>

</body>
</html>
