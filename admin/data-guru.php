<?php
session_start();

if(!isset($_SESSION["admin_login"])) {
  header("Location: login.php");
  exit;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="assets/img/logo.png">

  <title>Data Guru - Sistem Penilaian SMK Prakarya Internasional [SMK PI]</title>

  <!-- Custom fonts for this template-->
  <link href="assets/font/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Awal Modal -->
  <div class="modal fade" role="dialog" id="tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Tambah Data Siswa</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="data-guru/tambah_dataguru.php" method="post">
            <div class="form-group">
              <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" autofocus="" autocomplete="off">
            </div>
            <div class="form-group">
              <select class="form-control" required="required" name="bidang">
                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                <option value="Bahasa Inggris">Bahasa Inggris</option>
                <option value="Bahasa Sunda">Bahasa Sunda</option>
                <option value="Bimbingan Konseling">Bimbingan Konseling</option>
                <option value="Matematika">Matematika</option>
                <option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                <option value="Pendidikan Jasmani dan Olahraga">Pendidikan Jasmani dan Olahraga</option>
                <option value="Pendidikan Kewarganegaraan">Pendidikan Kewarganegaraan</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" name="umur" class="form-control" placeholder="Masukkan Umur" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="date" name="ttl" class="form-control" placeholder="Masukkan Tempat/Tanggal Lahir" autocomplete="off">
            </div>
            <div class="form-group">
              <select class="form-control" required="required" name="jenis_kelamin">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </div>
            <div class="form-group">
              <textarea type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" autocomplete="off"></textarea>
            </div>
          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success">Tambah</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Modal -->

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#home"><img src="">SMK PI</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
      </div>
    </form>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#"><?php echo $_SESSION['username']; ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>  
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Siswa</h6>
          <a class="dropdown-item" href="data-siswa.php">Data Siswa</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Guru</h6>
          <a class="dropdown-item active" href="">Data Guru</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">
            <a href="#">Data</a>
          </li>
          <li class="breadcrumb-item">Data Guru</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i> Data Tabel Guru
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah"> Tambah Data Guru</button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>  
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Bidang</th>
                    <th>Umur</th> 
                    <th>Tempat/Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php include '../config/functions.php';
                  $result = mysqli_query($conn, "SELECT * FROM guru");
                  $nomor = 1;
                  while($data = mysqli_fetch_array($result)) { ?>
                  <tr>
                    <td><?php echo $nomor++;?>.</td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['bidang']; ?></td>
                    <td><?php echo $data['umur']; ?></td>
                    <td><?php echo $data['ttl']; ?></td>
                    <td><?php echo $data['jenis_kelamin']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td>
                      <a class="btn btn-info" href="data-guru/edit_dataguru.php?id=<?php echo $data['id']; ?>">Edit</a>
                      <a class="btn btn-danger" href="data-guru/hapus_dataguru.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?');">Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SMK PI 2019 All Right Reserved.</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Logout ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
          <a class="btn btn-primary" href="../config/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="assets/vendor/chart.js/Chart.min.js"></script>
  <script src="assets/vendor/datatables/jquery.dataTables.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="assets/js/datatables-demo.js"></script>
  
</body>

</html>
