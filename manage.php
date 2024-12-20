<?php
require('database.php');

$query_fixtures = "SELECT * FROM fixtures";
$stmt = PDO->query($query_fixtures);
$fixtures = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query_images = "SELECT * FROM images";
$stmt = PDO->query($query_images);
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<table>
    <thead>
    <tr>
        <th class="tg-ul38">ID</th>
        <th class="tg-ul38">Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($fixtures as $fixture): ?>
        <tr>
            <td class="tg-0lax">
                <a href="?tab=manage-fixture&id=<?= $fixture['idfixture'] ?>">
                    <?= $fixture['idfixture'] ?>
                </a>
            </td>
            <td class="tg-0lax">
                <?= $fixture['name'] ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody
</table>
<table>
    <thead>
    <tr>
        <th class="tg-ul38">ID</th>
        <th class="tg-ul38">URL</th>
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
        </tr>
    <?php endforeach; ?>
    </tbody
</table>
</body>
</html>
