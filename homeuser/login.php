<?php
session_start();
require '../config/functions.php';

if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	$result = mysqli_query($conn, "SELECT email FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	if($key === hash('sha256', $row['email'])) {
		if ($row['level']=='admin') {
			$_SESSION['admin_login'] = true;
			echo "Password Salah";
		} else {
			$_SESSION['login'] = true;
			echo "Email Salah";
		}
		$_SESSION['username'] = $row['username'];
	}
}

if(isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
	}

if(isset($_SESSION["admin_login"])) {
	header("Location: ../admin/index.php");
}

if(isset($_POST["login"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

	if(mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])) {
			if ($row['level']=='admin') {
				$_SESSION['admin_login'] = true;
					echo "Password Salah";
			} else {
				$_SESSION['login'] = true;
					echo "Email Salah";
			}

			$_SESSION['username'] = $row['username'];

			if(isset($_POST['remember'])) {

				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['email']), time()+60);
			}

			header("Location: index.php");
			exit;
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="assets/img/logo.png">
	<title>Log In - Sistem Penilaian SMK Prakarya Internasional [SMK PI]</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="assets/font/css/all.min.css">
</head>
<body>

	<!-- Animasi -->
	<section>
		<div class="wave">
	</section>

	<!-- Bagian Kiri -->
	<div class="container">
		<div class="row my-row">
			<div class="col-md-10 offset-md-1">
		<div class="row">
			<div class="col-md-5 register-left">
				<h2 class="text-center"><strong>Gabung Sekarang !</h2></strong>
				<p class="text-center"><abbr title="SMK Prakarya Internasional">SMK PI</abbr> ENGINEERING</p>
				<img class="logo" src="assets/img/logo.png" alt="">
				<a href="#aboutus"><button type="button" class="btn btn-primary">ABOUT US</button></a>
			</div>

	<!-- Bagian Kanan -->
	<div class="col-md-7 register-right">
		<h2 class="text-center"><strong>LOGIN DISINI</strong></h2>

		<form action="" method="post">
			<div class="register-form">
				<div class="form-group">
					<input type="email" class="form-control" name="email" id="email" required="required" placeholder="E-mail" autofocus="" autocomplete="off">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" id="password" required="required" placeholder="Password" autocomplete="off" data-toggle="password">
					<label>
						<input type="checkbox" id="methods">
						<i class="fa fa-eye"></i>
						<i class="fa fa-eye-slash"></i>
					</label>
				</div>
				<div class="form-group">
					<input class="checkbox" type="checkbox" name="remember" id="remember">
					<label for="remember">Ingat saya</label>
				</div>
				<div class="btn-group">
					<a href="registration.php"><button type="button" class="btn-one btn-primary">Belum punya akun?</button></a>
					<input type="submit" class="btn-two btn-primary" name="login" value="Login">
			</div>
		</form>
	</div>
		</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<section id="aboutus">
		<footer class="sticky-footer">
	    <div class="container my-auto">
	      <div class="copyright text-center my-auto">
	        <p class="networks">FOR MORE INFORMATION VISIT OUR SOCIAL NETWORKS : </p>
	        	<ul>
	       			<li>
	        			<a href="https://www.facebook.com/smkprakaryainternasional52/">
	        				<span></span>
	        				<span></span>
	        				<span></span>
	        				<span class="fab fa-facebook" aria-hidden="true"></span>
	        			</a>
	        		</li>
	       			<li>
	        			<a href="https://id.wikipedia.org/wiki/SMK_Prakarya_Internasional">
	        				<span></span>
	        				<span></span>
	        				<span></span>
	        				<span class="fab fa-wikipedia-w" aria-hidden="true"></span>
	        			</a>
	        		</li>
	       			<li>
	        			<a href="http://www.smk-pi.sch.id/">
	        				<span></span>
	        				<span></span>
	        				<span></span>
	        				<span class="fa fa-globe" aria-hidden="true"></span>
	        			</a>
	        		</li>
	       			<li>
	        			<a href="https://www.youtube.com/user/smkpicom">
	        				<span></span>
	        				<span></span>
	        				<span></span>
	        				<span class="fab fa-youtube" aria-hidden="true"></span>
	        			</a>
	        		</li>
	        		<li>
	        			<a href="https://www.instagram.com/smkpi/">
	        				<span></span>
	        				<span></span>
	        				<span></span>
	        				<span class="fab fa-instagram" aria-hidden="true"></span>
	        			</a>
	        		</li>
	        	</ul>
	        <hr class="socket">
					<div class="copyright-text">
						<center><script type='text/javascript' src="assets/js/date.js"></script></center><br>
						<strong>Copyright &copy; SMK Prakarya Internasional 2019 | All Right Reserved.</strong>
					</div>
				</div>
	    </div>
	  </footer>
	</section>
	<script src="assets/js/jquery-3.4.0.min.js"></script>
	<script src="assets/js/bootstrap-show-password.js"></script>
	<script>
		$(document).ready(function(){
			$('#methods').click(function(){
				$('#password').attr('type', $(this).is(':checked') ? 'text': 'password');
				$('.register-form').toggleCLass('.form-group');
			});
		});
	</script>
</body>
</html>