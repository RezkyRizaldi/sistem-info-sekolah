<?php
include '../../config/functions.php';

if(isset($_POST['submit'])) {
		$nama = $_POST['nama'];
		$bidang = $_POST['bidang'];
		$umur = $_POST['umur'];
		$ttl = $_POST['ttl'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$alamat = $_POST['alamat'];

		$result = mysqli_query($conn, "INSERT INTO guru(id, nama, bidang, umur, ttl, jenis_kelamin, alamat) VALUES('', '$nama', '$bidang', '$umur', '$ttl', '$jenis_kelamin', '$alamat')");

		// Show message when user added
		echo "<script> alert('Data baru berhasil ditambahkan!'); document.location.href = '../data-guru.php'; </script>";
  } else {
  	echo "<script> alert('Data gagal ditambahkan!'); document.location.href = '../data-guru.php'; </script>";
  }
?>