<!DOCTYPE html>
<html>
<head>
	<title>LOG IN - MIA BOOKCORNER</title>
	<link rel="stylesheet" type="text/css" href="./Style/index.css">
</head>
<body>
     <form action="login.php"method="post">
		<div id="login-container" style=" width: 100%; height: 100%">
			<div class="container-content">
				<div class="container-content-left">
                    <img src="./Assets/LoginBox.png"/>
                </div>
				<div class="container-content-right">
					<p class="title" style="color: #046543; font-size: 20px;margin-top: 20px;"><b>WELCOME TO MIA BOOKCORNER!</b></p>
                    <p class="title" style="color: #9ba9a4; font-size: 14px">Log in to your account</p>

					<?php if (isset($_GET['error'])) { ?>
						<p class="error"><?php echo $_GET['error']; ?></p>
					<?php } ?>

                    <p class="title" style="color: #046543;margin-top: 30px; font-size: 16px"><b>Phone number</b></p>
                    <input type="text" name="uname" placeholder="Phone number" style="width: 323px; height: 31px" />

					<p class="title" style="color: #046543;margin-top: 30px; font-size: 16px"><b>Password</b></p>
                    <input type="password" name="password" placeholder="Password" style="width: 323px; height: 31px" />

					<p class="title" style="margin-left: 58%;margin-top: 5px; font-size: 13px;"><a href="forgot_pass.php" style="color: #046543;text-decoration: none">Forgot password?</a></p>


					<button type="submit" class="button" style="color: #F6C017; padding: 9px; text-decoration: none;max-width: 130px; margin-top: 20px;"><b>LOG IN</b></button>
                    <p class="title" style="color: #9ba9a4; margin-top: 10px; margin-left:70px; font-style: italic; font-size: 14px">Not registered? <a href="signup.php">Create an account</a> </p>
                	<p class="title" style="color: #9ba9a4; font-size: 8px; margin-left: 113px; margin-top:10px;"><i>Copyright © MiaBookcorner.com</i></p>

				</div>
			</div>
		</div>


     	
     </form>
</body>
</html>
