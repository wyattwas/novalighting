<?php
require('../database.php');
$id_fixture = $_GET['id'];

include "valid-session.php";

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
    $name_fixture = $_POST["name"];
    $description_fixture = $_POST["description"];

    $query_fixture = "UPDATE fixtures SET name = '$name_fixture', info = '$description_fixture' WHERE idfixture = '$id_fixture'";
    $stmt = PDO->query($query_fixture);

    if (array_key_exists("selected_images", $_POST)) {
        $id_images = $_POST["selected_images"];
        foreach ($id_images as $id_image) {
            $query_image_to_fixture = "INSERT INTO fixture_images (idfixture, idimage) values ('$id_fixture', '$id_image')";
            $stmt = PDO->query($query_image_to_fixture);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/select-images.css">
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
<?php foreach ($fixture as $current_fixture) {
    echo '<h1>Manage Fixture <a href="fixture.php?id=' . $id_fixture . '" target="_blank">' . $current_fixture['name'] . '</a></h1>';
} ?>
<form action="?tab=manage-fixture&id=<?= $id_fixture ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="name" id="name" maxlength="50" value="<?= $current_fixture['name'] ?>">
    <textarea name="description" id="description" cols="30" rows="10"
              maxlength="500"><?= $current_fixture['info'] ?></textarea>
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
                    <?= '../' . $image['url'] ?>
                </td>
                <td
                        class="tg-0lax"
                        onclick="$.ajax({url:'../sql-php/delete-fixture-image.php?imageid=<?= $image['idimage'] ?>&fixtureid=<?= $id_fixture ?>'}); $(this).closest('tr').remove()"
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
        </tbody>
    </table>
    <div class="images">
        <?php foreach ($all_images as $image): ?>
            <div id="div-<?= $image['idimage'] ?>" onclick="toggleSelection(event, '<?= $image['idimage'] ?>')">
                <input type="checkbox" name="selected_images[]" id="checkbox-<?= $image['idimage'] ?>"
                       value="<?= $image['idimage'] ?>">
                <img src="<?= '../' . $image['url'] ?>" width="200" height="200">
                <label><?= $image['idimage'] ?></label>
            </div>
        <?php endforeach ?>
    </div>
    <input type="submit" value="Fertig" name="submit">
</form>
</body>
</html>
