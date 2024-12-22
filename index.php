<!DOCTYPE html>
<html class="no-js" lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NovaLighting - Home</title>
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
<nav class="nav" id="nav">
  <a href="index.php">Logo</a>
  <a href="list-fixture.php">Fixture List</a>
  <a href="past-projects.html">Vergangene Projekte</a>
  <a href="https://www.youtube.com/watch?v=5P1qRpmoFp8&list=PL4nNPjb8kva9e8-wQPH9VLNp214bt5O-_" target="_blank">YouTube</a>
  <a href="javascript:void(0);" id="menu-toggle" onclick="togglemenu()">
    <div class="menu-toggle__bar1"></div>
    <div class="menu-toggle__bar2"></div>
    <div class="menu-toggle__bar3"></div>
  </a>
</nav>

<div class="header">
  <h1>Willkommen bei NovaLighting</h1>
</div>

<div class="main">
  Auf dieser Seite findet ihr alle Infos zu meinem Lichttechnikequipment,<br>
  tolle Lightshows, die ich erstellt habe und vieles mehr.
</div>

<!--
<div style="width: 100%; position: fixed; z-index: 1000; top: 50px; left: 0; background: #ff0000;"><p>Diese Seite befindet sich noch in der Entwicklung.</p><div onClick="parentNode.remove()" style="cursor: pointer">Close [X]</div></div>
-->

<footer>
  <small>© <script>document.write(new Date().getFullYear())</script> NovaLighting. All Rights Reserved.</small>
</footer>

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
