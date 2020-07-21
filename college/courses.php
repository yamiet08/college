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
    <title>Document</title>
</head>
<body>
<?php
////////////////////////////////// Create connection ///////////////////////////
$servername = "localhost";
$username = "jaxcode95";
$password = "jaxcode95";
$dbname = "jaxcode95";
$conn = mysqli_connect($servername, $username, $password, $dbname);
////////////////////////////////// Check connection ////////////////////////////
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div style="border-top: 2px solid #000000; width: 80%; text-align: center; margin: auto;">
            <table style="width: 100%;">
                <tr>
                    <th>Select</th>
                    <th>Course Id</th>                  
                    <th>Course Code</th>
                    <th>Course Number</th>                  
                    <th>Days</th>
                    <th>Time</th>                   
                    <th>Instructor</th>
                    <th>Course Level</th>
                    <th>Credits</th>
                    <th>Tuition</th>
                    <th>Published</th>
                </tr>
                <tr>
                    <td><label for="select"></label><input type="checkbox" name="select"></td>
                    <td><?=$row["courseId"]?></td>                   
                    <td><?=$row["courseCode"]?></td>
                    <td><?=$row["courseNumber"]?></td>                  
                    <td><?=$row["days"]?></td>
                    <td><?=$row["startTime"]?>-<?=$row["endTime"]?></td>                  
                    <td><?=$row["instructor"]?></td>
                    <td><?=$row["courseLevel"]?></td>  
                    <td><?=$row["credits"]?></td> 
                    <td><?=$row["tuition"]?></td>
                    <td><?=$row["published"]?></td>
                </tr>
            </table>
        </div>
        <div style="border-top: 1px solid #000000; width: 80%; text-align: center; margin: auto;">
            <table style="width: 100%; text-align: right;">
            <tr style="text-align: center;">
            <th>Course Name</th>
                <th>Course Description</th>
            </tr>
        <tr>  
        <td><?=$row["courseName"]?></td>
        <td><?=$row["courseDescription"]?></td>
        </tr>
        
        </table>
        </div>
        <?
}
} else {
echo "0 results";
}

mysqli_close($conn);
?>
    
</body>
</html>