<?php
session_start();
// If The login button is clicked//
if(isset($_POST['login'])) {
///////////////////////////////////////////////////////////// Create connection /////////////////////////////////////////
$servername = "localhost";
$username = "jaxcode95";
$password = "jaxcode95";
$dbname = "jaxcode95";
$conn = mysqli_connect($servername, $username, $password, $dbname);
////////////////////////////////////////////////////////////// Check connection /////////////////////////////////////////////
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
////////////////////////////////////////////////////// check if the data exists./////////////////////////////////////////////
$username = $_POST['username'];
$password = $_POST['password'];
$student_check_query = "SELECT * FROM students WHERE email = '$username' AND encryptedPassword = '$password' LIMIT 1";
$result = mysqli_query($conn, $student_check_query);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        header("Location: dashboard.php?msg=on");
        $_SESSION["loggedin"] = true;
        $_SESSION["studentId"] = $row['studentId'];
        $_SESSION["firstName"] = $row['firstName'];
        $_SESSION["lastName"] = $row['lastName'];
        $_SESSION["email"] = "email";
        $_SESSION["phone"] = "phone";
        $_SESSION["address1"] = "address1";
        $_SESSION["address2"] = "address2";
        $_SESSION["city"] = "city";
        $_SESSION["zip"] = "zip";
        $_SESSION["gender"] = "gender";
        $_SESSION["'uploads/'.$randomnumber.$userphoto;"] = "'uploads/'.$randomnumber.$userphoto;";
        $_SESSION["message"] = "message";
        $_SESSION["encryptedPassword"] = "encryptedPassword";
        exit;
    }
} else {
    header("Location: login.php?msg=on");
}
mysqli_close($conn);
}
?>