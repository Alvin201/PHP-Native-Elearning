<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include ("../../../config/koneksi.php");
$module=$_GET[module];
$action=$_GET[action];

// Update foto
if ($module=='foto' AND $action=='update')
{
$file = $_FILES ['foto']['name'];
   mysql_query ("UPDATE siswa SET
   								  foto			=	'$file'
								WHERE
								  nis		    =	'$_POST[nis]'");	
	copy ($_FILES ["foto"]["tmp_name"], "../../../admin/modul/mod_siswa/foto/".$file);
	
	?>
    <script language="javascript"> alert ("Foto Telah Diunggah"); document.location="../../../index.php?module=beranda";</script>
    <?php	

}
?>
