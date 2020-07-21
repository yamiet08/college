<? 
if(isset($_POST['login'])) {
    if(!empty($_POST["select"])){
////////////////////////////// Create connection ///////////////////////////
$servername = "localhost";
$username = "jaxcode95";
$password = "jaxcode95";
$dbname = "jaxcode95";
$conn = mysqli_connect($servername, $username, $password, $dbname);
////////////////////////////////// Check connection ////////////////////////////
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
$studentId = $_SESSION["studentId"]; 
$courseId = $_POST['courseId'];

/////////////////////// Insert all data into students database /////////////////
$sql = "INSERT INTO enrollments (studentId, courseId)
VALUES ('{$studentId }', '{$courseId }')";
        foreach($_POST['select'] as $select){

        }
    } else {
        echo 'please select atleast one course';
    }
}

?>