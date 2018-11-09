<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
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
<script language="javascript"> alert ("Password lama dengan password baru harus sama!"); document.location="../../../index.php?module=password&id=<?php echo $_SESSION[nis];?>";</script>
<?php
}
else
{
   mysql_query ("UPDATE siswa SET
   								  password		=	'$_POST[password]'
								WHERE
								  nis		    =	'$_POST[nis]'");
?>
<script language="javascript"> alert ("Password anda sudah disimpan"); document.location="../../../index.php?module=beranda";</script>
<?php
}								  
}
?>
