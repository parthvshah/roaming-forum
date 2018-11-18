<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wt_db";
    
    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    } 
    
    $query = "SELECT title, body, author, published_date, upvotes, downvotes, comment FROM posts";
    $result = $mysqli->query($query);
    // $postsObject = array();
    $rowObject = array();
    $qObject = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_object()) {
            // echo json_encode(get_object_vars($row));
            array_push($rowObject, get_object_vars($row));
        }
        echo json_encode($rowObject);
    } else {
        echo "No Posts";
    }
    $mysqli->close();
?>