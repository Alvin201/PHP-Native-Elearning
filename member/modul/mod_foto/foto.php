<?php
session_start();
$aksi="modul/mod_foto/aksi_foto.php";
switch($_GET[action])
{
  default:
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-picture"></span> Ganti Foto</b>
<hr>
<b>Silakan Anda mengganti foto untuk dijadikan Avatar di profil</b>
<?php
$query = mysql_query ("SELECT * FROM siswa WHERE nis = '$_GET[id]'");
$data = mysql_fetch_array ($query);
echo"<form action='$aksi/?module=foto&action=update' method='post' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
<input name="nis" value="<?php echo $data[nis];?>" type="hidden">
	<tr>
	<td>Ganti Foto</td><td><input type="file" name="foto" required></td>
	</tr>
	<tr>
	<td><button class="btn btn-primary" type="submit"> Update</button> <button class="btn btn-danger" onclick="self.history.back()"> Batal</button></td>
	<td></td>
	</tr>
</table>
</form>
<?php
break;
}
?>