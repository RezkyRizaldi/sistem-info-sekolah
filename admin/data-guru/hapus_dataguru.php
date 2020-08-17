<?php
require '../../config/functions.php';
	
if ($id = $_GET["id"]) { 

	mysqli_query($conn, "DELETE FROM guru WHERE id = $id");

	echo "<script> alert('Data berhasil dihapus!'); document.location.href = '../data-guru.php'; </script>";
  } else {
  	echo "<script> alert('Data gagal dihapus!'); document.location.href = '../data-guru.php'; </script>";

	return mysqli_affected_rows($conn);

}

?>