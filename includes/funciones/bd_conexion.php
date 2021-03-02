<?php
    $conn = new mysqli('localhost', 'root', 'root', 'perfiles');

    if($conn->connect_error){
        echo $error->$connect_error;

    }
?>