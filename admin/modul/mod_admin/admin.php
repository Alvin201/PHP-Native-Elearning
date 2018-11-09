<?php
$aksi="modul/mod_admin/aksi_admin.php";
switch($_GET[action])
{
  default:
?>
<hr>
<h4><span class="glyphicon glyphicon-globe"></span> Data Admin</h4>
<hr>
<?php
echo"<button class='btn btn-success' type=button onclick=\"window.location.href='?module=admin&action=tambah';\"><span class='glyphicon glyphicon-plus'></span> Tambah Data Admin</button>
<br/>
<br/>";
?>
<table class="table table-striped">
<tr class='judul'>
		<th>NO</th>
		<th>ID ADMIN</th>
		<th>NAMA</th>
		<th>LEVEL</th>
		<th colspan='2' style='text-align:center;'>AKSI</th>
</tr>
<?php
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM admin");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$query = mysql_query ("SELECT * FROM admin ORDER BY id_admin DESC LIMIT $start, $per_hal");
$no = 1;
while ($row = mysql_fetch_array ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[id_admin]</td>
	<td>$row[nama]</td>
	<td>$row[level]</td>
	<td><center><a href=?module=admin&action=edit&id=$row[0]><button class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span> Edit</button></a></center></td>";
	if ($row['level'] == 'Admin')
	{
	echo"

	<td><center><a href=\"$aksi/?module=admin&action=hapus&id=$row[0]\" onClick=\" return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><button class='btn btn-primary'><span class='glyphicon glyphicon-trash'></span> Hapus</button></a></center></td>";
	}
	
echo"</tr>
";
$no++;
}
?></table>
<ul class="pagination">
	<li><a href="?module=admin&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=admin&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=admin&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>

<?php
break;

//tambah 
case "tambah":
?>
<hr>
<h4><span class="glyphicon glyphicon-globe"></span> Tambah Data Admin</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
//automation
$query = mysql_query ("SELECT MAX(id_admin) AS kode FROM admin");
		  $r = mysql_fetch_array ($query);
		  $kode = $r['kode'];
		  $tambah = (int) substr ($kode,4,8);
		  $next = $tambah+1;
		 $id = "ADM-".sprintf("%04s", $next);
?>
<?php
echo"<form id='form1' method='post' action='$aksi?module=admin&action=input' enctype='multipart/form-data'>";
?>
<table class='table table-striped'>
    <tr>
    <td><b>ID Admin</b></td>
    <td><input name="id_admin" value="<?php echo $id;?>" type="text" maxlength="8" readonly="readonly"></td>
    </tr>
	
    <tr>
    <td><b>Nama Admin</b></td>
    <td><input name="nama" id="nama" type="text" maxlength="50"></td>
    </tr>
	
	<tr>
    <td><b>Password</b></td>
    <td><input name="password" id="password" type="password" maxlength="6"></td>
    </tr>
	
    <tr>
    <td><b>Akses Level</b></td>
    <td><select name="level" id="level">
		<option value="">-Pilih Salah Satu-</option>
		<option value="Admin">Admin</option>
		<option value="TU">TU</option>
		<option value="Guru IPA">Guru IPA</option>
		<option value="Guru IPS">Guru IPS</option>
	</select></td>
    </tr>
	
	<tr>
	<td></td>
    <td><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
    </tr>
</table>
</form>
<?php
break;
//edit
case "edit":
?>
<hr>
<h4><span class="glyphicon glyphicon-globe"></span> Edit Data Admin</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
$query2 = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_GET[id]'");
$rows = mysql_fetch_array ($query2);
?>
<?php
echo"<form id='form1' method='post' action='$aksi?module=admin&action=update' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
    <input name="id_admin" value="<?php echo $rows[id_admin];?>" type="hidden">
	
    <tr>
    <td><b>Nama Admin</b></td>
    <td><input name="nama" id="nama" type="text" maxlength="50" value="<?php echo $rows[nama];?>"></td>
    </tr>
	
	
    <tr>
    <td><b>Akses Level</b></td>
    <td><select name="level" id="level">
		<option value="<?php echo $rows[level];?>"><?php echo $rows[level];?></option>
		<option value="Admin">Admin</option>
		<option value="TU">TU</option>
		<option value="Guru IPA">Guru IPA</option>
		<option value="Guru IPS">Guru IPS</option>
	</select></td>
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