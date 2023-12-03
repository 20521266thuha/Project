<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP - MIA BOOKCORNER</title>
	<link rel="stylesheet" type="text/css" href="./Style/index.css">
</head>
<body>
     <form action="signup-check.php" method="post">

     <div id="login-container" style=" width: 100%; height: 100%">
        <div class="container-content">
            <div class="container-content-left">
                <img src="./Assets/LoginBox.png"/>
            </div>
            <div class="container-content-right">
                <!-- tieu de -->
                <p class="title" style="color: #046543; font-size: 20px; margin-top: 20px;"><b>WELCOME TO MIA BOOKCORNER!</b></p>
                <p class="title" style="color: #9ba9a4; font-size: 14px">Create your account</p>

                <?php if (isset($_GET['error'])) { ?>
     		        <p class="error"><?php echo $_GET['error']; ?></p>
     	        <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                
                <!-- Phone -->
                <p class="title" style="color: #046543; font-size: 16px; margin-top: 10px;"><b><i>Phone number (*)</i></b></p>
                <?php if (isset($_GET['uname'])) { ?>
                <input style="width: 323px; height: 17px"
                      type="text" 
                      name="uname" 
                      placeholder="Phone number"
                      value="<?php echo $_GET['uname']; ?>"><br>
                <?php }else{ ?>
                <input style="width: 323px; height: 17px" 
                      type="text" 
                      name="uname" 
                      placeholder="Phone number"><br>
                <?php }?>

                <!-- Name -->
                <!-- <p class="title" style="color: #046543; font-size: 16px"><b><i>Name (*)</i></b></p>
                <?php if (isset($_GET['name'])) { ?>
                <input style="width: 323px; height: 17px"
                      type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
                <?php }else{ ?>
                <input style="width: 323px; height: 17px" 
                      type="text" 
                      name="name" 
                      placeholder="Name"><br>
                <?php }?> -->

                    <!-- Email -->
                <p class="title" style="color: #046543; font-size: 16px"><b><i>Email (*)</i></b></p>
                <input 
                    style="width: 323px; height: 17px"
                    type="email" 
                    name="email" 
                    placeholder="Email"><br>
                
                    <!-- Password -->
                <p class="title" style="color: #046543; font-size: 16px"><b><i>Password (*)</i></b></p>
                <input 
                    style="width: 323px; height: 17px"
                    type="password" 
                    name="password" 
                    placeholder="Password"><br>

                    <!-- Re-pasword -->
                <p class="title" style="color: #046543; font-size: 16px"><b><i>Confirm password (*)</i></b></p>
                <input style="width: 323px; height: 17px" 
                 type="password" 
                 name="re_password" 
                 placeholder="Confirm password"><br>

                    <!-- Button -->
                <button type="submit" class="button" style="margin-top: 10px;max-width: 130px; "><p><b>SIGN UP</b></p></button>


                <p class="title" style="color: #9ba9a4; margin-top: 10px; margin-left:60px; font-style: italic; font-size: 14px">Already have an account? <a href="index.php" class="ca">Login here</a> </p>
                <p class="title" style="color: #9ba9a4; font-size: 8px; margin-left: 113px; margin-top:15px;"><i>Copyright © MiaBookcorner.com</i></p>

            </div>
        </div>
    </div>
     	


