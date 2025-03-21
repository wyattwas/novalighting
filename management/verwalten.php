<?php
$tab = $_GET['tab'];

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <style>
        :root {
            --nav-width: 300px;
        }

        body {
            display: flex;
            flex-direction: row;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        nav {
            height: 100vh;
            background: #303349;
            color: white;
            width: var(--nav-width);

            ul {
                list-style: none;
                margin: 0;
                padding: 0;
                width: calc(var(--nav-width) - 10px);

                li {
                    height: 40px;
                    margin: 5px;
                    padding: 5px;
                    width: calc();
                    display: flex;
                    justify-content: start;
                    align-items: center;
                    border-radius: 8px;

                    & a {
                        display: flex;
                        flex-direction: row;
                        align-items: center;
                        justify-content: start;
                    }

                    &:hover {
                        background: #3f4057;
                    }

                    a, a:visited {
                        text-decoration: none;
                        color: white;
                    }

                    &.active {
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
        <li class="<?php if ($tab == "manage") echo "active" ?>">
            <a href="?tab=manage">
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
                            d="M6 22.8787C4.34315 22.8787 3 21.5355 3 19.8787V9.87866C3 9.84477 3.00169 9.81126 3.00498 9.77823H3C3 9.20227 3.2288 8.64989 3.63607 8.24262L9.87868 2.00002C11.0502 0.828445 12.9497 0.828445 14.1213 2.00002L20.3639 8.24264C20.7712 8.6499 21 9.20227 21 9.77823H20.995C20.9983 9.81126 21 9.84477 21 9.87866V19.8787C21 21.5355 19.6569 22.8787 18 22.8787H6ZM12.7071 3.41423L19 9.70713V19.8787C19 20.4309 18.5523 20.8787 18 20.8787H15V15.8787C15 14.2218 13.6569 12.8787 12 12.8787C10.3431 12.8787 9 14.2218 9 15.8787V20.8787H6C5.44772 20.8787 5 20.4309 5 19.8787V9.7072L11.2929 3.41423C11.6834 3.02371 12.3166 3.02371 12.7071 3.41423Z"
                            fill="currentColor"
                    />
                </svg>
                <div>Manage</div>
            </a>
        </li>
        <li class="<?php if ($tab == "new-fixture") echo "active" ?>">
            <a href="?tab=new-fixture">
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
                            d="M7.03435 6.5C7.03435 3.73858 9.27293 1.5 12.0344 1.5C14.7958 1.5 17.0344 3.73858 17.0344 6.5V10.5C17.0344 13.2614 14.7958 15.5 12.0344 15.5C9.27293 15.5 7.03435 13.2614 7.03435 10.5V6.5ZM15.0344 6.5V10.5C15.0344 12.1569 13.6912 13.5 12.0344 13.5C10.3775 13.5 9.03435 12.1569 9.03435 10.5V6.5C9.03435 4.84315 10.3775 3.5 12.0344 3.5C13.6912 3.5 15.0344 4.84315 15.0344 6.5Z"
                            fill="currentColor"
                    />
                    <path
                            d="M12.0344 16.5C11.4821 16.5 11.0344 16.9477 11.0344 17.5V21.5C11.0344 22.0523 11.4821 22.5 12.0344 22.5C12.5866 22.5 13.0344 22.0523 13.0344 21.5V17.5C13.0344 16.9477 12.5866 16.5 12.0344 16.5Z"
                            fill="currentColor"
                    />
                    <path
                            d="M7.74433 16.4397C7.93323 15.9207 8.50707 15.6531 9.02605 15.842C9.54502 16.0309 9.81261 16.6048 9.62372 17.1237L8.25564 20.8825C8.06675 21.4015 7.4929 21.6691 6.97393 21.4802C6.45495 21.2913 6.18736 20.7174 6.37625 20.1985L7.74433 16.4397Z"
                            fill="currentColor"
                    />
                    <path
                            d="M14.974 15.8421C14.4551 16.031 14.1875 16.6048 14.3764 17.1238L15.7445 20.8825C15.9333 21.4015 16.5072 21.6691 17.0262 21.4802C17.5451 21.2913 17.8127 20.7175 17.6238 20.1985L16.2558 16.4397C16.0669 15.9208 15.493 15.6532 14.974 15.8421Z"
                            fill="currentColor"
                    />
                </svg>
                <div>New Fixture</div>
            </a>
        </li>
        <li class="<?php if ($tab == "new-post") echo "active" ?>">
            <a href="?tab=new-post">
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
                            d="M14 7C13.4477 7 13 7.44772 13 8V16C13 16.5523 13.4477 17 14 17H18C18.5523 17 19 16.5523 19 16V8C19 7.44772 18.5523 7 18 7H14ZM17 9H15V15H17V9Z"
                            fill="currentColor"
                    />
                    <path
                            d="M6 7C5.44772 7 5 7.44772 5 8C5 8.55228 5.44772 9 6 9H10C10.5523 9 11 8.55228 11 8C11 7.44772 10.5523 7 10 7H6Z"
                            fill="currentColor"
                    />
                    <path
                            d="M6 11C5.44772 11 5 11.4477 5 12C5 12.5523 5.44772 13 6 13H10C10.5523 13 11 12.5523 11 12C11 11.4477 10.5523 11 10 11H6Z"
                            fill="currentColor"
                    />
                    <path
                            d="M5 16C5 15.4477 5.44772 15 6 15H10C10.5523 15 11 15.4477 11 16C11 16.5523 10.5523 17 10 17H6C5.44772 17 5 16.5523 5 16Z"
                            fill="currentColor"
                    />
                    <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M4 3C2.34315 3 1 4.34315 1 6V18C1 19.6569 2.34315 21 4 21H20C21.6569 21 23 19.6569 23 18V6C23 4.34315 21.6569 3 20 3H4ZM20 5H4C3.44772 5 3 5.44772 3 6V18C3 18.5523 3.44772 19 4 19H20C20.5523 19 21 18.5523 21 18V6C21 5.44772 20.5523 5 20 5Z"
                            fill="currentColor"
                    />
                </svg>
                <div>New Post</div>
            </a>
        </li>
        <li class="<?php if ($tab == "upload-image") echo "active" ?>">
            <a href="?tab=upload-image">
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
                            d="M4 4.5V6.5H12V7.5H3C1.34315 7.5 0 8.84315 0 10.5V16.5C0 18.1569 1.34315 19.5 3 19.5H15C16.5731 19.5 17.8634 18.2892 17.9898 16.7487L24 17.5V9.5L17.9898 10.2513C17.8634 8.71078 16.5731 7.5 15 7.5H14V5.5C14 4.94772 13.5523 4.5 13 4.5H4ZM18 12.2656V14.7344L22 15.2344V11.7656L18 12.2656ZM16 10.5C16 9.94772 15.5523 9.5 15 9.5H3C2.44772 9.5 2 9.94772 2 10.5V16.5C2 17.0523 2.44772 17.5 3 17.5H15C15.5523 17.5 16 17.0523 16 16.5V10.5Z"
                            fill="currentColor"
                    />
                </svg>
                <div>New Image</div>
            </a>
        </li>
    </ul>
    <ul style="position: absolute; bottom: 0">
        <li>
            <a href="logout.php">
                <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                            d="M8.51428 20H4.51428C3.40971 20 2.51428 19.1046 2.51428 18V6C2.51428 4.89543 3.40971 4 4.51428 4H8.51428V6H4.51428V18H8.51428V20Z"
                            fill="currentColor"
                    />
                    <path
                            d="M13.8418 17.385L15.262 15.9768L11.3428 12.0242L20.4857 12.0242C21.038 12.0242 21.4857 11.5765 21.4857 11.0242C21.4857 10.4719 21.038 10.0242 20.4857 10.0242L11.3236 10.0242L15.304 6.0774L13.8958 4.6572L7.5049 10.9941L13.8418 17.385Z"
                            fill="currentColor"
                    />
                </svg>
                <div>Logout</div>
            </a>
        </li>
    </ul>
</nav>
<main>
    <div id="content">
        <?php include $tab . ".php"; ?>
    </div>
</main>
</body>
</html>
