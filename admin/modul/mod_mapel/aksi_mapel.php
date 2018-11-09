<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include ("../../../config/koneksi.php");
$module=$_GET[module];
$action=$_GET[action];

// Hapus siswa
if ($module=='mapel' AND $action=='hapus')
{
  mysql_query("DELETE FROM mapel WHERE kode_mapel = '$_GET[id]'");
  header('location:../../../index.php?module='.$module);
}

// Input siswa
elseif ($module=='mapel' AND $action=='input')
{

$kode_mapel = $_POST['kode_mapel'];
$nama_mapel = $_POST['nama_mapel'];

	mysql_query("INSERT INTO mapel VALUES('$kode_mapel', '$nama_mapel')");
	
	?>
	<script language="javascript"> alert ("Data Mapel Telah Tersimpan"); document.location="../../index.php?module=mapel";</script>
	<?php
}
// Update siswa
elseif ($module=='mapel' AND $action=='update')
{

   mysql_query ("UPDATE mapel SET
   								  nama_mapel	=	'$_POST[nama_mapel]'
								WHERE
								  kode_mapel	=	'$_POST[kode_mapel]'");
   
	?>
	<script language="javascript"> alert ("Data Mapel Telah Terupdate"); document.location="../../index.php?module=mapel";</script>
	<?php
}
?>
