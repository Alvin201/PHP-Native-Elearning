<b class="title"><span class="glyphicon glyphicon-search"></span> Cari Teman</b><br>
<p style="text-align:justify">Gunakan fasilitas ini untuk mencari teman guna melihat keaktifan mereka dan saling berbagi topik</p>
<form action="?module=hasilcariteman" method="post">
	<input class="search2" type="text" name="kata" placeholder="Cari Teman..."><br><br>
	<input class="button2" type="submit" value="Cari">	
</form>
<br>
<hr>
<div class="arrowlistmenu">
<ul>
<?php
session_start();
$query = mysql_query ("SELECT * FROM siswa ORDER BY nis LIMIT 6");
while ($data = mysql_fetch_array ($query))
{
?>
<?php
if ($data[foto]=="")
{
?>
	<li><img src="../admin/modul/mod_siswa/foto/profile-icon.png" class="avatar" width='50px' height='50px'/><a href="?module=teman&action=profil&id=<?php echo $data['nis'];?>" rel="popover" title="<?php echo $data['nama'];?>" data-content="<?php echo $data['kelas'];?>"> <?php echo $data['nama'];?></a></li>
	
<?php
}
else
{
?>
	<li><img src="../admin/modul/mod_siswa/foto/<?php echo $data[foto];?>" class="avatar" width='50px' height='50px'/><a href="?module=teman&action=profil&id=<?php echo $data['nis'];?>" rel="popover" title="<?php echo $data['nama'];?>" data-content="<?php echo $data['kelas'];?>"> <?php echo $data['nama'];?></a></li>
	
<?php
}
}
?>
</ul>
<a href="?module=teman"><button class="btn btn-primary"><span class="glyphicon glyphicon-exclamation-sign"></span> Lihat Lebih</button></a>
</div>
	
