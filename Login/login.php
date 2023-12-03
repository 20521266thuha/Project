<!-- <?php 

session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=Phone number is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		
		$h_pass = md5($pass);

		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$h_pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $h_pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['code'] = $row['code'];
            	header("Location: ../Home/home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect Phone number or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect Phone number or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}

?>
