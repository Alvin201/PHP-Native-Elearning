<?php
include ("../config/koneksi.php");
include ("../config/indonesiandate.php");
include ("../config/library.php");
$kode_soal = $_GET['id'];
$nama_dokumen='Laporan Nilai'; 
define('_MPDF_PATH','MPDF57/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4');
ob_start();
?>
<?php
$soal = mysql_query ("SELECT a.nama_mapel, b.kode_soal, b.pertemuan FROM mapel a, soal b WHERE a.kode_mapel = b.kode_mapel AND b.kode_soal = '$kode_soal'");
$dt = mysql_fetch_array($soal);
?>
<h2>Laporan Nilai Mata Pelajaran <?php echo $dt[nama_mapel]?> Pertemuan <?php echo $dt[pertemuan];?></h2>
<p>Kode Soal: <?php echo $dt[kode_soal];?></p>
<p><i>Tanggal Cetak Laporan:<b> <?php echo"$hari_ini, "; echo tgl_indo(date("Y m d")); echo " | "; echo date("H:i:s");echo " WIB";?></b></i></p>
<table>
	<tr style='border:1; width:900px; background:#f90; color:#fff;'>
		<th>No</th>
		<th width="150">NIS</th>
		<th width="200px">Nama Siswa</th>
		<th>Kelas</th>
		<th>Nilai</th>
	</tr>
<?php
$query2 = mysql_query ("SELECT 
							  a.nis, 
							  a.nama, 
							  a.kelas,
							  b.nilai 
					    FROM  
							   siswa a, 
							   latihan b
						WHERE a.nis = b.nis AND b.kode_soal = '$kode_soal'");
$no = 1;
while ($row = mysql_fetch_assoc ($query2))
{
echo"
<tr style='border:1; background:#fff; color:#000;'>
	<td align=center>$no</td>
	<td align=center>$row[nis]</td>
	<td align=center>$row[nama]</td>
	<td align=center>$row[kelas]</td>
	<td align=center>$row[nilai]</td>
	
</tr>
";
$no++;
}
?></table>
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>