<?php
require('../database.php');
$id_post = $_GET['id'];

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM posts WHERE idpost = '$id_post'";
$stmt = PDO->query($query);
$post = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["submit"])) {
    $name_post = $_POST["name"];
    $body_post = $_POST["body"];

    $query_update = "UPDATE posts SET name = '$name_post', body = '$body_post' WHERE idpost = '$id_post'";
    $stmt = PDO->query($query_update);
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/select-images.css">
</head>
<body>
<?php foreach ($post as $current_post): ?>
    <h1>Manage Post <a href="../post.php?id=<?= $id_post ?>" target="_blank"><?= $current_post['name'] ?></a></h1>
<form action="?tab=manage-post&id=<?= $id_post ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="name" id="name" maxlength="200" value="<?= $current_post['name'] ?>">
    <textarea name="body" id="body" cols="30" rows="10" maxlength="1000"><?= $current_post['body'] ?></textarea>
    <input type="submit" value="Fertig" name="submit">
</form>
<?php endforeach; ?>
</body>
</html>