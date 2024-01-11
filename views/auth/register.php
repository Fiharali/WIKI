<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION["id"])) {
    if (isset($_SERVER['HTTP_REFERER'])) {
		header("Location: " . $_SERVER['HTTP_REFERER']);
		exit();
	} else {
        header("location:../wiki2");
		exit();
	}
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .login-page {
        width: 560px;
        padding: 8% 0 0;
        margin: auto;
    }

    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 560px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }

    .form input:focus {
        /* background: #43A047; */
        box-shadow: none;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
        background: #43A047;
        /* box-shadow: none; */
    }

    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }

    .form .message a {
        color: #4CAF50;
        text-decoration: none;
    }

    span {
        color: red;
        font-size: 16px;
    }

    body {
        background: #76b852;
        /* fallback for old browsers */
        background: rgb(141, 194, 111);
        background: linear-gradient(90deg, rgba(141, 194, 111, 1) 0%, rgba(118, 184, 82, 1) 50%);
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    </style>
</head>


<body>



    <div class="login-page">
        <div class="form">
            <form method="post" action="register" class="register-form">
                <input type="text" placeholder="name" name="name" />
                <span><?= isset($_SESSION['name']) ? $_SESSION['name']  : '' ; $_SESSION['name'] = ''; ?></span>
                <input type=" email" placeholder="email address" name="email" />
                <span><?= isset($_SESSION['email']) ? $_SESSION['email']  : '' ; $_SESSION['email'] = ''; ?></span>
                <input type="password" placeholder="password" name="password" />
                <span><?= isset($_SESSION['password']) ? $_SESSION['password']  : '' ; $_SESSION['password'] = ''; ?></span>
                <input type="password" placeholder="confirm password" name="confirm_password" />
                <span><?= isset($_SESSION['confirm_password']) ? $_SESSION['confirm_password']  : '' ; $_SESSION['confirm_password'] = ''; ?></span>
                <button name="register" type="submit">Register</button>
                <p class="message">Already registered? <a href="login">Sign In</a></p>
            </form>

        </div>
    </div>


</body>

</html>