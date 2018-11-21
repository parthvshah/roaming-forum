<?php
// Check for empty fields
if(empty($_POST['username'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
      echo "No arguments Provided!";
      return false;
   }

$id = rand(0,1000);
$username = strip_tags(htmlspecialchars($_POST['username']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$servername = "localhost";
$usernameServer = "root";
$password = "";
$dbname = "wt_db";

// Create connection
$conn = new mysqli($servername, $usernameServer, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = sprintf("INSERT INTO contact (_id, username, emailid, phone, usermessage, sent_date) VALUES (%d, '%s', '%s', '%s', '%s', NOW())",$id,$username,$email,$phone,$message);

if ($conn->query($sql) === TRUE) {
    echo '<script>window.location.replace("/index.html");</script>';
 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
