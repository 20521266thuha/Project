<?php


include 'db_conn.php';
$msg = "";


if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);

            if ($password === $confirm_password) {
                $h_pass = $password;

                $query = mysqli_query($conn, "UPDATE users SET password='{$h_pass}', code='' WHERE code='{$_GET['reset']}'");

                if ($query) {
                    header("Location: index.php");
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
            }
        }
     
    } else {
        $msg = "<div class='alert alert-danger'>Reset Link do not match.</div>";
    }
} else {
    header("Location: forgot_password.php");
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Forgot password - MIA BOOKCORNER</title>
    <link rel="stylesheet" type="text/css" href="./Style/index.css">
</head>
<style>
    .body {
        align-items: center;
    }

    .button {
        min-width: 290px;
        max-width: 350px;
        width: 74%;
        margin-left: 52px;
        border-radius: 2px;
    }

    .container-content-right {
        align-items: center;
    }

</style>
<body>
    <form method="post">
        <div id="login-container" style="width: 100%; height: 100%">
            <div class="container-content">
                <div class="container-content-left">
                    <img src="./Assets/LoginBox.png" />
                </div>
                <div class="container-content-right">
                    <p class="title" style="color: #046543; font-size: 20px;margin-top: 20px;"><b>CHANGE YOUR PASSWORD</b></p>
                    <p class="title" style="color: #9ba9a4; font-size: 14px;">Enter your new password</p>

                    <?php echo $msg; ?>

                    <input type="password" name="password" placeholder="Enter your new password" style="width: 285px; height: 35px; margin-top: 30px;" />
                    <input type="password" name="confirm-password" placeholder="Confirm your new password" style="width: 285px; height: 35px; margin-top: 13px;" />

                    <button name="submit" class="button" style="color: #F6C017; padding: 9px; text-decoration: none; margin-top: 17px;"><b>RESET PASSWORD</b></button>
                    <p class="title" style="color: #9ba9a4; margin-top: 20px; font-style: italic; font-size: 14px">Back to <a href="index.php">Login</a> </p>
                    <p class="title" style="color: #9ba9a4; font-size: 8px; margin-top:10px;"><i>Copyright © MiaBookcorner.com</i></p>

                </div>
            </div>
        </div>

    </form>
</body>
</html>
