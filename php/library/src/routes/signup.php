<?php
include("../db/client.php");
$client = MariaClient::GetClient();

$post_detect = false;
$username_error = '';
$password_error = '';



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $post_detect = true;

    if (trim($_POST["username"]) == "") {
        $username_error = "Empty username detected fix it!";
    }

    if (trim($_POST["password"]) == "") {
        $password_error = "Empty password detected fix it!";
    }

    if($password_error === "" && $username_error === "") {
        # Continue signup flow

        $username = $_POST["username"];
        $password = $_POST["password"];

        
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

    <link rel="stylesheet" href="/static/style.css">
</head>

<body class="padding-container">
    <h1>
        Sign up
    </h1>
    <div class="w-lg">
        <form action="signup.php" method="POST" class="signup-form">
            <div>
                <label for="username">Username:</label>
                <input minlength="4" maxlength="10" id="username" name="username" type="text">

                <?php
                if ($username_error != "" && $post_detect == true) {
                    echo "<span class='error-block'>$username_error</span>";
                }
                ?>

            </div>

            <div class="mt-1">
                <label for="password">Password:</label>
                <input minlength="4" maxlength="10" id="password" name="password" type="password">

                <?php
                if ($password_error != "" && $post_detect == true) {
                    echo "<span class='error-block'>$password_error</span>";
                }
                ?>
            </div>


            <button type="submit" class="mt-1">Sign up!</button>
        </form>
        <a href="/">
            <p>
                Go back and login...
            </p>
        </a>
    </div>
</body>

</html>