<?php
include '../../config/functions.php';

if(isset($_GET['id'])) {
  $id = $_GET['id'];
}
  
  if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $bidang = $_POST['bidang'];
    $ttl = $_POST['ttl'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];

    $result = mysqli_query($conn, "UPDATE guru SET nama='$nama', bidang='$bidang', ttl='$ttl', jenis_kelamin='$jenis_kelamin', alamat='$alamat' WHERE id='$id'");

    echo "<script> alert('Data berhasil di edit!'); document.location.href = '../data-guru.php'; </script>";
    }

    $data = mysqli_query($conn, "SELECT * FROM guru WHERE id='$id'");
      while($guru = mysqli_fetch_assoc($data)) {
        $nama = $guru['nama'];
        $umur = $guru['umur'];
        $ttl = $guru['ttl'];
        $alamat = $guru['alamat'];  
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Data Siswa - Sistem Penilaian SMK Prakarya Internasional [SMK PI]</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="../index.php">SMK PI</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0"></ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav"></ul>

    <div id="content-wrapper">

      <div class="container-fluid">
        <form action="" method="post">
            <div class="form-group">
              <input type="hidden" name="id" class="form-control" value="<?php echo $guru['id']; ?>">
              <input type="text" name="nama" class="form-control" value="<?php echo $guru['nama']; ?>" autofocus="" autocomplete="off">
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
              <input type="text" name="umur" class="form-control" placeholder="Masukkan Umur" autocomplete="off" value="<?php echo $guru['umur'] ?>">
            </div>
            <div class="form-group">
              <input type="date" name="ttl" class="form-control" placeholder="Masukkan Tempat/Tanggal Lahir" autocomplete="off" value="<?php echo $guru['ttl'] ?>">
            </div>
            <div class="form-group">
              <select class="form-control" required="required" name="jenis_kelamin">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </div>
            <div class="form-group">
              <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" autocomplete="off">
                <?php echo  htmlspecialchars ($alamat); ?></textarea>
            </div>
          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success">Edit</button>
          </div>
        </form>
      <?php } ?>
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

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin.min.js"></script>

</body>

</html>
