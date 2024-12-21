<?php
require('database.php');
$id_image = $_GET['id'];

$query_image = "SELECT * FROM images WHERE idimage = '$id_image'";
$stmt = PDO->query($query_image);
$image = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["submit"])) {
    $name_image = $_POST["name"];
    $new_path = pathinfo($image[0]['url'])['dirname'].'/'.$name_image.'.'.pathinfo($image[0]['url'])['extension'];

    rename($image[0]['url'], $new_path);

    $query_fixture = "UPDATE images SET url = '$new_path' WHERE idimage = '$id_image'";
    $stmt = PDO->query($query_fixture);
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/select-images.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function toggleSelection(event, imageId) {
            event.preventDefault();
            const checkbox = document.getElementById("checkbox-" + imageId);
            const div = document.getElementById("div-" + imageId);
            checkbox.checked = !checkbox.checked;

            if (checkbox.checked) {
                div.style.background = '#c5c5c5 content-box';
            } else {
                div.style.background = 'transparent';
            }
        }
    </script>
    <script>
        console.log($('form'));
    </script>
</head>
<body>
<?php foreach ($image as $current_image) {
    echo '<h1>Manage Image ' . $current_image['idimage'] . '</h1>';
} ?>
<form action="?tab=manage-image&id=<?= $id_image ?>" method="post" enctype="multipart/form-data">
    Rename Image<br>
    Full URL: <?= $current_image['url'] ?>
    <input type="text" name="name" id="name" maxlength="50" value="<?= pathinfo($current_image['url'])['filename'] ?>">
    <input type="submit" value="Fertig" name="submit">
</form>
</body>
</html>
