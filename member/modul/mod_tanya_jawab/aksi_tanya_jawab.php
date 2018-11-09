<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include ("../../../config/koneksi.php");
$module=$_GET[module];
$action=$_GET[action];

// Input forum
if ($module=='tanya_jawab_guru' AND $action=='input')
{

$pertanyaan = $_POST['pertanyaan'];
$kategori = $_POST['kategori'];
$jam_sekarang = date("H:i:s");
$nis = $_SESSION['nis'];

	mysql_query("INSERT INTO tanya_jawab VALUES('', '$nis', '$pertanyaan', '$kategori', NOW(), '$jam_sekarang')");
	?>
    <script language="javascript"> alert ("Pertanyaan Telah Diajukan"); document.location="../../index.php?module=tanya_jawab_guru";</script>
    <?php	
}
?>
