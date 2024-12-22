<?php
require('../database.php');

$query_fixtures = "SELECT * FROM fixtures";
$stmt = PDO->query($query_fixtures);
$fixtures = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query_images = "SELECT * FROM images";
$stmt = PDO->query($query_images);
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query_posts = "SELECT * FROM posts";
$stmt = PDO->query($query_posts);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/select-images.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div>
    <h1>Fixtures</h1>
    <table>
        <thead>
        <tr>
            <th class="tg-ul38">ID</th>
            <th class="tg-ul38">Name</th>
            <th class="tg-ul38">Delete</th>
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
                <td
                        class="tg-0lax"
                        onclick="$.ajax({url:'../sql-php/delete-fixture.php?id=<?= $fixture['idfixture'] ?>'}); $(this).closest('tr').remove()"
                        style="cursor: pointer"
                >
                    <img src="../img/delete.png" alt="Delete" style="height: 25px">
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody
    </table>
</div>
<div>
    <h1>Images</h1>
    <table>
        <thead>
        <tr>
            <th class="tg-ul38">Preview</th>
            <th class="tg-ul38">ID</th>
            <th class="tg-ul38">URL</th>
            <th class="tg-ul38">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($images as $image): ?>
            <tr>
                <td class="tg-0lax">
                    <img src="<?= '../' . $image['url'] ?>" alt="Preview unavailable"
                         style="max-width: 100px; max-height: 100px; height: 100px; object-fit: contain;"/>
                </td>
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
                        onclick="$.ajax({url:'../sql-php/delete-image.php?id=<?= $image['idimage'] ?>'}); $(this).closest('tr').remove()"
                        style="cursor: pointer"
                >
                    <img src="../img/delete.png" alt="Delete" style="height: 25px">
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody
    </table>
</div>
<div>
    <h1>Posts</h1>
    <table>
        <thead>
        <tr>
            <th class="tg-ul38">ID</th>
            <th class="tg-ul38">Titel</th>
            <th class="tg-ul38">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td class="tg-0lax">
                    <a href="?tab=manage-post&id=<?= $post['idpost'] ?>">
                        <?= $post['idpost'] ?>
                    </a>
                </td>
                <td class="tg-0lax">
                    <?= $post['name'] ?>
                </td>
                <td
                        class="tg-0lax"
                        onclick="$.ajax({url:'../sql-php/delete-post.php?id=<?= $post['idpost'] ?>'}); $(this).closest('tr').remove()"
                        style="cursor: pointer"
                >
                    <img src="../img/delete.png" alt="Delete" style="height: 25px">
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody
    </table>
</div>
</body>
</html>
