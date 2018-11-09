<?php
session_start();
$aksi="modul/mod_password/aksi_password.php";
switch($_GET[action])
{
  default:
?>
<hr>
<h4><span class="glyphicon glyphicon-lock"></span> Ganti Password</h4>
<hr>
<?php
//welcome
$query = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
$rows = mysql_fetch_array ($query);
?>
<?php
echo"<form id='form1' method='post' action='$aksi?module=password&action=update' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
    <input name="id_admin" value="<?php echo $rows[id_admin];?>" type="hidden">
	
    <tr>
    <td><b>Password Baru</b></td>
    <td><input name="password" id="password" type="password" maxlength="6"></td>
    </tr>
	
	<tr>
    <td><b>Konfirmasi</b></td>
    <td><input name="konfirmasi" id="konfirmasi" type="password" maxlength="6"></td>
    </tr>
	
    <tr>
	<td></td>
    <td><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
    </tr>
</table>
</form>
<?php
break;
}
?>
