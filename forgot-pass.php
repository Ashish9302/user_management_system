<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['enroll'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; // Assuming this is the name of the confirm password field

    // Validate input
    if (empty($name) || empty($password) || empty($confirm_password)) {
        header("Location: index.php?error2=All fields are required");
        exit();
    }

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        header("Location: index.php?error2=Passwords do not match");
        exit();
    }

    // Check if username exists
    $stmt = $conn->prepare("SELECT `username` FROM `users` WHERE `username` = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        // Username does not exist
        $stmt->close();
        $conn->close();
        header("Location: index.php?error2=Username does not exist");
        exit();
    }

    $stmt->close();

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and bind for update
    $stmt = $conn->prepare("UPDATE `users` SET `password` = ? WHERE `username` = ?");
    $stmt->bind_param("ss", $password, $name);

    try {
        if ($stmt->execute()) {
            header("Location: index.php?message=Password updated successfully");
        } else {
            throw new Exception("Error updating password: " . $stmt->error);
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        header("Location: index.php?error2=An error occurred");
    }

    $stmt->close();
    $conn->close();
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
