<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['enroll'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($name) || empty($email) || empty($password)) {
        header("Location: index.php?error=All fields are required");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO `users` (`username`, `email`, `password`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    try {
        // Attempt to insert user
        if ($stmt->execute() === TRUE) {
            // Prepare table creation query
            $create_table_sql = "CREATE TABLE `$name` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `photo` varchar(255) NOT NULL,
                `name` varchar(255) NOT NULL,
                `prize` varchar(255) NOT NULL,
                `quantity` varchar(255) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;";
            
            // Execute table creation
            if ($conn->query($create_table_sql) === TRUE) {
                header("Location: index.php?message=Registration successful");
            } else {
                throw new Exception("Error creating table: " . $conn->error);
            }
        } else {
            throw new Exception("Error inserting user: " . $stmt->error);
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1062) { // 1062 is the error code for duplicate entry
            header("Location: index.php?error=*Username already exists*");
        } else {
            error_log("MySQL error: " . $e->getMessage());
            header("Location: 404Error.html");
        }
    } catch (Exception $e) {
        error_log("General error: " . $e->getMessage());
        header("Location: 404Error.html");
    }

    $stmt->close();
    $conn->close();
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
