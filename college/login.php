<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="logcss/style.css">
    <title>CRONUS COLLEGE LOGIN</title>
</head>
<body>
<form action="loginprocess.php" method="post">
<p><?
            if (isset($_GET['msg'])) {
                echo 'Incorrect Username or Password!';
                }
        ?></p>
    <label for="username">Username</label>
    <input type="text" name="username" placeholder="Enter your username" required>
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Enter your password" required>
    <label for="login">Log In</label>
    <input type="submit" value="Log In" name="login">
</form>
</body>
</html>