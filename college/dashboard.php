<?php
session_start();

if ( isset( $_SESSION['studentId'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dashcss/style.css">
    <title>Document</title>
</head>
<body>
<p><?
            if (isset($_GET['msg'])) {
                echo 'Welcome ' . $_SESSION['firstName'] . '!';
                }
        ?></p>

        <a href="logout.php">Logout</a><br>
        <a href="courses.php">courses</a>
        <a href="editprofile.php">edit profile</a>
        <a href="financial.php">financial</a>

        
</body>
</html>