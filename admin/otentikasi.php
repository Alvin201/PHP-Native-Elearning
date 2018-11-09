<?php
include('../config/koneksi.php');
session_start();
//menangkap data dari form login
$username = $_POST['id_admin'];
$password = $_POST['password'];

//cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($password)) {
	//kalau username dan password kosong
	header('location:login.php?error=1');
	break;
} else if (empty($username)) {
	//kalau username saja yang kosong
	header('location:login.php?error=2');
	break;
} else if (empty($password)) {
	//kalau password saja yang kosong
	header('location:login.php?error=3');
	break;
}

$q = mysql_query("select * from admin where id_admin='$username' and password='$password'");

if (mysql_num_rows($q) == 1) {
	//kalau username dan password sudah terdaftar di database
	//membuat session dengan nama username dengan isi nama user yang login
	$_SESSION['id_admin'] = $username;
	
	//redirect ke halaman index
	header('location:index.php?module=beranda');
} else {
	//kalau username ataupun password tidak terdaftar di database
	header('location:login.php?error=4');
}
?>