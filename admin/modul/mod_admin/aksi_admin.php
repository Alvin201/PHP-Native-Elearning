<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include ("../../../config/koneksi.php");
$module=$_GET[module];
$action=$_GET[action];

// Hapus siswa
if ($module=='admin' AND $action=='hapus')
{
  mysql_query("DELETE FROM admin WHERE id_admin = '$_GET[id]'");
  header('location:../../../index.php?module='.$module);
}

// Input siswa
elseif ($module=='admin' AND $action=='input')
{
 
$id_admin = $_POST['id_admin'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$level = $_POST['level'];
	mysql_query("INSERT INTO admin VALUES('$id_admin', '$nama', '$password', '$level')");
	
	?>
	<script language="javascript"> alert ("Data Admin Telah Tersimpan"); document.location="../../index.php?module=admin";</script>
	<?php	
}

// Update siswa
elseif ($module=='admin' AND $action=='update')
{
  
   mysql_query ("UPDATE admin SET
   								  nama			=	'$_POST[nama]',
   								  level			=	'$_POST[level]'
								WHERE
								  id_admin		=	'$_POST[id_admin]'");
  
    
	?>
	<script language="javascript"> alert ("Data Admin Telah Terupdate"); document.location="../../index.php?module=admin";</script>
	<?php							  
}
?>
