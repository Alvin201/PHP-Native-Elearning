<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include ("../../../config/koneksi.php");
$module=$_GET[module];
$action=$_GET[action];
if ($module=='soal' AND $action=='input')
{
$kode_soal = $_POST['kode_soal'];
$kode_mapel = $_POST['kode_mapel'];
$pertemuan = $_POST['pertemuan'];
$tgl_mulai = $_POST['tgl_mulai'];
$tgl_selesai = $_POST['tgl_selesai'];
$id_admin = $_SESSION['id_admin'];
$modul = $_FILES ['modul']['name'];
                             
	mysql_query("INSERT INTO soal VALUES('$kode_soal', '$id_admin','$kode_mapel', '$pertemuan', '$tgl_mulai', '$tgl_selesai', '', '$modul')");
	copy ($_FILES ["modul"]["tmp_name"], "modul/".$modul);
	
	?>
	<script language="javascript"> alert ("Data Soal Telah Tersimpan"); document.location="../../index.php?module=soal";</script>
	<?php
}

// Update soal
elseif ($module=='soal' AND $action=='update')
{
$lokasi_file = $_FILES['modul_edit']['tmp_name'];
$nama_file   = $_FILES['modul_edit']['name'];
// Apabila gambar tidak diganti
  if (empty($lokasi_file))
  {

   mysql_query ("UPDATE soal SET
   								  kode_mapel	=	'$_POST[kode_mapel]',
   								  pertemuan		=	'$_POST[pertemuan]',
   								  tgl_mulai		=	'$_POST[tgl_mulai]',
   								  tgl_selesai	=	'$_POST[tgl_selesai]'
								WHERE
								  kode_soal		=	'$_POST[kode_soal]'");
  }
  else
  {
   move_uploaded_file($lokasi_file,"modul/$nama_file");
   mysql_query ("UPDATE soal SET
   								  kode_mapel	=	'$_POST[kode_mapel]',
   								  pertemuan		=	'$_POST[pertemuan]',
   								  tgl_mulai		=	'$_POST[tgl_mulai]',
   								  tgl_selesai	=	'$_POST[tgl_selesai]',
								  modul			=	'$nama_file'
								WHERE
								  kode_soal		=	'$_POST[kode_soal]'");
	}
   
	?>
	<script language="javascript"> alert ("Data Soal Telah Terupdate"); document.location="../../index.php?module=soal";</script>
	<?php
}
elseif ($module=='soal' AND $action=='update_pertanyaan')
{
  
   mysql_query ("UPDATE pertanyaan SET
   								  pertanyaan	=	'$_POST[pertanyaan]',
								  pilihan_a		=	'$_POST[pilihan_a]',
								  pilihan_b		=	'$_POST[pilihan_b]',
								  pilihan_c		=	'$_POST[pilihan_c]',
								  pilihan_d		=	'$_POST[pilihan_d]',
   								  kunci_jawaban	=	'$_POST[kunci_jawaban]'
								WHERE
								  id_pertanyaan	=	'$_POST[id_pertanyaan]'");
								  	
  
   
	?>
	<script language="javascript"> alert ("Data Pertanyaan Telah Terupdate"); document.location="../../index.php?module=soal";</script>
	<?php
}
elseif ($module=='soal' AND $action=='simpan_pertanyaan')
{
  if (isset($_POST['simpan']))
  {
	$jumlah = count($_POST['kode_soal']);
	for ($i=0; $i<$jumlah; $i++)
	{
		$urut = $i + 1;
		$kode_soal = $_POST['kode_soal'][$i];
		$pertanyaan = $_POST['pertanyaan'][$i];
		$pilihan_a = $_POST['pilihan_a'][$i];
		$pilihan_b = $_POST['pilihan_b'][$i];
		$pilihan_c = $_POST['pilihan_c'][$i];
		$pilihan_d = $_POST['pilihan_d'][$i];
		$kunci_jawaban = $_POST['kunci_jawaban'][$i];
		
			mysql_query ("INSERT INTO pertanyaan VALUES ('', '$kode_soal', '$pertanyaan', '$pilihan_a', '$pilihan_b', '$pilihan_c', '$pilihan_d', '$kunci_jawaban')");
			mysql_query ("UPDATE soal SET jumlah_pertanyaan = '$jumlah'
								  WHERE 
									 kode_soal = '$kode_soal'");
	}
   }
  
	?>
	<script language="javascript"> alert ("Data Pertanyaan Telah Tersimpan"); document.location="../../index.php?module=soal";</script>
	<?php
}   
?>
