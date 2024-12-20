<?php
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            flex-direction: row;
            margin: 0;
        }

        nav {
            height: 100vh;
            background: #007bff;
            color: white;
            width: 100px;

            * {
                height: 50px;
                width: 100%;

                :hover {
                    background: #025ec1;
                }
            }
        }

        main {
            width: 100%;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
    <script>
        function loadIframe(src) {
            const iframe = document.getElementById('main-iframe');
            iframe.src = src;
        }
    </script>
</head>
<body>
<nav>
    <div onclick="loadIframe('manage.php')">Manage</div>
    <div onclick="loadIframe('new-fixture.php')")>New Fixture</div>
    <div onclick="loadIframe('upload-image.php')">New Image</div>
</nav>
<main>
    <iframe id="main-iframe" onload="this.width=screen.width;this.height=screen.height;"></iframe>
</main>
</body>
</html>
