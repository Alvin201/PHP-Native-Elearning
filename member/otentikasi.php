<?php
include ("../config/koneksi.php");
session_start();
//menangkap data dari form login
$nis 	  = $_POST['nis'];
$password = $_POST['password'];

//cek data yang dikirim, apakah kosong atau tidak
if (empty($nis) && empty($password)) {
	//kalau username dan password kosong
	header('location:../index.php?error=1');
	break;
} else if (empty($nis)) {
	//kalau username saja yang kosong
	header('location:../index.php?error=2');
	break;
} else if (empty($password)) {
	//kalau password saja yang kosong
	header('location:../index.php?error=3');
	break;
}

$q = mysql_query("select * from siswa where nis='$nis' and password='$password'");

if (mysql_num_rows($q) == 1) {
	//kalau username dan password sudah terdaftar di database
	//membuat session dengan nama username dengan isi nama user yang login
	$_SESSION['nis'] = $nis;
	
	//redirect ke halaman index
	header('location:index.php?module=beranda');
} else {
	//kalau username ataupun password tidak terdaftar di database
	header('location:../index.php?error=4');
}
?>