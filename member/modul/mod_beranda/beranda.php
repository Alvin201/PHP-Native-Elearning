<?php
$aksi="modul/mod_beranda/aksi_beranda.php";
switch($_GET[action])
{
  default:
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-user"></span> Data Diri</b>
<hr>
<?php
$show = mysql_query ("SELECT * FROM siswa WHERE nis = '$_SESSION[nis]'");
$data = mysql_fetch_array ($show);
?>
<b>Berikut adalah Data Diri Anda, Mohon dicek kembali:</b>
<table class="table table-striped">
<tr>
	<td><b>NIS<b></td>
	<td><?php echo $data['0'];?></td>
</tr>
<tr>
	<td><b>Nama Lengkap<b></td>
	<td><?php echo $data['1'];?></td>
</tr>
<tr>
	<td><b>Kelas<b></td>
	<td><?php echo $data['2'];?></td>
</tr>
<tr>
	<td><b>Jenis Kelamin<b></td>
	<td><?php echo $data['3'];?></td>
</tr>
<tr>
	<td><b>Tanggal Lahir<b></td>
	<td><?php echo $data['4'];?></td>
</tr>
<tr>
	<td><b>Alamat<b></td>
	<td><?php echo $data['5'];?></td>
</tr>
<tr>
	<td><b>No Telp<b></td>
	<td><?php echo $data['6'];?></td>
</tr>
</table>
<?php
break;
}
?>