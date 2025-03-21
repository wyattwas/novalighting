<?php
require('../database.php');

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$query_fixtures = "SELECT * FROM fixtures";
$stmt = PDO->query($query_fixtures);
$fixtures = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query_images = "SELECT * FROM images";
$stmt = PDO->query($query_images);
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query_posts = "SELECT * FROM posts";
$stmt = PDO->query($query_posts);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query_pages = "SELECT * FROM pages";
$stmt = PDO->query($query_pages);
$pages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/select-images.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        table {
            td {
                border-left: 1px solid black;

                &:nth-last-child() {
                    border-right: none;
                }
            }
        }
    </style>
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
                    <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z"
                                fill="currentColor"
                        />
                        <path d="M9 9H11V17H9V9Z" fill="currentColor" />
                        <path d="M13 9H15V17H13V9Z" fill="currentColor" />
                    </svg>
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
                    <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z"
                                fill="currentColor"
                        />
                        <path d="M9 9H11V17H9V9Z" fill="currentColor" />
                        <path d="M13 9H15V17H13V9Z" fill="currentColor" />
                    </svg>
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
                    <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M17 5V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V5H4C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H5V18C5 19.6569 6.34315 21 8 21H16C17.6569 21 19 19.6569 19 18V7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H17ZM15 4H9V5H15V4ZM17 7H7V18C7 18.5523 7.44772 19 8 19H16C16.5523 19 17 18.5523 17 18V7Z"
                                fill="currentColor"
                        />
                        <path d="M9 9H11V17H9V9Z" fill="currentColor" />
                        <path d="M13 9H15V17H13V9Z" fill="currentColor" />
                    </svg>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody
    </table>
</div>
<div>
    <h1>Pages</h1>
    <table>
        <thead>
        <tr>
            <th class="tg-ul38">ID</th>
            <th class="tg-ul38">Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($pages as $page): ?>
            <tr>
                <td class="tg-0lax">
                    <a href="?tab=manage-page&id=<?= $page['idpage'] ?>">
                        <?= $page['idpage'] ?>
                    </a>
                </td>
                <td class="tg-0lax">
                    <?= $page['name'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody
    </table>
</div>
</body>
</html>
