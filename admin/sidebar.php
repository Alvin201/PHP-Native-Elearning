<?php
session_start();
$query = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
$data = mysql_fetch_array($query);
?>
<input type="hidden" value="<?php echo $data[level];?>">
<?php
if ($data[level] == 'Admin')
{
?>
<div class='nav-container'>
			<ul class='nav nav-left'>
			<li><a href="?module=beranda" class="judul"><img src="../icon/32x32/Home.png" width="24px" height="24px"> Beranda</a></li>
			<li><a href="?module=siswa" class="judul"><img src="../icon/32x32/Web designer.png" width="24px" height="24px"> Data Siswa</a></li>
			<li><a href="?module=mapel" class="judul"><img src="../icon/32x32/Scenario.png" width="24px" height="24px"> Data Mapel</a></li>
			<li><a href="?module=soal" class="judul"><img src="../icon/32x32/To do list.png" width="24px" height="24px"> Data Soal</a></li>
			<li><a href="?module=nilai" class="judul"><img src="../icon/32x32/favourites.png" width="24px" height="24px"> Daftar Nilai</a></li>
			<li><a href="?module=data-forum" class="judul"><img src="../icon/32x32/Hints.png" width="24px" height="24px"> Lihat Forum</a></li>
			<li><a href="?module=admin" class="judul"><img src="../icon/32x32/Work area.png" width="24px" height="24px"> Data Admin</a><li>
			<li><a href="?module=gantipassword" class="judul"><img src="../icon/32x32/Key.png" width="24px" height="24px"> Ganti Password</a></li>
			<li><a href="logout.php" class="judul"><img src="../icon/32x32/Exit.png" width="24px" height="24px"> Keluar</a></li>
		</ul>
</div>
<?php
}
else if ($data[level] == 'Guru IPA')
{
?>
<div class='nav-container'>
			<ul class='nav nav-left'>
			<li><a href="?module=beranda" class="judul"><img src="../icon/32x32/Home.png" width="24px" height="24px"> Beranda</a></li>
			<li><a href="?module=soal" class="judul"><img src="../icon/32x32/To do list.png" width="24px" height="24px"> Data Soal</a></li>
			<li><a href="?module=nilai" class="judul"><img src="../icon/32x32/favourites.png" width="24px" height="24px"> Daftar Nilai</a></li>
			<li><a href="?module=data-forum" class="judul"><img src="../icon/32x32/Hints.png" width="24px" height="24px"> Lihat Forum</a></li>
			<li><a href="?module=gantipassword" class="judul"><img src="../icon/32x32/Key.png" width="24px" height="24px"> Ganti Password</a></li>
			<li><a href="logout.php" class="judul"><img src="../icon/32x32/Exit.png" width="24px" height="24px"> Keluar</a></li>
		</ul>
</div>
<?php
}
else if ($data[level] == 'Guru IPS')
{
?>
<div class='nav-container'>
			<ul class='nav nav-left'>
			<li><a href="?module=beranda" class="judul"><img src="../icon/32x32/Home.png" width="24px" height="24px"> Beranda</a></li>
			<li><a href="?module=soal" class="judul"><img src="../icon/32x32/To do list.png" width="24px" height="24px"> Data Soal</a></li>
			<li><a href="?module=nilai" class="judul"><img src="../icon/32x32/favourites.png" width="24px" height="24px"> Daftar Nilai</a></li>
			<li><a href="?module=data-forum" class="judul"><img src="../icon/32x32/Hints.png" width="24px" height="24px"> Lihat Forum</a></li>
			<li><a href="?module=gantipassword" class="judul"><img src="../icon/32x32/Key.png" width="24px" height="24px"> Ganti Password</a></li>
			<li><a href="logout.php" class="judul"><img src="../icon/32x32/Exit.png" width="24px" height="24px"> Keluar</a></li>
		</ul>
</div>
<?php
}
else if ($data[level] == 'TU')
{
?>
<div class='nav-container'>
			<ul class='nav nav-left'>
			<li><a href="?module=beranda" class="judul"><img src="../icon/32x32/Home.png" width="24px" height="24px"> Beranda</a></li>
			<li><a href="?module=siswa" class="judul"><img src="../icon/32x32/Web designer.png" width="24px" height="24px"> Data Siswa</a></li>
			<li><a href="?module=mapel" class="judul"><img src="../icon/32x32/Scenario.png" width="24px" height="24px"> Data Mapel</a></li>
			<li><a href="?module=soal" class="judul"><img src="../icon/32x32/To do list.png" width="24px" height="24px"> Data Soal</a></li>
			<li><a href="?module=nilai" class="judul"><img src="../icon/32x32/favourites.png" width="24px" height="24px"> Daftar Nilai</a></li>
			<li><a href="?module=admin" class="judul"><img src="../icon/32x32/Work area.png" width="24px" height="24px"> Data Admin</a><li>
			<li><a href="?module=gantipassword" class="judul"><img src="../icon/32x32/Key.png" width="24px" height="24px"> Ganti Password</a></li>
			<li><a href="logout.php" class="judul"><img src="../icon/32x32/Exit.png" width="24px" height="24px"> Keluar</a></li>
		</ul>
</div>
<?php
}
?>