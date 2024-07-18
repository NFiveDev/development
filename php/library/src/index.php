<?php 
    $usernameError = "";
    $passwordError = "";

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        echo "hej";

        $username = $_POST["username"];
        $password = $_POST["password"];

        if(trim($username) === "" || strlen($username) < 5) {
            $usernameError = "You need to specify a valid username";
        }

        if(trim($password) === "" || strlen($password) < 5) {
            $passwordError = "You need to specify a valid password";
        }

        if(strlen($passwordError) === 0 && strlen($usernameError) === 0) {
            # We continue login

            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="stylesheet" href="/static/style.css">
</head>

<body>
    <h1>Welcome to the library website</h1>

    <main class="container">
        <h2>Login with your account to browse the content</h2>

        <form method="POST" action="/" class="login-form">
            <label for="username">username:</label>
            <input type="text" id="username" name="username" minlength="5" maxlength="15"> 
            <?php 
                if(strlen($usernameError) >= 1) {
                    echo "<span class='error-block'>$usernameError</span>";
                }
            ?>
            <label for="password">password:</label>
            <input type="password" id="password" name="password" minlength="5" maxlength="15"> 
            <?php 
                if(strlen($passwordError) >= 1) {
                    echo "<span class='error-block'>$passwordError</span>";
                }
            ?>
            <button type="submit">Login</button>
        </form>

        <a href="/routes/signup.php">
            <p>
                Don't have an account yet?
            </p>
        </a>
    </main>

    <script src="/static/custom-script.js"></script>
</body>

</html>