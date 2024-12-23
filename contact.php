<?php
require('database.php');

$query = "SELECT * FROM pages WHERE name = 'Kontakt'";
$stmt = PDO->query($query);
$page = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NovaLighting - Contact</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <meta name="description" content="">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:image:alt" content="">

    <meta name="theme-color" content="#8820ffff">
</head>
<body>
<?php include "components/nav.php"; ?>
<div style="display: flex; justify-content: center; align-items: center; flex-direction: column; position: relative; top: 100px;">
    <?php foreach ($page as $current_page): ?>
    <h1><?= $current_page['name'] ?></h1>
    <?= $current_page['body'] ?>
    <?php endforeach; ?>
</div>
<?php include "components/footer.php"; ?>
</body>
</html>