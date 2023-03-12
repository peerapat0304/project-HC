<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main.css">
    <title>Admin-Login</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="center">
        <h1> Login </h1>
        <form action="login.php" method="post">
            <div class="txt_field">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="txt_field">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <input type="submit" id="Login" name="Login" value="Login" style="margin: 0 0 30px 25%;">
        </form>
    </div>

</html>