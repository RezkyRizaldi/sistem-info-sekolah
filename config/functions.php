<?php
$conn = mysqli_connect("localhost", "root", "", "db_sisteminfo");

if (mysqli_connect_errno()) {
	echo "Koneksi Database gagal : " . mysqli_connect_error();
}

function login($login) {
	global $conn;

	$email = strtolower(stripslashes($login["email"]));
	$password = mysqli_real_escape_string($conn, $password["password"]);

	$result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email' AND password = '$password'");

	$cek = mysqli_num_rows($data);
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$confirm = mysqli_real_escape_string($conn, $data["password"]);

	$result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>alert('Email sudah terdaftar, coba yang lain!');</script>";

		return false;
	}

	if ($password !== $confirm) {
		echo "<script>alert('Konfirmasi Password tidak sesuai!');</script>";

		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$password', '')");

	return mysqli_affected_rows($conn);
}

?>