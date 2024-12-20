<?php
$tab = $_GET['tab'];
$iframe_src = $tab . ".php";
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

            ul {
                list-style: none;
                margin: 0;
                padding: 0;

                li {
                    height: 50px;
                    width: 100%;

                    :hover {
                        background: #025ec1;
                    }
                }
            }
        }

        main {
            width: 100%;
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="?tab=manage">Manage</a></li>
        <li><a href="?tab=new-fixture">New Fixture</a></li>
        <li><a href="?tab=upload-image">New Image</a></li>
    </ul>
</nav>
<main>
    <div id="content">
        <?php
        include $tab . ".php";
        ?>
    </div>

</main>
</body>
</html>
