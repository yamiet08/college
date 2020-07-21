<?php
// If The Register button is clicked//
if(isset($_POST['register'])) {
////////////////////////////////////////////////////////////////// Upload Image /////////////////////////////////////////////////////
$randomnumber = rand();
$target_dir =  "uploads/";
$target_file = $target_dir . $randomnumber.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
/////////////////////////// Check if image file is a actual image or fake image /////////////////////////////////////////////////////
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        header("Location: registration.php?message8=on");
        exit;
        $uploadOk = 0;
    }
}
/////////////////////////////////////////////////////////////// Check file size ////////////////////////////////////////////////////
if ($_FILES["fileToUpload"]["size"] > 500000) {
    header("Location: registration.php?message7=on");
    exit;
    $uploadOk = 0;
}
//////////////////////////////////////////////////// Allow certain file formats ////////////////////////////////////////////////////
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    header("Location: registration.php?message6=on");
    exit;
    $uploadOk = 0;
}
//////////////////////////////////// Check if $uploadOk is set to 0 by an error /////////////////////////////////////////////////////
if ($uploadOk == 0) {
    header("Location: registration.php?message5=on");
    exit;
/////////////////////////////////////// If everything is ok, try to upload file /////////////////////////////////////////////////////
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $userphoto = basename( $_FILES["fileToUpload"]["name"]);
    } else {
        header("Location: registration.php?message4=on");
        exit;
    }
}
///////////////////////////////////////////////////////////// Create connection /////////////////////////////////////////////////////////
$servername = "localhost";
$username = "jaxcode95";
$password = "jaxcode95";
$dbname = "jaxcode95";
$conn = mysqli_connect($servername, $username, $password, $dbname);
////////////////////////////////////////////////////////////// Check connection /////////////////////////////////////////////////////////
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$arandomnumber = rand();
$encryptedPassword = md5($arandomnumber);
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$gender = $_POST['gender'];
$image = 'uploads/'.$randomnumber.$userphoto;
$message = $_POST['message'];
///// check database to make sure a student does not exist with the same  email////////////////////////////////////////////////////
$student_check_query = "SELECT * FROM students WHERE email = '$email' LIMIT 1";
$result = mysqli_query($conn, $student_check_query);
$student = mysqli_fetch_assoc($result);
if (($student['email'] === $email)) {
    //redirect and turn message2 on 
    header("Location: registration.php?message3=on");
    exit;
} else { 
//////////////////////////////////////// Insert all data into students database ///////////////////////////////////////////////////
$sql = "INSERT INTO students (firstName, lastName, email, phone, address1, address2, city, state, zip, gender, image, message, encryptedPassword)
VALUES ('{$firstName }', '{$lastName }', '{$email}', '{$phone}' , '{$address1}' , '{$address2}' , '{$city}' , '{$state }' , '{$zip}' , '{$gender}' , '{$image}', '{$message}', '{$encryptedPassword}')";
//////////////////////////////////////////////////////////////////// Send Email //////////////////////////////////////////////////
$to = $_POST['email'];
$subject = 'Signup Confirmation';
$headers = "From: noreply@jaxcode.com" . "\r\n";
$headers .= "Reply-To: ". $_POST['email'] . "\r\n";
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8"."\r\n";
$headers .=  'X-Mailer: PHP/' . phpversion();
// Compose a simple HTML email message
$message = '<!Doctype html><html><body><p>welcome to our Cronus College!</p><br><p>Here is your login Information</p><br>
<p>Username ='.$email.'</p><br><p>Password ='.$encryptedPassword.'</p><br>Log in Now link to login</body></html>';
mail($to, $subject, $message, $headers);
/// If email is sent and data is inserted into database redirect to registration page and display message and message3//////////
if (mysqli_query($conn, $sql)) {
    header("Location: registration.php?message1=on&message2=on&email={$_POST['email']}");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
}
?>