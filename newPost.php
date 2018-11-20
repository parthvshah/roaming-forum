<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wt_db";
    

    echo "NEW POST";

    if(isset($_POST['submit'])){

        $title = $_POST['title'];
        $msg = $_POST['message'];
        $author = $_POST['author'];
        $up = 0;
        $down = 0;
        $comment = "";

        $t=time();
        $pd = (date("Y-m-d h:i:s",$t));

        $mysqli = new mysqli($servername, $username, $password, $dbname);

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        

        $query = "INSERT INTO posts(_id,title,body,author,published_date,comment,upvotes,downvotes) VALUES ($t,'$title','$msg','$author','$pd','$comment','$up','$down')";
    
        $result = $mysqli->query($query);

        if($result){ echo "Post Created<br>"; }
        else { echo "Error creating post<br>"; }
} 


?>