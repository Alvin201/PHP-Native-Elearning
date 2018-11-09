<?php
session_start();
$aksi="modul/mod_password/aksi_password.php";
switch($_GET[action])
{
  default:
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-lock"></span> Ubah Password</b>
<hr>
<b>Silakan Anda mengganti password untuk keamanan dan kenyamanan</b>
<?php
$query = mysql_query ("SELECT * FROM siswa WHERE nis = '$_GET[id]'");
$data = mysql_fetch_array ($query);
echo"<form action='$aksi/?module=password&action=update' method='post' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
<input name="nis" value="<?php echo $data[nis];?>" type="hidden">
	<tr>
	<td>Password Baru</td><td><input type="password" name="password" maxlength="10" required></td>
	</tr>
	<tr>
	<td>Konfirmasi Password Baru</td><td><input type="password" name="konfirmasi" maxlength="10" required></td>
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