<?php
require('database.php');

$query = "SELECT * FROM pages WHERE name = 'Start'";
$stmt = PDO->query($query);
$page = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html class="no-js" lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NovaLighting - Home</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="icon" type="image/png" href="/assets/NovaLightingLogoV1.png">
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

<?php foreach ($page as $current_page): ?>
    <?= $current_page['body'] ?>
<?php endforeach; ?>

<!--
<div style="width: 100%; position: fixed; z-index: 1000; top: 50px; left: 0; background: #ff0000;"><p>Diese Seite befindet sich noch in der Entwicklung.</p><div onClick="parentNode.remove()" style="cursor: pointer">Close [X]</div></div>
-->

<?php include "components/footer.php"; ?>

<script>
  function togglemenu() {
    var x = document.getElementById("nav");
    if (x.className === "nav") {
      x.className += " nav--open";
    } else {
      x.className = "nav";
    }
    var element = document.getElementById("menu-toggle");
    element.classList.toggle("menu-toggle--open");
  }
</script>
<script src="js/app.js"></script>

</body>
</html>
