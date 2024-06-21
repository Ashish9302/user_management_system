<?php 
    $u= $_GET['u'];

    if (empty($u)) {
        header("Location: 404Error.html");
        exit();
    }
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
            <form action="function.php?u=<?php echo htmlspecialchars($u); ?>" method="POST" enctype="multipart/form-data" class="form">
                <div class="input-box">
                    <label>Product photo</label>
                    <div class="filee">
                        <input type="file"  name="photo" class="photo" required />
                    </div>
                </div>
                <div class="input-box">
                    <label>Name of Product</label>
                    <input type="text" placeholder="Enter name" name="name" class="name"  required />
                </div>
                <div class="column">
                    <div class="input-box">
                        <label>Prize of Product</label>
                        <input type="number"  name="prize" inputmode="numeric" required />
                    </div>
                    <div class="input-box">
                        <label>Quantity of Product</label>
                        <input type="number" name="Quantity" inputmode="numeric" required />
                    </div>
                </div><br>
                <div class="bott">
                    <div>
                        <button name = "submit" class='btn btn-primary btn-sm' style="font-size:115%">Add</button>
                        <a href="deleteall.php?u=<?php echo htmlspecialchars($u); ?>"><span class='btn btn-danger btn-sm' style="font-size: 110%;background:red;">Delete All</span></a>
                    </div>
                    <div>           
                        <button class='btn btn-primary btn-sm' style="font-size:110%;background-color:#262626;"><a style="color:white;text-decoration: none;" href="logout.php">Logout</a></button>
                    </div>
                </div>
            </form>
        </section>
    </div>
    
    <div class="show">
        <table class="table" >
            <thead style="padding:5%">
                <tr>
                    <th>S no.</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Prize</th>
                    <th>Quantity</th>
                    <th>Options</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include "connection.php";
                


                $sql = "SELECT * FROM `$u`";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query: " . $conn->error);
                }

                $i = 1; // Initialize $i
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $i++ . "</td>
                        <td><img src= 'photo/" . $row["photo"] . "' width='100px' alt='photo'></td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["prize"] . "</td>
                        <td>" . $row["quantity"] . "</td>
                        <td>
                        <a class='btn btn-primary btn-sm' href='edit.php?u=$u&id=$row[id]&name=$row[name]&photo=$row[photo]&prize=$row[prize]&quantity=$row[quantity]&id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]&u=$u'>Delete</a>

                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>