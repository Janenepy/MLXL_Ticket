<!DOCTYPE html>
<html lang="en">
<head>
<title>Login | MLXL Ticket</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/font.css">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="https://uppic.cc/d/5Tna">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/login-regis.css">
<!--===============================================================================================-->
</head>
<body>	
<script language="javascript">
	function fncSubmit(){
		if(document.getElementById("username").value == ""){
			alert('Please enter username.');
			document.getElementById("username").focus();
			return false;
		}  
		if(document.getElementById("password").value == ""){
			alert('Please enter password.');
			document.getElementById("password").focus();       
			return false;
		}  
			document.login.submit();
		}
</script>
<!---------------------เมื่อกดปุ่มจะส่งฟอร์มมาตรวจสอบ username กับ password-------------------------->
<?php 
	include('db.php');
	session_start();
	
	if(isset($_POST['username'])){
		
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$passwordenc = md5($password);
		
	    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$passwordenc'";
		$result = mysqli_query($con,$query);
		
		if(mysqli_num_rows($result)==1){
			
			$row = mysqli_fetch_array($result);
			
			$_SESSION['userid'] = $row['id'];
			$_SESSION['user'] = $row['firstname']." ".$row['lastname'];
			$_SESSION['username']=$row['username'];
			$_SESSION['userlevel'] = $row['userlevel'];
			$_SESSION['email']=$row['email'];
			$_SESSION['tel']=$row['tel'];
           
			
			if($_SESSION['userlevel']=='admin'){
				header("Location:template_mainadmin.php");
			}
			if($_SESSION['userlevel']=='user'){
				//echo"<script>alert($_SESSION['user'];);</script>";
				header("Location:template_mainuser.php");
			}
		}else{
			echo"<script>alert('Username / Password not correct');</script>";
		}
	}else{
	//header("Location:login.php");
	}
?>
<!---------------------ฟอร์มกรอก login-------------------------->
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form name="login" action="" method="post" class="login100-form validate-form"  onSubmit="JavaScript:return fncSubmit();">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" id="username" placeholder="Username" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" id="password" placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
<!---------------link สำหรับ Register-------------------->
					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?&nbsp;
						</span>

						<a class="txt2" href="regis.php">
							<font size="4">Sign Up</font>
						</a>
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