<?php
include "connection.php";

$u= $_GET['u'];


    $name = $_POST['name'];
    $prize = $_POST['prize'];
    $Quantity = $_POST['Quantity'];
    
    $photo_name = $_FILES['photo']['name'];
    $photo_tmp_name = $_FILES['photo']['tmp_name'];
    $photo_folder = 'photo/'.$photo_name;
    // Move uploaded photo file to destination folder
    move_uploaded_file($photo_tmp_name, $photo_folder);
    $sql = "INSERT INTO `$u`(`name`, `prize`, `quantity`,`photo`) VALUES ('$name','$prize','$Quantity','$photo_name')";


    if ($conn->query($sql) === TRUE) {
        header("Location: database.php?u=$u");
        exit();
    } else {
        header("Location: 404Error.html");
        exit();
    }
?>