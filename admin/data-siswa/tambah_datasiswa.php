<?php
include '../../config/functions.php';

if(isset($_POST['submit'])) {
		$nama = $_POST['nama'];
		$kelas = $_POST['kelas'];
		$jurusan = $_POST['jurusan'];
		$mata_pelajaran = $_POST['mata_pelajaran'];
		$nilai = $_POST['nilai'];

		$result = mysqli_query($conn, "INSERT INTO siswa(id, nama, kelas, jurusan, mata_pelajaran, nilai, kkm) VALUES('', '$nama', '$kelas', '$jurusan', '$mata_pelajaran', '$nilai', '')");

		// Show message when user added
		echo "<script> alert('Data baru berhasil ditambahkan!'); document.location.href = '../data-siswa.php'; </script>";
  } else {
  	echo "<script> alert('Data gagal ditambahkan!'); document.location.href = '../data-siswa.php'; </script>";
  }
?>