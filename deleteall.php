<?php
include "connection.php";

$u= $_GET['u'];

$query = "TRUNCATE `$u`;";

$data = mysqli_query($conn,$query);


    if($data){
        header("Location: database.php?u=$u");
        exit();
    }
    else
    {
        header("Location: 404Error.html");
        exit();
    }
?>