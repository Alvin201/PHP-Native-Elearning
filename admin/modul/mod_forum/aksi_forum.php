<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include ("../../../config/koneksi.php");
$module=$_GET[module];
$action=$_GET[action];

// Input forum
if ($module=='data-forum' AND $action=='input')
{

$id_tanya_jawab = $_POST['id_tanya_jawab'];
$jawaban = $_POST['jawaban'];
$jam_sekarang = date("H:i:s");
$id_admin = $_SESSION['id_admin'];

	mysql_query("INSERT INTO jawaban VALUES('', '$id_tanya_jawab', '$id_admin', NOW(), '$jam_sekarang', '$jawaban')");
	?>
   <script language="javascript"> alert ("Jawaban Telah Tersimpan"); document.location="../../index.php?module=data-forum";</script>
   <?php
}
?>