<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "wt_db";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
// $sql = "CREATE DATABASE " . $db;
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully.";
// } else {
//     echo "Error creating database: " . $conn->error;
// }
echo "\n";


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect($servername, $username, $password, $db);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information
echo "Connect Successfully. Host info: " . mysqli_get_host_info($link). "<br/>";

$sql0 = "CREATE TABLE posts(
    _id VARCHAR(16) NOT NULL PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    body VARCHAR(6000) NOT NULL,
    author VARCHAR(30) NOT NULL,
    published_date DATETIME NOT NULL,
    comment varchar(100),
    upvotes INT,
    downvotes INT
)";

if(mysqli_query($link, $sql0)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

$sql1 = "CREATE TABLE contact(
    _id VARCHAR(16) NOT NULL PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    emailid VARCHAR(30) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    usermessage VARCHAR(6000) NOT NULL,
    sent_date DATETIME NOT NULL
)";

if(mysqli_query($link, $sql1)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

$sql2 = "CREATE TABLE users(
    _id VARCHAR(16) NOT NULL PRIMARY KEY,
    emailid VARCHAR(30) NOT NULL,
    user_password VARCHAR(6000) NOT NULL
)";

if(mysqli_query($link, $sql2)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
// $conn->close();

?>
</body>
</html>