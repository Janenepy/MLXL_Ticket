<!DOCTYPE html>
<html lang="en">
<head>
<title>Register | MLXL Ticket</title>
<link rel="icon" type="image/png" href="https://uppic.cc/d/5Tna">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/login-regis.css">
<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<body>
<!---------------เมื่อส่งฟอร์มมาให้เช็ค username ไม่ให้ซ้ำกัน แล้วเพิ่มข้อมูลใน table users------------------>
<?php
	session_start();
	include ("db.php");
	//if form submitted,insert values into the data base
	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password=$_POST['password'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$tel=$_POST['tel'];
		$user_check = "SELECT * FROM users WHERE username ='$username' LIMIT 1";
		$result = mysqli_query($con,$user_check);
		$user = mysqli_fetch_assoc($result);

		if($user['username']===$username){
			echo alert('Username already exists');
		}else{
			$password = md5($password);
			 
			$query ="INSERT INTO users (username,email,password,firstname,lastname,tel,userlevel) VALUE('$username','$email','$password','$firstname','$lastname','$tel','user')";
			$result = mysqli_query($con,$query);
		    
			if($result){
				$_SESSION['success'] = "Register successfully";
				header("Location: login.php");
			}else{
				$_SESSION['error']="Something went wrong";
				header("Location: index.html");
			}
		}
	}
?>
<!----------------แบบฟอร์มรับข้อมูล Register--------------------->
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post" id="nameform" role="form">
					<span class="login100-form-title p-b-26">
						REGISTER
					</span>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="userName" id ="username" name="username" placeholder="username"required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="email" id ="email" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" id="password "name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="firstName" id ="firstname" name="firstname" placeholder="Firstname" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="lastname" id ="lastname" name="lastname" placeholder="Lastname" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="tel" id ="tel" name="tel" placeholder="Telephone Number" required>
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button id="Regis" class="login100-form-btn" type="submit" name="submit">
								Sign up
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>