<?php
require('database.php');
$id_fixture = $_GET['id'];

$query_fixture = "SELECT * FROM fixtures WHERE idfixture = '$id_fixture'";
$stmt = PDO->query($query_fixture);
$fixture = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query_images = "SELECT * FROM images i JOIN fixture_images fi ON i.idimage = fi.idimage WHERE fi.idfixture = '$id_fixture';";
$stmt = PDO->query($query_images);
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query_images = "SELECT * FROM images;";
$stmt = PDO->query($query_images);
$all_images = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["submit"])) {
    $id_images = $_POST["selected_images"];

    foreach ($id_images as $id_image) {
        $query_image_to_fixture = "INSERT INTO fixture_images (idfixture, idimage) values ('$id_fixture', '$id_image')";
        $stmt = PDO->query($query_image_to_fixture);
    }
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
</head>
<body>
<?php foreach ($fixture as $current_fixture) {
echo '<h1>Manage Fixture <a href="fixture.php?id='.$id_fixture.'" target="_blank">'.$current_fixture['name'].'</a></h1>';
} ?>

<table>
    <thead>
    <tr>
        <th colspan="3">Images</th>
    </tr>
    <tr>
        <th class="tg-ul38">ID</th>
        <th class="tg-ul38">URL</th>
        <th class="tg-ul38">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($images as $image): ?>
        <tr>
            <td class="tg-0lax">
                <a href="?tab=manage-image&id=<?= $image['idimage'] ?>">
                    <?= $image['idimage'] ?>
                </a>
            </td>
            <td class="tg-0lax">
                <?= $image['url'] ?>
            </td>
            <td
                    class="tg-0lax"
                    onclick="$.ajax({url:'sql-php/delete-fixture-image.php?imageid=<?= $image['idimage'] ?>&fixtureid=<?= $id_fixture ?>'}); $(this).closest('tr').remove()"
                    style="cursor: pointer"
            >
                <img src="img/remove.png" alt="Delete" style="height: 25px">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<form action="?tab=manage-fixture&id=<?= $id_fixture ?>" method="post" enctype="multipart/form-data">
    <div class="images">
        <?php foreach ($all_images as $image): ?>
            <div id="div-<?= $image['idimage'] ?>" onclick="toggleSelection(event, '<?= $image['idimage'] ?>')">
                <input type="checkbox" name="selected_images[]" id="checkbox-<?= $image['idimage'] ?>"
                       value="<?= $image['idimage'] ?>">
                <img src="<?php echo $image['url'] ?>" width="200" height="200">
                <label><?php echo $image['idimage']; ?></label>
            </div>
        <?php endforeach ?>
    </div>
    <input type="submit" value="Hinzufügen" name="submit">
</form>
</body>
</html>
