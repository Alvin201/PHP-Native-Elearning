<?php
$aksi="modul/mod_forum/aksi_forum.php";
switch($_GET[action])
{
  default:
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-comment"></span> Forum Diskusi</b>
<hr>
<?php
echo"<a href='?module=forum&action=tambah'><button class='btn btn-success'><span class='glyphicon glyphicon-paperclip'></span> Buat Topik Baru</button></a>"; 
?>
<br>
<br>
<?php
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM topik");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$query = mysql_query ("SELECT b.id_topik,
							  a.nama,
							  a.foto,
							  a.kelas,
							  b.judul_topik,
							  b.kategori,
							  b.tgl_posting,
							  b.jam_posting,
							  b.jumlah_tanggapan,
							  b.isi_topik
						FROM 
							  siswa a,
							  topik b
						WHERE 
								a.nis = b.nis ORDER BY b.id_topik DESC LIMIT $start, $per_hal");
while ($t = mysql_fetch_array($query))
{
 $tgl_post   = tgl_indo($data[tgl_posting]);
?>
	<table class="table table-striped">
	<tr>
    <?php
	if ($t[foto]=="")
	{
	?>
    	<td valign="top"><img src="../admin/modul/mod_siswa/foto/profile-icon.png" class="avatar" width="50px" height="55px" />
     <?php
	}
	else
	{
	 ?>
     	<td valign="top"><img src="../admin/modul/mod_siswa/foto/<?php echo $t['foto'];?>" class="avatar" width="50px" height="55px" />
     <?php
	}
	echo"
	</tr>
	<tr>
		<td class=isi_kecil>Diposting Pada $tgl Jam $t[jam_posting] Dalam Kategori : $t[kategori] Oleh: $t[nama] Kelas: $t[kelas]</td>
	</tr>
	<tr>
	<td class=judul><a href=?module=forum&action=detail_topik&id=$t[id_topik]>$t[judul_topik]</a></td>
	</tr>
	<tr><td class=isi>";
					
	// Tampilkan hanya sebagian isi berita 
	$isi_berita = nl2br($t['isi_topik']);
	$isi = substr($isi_berita,0,480); // ambil sebanyak 700 karakter
	$isi = substr($isi_berita,0,strrpos($isi," ")); // spasi antar kalimat

	echo "$isi ... <a href=?module=forum&action=detail_topik&id=$t[id_topik]>Selengkapnya</a>
	<br><br><hr color=white></td></tr>
	<tr>
	<td class=isi_kecil><a href=?module=forum&action=detail_topik&id=$t[id_topik]><span class='glyphicon glyphicon-thumbs-up'></span> $t[jumlah_tanggapan] Tanggapan</a></td></tr></table>";
	}
?>
<ul class="pagination">
	<li><a href="?module=forum&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=forum&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=forum&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>
<?php
break;
case "tambah":
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-comment"></span> Tambah Topik</b>
<hr>
<b>Buatlah Topik yang positif dan edukatif</b>
<?php
echo"<form method='post' action='$aksi?module=forum&action=input' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
<tr>
	<td>Kategori <span class="error">*</span></td>
	<td><select name="kategori" required>
		<option value="">-Pilih Salah Satu-</option>
		<option value="IPA">IPA</option>
		<option value="IPS">IPS</option>
		</select>
</tr>
<tr>
	<td>Judul Topik <span class="error">*</span></td>
	<td><input class="textbox" type="text" name="judul_topik" maxlength="500" required></td>
</tr>
<tr>
	<td valign="top">Isi Topik <span class="error">*</span></td>
	<td><textarea name="isi_topik" id="loko" style='width: 400px; height: 350px;'></textarea></td>
</tr>
<tr>
	<td></td>
	<td><button class="btn btn-primary" type="submit"> Post</button> <button class="btn btn-danger" onclick="self.history.back()"> Batal</button></td>
</tr>
</table>
</form>
<?php
break;
case "detail_topik":
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-comment"></span> Detail Topik</b>
<hr>
<?php
$id = $_GET['id'];
$query = mysql_query ("SELECT b.id_topik,
							  a.nama,
							  a.foto,
							  b.judul_topik,
							  b.tgl_posting,
							  b.jam_posting,
							  b.isi_topik,
							  b.jumlah_tanggapan
						FROM 
							  siswa a,
							  topik b
						WHERE 
								a.nis = b.nis AND b.id_topik = '$id'");

while ($data = mysql_fetch_array ($query))
{
$tgl1   = tgl_indo($data[tgl_posting]);
?>
	<table class="table table-striped">
	<tr>
        <td colspan="3" class="judul"><?php echo $data[judul_topik];?></td>
	</tr>
	<tr>
    <?php
	if ($data[foto]=="")
	{
	?>
    	<td valign="justify" class="isi"><img src="../admin/modul/mod_siswa/foto/profile-icon.png" class="avatar" width="50px" height="50px" /> <?php echo $data[isi_topik];?></td>
    <?php
    }
    else
	{
	?>
     	<td valign="justify" class="isi"><img src="../admin/modul/mod_siswa/foto/<?php echo $data[foto];?>" class="avatar" width="50px" height="50px" /><?php echo $data[isi_topik];?></td>
     <?php
	 }
	 ?>
     </tr>
     <tr>
        <td class="isi_kecil"> Oleh: <?php echo $data[nama];?>  Pada : <?php echo $tgl1;?> Jam: <?php echo $data[jam_posting];?> </td>  
	</tr>
	<tr>
		<td class="judul"><span class="glyphicon glyphicon-thumbs-up"></span> <?php echo $data[jumlah_tanggapan];?> Tangapan</td>
	</tr>
	<tr>
	<?php
		$reply = mysql_query ("SELECT 
										a.id_topik,
										a.tgl_posting,
										a.jam_posting,
										a.isi,
										b.foto,
										b.nama
								FROM 
										tanggapan a, 
										siswa b
								WHERE a.nis = b.nis AND a.id_topik = '$id' ORDER BY a.id_tanggapan ASC");
		while ($dt = mysql_fetch_assoc ($reply))
		{
		$tgl2   = tgl_indo($dt[tgl_posting]);
			?>
			<td class="isi_kecil">Oleh: <?php echo $dt['nama'];?> Tanggal: <?php echo $tgl2;?> Jam: <?php echo $dt['jam_posting'];?> WIB</td>
		<tr>
        <?php
		if ($dt[foto]=="")
		{
		?>
			<td colspan="2" valign="top" class="isi"><img src="../admin/modul/mod_siswa/foto/profile-icon.png" class="avatar" width="32" height="32" /> <?php echo $dt[isi];?></td>
         <?php
		 }
		 else
		 {
		 ?>
         	<td colspan="2" valign="top" class="isi"><img src="../admin/modul/mod_siswa/foto/<?php echo $dt[foto];?>" class="avatar" width="32" height="32" /> <?php echo $dt[isi];?></td>
         <?php
		 }
		 ?>
		</tr>
		<?php
		}
		?>
		</tr>
<?php
}
echo"</table>";
echo"<h3>Beri Tanggapan</h3>";
$reply2 = mysql_query ("SELECT * FROM topik WHERE id_topik = '$id'");
$row = mysql_fetch_array ($reply2);
echo"<form action='$aksi/?module=forum&action=tambah' method='post'>";
echo"<input type=hidden name=id_topik value=$row[id_topik]>";
?>
<table class="table table-striped">
	<tr>
		<td><textarea name="isi" id="loko" style='width: 640px; height: 350px;'></textarea></td>
	</tr>
	<tr>
	<td><button class="btn btn-primary" type="submit"> Post</button> <button type="button" class="btn btn-danger" onclick="self.history.back()"> Batal</button></td>
	</tr>
</table>
</form>
<?php
break;
}
?>