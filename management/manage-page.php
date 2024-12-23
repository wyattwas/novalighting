<?php
require('../database.php');
$id_page = $_GET['id'];

include "valid-session.php";

$query = "SELECT * FROM pages WHERE idpage = '$id_page'";
$stmt = PDO->query($query);
$page = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["submit"])) {
    $body_page = $_POST["body"];

    $query_update = "UPDATE ppages SET body = '$body_page' WHERE idpage = '$id_page'";
    $stmt = PDO->query($query_update);
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/select-images.css">
</head>
<body>
<?php foreach ($page as $current_page): ?>
    <h1>Manage Page <?= $current_page['name'] ?></h1>
    <form action="?tab=manage-page&id=<?= $id_page ?>" method="post" enctype="multipart/form-data">
        <textarea name="body" id="body" cols="30" rows="10" maxlength="10000"><?= $current_page['body'] ?></textarea>
        <input type="submit" value="Fertig" name="submit">
    </form>
<?php endforeach; ?>
</body>
</html>
