<?php
$tab = $_GET['tab'];

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <style>
        body {
            display: flex;
            flex-direction: row;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        nav {
            position: fixed;
            height: 100vh;
            background: #303349;
            color: white;
            width: 200px;

            ul {
                list-style: none;
                margin: 0;
                padding: 0;
                width: 100%;

                li:hover {
                    background: #3f4057;
                }

                li {
                    height: 50px;
                    width: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;

                    a, a:visited {
                        text-decoration: none;
                        color: white;
                    }

                    .active {
                        background-color: #635cc7;
                    }
                }
            }
        }

        main {
            width: 100%;
        }
    </style>
    <title>Novalighting - Management</title>
</head>
<body>
<nav>
    <ul>
        <li class="<?php if ($tab == "manage") echo "active" ?>"><a href="?tab=manage">Manage</a></li>
        <li class="<?php if ($tab == "new-fixture") echo "active" ?>"><a href="?tab=new-fixture">New Fixture</a></li>
        <li class="<?php if ($tab == "new-post") echo "active" ?>"><a href="?tab=new-post">New Post</a></li>
        <li class="<?php if ($tab == "upload-image") echo "active" ?>"><a href="?tab=upload-image">New Image</a></li>
    </ul>
    <ul style="position: absolute; bottom: 0">
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>
<main>
    <div id="content">
        <?php include $tab . ".php"; ?>
    </div>
</main>
</body>
</html>
