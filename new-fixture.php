<?php
require('database.php');

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $name_fixture = $_POST["name"];
    $description_fixture = $_POST["description"];
    $id_fixture = $_POST["id"];
    $id_images = $_POST["selected_images"];

    $query_fixture = "INSERT INTO fixtures (idfixture, name, info) values ('$id_fixture', '$name_fixture', '$description_fixture')";
    $stmt = PDO->query($query_fixture);

    foreach ($id_images as $id_image) {
        $query_image_to_fixture = "INSERT INTO fixture_images (idfixture, idimage) values ('$id_fixture', '$id_image')";
        $stmt = PDO->query($query_image_to_fixture);
    }
}

$sql = "SELECT idimage, url FROM images";
$stmt = PDO->query($sql);
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/select-images.css">
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
</head>
<body>
<h1>New Fixture</h1>
<form action="new-fixture.php" method="post" enctype="multipart/form-data">
    <input type="text" name="name" id="name" maxlength="50" placeholder="Name" required>
    <textarea name="description" id="description" cols="30" rows="10" maxlength="500"
              placeholder="Beschreibung"></textarea>
    <input type="text" name="id" id="id" maxlength="20" placeholder="ID" required>
    <div class="images">
        <?php foreach ($images as $image): ?>
            <div id="div-<?= $image['idimage'] ?>" onclick="toggleSelection(event, '<?= $image['idimage'] ?>')">
                <input type="checkbox" name="selected_images[]" id="checkbox-<?= $image['idimage'] ?>"
                       value="<?= $image['idimage'] ?>">
                <img src="<?php echo $image['url'] ?>" width="200" height="200">
                <label><?php echo $image['idimage']; ?></label>
            </div>
        <?php endforeach ?>
    </div>
    <input type="submit" value="Fertig" name="submit">
</form>
</body>
</html>

