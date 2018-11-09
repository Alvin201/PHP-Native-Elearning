<?php
session_start();
$aksi="modul/mod_forum/aksi_forum.php";
switch($_GET[action])
{
default:
$query = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
$data = mysql_fetch_array($query);
?>
<input type="hidden" value="<?php echo $data[level];?>">
<?php
if ($data[level] == 'Guru IPA')
{
?>
<hr>
<h4><span class="glyphicon glyphicon-comment"></span> Forum Dan Tanya Jawab</h4>
<hr>
<?php
echo"<a href='?module=data-forum&action=lihat'><button class='btn btn-info'><span class='glyphicon glyphicon-search'></span> Lihat Tanya Jawab</button></a>";
?>
<br><br>
<table class="table table-striepd">
<tr class='judul'>
		<th>No</th>
		<th>Judul Topik</th>
		<th>Kategori</th>
		<th>Detail</th>
		<th>Tanggapan</th>
</tr>
<?php
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM topik");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$ipa = 'IPA';
$query = mysql_query ("SELECT * FROM topik WHERE kategori = '$ipa' ORDER BY id_topik ASC LIMIT $start, $per_hal");
$no = 1;
while ($row = mysql_fetch_assoc ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[judul_topik]</td>
	<td>$row[kategori]</td>
	<td><a href='?module=data-forum&action=detail_topik&id=$row[id_topik]'> Lihat Detail</a></td>
	<td><a href='?module=data-forum&action=tanggapan&id=$row[id_topik]'>$row[jumlah_tanggapan] Tanggapan</a></td>
</tr>
";
$no++;
}
?></table>
<ul class="pagination">
	<li><a href="?module=data-forum&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=data-forum&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=data-forum&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>

<?php
}
else if ($data[level]=='Guru IPS')
{
?>
<hr>
<h4><span class="glyphicon glyphicon-comment"></span> Forum Dan Tanya Jawab</h4>
<hr>
<?php
echo"<a href='?module=data-forum&action=lihat'><button class='btn btn-info'><span class='glyphicon glyphicon-search'></span> Lihat Tanya Jawab</button></a>";
?>
<br><br>
<table class="table table-striepd">
<tr class='judul'>
		<th>No</th>
		<th>Judul Topik</th>
		<th>Kategori</th>
		<th>Detail</th>
		<th>Tanggapan</th>
</tr>
<?php
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM topik");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$ips = 'IPS';
$query = mysql_query ("SELECT * FROM topik WHERE kategori = '$ips' ORDER BY id_topik ASC LIMIT $start, $per_hal");
$no = 1;
while ($row = mysql_fetch_assoc ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[judul_topik]</td>
	<td>$row[kategori]</td>
	<td><a href='?module=data-forum&action=detail_topik&id=$row[id_topik]'> Lihat Detail</a></td>
	<td><a href='?module=data-forum&action=tanggapan&id=$row[id_topik]'>$row[jumlah_tanggapan] Tanggapan</a></td>
</tr>
";
$no++;
}
?></table>
<ul class="pagination">
	<li><a href="?module=data-forum&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=data-forum&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=data-forum&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>
<?php
}
else
{
?>
<hr>
<h4><span class="glyphicon glyphicon-comment"></span> Forum Dan Tanya Jawab</h4>
<hr>
<?php
echo"<a href='?module=data-forum&action=lihat'><button class='btn btn-info'><span class='glyphicon glyphicon-search'></span> Lihat Tanya Jawab</button></a>";
?>
<br><br>
<table class="table table-striepd">
<tr class='judul'>
		<th>No</th>
		<th>Judul Topik</th>
		<th>Kategori</th>
		<th>Detail</th>
		<th>Tanggapan</th>
</tr>
<?php
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM topik");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$query = mysql_query ("SELECT * FROM topik ORDER BY id_topik ASC LIMIT $start, $per_hal");
$no = 1;
while ($row = mysql_fetch_assoc ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[judul_topik]</td>
	<td>$row[kategori]</td>
	<td><a href='?module=data-forum&action=detail_topik&id=$row[id_topik]'> Lihat Detail</a></td>
	<td><a href='?module=data-forum&action=tanggapan&id=$row[id_topik]'>$row[jumlah_tanggapan] Tanggapan</a></td>
</tr>
";
$no++;
}
?></table>
<ul class="pagination">
	<li><a href="?module=data-forum&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=data-forum&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=data-forum&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>
<?php
}
break;

//tambah 
case "detail_topik":
?>
<hr>
<h4><span class="glyphicon glyphicon-comment"></span> Detail Topik</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
$query = mysql_query ("SELECT * FROM topik WHERE id_topik = '$_GET[id]'");
$data = mysql_fetch_array ($query);
?>
<table class="table table-striped">
	<tr class='judul'>
		<td width="200px"><b>Kategori Topik</b></td>
		<td>:</td>
		<td><?php echo $data[kategori];?></td>
	</tr>
	<tr class='judul'>
		<td><b>Judul Topik</b></td>
		<td>:</td>
		<td><?php echo $data[judul_topik];?></td>
	</tr>
	<tr>
		<td valign="top"><b class='judul'>Isi Topik</b></td>
		<td valign="top">:</td>
		<td class='isi'><?php echo $data[isi_topik];?></td>
	</tr>
</table>
<?php
break;
//edit
case "tanggapan":
?>
<?php
$query = mysql_query ("SELECT * FROM topik WHERE id_topik = '$_GET[id]'");
$data = mysql_fetch_array($query);
?>
<hr>
<h4><span class="glyphicon glyphicon-comment"></span> Tanggapan Untuk "<?php echo $data[judul_topik];?>"</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<table class="table table-striped">
<tr class='judul'>
		<th>No</th>
		<th>Tanggapan Siswa</th>
</tr>
<?php
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM tanggapan");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$query2 = mysql_query ("SELECT isi FROM tanggapan WHERE id_topik = '$_GET[id]' ORDER BY id_tanggapan DESC LIMIT $start, $per_hal");
$no = 1;
while ($data2 = mysql_fetch_array($query2))
{
?>
<tr class='konten'>
	<td><?php echo $no;?></td>
	<td><?php echo $data2[isi];?></td>
</tr>
<?php
$no++;
}
echo"</table>";
?>
<ul class="pagination">
	<li><a href="?module=data-forum&action=tanggapan&id=<?php echo $_GET['id'];?>&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=data-forum&action=tanggapan&id=<?php echo $_GET['id'];?>&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=data-forum&action=tanggapan&id=<?php echo $_GET['id'];?>&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>
<?php
break;
case "lihat":
?>
<hr>
<h4><span class="glyphicon glyphicon-comment"></span> Tanya Jawab</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<table class="table table-striped">
<tr class='judul'>
		<th>No</th>
		<th>Pertanyaan</th>
		<th>Nama Siswa</th>
		<th>Tanggal</th>
		<th>Jam</th>
		<th colspan="2" style="text-align:center;">Aksi</th>
</tr>
<?php
$query = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
$data = mysql_fetch_array($query);
if ($data[level] == 'Guru IPA')
{
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM tanya_jawab");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$ipa = 'IPA';
$query = mysql_query ("SELECT a.id_tanya_jawab, a.pertanyaan, b.nama, a.tgl_tanya, a.jam_tanya FROM tanya_jawab a, siswa b WHERE a.nis = b.nis AND a.kategori = '$ipa' ORDER BY a.id_tanya_jawab ASC LIMIT $start, $per_hal");
$no = 1;
while ($row = mysql_fetch_assoc ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[pertanyaan]</td>
	<td>$row[nama]</td>
	<td>$row[tgl_tanya]</td>
	<td>$row[jam_tanya]</td>
	<td><a href='?module=data-forum&action=jawaban&id=$row[id_tanya_jawab]'> Beri Jawaban</a></td>
	<td><a href='?module=data-forum&action=lihat_jawaban&id=$row[id_tanya_jawab]'> Lihat Jawaban</a></td>
</tr>
";
$no++;
}
}
else if ($data[level] == 'Guru IPS')
{
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM tanya_jawab");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$ips = 'IPS';
$query = mysql_query ("SELECT a.id_tanya_jawab, a.pertanyaan, b.nama, a.tgl_tanya, a.jam_tanya FROM tanya_jawab a, siswa b WHERE a.nis = b.nis AND a.kategori = '$ips' ORDER BY a.id_tanya_jawab ASC LIMIT $start, $per_hal");
$no = 1;
while ($row = mysql_fetch_assoc ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[pertanyaan]</td>
	<td>$row[nama]</td>
	<td>$row[tgl_tanya]</td>
	<td>$row[jam_tanya]</td>
	<td><a href='?module=data-forum&action=jawaban&id=$row[id_tanya_jawab]'> Beri Jawaban</a></td>
	<td><a href='?module=data-forum&action=lihat_jawaban&id=$row[id_tanya_jawab]'> Lihat Jawaban</a></td>
</tr>
";
$no++;
}
}
else 
{
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM tanya_jawab");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$query = mysql_query ("SELECT a.id_tanya_jawab, a.pertanyaan, b.nama, a.tgl_tanya, a.jam_tanya FROM tanya_jawab a, siswa b WHERE a.nis = b.nis ORDER BY a.id_tanya_jawab ASC LIMIT $start, $per_hal");
$no = 1;
while ($row = mysql_fetch_assoc ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[pertanyaan]</td>
	<td>$row[nama]</td>
	<td>$row[tgl_tanya]</td>
	<td>$row[jam_tanya]</td>
	<td><a href='?module=data-forum&action=jawaban&id=$row[id_tanya_jawab]'> Beri Jawaban</a></td>
	<td><a href='?module=data-forum&action=lihat_jawaban&id=$row[id_tanya_jawab]'> Lihat Jawaban</a></td>
</tr>
";
$no++;
}
}
?></table>
<ul class="pagination">
	<li><a href="?module=data-forum&action=lihat&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=data-forum&action=lihat&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=data-forum&action=lihat&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>
<?php
break;
case "jawaban":
?>
<?php
$query = mysql_query ("SELECT * FROM tanya_jawab WHERE id_tanya_jawab = '$_GET[id]'");
$data = mysql_fetch_array($query);
?>
<hr>
<b class='judul'><span class='glyphicon glyphicon-share-alt'></span> Re: <?php echo $data[pertanyaan];?></b>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
$id = $_GET['id'];
$jawab = mysql_query ("SELECT * FROM tanya_jawab WHERE id_tanya_jawab = '$id'");
$data = mysql_fetch_array ($jawab);
echo"<form method='post' action='$aksi?module=data-forum&action=input' enctype='multipart/form-data'>
<input type='hidden' name='id_tanya_jawab' value='$data[id_tanya_jawab]'>";
?>
<table>
<tr>
	<td><textarea name="jawaban" id="loko" style='width: 900px; height: 350px;'></textarea></td>
</tr>
<tr>
	<td><br><br><button class='btn btn-primary' type="submit"><span class='glyphicon glyphicon-send'></span> Post</button></td>
</tr>
</table>
</form>
<?php
break;
case "lihat_jawaban":
?>
<?php
$query = mysql_query ("SELECT * FROM tanya_jawab WHERE id_tanya_jawab = '$_GET[id]'");
$data = mysql_fetch_array($query);
?>
<hr>
<b class='judul'><span class='glyphicon glyphicon-share-alt'></span> Re: <?php echo $data[pertanyaan];?></b>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<br>
<br>
<table class='table table-striped'>
<tr class='judul'>
		<th>No</th>
		<th>Jawaban</th>
</tr>
<?php
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM jawaban");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$query = mysql_query ("SELECT * FROM jawaban WHERE id_tanya_jawab = '$_GET[id]' ORDER BY id_jawaban DESC LIMIT $start, $per_hal");
$no = 1;
while ($data = mysql_fetch_array($query))
{
?>
	<tr class='isi'>
	<?php
		echo"<td>$no</td>";
		echo"<td>$data[jawaban]</td>";
	?>
	</tr>
	<?php
$no ++;
}
echo"</table>";
?>
<ul class="pagination">
	<li><a href="?module=data-forum&action=lihat_jawaban&id=<?php echo $_GET['id'];?>&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=data-forum&action=lihat_jawaban&id=<?php echo $_GET['id'];?>&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=data-forum&action=lihat_jawaban&id=<?php echo $_GET['id'];?>&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>

<?php
}
?>