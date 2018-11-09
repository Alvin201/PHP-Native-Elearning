<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include ("../../../config/koneksi.php");
$module=$_GET[module];
$action=$_GET[action];

// Hapus siswa
if ($module=='siswa' AND $action=='hapus')
{
  mysql_query("DELETE FROM siswa WHERE nis = '$_GET[id]'");
  header('location:../../../index.php?module='.$module);
}

// Input siswa
elseif ($module=='siswa' AND $action=='input')
{
 
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jk = $_POST['jenis_kelamin'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$tlp = $_POST['no_telp'];
                             
	mysql_query("INSERT INTO siswa VALUES('$nis', '$nama', '$kelas', '$jk', '$tgl_lahir', '$alamat', '$tlp', '$tgl_lahir', '')");
	
	?>
	<script language="javascript"> alert ("Data Siswa Telah Tersimpan"); document.location="../../index.php?module=siswa";</script>
	<?php
}

// Update siswa
elseif ($module=='siswa' AND $action=='update')
{

$tgl = $_POST['tgl_lahir'];

   mysql_query ("UPDATE siswa SET
   								  nama			=	'$_POST[nama]',
   								  kelas			=	'$_POST[kelas]',
								  jenis_kelamin	=	'$_POST[jenis_kelamin]',
								  tgl_lahir		=	'$tgl',
								  alamat		=	'$_POST[alamat]',
								  no_telp		=	'$_POST[no_telp]',
								  password		=	'$tgl'
								WHERE
								  nis			=	'$_POST[nis]'");
								  	
	
	?>
	<script language="javascript"> alert ("Data Siswa Telah Tersimpan"); document.location="../../index.php?module=siswa";</script>
	<?php
}
?>
