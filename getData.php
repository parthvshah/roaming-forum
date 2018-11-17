<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wt_db";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT title, body, author, published_date, upvotes, downvotes, comment FROM posts";
    $result = $conn->query($sql);
    // $postsObject = array();
    $rowObject = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($rowObject, $row["title"], $row["body"]);
        }
        echo json_encode($rowObject);
    } else {
        echo "No Posts";
    }
    $conn->close();
?>