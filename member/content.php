<?php
if ($_GET['module']=='beranda')
{
$tampil = mysql_query ("SELECT * FROM siswa WHERE nis = '$_SESSION[nis]'");
while ($data = mysql_fetch_array ($tampil))
{
	include ("modul/mod_beranda/beranda.php");
}
}
else if ($_GET['module']=='learning')
{
	include ("modul/mod_learning/learning.php");
}
else if ($_GET['module']=='foto')
{
	include ("modul/mod_foto/foto.php");
}
else if ($_GET['module']=='password')
{
	include ("modul/mod_password/password.php");
}
else if ($_GET['module']=='tanya_jawab_guru')
{
	include ("modul/mod_tanya_jawab/tanya_jawab_guru.php");
}
else if ($_GET['module']=='forum')
{
	include ("modul/mod_forum/forum.php");
}
else if ($_GET['module']=='teman')
{
	include ("modul/mod_teman/teman.php");
}
else if ($_GET['module']=='hasilcaritopik')
{
	include ("modul/mod_cari_topik/cari_topik.php");
}
else if ($_GET['module']=='hasilcariteman')
{
	include ("modul/mod_cari_teman/cari_teman.php");
}
else
{
	echo"<h2>MODUL TIDAK ADA</h2>";
}
?>