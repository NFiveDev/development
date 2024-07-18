<?php 
    

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
            <input type="text" id="username" name="username"> 
            <label for="password">password:</label>
            <input type="text" id="password" name="password"> 
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