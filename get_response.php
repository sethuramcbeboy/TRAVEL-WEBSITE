<?php 
$host = "localhost";
$userName = "root";
$password = "";
$dbName = "contact";
// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if(empty($_POST['your_name']) || empty($_POST['your_email']) || empty($_POST['your_phone'])|| empty($_POST['comments'])){
echo '<script>alert(" Required field may not be blank...")</script>';
echo "<div class='form'>
             Click here to <a href='home.html'>home page</a></div>";
} elseif (isset($_REQUEST['submit'])){
        // removes backslashes
	$yourName = stripslashes($_REQUEST['your_name']);
        //escapes special characters in a string
	$yourName = mysqli_real_escape_string($conn,$yourName); 
	$yourEmail = stripslashes($_REQUEST['your_email']);
	$yourEmail = mysqli_real_escape_string($conn,$yourEmail);
	$yourPhone = stripslashes($_REQUEST['your_phone']);
	$yourPhone= mysqli_real_escape_string($conn,$yourPhone);
 
	$comments = mysqli_real_escape_string($conn,$_POST['comments']);
        $query = "INSERT INTO contacts(your_name, your_email, your_phone, comments) VALUES ('".$yourName."','".$yourEmail."', '".$yourPhone."', '".$comments."')";

        $result = mysqli_query($conn,$query);
        if($result){
             echo '<script> alert(" Thank you! We will contact you soon.")</script>';
             echo "<div class='form'>
             Click here to <a href='home.html'>home page</a></div>";
        }
} else {
        echo "error";
}
?>