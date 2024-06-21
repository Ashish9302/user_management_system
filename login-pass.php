<?php 
session_start(); 
include "connection.php";

if (isset($_POST['enroll']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}


	$enroll = validate($_POST['enroll']);
	$pass = validate($_POST['password']);

	if (empty($enroll)) {
		header("Location: index.php?error1=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error1=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE username='$enroll' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $enroll && $row['password'] === $pass) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: database.php?u=$enroll");
		        exit();
            }else{
				header("Location: index.php?error1=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error1=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}