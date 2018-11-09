<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include ("../../../config/koneksi.php");
$module=$_GET[module];
$action=$_GET[action];

// Input forum
if ($module=='forum' AND $action=='input')
{

$judul_topik = $_POST['judul_topik'];
$isi_topik = $_POST['isi_topik'];
$kategori = $_POST['kategori'];
$jam_sekarang = date("H:i:s");
$nis = $_SESSION['nis'];

	mysql_query("INSERT INTO topik VALUES('', '$kategori', '$judul_topik', '$nis', NOW(), '$jam_sekarang', '$isi_topik', '')");
	
    ?>
	<script language="javascript"> alert ("Topik Telah Dibuat"); document.location="../../index.php?module=forum";</script>
	<?php	
}

// input reply
elseif ($module=='forum' AND $action=='tambah')
{
$id_topik = $_POST['id_topik'];
$isi = $_POST['isi'];
$jam_sekarang = date("H:i:s");
$nis = $_SESSION['nis'];
$query = mysql_query ("SELECT * FROM topik WHERE id_topik = '$id_topik'");
$data = mysql_fetch_array ($query);

	mysql_query("INSERT INTO tanggapan VALUES('', '$id_topik', '$nis', NOW(), '$jam_sekarang', '$isi')");
	mysql_query("UPDATE topik SET jumlah_tanggapan = $data[jumlah_tanggapan] + 1 WHERE id_topik = '$id_topik'"); 
	 
	header('location:../../../index.php?module='.$module.'&action=detail_topik&id'.'='.$id_topik); 
}
?>
