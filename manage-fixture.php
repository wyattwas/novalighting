<?php
require('database.php');
$fixture_id = $_GET['id'];

$query_fixtures = "SELECT * FROM fixtures WHERE idfixture = '$fixture_id'";
$stmt = PDO->query($query_fixtures);
$fixtures = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query_images = "SELECT * FROM images i JOIN fixture_images fi ON i.idimage = fi.idimage WHERE fi.idfixture = '$fixture_id';";
$stmt = PDO->query($query_images);
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query_images = "SELECT * FROM images;";
$stmt = PDO->query($query_images);
$all_images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/new-fixture.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
Images
<table>
    <thead>
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
                    onclick="$.ajax({url:'sql-php/delete-fixture-image.php?imageid=<?= $image['idimage'] ?>&fixtureid=<?= $fixture_id ?>'}); $(this).closest('tr').remove()"
                    style="cursor: pointer"
            >
                <img src="img/remove.png" alt="Delete" style="height: 25px">
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<form action="new-fixture.php" method="post" enctype="multipart/form-data">
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
    <input type="submit" value="Hinzufügen" name="submit">
</form>
</body>
</html>
