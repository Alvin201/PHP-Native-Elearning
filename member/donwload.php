<?php
include "../config/koneksi.php";

$direktori = "../admin/modul/mod_soal/modul/"; 
$filename = $_GET['id'];

if(file_exists($direktori.$filename)){
	$file_extension = strtolower(substr(strrchr($filename,"."),1));

	switch($file_extension)
	{
	  case "pdf": $ctype="application/pdf"; break;
	  default: $ctype="application/proses";
	}
	  header("Content-Type: octet/stream");
	  header("Pragma: private"); 
	  header("Expires: 0");
	  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	  header("Cache-Control: private",false); 
	  header("Content-Type: $ctype");
	  header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
	  header("Content-Transfer-Encoding: binary");
	  header("Content-Length: ".filesize($direktori.$filename));
	  readfile("$direktori$filename");
	  exit();   
}
else
{
	  echo "<h1>Access forbidden!</h1>
			<p>Maaf, file yang Anda download sudah tidak tersedia<br /></p>
			<input type='button' value='Kembali' onclick=self.history.back()>";
	  exit;
}

?>
