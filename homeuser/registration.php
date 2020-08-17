<?php
require '../config/functions.php';

	if ( isset($_POST["register"])) {
		if( registrasi($_POST) > 0) {
			echo "<script>alert('User baru berhasil ditambahkan!'); document.location.href = 'login.php';</script>";
		} else {
			echo mysqli_error($conn);
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="assets/img/logo.png">
	<title>Registration - Sistem Penilaian SMK Prakarya Internasional [SMK PI]</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/registration.css">
	<link rel="stylesheet" type="text/css" href="assets/font/css/all.css">
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
				<p>SMK PI ENGINEERING</p>
				<img class="logo" src="assets/img/logo.png" alt="">
				<a href="#aboutus"><button type="button" class="btn btn-primary">ABOUT US</button></a>
			</div>

	<!-- Bagian Kanan -->
	<div class="col-md-7 register-right">
		<h2><strong>REGISTRASI DISINI</strong></h2>
		<form action="" method="post">
			<div class="register-form">
				<div class="form-group">
					<input type="text" class="form-control" name="username" required="required" placeholder="Masukkan Nama Pengguna" autofocus="" autocomplete="off">
				</div>
				<div class="form-group">
					<input type="email" class="form-control" name="email" required="required" placeholder="Masukkan E-mail" autocomplete="off">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" required="required" placeholder="Masukkan Password">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="confirm" required="required" placeholder="Masukkan Ulang Password">
				</div>
				<div class="btn-group">
					<a href="login.php"><button type="button" class="btn-one btn-primary">Sudah punya akun?</button></a>
					<input type="submit" class="btn-two btn-primary" name="register" value="Daftar">
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
</body>
</html>