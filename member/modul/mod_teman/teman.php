<?php
$aksi="modul/mod_teman/aksi_teman.php";
switch($_GET[action])
{
  default:
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-globe"></span> Semua Teman</b>
<hr>
<?php
//paging
$per_hal = 8;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM siswa");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$show = mysql_query ("SELECT * FROM siswa ORDER BY nis DESC LIMIT $start, $per_hal");
?>
<b>Cari teman untuk melihat keaktifan mereka dan saling berbagi</b>
<table class="table table-striped">
  <tr>
	<?php
	$jml_kolom=4;
	$cnt = 0;
   
  while($data=mysql_fetch_array($show))
  {
      if ($cnt >= $jml_kolom) 
      {
          echo "<tr></tr>";
          $cnt = 0;
    }
 
    $cnt++;
  
 
  ?>
 
     <td align="center" class="judul">       
       <div>
	   <?php
	   if ($data['foto']=='')
	   {
	   ?>
	   <img src="../admin/modul/mod_siswa/foto/profile-icon.png" class="avatar" width='50px' height='50px'/>
	   <?php
	   }
	   else
	   {
	   ?>
		<img src="../admin/modul/mod_siswa/foto/<?php echo $data[foto];?>" class="avatar" width='50px' height='50px'/>
		<?php
		}
		?>
       </div>     
       <div>
          <a href="?module=teman&action=profil&id=<?php echo $data['nis'];?>"><b class="title"><?php echo $data['nama']; ?></b></a>
       </div>  
	   <div>
         <b class="title">Kelas <?php echo $data['kelas']; ?></b>
       </div>    
     </td>
      
  <?php
  }
  
  ?>
 
  </tr>
</table>
<ul class="pagination">
	<li><a href="?module=teman&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=teman&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=teman&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>
<?php
break;
case "profil":
$tampil = mysql_query ("SELECT * FROM siswa WHERE nis = '$_GET[id]'");
$data = mysql_fetch_array ($tampil);
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-globe"></span> Profil <?php echo $data['nama'];?></b>
<hr>
<table class="table table-striped">
	<tr>
		<td rowspan="6" align="center">
	<?php
	   if ($data['foto']=='')
	   {
	   ?>
	   <img src="../admin/modul/mod_siswa/foto/profile-icon.png" width='250px' height='300px'/>
	   <?php
	   }
	   else
	   {
	   ?>
		<img src="../admin/modul/mod_siswa/foto/<?php echo $data[foto];?>" width='250px' height='300px'/>
	   <?php
	   }
	  ?>
		</td><td><span class="glyphicon glyphicon-credit-card"></span></td><td><?php echo $data['nis'];?></td>
	</tr>
	<tr>
		<td><span class="glyphicon glyphicon-bookmark"></span></td><td><?php echo $data['kelas'];?></td>
	</tr>
	<tr>
		<td><span class="glyphicon glyphicon-user"></span></td><td><?php echo $data['jenis_kelamin'];?></td>
	</tr>
	<tr>
		<td><span class="glyphicon glyphicon-calendar"></span></td><td><?php echo $data['tgl_lahir'];?></td>
	</tr>
	<tr>
		<td><span class="glyphicon glyphicon-map-marker"></span></td><td><?php echo $data['alamat'];?></td>
	</tr>
	<tr>
		<td><span class="glyphicon glyphicon-earphone"></span></td><td><?php echo $data['no_telp'];?></td>
	</tr>
</table>
<hr>
<b class="title"><span class="glyphicon glyphicon-comment"></span> Topik-Topik Oleh <?php echo $data['nama'];?></b>
<hr>
<?php
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM topik");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$topik = mysql_query ("SELECT * FROM topik WHERE nis = '$_GET[id]' ORDER BY nis DESC LIMIT $start, $per_hal");
while($t=mysql_fetch_array($topik)){
		$tgl = tgl_indo($t[tgl_posting]);
		echo "<table class='table table-striped'>
				<tr>
					<td class=isi_kecil>Diposting Pada $tgl Jam $t[jam_posting] Dalam Kategori : $t[kategori]</td>
				</tr>
				<tr>
					<td class=judul><a href=?module=forum&action=detail_topik&id=$t[id_topik]>$t[judul_topik]</a></td>
				</tr>
				<tr><td class=isi>";
					
				// Tampilkan hanya sebagian isi berita 
				$isi_berita = nl2br($t['isi_topik']);
				$isi = substr($isi_berita,0,480); // ambil sebanyak 480 karakter
				$isi = substr($isi_berita,0,strrpos($isi," ")); // spasi antar kalimat

				echo "$isi ... <a href=?module=forum&action=detail_topik&id=$t[id_topik]>Selengkapnya</a>
				<br><br><hr color=white></td></tr>
				<tr>
					<td class=isi_kecil><a href=?module=forum&action=detail_topik&id=$t[id_topik]><span class='glyphicon glyphicon-thumbs-up'></span> $t[jumlah_tanggapan] Tanggapan</a></td></tr></table>";
				}
?>
<ul class="pagination">
	<li><a href="?module=teman&action=profil&id=<?php echo $_GET['id'];?>&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=teman&action=profil&id=<?php echo $_GET['id'];?>&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=teman&action=profil&id=<?php echo $_GET['id'];?>&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>
<?php
break;
}
?>