<?php
require('database.php');
$fixture_id = $_GET['id'];

$query_fixtures = "SELECT * FROM fixtures WHERE idfixture = '$fixture_id'";
$stmt = PDO->query($query_fixtures);
$fixtures = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query_images = "SELECT * FROM images i JOIN fixture_images fi ON i.idimage = fi.idimage WHERE fi.idfixture = '$fixture_id';";
$stmt = PDO->query($query_images);
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
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
                <a href="manage-image.php?id=<?= $image['idimage'] ?>">
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
</body>
</html>
