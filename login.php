<?php 

    ob_start();
    session_start();

    $koneksi = new mysqli ("sql212.byetcluster.com", "b7_22164534", "ALarmy12", "b7_22164534_elibrary");

if($_SESSION['admin'] || $_SESSION['user']) {
    header("location:index.php");
}else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>E-Library v1.0</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="assets/loginpage/images/icons/favicon.ico"/> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginpage/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginpage/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginpage/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginpage/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/loginpage/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginpage/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginpage/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/loginpage/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/loginpage/css/util.css">
  <link rel="stylesheet" type="text/css" href="assets/loginpage/css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">  
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method="POST">
					<span class="login100-form-title p-b-51">
						Demo E-Library v1.0
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<!-- <div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div> -->

						<!-- <div>
							<a href="#" class="txt1">
								Forgot?
							</a>
                        </div> -->
                        <div class="alert alert-secondary" role="alert">
                            Username : madebyal<br>
                            Password : 12345678
                        </div>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" name="login" class="login100-form-btn" value="Login">
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="assets/loginpage/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/loginpage/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/loginpage/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/loginpage/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/loginpage/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/loginpage/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/loginpage/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/loginpage/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="assets/loginpage/js/main.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>


</body>
</html>

<?php 

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = $koneksi->query("select * from tb_user where username='$username' and password='$password'");

        $data = $sql->fetch_assoc();

        $ketemu = $sql->num_rows;

        if ($ketemu >=1){
            session_start();
            if($data ['level'] == "admin"){
                $_SESSION['admin'] = $data['id'];
                header("location:index.php");
            }
            elseif($data['level'] == "user") {
                $_SESSION['user'] = $data['id'];
                header("location:index.php");
            }
        }
        else{
            echo'<script type="text/javascript">';
            echo'setTimeout(function () { ';
            echo'swal({';
            echo'    title: "Login Gagal",';
            echo'    text: "Login gagal! periksa kembali username dan password",';
            echo'    type: "error",';
            echo'    confirmButtonText: "OK"';
            echo'},';
            echo'function(isConfirm){';
            echo'    if (isConfirm) {';
            echo'    window.location.href = "login.php";';
            echo'    }';
            echo'}); }, 1000);';
            echo'</script>';
        }
    }
}
?>