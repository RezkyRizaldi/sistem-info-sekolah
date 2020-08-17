<?php
session_start();
include '../config/functions.php';

	if(!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/img/logo.png">
	<title>Sistem Penilaian SMK Prakarya Internasional [SMK PI]</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/font/css/all.min.css">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

	<!-- Awal Modal -->
	<div id="myModal" class="tombol modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<img class="modal-img" src="assets/img/logo.png">
				<center><script type='text/javascript' src="assets/js/date.js"></script></center>
				<div class="modal-header">
					<h4 class="modal-title">Selamat Datang !</h4>
					<a class="close" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
				</div>
				<div class="modal-body">
					<p class="modal-text text-center">Lihat Nilai Anda Sekarang</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir Modal -->

	<!-- Awal Section Home -->
	<div id="home">
		
	<!-- NavBar -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#home" style="font-size: 14px;"><img src="assets/img/logo.png">Smk prakarya internasional</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="#nilai">Nilai</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#about">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#portofolio">Portofolio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#team">Team</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#contact">Contact</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?>&nbsp;</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#"><i class="fa fa-user">&nbsp; Lihat Profil</a></i>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="../config/logout.php"><i class="fa fa-sign-out-alt">&nbsp; Logout</a></i>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	<!-- Akhir Navbar -->

	<!-- Awal Slider -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="7000">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="my active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<img src="assets/img/slider1.png" alt="First Slide">
				<div class="carousel-caption text-center">
					<h1>SMK Prakarya<br>Internasional</h1>
					<h3>[SMK PI]</h3>
				</div>
			</div>
			<div class="carousel-item">
				<img src="assets/img/slider2.png" alt="Second Slide">
					<div class="carousel-caption text-center">
    				<h1>SMK Prakarya<br>Internasional</h1>
    				<h3>One Team - One Spirit - One Dream</h3>
  				</div>
			</div>
			<div class="carousel-item">
				<img src="assets/img/slider3.png" alt="Third Slide">
				<div class="carousel-caption text-center">
    			<h1>SMK Prakarya<br>Internasional</h1>
    			<h3>Gerbang Belajar Menuju Teknisi Professional</h3>
  			</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
			</a>
		</div>
	</div>
	<!-- Akhir Slider -->
	</div>
	<!-- Akhir Section Home -->

	<!-- Awal Section Nilai -->
	<div id="nilai" class="offset">
		<div class="col-12 narrow text-center">
			<h3 class="heading text-center">Nilai</h3>
				<div class="heading-underline-about"></div>
					<div class="table-responsive">
						<div class="input-group">
			        <input type="text" class="form-control" id="search" name="search" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
			        <div class="input-group-append">
			          <a href="#"><button class="btn btn-primary" type="button">
			            <i class="fa fa-print"></i>
			          </button></a>
			        </div>
			      </div><br>
						<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
				  		<caption>Daftar Nilai</caption>
				  			<thead class="table-primary">
						    <tr style="text-transform: uppercase;"><strong>
						      <th scope="col">No.</th>
						      <th scope="col">Nama</th>
						      <th scope="col">Kelas</th>
						      <th scope="col">Jurusan</th>
						      <th scope="col">Mata Pelajaran</th>
						      <th scope="col">Nilai</th>
						      <th scope="col">KKM</th>
						    </strong></tr>
							  <tbody class="table-secondary" id="table">
							  	<?php
							  	$projects = array();
									$result = mysqli_query($conn, "SELECT * FROM siswa");
							  	$nomor = 1;
							    	while($data = mysqli_fetch_assoc($result)) {
							    		$projects[] = $data;
							    		}
							    		foreach ($projects as $siswa) {
							  	?>
							    <tr>
							      <td><?php echo $nomor++;?>.</td>
                    <td><?php echo $siswa['nama']; ?></td>
                    <td><?php echo $siswa['kelas']; ?></td>
                    <td><?php echo $siswa['jurusan']; ?></td>
                    <td><?php echo $siswa['mata_pelajaran']; ?></td>
                    <td><?php echo $siswa['nilai']; ?></td>
                    <td><?php echo $siswa['kkm']; ?></td>
							    </tr>
							    <?php } ?>
							  </tbody>
						</table>
					</div>
		</div>
	</div>
	<!-- Akhir Section Nilai -->
	
	<!-- Awal Section About -->
	<div id="about" class="offset">
		<div class="col-12 narrow text-center">
			<h3 class="heading text-center">About</h3>
				<div class="heading-underline-about"></div>
			<h1 class="heading-about">SMK PRAKARYA INTERNASIONAL</h1>
			<p class="lead">One Team, One Spirit, One Dream.</p>
			<p>Selamat datang di SMK Prakarya Internasional [SMK PI], Rekayasa Teknologi & Manajemen, yang telah terakreditasi dengan nilai ‘A’ dari Badan Akreditasi Nasional Sekolah/Madrasah.<br>Didirikan sejak 02 Nopember 1952 oleh H. J. Canny [1927-1998] dan Hobsah Sumarni [1934-1981]. Evolusi berawal sebagai Lembaga Pendidikan Kejuruan Otomotif DETROID [1952-1966], Sekolah Pembangunan Prakarya Internasional [1967-1970], Sekolah Teknik Mesin [STM] Prakarya Internasional [1970-2004], sejak 2005 sebagai Sekolah Menengah Kejuruan [SMK PI]</p>
			<a class="btn btn-secondary btn-md" href="http://www.smk-pi.sch.id/pendaftaran" target="_blank">DAFTAR SEKARANG</a>
		</div>
	</div>
	<!-- Akhir Section About -->

	<!-- Awal Section Portfolio -->
	<div id="portofolio" class="offset">
		<div class="jumbotron container-fluid">
			<div class="col-12 text-center">
				<h3 class="heading">Portofolio</h3>
				<div class="heading-underline-portfolio"></div>
			</div>
			<div class="row no-padding">
				<div class="col-sm-4">
					<div class="portfolio">
						<a href="assets/img/portfolio1.png" target="_blank">
							<img src="assets/img/portfolio1.png">
						</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="portfolio">
						<a href="assets/img/portfolio2.png" target="_blank">
							<img src="assets/img/portfolio2.png">
						</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="portfolio">
						<a href="assets/img/portfolio3.png" target="_blank">
							<img src="assets/img/portfolio3.png">
						</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="portfolio">
						<a href="assets/img/portfolio4.png" target="_blank">
							<img src="assets/img/portfolio4.png">
						</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="portfolio">
						<a href="assets/img/portfolio5.png" target="_blank">
							<img src="assets/img/portfolio5.png">
						</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="portfolio">
						<a href="assets/img/portfolio6.png" target="_blank">
							<img src="assets/img/portfolio6.png">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir Section Portfolio -->

	<!-- Awal Section Team -->
	<div id="team" class="offset">
		<h3 class="heading text-center">Team</h3>
		<div class="heading-underline-team"></div>
		<div class="row padding">
			<div class="col-md-6">
				<div class="card text-center">
					<img class="card-img-top" src="assets/img/team1.jpg">
					<div class="card-body">
						<h4>Muhamad Rezky Rizaldi</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</p>
						<ul class="teamsm-title">
							<li class="teamsm-icon1"><i class="fab fa-facebook-square" aria-hidden="true"></i></li>
							<li class="teamsm-icon2">	<i class="fab fa-instagram" aria-hidden="true"></i></li>
							<li class="teamsm-icon3"><i class="fab fa-whatsapp" aria-hidden="true"></i></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card text-center">
					<img class="card-img-top" src="assets/img/team2.png">
					<div class="card-body">
						<h4>Muhamad Rio Dhany Ramdani</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</p>
						<ul class="teamsm-title">
							<li class="teamsm-icon1"><i class="fab fa-facebook-square" aria-hidden="true"></i></li>
							<li class="teamsm-icon2"><i class="fab fa-instagram" aria-hidden="true"></i></li>
							<li class="teamsm-icon3"><i class="fab fa-whatsapp" aria-hidden="true"></i></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir Section Team -->

	<!-- Awal Section Contact -->
	<div id="contact" class="offset">
		<footer>
			<div class="row justify-content-center">
				<div class="col-md-9 text-center">
					<a class="navbar-brand-footer" href="#" style="text-transform: uppercase;">SMK Prakarya Internasional </a>
					<p>Menjadi SMK yang unggul, kompetitif berdaya saing nasional dan internasional dengan menghasilkan pribadi-pribadi berakhlak mulia, cerdas, mandiri, bertanggungjawab, memiliki jiwa kewirausahaan yang berkeahlian siap kerja dan mampu bersaing dipasar global.</p>
					<p class="contact-info">Contact Info<br><br>[022] 520 4537<br>[022] 520 2834<br>	[022] 523 2128</p>
					<p class="contact-info-2">School Administration<br><br>[022] 520 2834<br>[022] 520 8637</p>
					<p class="contact-info-3">Financial Center<br><br>[022] 520 4537<br>[022] 523 212</p>
					<p class="address">Address<br><br>KAMPUS SMK PI<br>Jl. Inhofftank No. 46 - 146<br>Terusan Otista, Tegallega<br>Bandung, Indonesia</p>
					<p class="social-media">Visit Our Social Media</p>
					<ul class="icon">
       			<li>
        			<a href="https://www.facebook.com/smkprakaryainternasional52/">
        				<span></span>
        				<span></span>
        				<span></span>
        				<span class="fab fa-facebook" aria-hidden="true"></span>
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
		    			<a href="https://www.instagram.com/smkpi/">
		    				<span></span>
		    				<span></span>
		    				<span></span>
		    				<span class="fab fa-instagram" aria-hidden="true"></span>
		    			</a>
		    		</li>
	    		</ul>
				</div>
				<hr class="socket">
				<div class="copyright">
				<center><script type='text/javascript' src="assets/js/date.js"></script></center><br>
				<strong>Copyright &copy; SMK Prakarya Internasional 2019 | All Right Reserved.</strong>
				</div>
			</div>
		</footer>
	</div>
	<!-- Akhir Section Contact -->

	<!-- Awal Script -->
	<script src="assets/js/jquery-3.4.0.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.dataTables.js"></script>
  <script src="assets/js/dataTables.bootstrap4.js"></script>
	<script type="text/javascript">
		$('#myModal').modal('show');
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
		  $("#search").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $("#table tr").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		  });
		});
	</script>
	<!-- Akhir Script -->
</body>
</html>