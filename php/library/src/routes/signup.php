<?php
include("../db/client.php");
$db_client = new MariaClient();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

    <link rel="stylesheet" href="/static/style.css">
</head>

<body>
    <h1>
        Sign up
    </h1>
    <div class="w-lg">
        <form action="" class="flex-col">
            <label for="username">Username:</label>
            <input id="username" name="username" type="text">
            <label class="mt-1" for="password">Password:</label>
            <input id="password" name="password" type="text">

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