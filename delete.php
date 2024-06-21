<?php
include "connection.php";

$id = $_GET['id'];
$u= $_GET['u'];

$query = "DELETE FROM `$u` WHERE id='$id' ";

$data = mysqli_query($conn, $query);

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
