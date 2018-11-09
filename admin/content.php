<?php
if ($_GET['module']=='beranda')
{
echo"
<hr>
<h4><span class='glyphicon glyphicon-home'></span> Beranda</h4>
<hr>";
$query = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
while ($row = mysql_fetch_array ($query))
{	
echo"<h2 class='judul'><p>Hallo $row[nama], selamat datang di halaman Administrator Pengolahan Data E-Learning. Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola data anda. </p></h2>";
}
}
else if ($_GET['module']=='siswa')
{
	include ("modul/mod_siswa/siswa.php");
}
else if ($_GET['module']=='mapel')
{
	include ("modul/mod_mapel/mapel.php");
}
else if ($_GET['module']=='soal')
{
	include ("modul/mod_soal/soal.php");
}
else if ($_GET['module']=='nilai')
{
	include ("modul/mod_nilai/nilai.php");
}
else if ($_GET['module']=='data-forum')
{
	include ("modul/mod_forum/forum.php");
}
else if ($_GET['module']=='admin')
{
	include ("modul/mod_admin/admin.php");
}
else if ($_GET['module']=='gantipassword')
{
	include ("modul/mod_password/password.php");
}
else
{
	echo"<h2>MODUL TIDAK ADA</h2>";
}
?>