<?php
ob_start(); // Start output buffering

include "connection.php";


$u= $_GET['u'];


$id = $_GET['id'];
$nam = $_GET['name'];
$photo = $_GET['photo'];
$prize = $_GET['prize'];
$quantity = $_GET['quantity'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $prize = $_POST['prize'];
    $Quantity = $_POST['Quantity'];

    $photo_name = $_FILES['photo']['name'];
    $photo_tmp_name = $_FILES['photo']['tmp_name'];
    $photo_folder = 'photo/'.$photo_name;
    
    // Move uploaded photo file to destination folder
    if (move_uploaded_file($photo_tmp_name, $photo_folder)) {
        $query = "UPDATE `$u` SET `name`='$name',`prize`='$prize',`quantity`='$Quantity', `photo`='$photo_name' WHERE id='$id'";

        $data = mysqli_query($conn, $query);

        if ($data) {
            // Redirect to database.php
            header("Location: database.php?u=$u");
            exit();
        } else {
            header("Location: 404Error.html");
            exit();
        }
    } else {
        echo "Error uploading file.";
        exit();
    }
}

ob_end_flush(); // End output buffering and flush buffer
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .add-form {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 15px;
    }
    .add-form .container {
    position: relative;
    max-width: 700px;
    width: 100%;
    background: #fff;
    padding: 30px 30px 30px 25px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .add-form .container header {
    font-size: 1.2rem;
    color: #333;
    font-weight: 500;
    text-align: center;
    }
    .add-form .container .form {
    margin-top: 20px;
    }
    .add-form .form .input-box {
    width: 95%;
    margin-top: 15px;
    }
    .add-form .input-box label {
    color: #333;
    }
    .add-form .form :where(.input-box input, .select-box ) {
    position: relative;
    height: 40px;
    width: 100%;
    outline: none;
    font-size: 1rem;
    color: #707070;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 0 15px;
    }
    .add-form .input-box input:focus {
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }
    .add-form .form .column {
    display: flex;
    column-gap: 45px;
    margin-right:35px;
    }
    .filee input {
    margin-top: 1rem;
    }
    .filee input::file-selector-button {
    margin-top: 4.2px;
    margin-left: -9px;
    color: black;
    padding: 0.16em;
    border: thin solid grey;
    border-radius: 3px;
    }
    .add-form .form .bttt {
    cursor: pointer;
    color: #000000 !important;
    padding: 6px 20px;
    background: rgb(0, 210, 0);
    margin: 20px 0 7px 0;
    display: inline-block;
    text-decoration: none;
    text-align: center;
    border-radius: 6px;
    font-size: 106%;
    }
    .bott{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .add-form .form .bttt:hover {
    background: rgb(2, 173, 2);
    }
    @media screen and (max-width: 500px) {
        .add-form .form .column {
        flex-wrap: wrap;
        margin-right:0px;
        }
    }
</style>
</head>
<body>
    <div class="add-form">
        <section class="container">
            <h1 style="margin-top:-10px;">Database</h1>
            <form method="POST" enctype="multipart/form-data" class="form">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <div class="input-box">
                    <label>Product photo</label>
                    <div class="filee">
                        <input type="file"  name="photo" class="photo" value="<?php echo "$photo" ?>"/>
                    </div>
                </div>
                <div class="input-box">
                    <label>Name of Product</label>
                    <input type="text" name="name" placeholder="Enter name" value="<?php echo "$nam" ?>" class="name"  required />
                </div>
                <div class="column">
                    <div class="input-box">
                        <label>Prize of Product</label>
                        <input type="number"  name="prize" value="<?php echo "$prize" ?>" inputmode="numeric" required />
                    </div>
                    <div class="input-box">
                        <label>Quantity of Product</label>
                        <input type="number" name="Quantity" value="<?php echo "$quantity" ?>" inputmode="numeric" required />
                    </div>
                </div><br>
                <div class="bott">
                    <div>
                        <input type="submit" value="Update" class='btn btn-primary btn-sm' >
                    </div>
                </div>
            </form>
        </section>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
