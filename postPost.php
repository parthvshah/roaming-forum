<?php
// Check for empty fields
if(empty($_POST['title'])      ||
   empty($_POST['post'])     ||
   empty($_POST['author'])     
   )
   {
      echo "No arguments Provided!";
      return false;
   }

$id = rand(0,1000);
$title = strip_tags(htmlspecialchars($_POST['title']));
$post = strip_tags(htmlspecialchars($_POST['post']));
$author = strip_tags(htmlspecialchars($_POST['author']));

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
$sql = sprintf("INSERT INTO posts (_id, title, body, author, published_date, upvotes, downvotes) VALUES (%d, '%s', '%s', '%s', NOW(), 0, 0)",$id,$title,$post,$author);

if ($conn->query($sql) === TRUE) {
    echo '<script>window.location.replace("/index.html");</script>';
 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
