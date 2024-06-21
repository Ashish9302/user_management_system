<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="files/style.css">
    <link rel="icon" href="files/image/rankings.png" type="image/x-icon">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Result | Login</title>
</head>
<body>
    <div class="wrapper">
       <!-- <span class="icon-close"><i class='bx bx-x'></i></span> -->

        <div class="form-box forgot-box">
            <h2>Reset Password</h2>
            <form action="forgot-pass.php" method="post">
                <div class="input-box">
                    <span class="icon"><i class='bx bx-id-card' ></i></span>
                    <input required type="text"  id="enroll" name="enroll">
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <div class="icon"><div class="toggle"><i class='bx bxs-lock'></i></div></div>
                    <input required type="password"  id="password" name="password" >
                    <label>New Password</label>
                </div>
                <div class="input-box">
                    <div class="icon"><div class="toggle"><i class='bx bxs-lock'></i></div></div>
                    <input required type="password"  id="password" name="confirm_password" >
                    <label>Confirm Password</label>
                </div>
                <button type="submit" class="btn-submit" onclick="">Submit</button>
                <div class="ragister">
                    <label>Reamember password <a href="#" class="loginpage1">Login</a> </label>
                </div>
                <?php if (isset($_GET['error2'])) { ?>
                    <p class="message-display" style="font-size: 1.1em;padding: 10px 0 0 0;color:red;text-align: center;font-weight: 700;text-shadow: 0 0 2px white;-webkit-text-stroke-width: 0.5px;-webkit-text-stroke-color: black;"><?php echo $_GET['error2']; ?></p>
                <?php } ?>
            </form>
        </div>

        <div class="form-box login-box">
            <h2>Login</h2>
            <form action="login-pass.php" method="post">
                <div class="input-box">
                    <span class="icon"><i class='bx bx-id-card' ></i></span>
                    <input required type="text"  id="enroll" name="enroll">
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <div class="icon"><div class="toggle"><i class='bx bxs-lock'></i></div></div>
                    <input required type="password"  id="password" name="password" >
                    <label>Password</label>
                </div>
                <div class="remenber-forgot">
                    <label><input required type="checkbox" id="rememberMe" name="rememberMe">Reamember me</label>
                    <a href="#" class="forget_page">Forgot Password?</a>
                </div>
                <button type="submit" class="btn-submit" onclick="login()">Submit</button>
                <div class="ragister">
                    <label>Don't have an account ? <a href="#" class="register_page">Register</a> </label>
                </div>
                <?php if (isset($_GET['message'])) { ?>
                    <p class="message-display" style="font-size: 1.05em;padding: 10px 0 0 0;color: rgb(253, 186, 61);text-align: center;font-weight: 600;"><?php echo $_GET['message']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['error1'])) { ?>
                    <p class="message-display" style="font-size: 1.1em;padding: 10px 0 0 0;color:red;text-align: center;font-weight: 700;text-shadow: 0 0 2px white;-webkit-text-stroke-width: 0.5px;-webkit-text-stroke-color: black;"><?php echo $_GET['error1']; ?></p>
                <?php } ?>
            </form>
        </div>

        
        <div class="form-box ragister-box">
            <h2>Ragister</h2>
            <form action="new-user.php"  method="POST" >
                <div class="input-box">
                    <span class="icon"><i class='bx bx-id-card' ></i></span>
                    <input required type="text"  id="enroll" name="enroll">
                    <label>User Name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bx-id-card' ></i></span>
                    <input required type="email"  id="enroll" name="email">
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <div class="icon"><div class="toggle"><i class='bx bxs-lock'></i></div></div>
                    <input required type="password"  id="password" name="password" >
                    <label>Password</label>
                </div>
                <button type="submit" class="btn-submit" onclick="">Submit</button>
                <div class="ragister">
                    <label>Already have an account ? <a href="#" class="loginpage">Login</a> </label>
                </div>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="message-display" style="font-size: 1.12em;padding: 10px 0 0 0;color:red;text-align: center;font-weight: 700;text-shadow: 0 0 2px white;-webkit-text-stroke-width: 0.5px;-webkit-text-stroke-color: black;"><?php echo $_GET['error']; ?></p>
                <?php } ?>
            </form>
        </div>
    </div>


    <script src="files/script.js"></script>
</body>
</html>