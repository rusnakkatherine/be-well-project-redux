<?php
    $database = array();
    $database['host'] = "localhost";
    $database['port'] = "3306";
    $database['name'] = "forum";
    $database['username'] = "root";
    $database['password'] = "";

    $conn = mysqli_connect($database['host'], $database['username'], $database['password']);

    //if($conn) {
        //echo "successfully connected : ".$database['name'];
    //}
    //else {
        //echo "connection to database : ".$database['name'] . "failed</br>";
        //echo "error : ".mysql_error();
    //}

?>