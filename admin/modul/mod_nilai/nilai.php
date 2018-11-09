<br/>
<hr>
<h4><span class="glyphicon glyphicon-star"></span> Daftar Nilai</h4>
<hr>
<table class="table table striped">
<tr class='judul'>
		<th>No</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kode Soal</th>
		<th>Kode Mata Pelajaran</th>
		<th>Nilai</th>
</tr>
<?php
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM latihan");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$query2 = mysql_query ("SELECT 
							  a.nis, 
							  a.nama, 
							  b.kode_soal, 
							  b.kode_mapel,
							  c.nilai 
					    FROM  
							   siswa a, 
							   soal b, 
							   latihan c 
						WHERE a.nis = c.nis AND c.kode_soal = b.kode_soal LIMIT $start, $per_hal");
$no = 1;
while ($data = mysql_fetch_array ($query2))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$data[nis]</td>
	<td>$data[nama]</td>
	<td>$data[kode_soal]</td>
	<td>$data[kode_mapel]</td>
	<td>$data[nilai]</td>
</tr>
";
$no++;
}
?></table>
<ul class="pagination">
	<li><a href="?module=nilai&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=nilai&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=nilai&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>
