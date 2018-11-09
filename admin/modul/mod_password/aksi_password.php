<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include ("../../../config/koneksi.php");
$module=$_GET[module];
$action=$_GET[action];

// Update pass
if ($module=='password' AND $action=='update')
{
$password = $_POST['password'];
$konfirmasi = $_POST['konfirmasi'];

if ($password != $konfirmasi)
{
?>
<script language="javascript"> alert ("Password baru dengan konfirmasi harus sama!"); document.location="../../index.php?module=gantipassword";</script>
<?php
}
else
{

   mysql_query ("UPDATE admin SET
   								  password		=	'$_POST[password]'
								WHERE
								  id_admin		=	'$_POST[id_admin]'");
?>
<script language="javascript"> alert ("Password anda sudah disimpan"); document.location="../../index.php?module=beranda";</script>
<?php								  
}
}
?>
