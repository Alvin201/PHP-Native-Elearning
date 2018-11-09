<?php
$aksi="modul/mod_siswa/aksi_siswa.php";
switch($_GET[action])
{
  default:
?>
<hr>
<h4><span class="glyphicon glyphicon-user"></span> Data Siswa</h4>
<hr>
<form action="importsiswa.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table class="table table-striped">
<tr>
	<td><b>Upload Dari Excel</b></td>
	<td><input type="file" name="upload"/></td>
</tr>
<tr>
	<td></td><td><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-cloud-upload"></span> Unggah</button></td>
</tr>
</table>
</form>
<hr>
<?php
echo"
<button class='btn btn-success' onclick=\"window.location.href='?module=siswa&action=tambah';\"><span class='glyphicon glyphicon-plus'></span> Tambah Data Siswa</button>
<br/>
<br/>";
//tampil siswa
?>
<table class="table table-striped">
<tr class="judul">
		<th>No</th>
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>JK</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>Telp</th>
        <th colspan="3" style="text-align:center;">Aksi</th>
</tr>
<?php
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM siswa");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$query = mysql_query("SELECT * FROM siswa ORDER BY nis DESC LIMIT $start, $per_hal");
$no = 1;
while ($row = mysql_fetch_array ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[0]</td> 
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	<td>$row[4]</td>
	<td>$row[5]</td>
	<td>$row[6]</td>
	<td><center><a href=?module=siswa&action=edit&id=$row[0]><button class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span></button></a></center></td>
	<td><center><a href=\"$aksi/?module=siswa&action=hapus&id=$row[0]\" onClick=\" return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><button class='btn btn-primary'><span class='glyphicon glyphicon-trash'></span></button></a></center></td>
	<td><a href=?module=siswa&action=foto&id=$row[0]><center><button class='btn btn-primary'><span class='glyphicon glyphicon-picture'></span></button></a></center></td>
</tr>
";
$no++;
}
?>
</table>
<ul class="pagination">
	<li><a href="?module=siswa&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=siswa&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=siswa&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>
<?php
break;

//tambah siswa
case "tambah":
?>
<hr>
<h4><span class="glyphicon glyphicon-user"></span> Tambah Data Siswa</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
echo"<form id='form1' method='post' action='$aksi?module=siswa&action=input' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
    <tr>
    <td><b>NIS</b></td>
    <td><input name="nis" id="nis" class="form-div" type="text" maxlength="8"></td>
    </tr>
	
    <tr>
    <td><b>Nama</b></td>
    <td><input name="nama" id="nama" class="form-div" type="text" maxlength="50">
    </tr>
	
    <tr>
    <td><b>Kelas</b></b>
    <td><select name="kelas" id="kelas" class="form-div">
		<option value="">-Pilih Salah Satu-</option>
		<option value="X 1">X-1</option>
		<option value="X-2">X-2</option>
		<option value="X-2">X-3</option>
	</select></td>
    </tr>
	
    <tr>
    <td><b>Jenis Kelamin</b></td>
	<td><input type="radio" name="jenis_kelamin" value="L">Laki-Laki
	<input type="radio" name="jenis_kelamin" value="P">Perempuan
    </td>
	</tr>	
	
    <tr>
    <td><b>Tanggal Lahir</b></td>
    <td><input type="text" id="tanggal" name="tgl_lahir"></td>
    </tr>
	
    <tr>
    <td><b>Alamat</b></td>
    <td><textarea name="alamat" cols="50" maxlength="50" id="alamat" class="form-div"></textarea></td>
    </tr>
	
	<tr>
    <td><b>No Telp</b></td>
    <td><input name="no_telp" type="text" maxlength="12" id="no_telp" class="form-div"></td>
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
<h4><span class="glyphicon glyphicon-user"></span> Edit Data Siswa</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
//welcome
$query2 = mysql_query ("SELECT * FROM siswa WHERE nis = '$_GET[id]'");
$rows = mysql_fetch_array ($query2);
?>
<?php
echo"<form id='form1' method='post' action='$aksi?module=siswa&action=update' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
    <input name="nis" type="hidden" value="<?php echo $rows[nis];?>">
	
    <tr>
    <td><b>Nama</b></td>
    <td><input name="nama" type="text" value="<?php echo $rows[nama];?>" maxlength="50" class="required"></td>
    </tr>
	
    <tr>
    <td><b>Kelas</b></td>
    <td><select name="kelas" class="required">
		<option value="<?php echo $rows[kelas];?>"><?php echo $rows[kelas];?></option>
		<option value="X 1">X-1</option>
		<option value="X-2">X-2</option>
		<option value="X-2">X-3</option>
	</select></td>
    </tr>
	
    <tr>
    <td><b>Jenis Kelamin</b></td>
	<?php
	if ($rows[jenis_kelamin]=='L')
	{
	?>
	<td><input type="radio" name="jenis_kelamin" value="L" checked required>Laki-Laki
	<input type="radio" name="jenis_kelamin" value="P" required>Perempuan</td>
	<?php
	}
	else 
	{
	?>
	<td><input type="radio" name="jenis_kelamin" value="L" required>Laki-Laki
	<input type="radio" name="jenis_kelamin" value="P" checked required>Perempuan</td>
	<?php
	}
	?>
    </tr>  
	
    <tr>
    <td><b>Tanggal Lahir</b></td>
    <td><input type="text" id="tanggal" name="tgl_lahir" value="<?php echo $rows[tgl_lahir];?>" required></td>
    </tr>
	
    <tr>
    <td><b>Alamat</b></td>
    <td><textarea name="alamat" cols="50" maxlength="50" class="required"><?php echo $rows[alamat];?></textarea></td>
    </tr>
	
	<tr>
    <td><b>No Telp</b></td>
    <td><input name="no_telp" type="text" value="<?php echo $rows[no_telp];?>" maxlength="12" class="required number"></td>
    </tr>
	
	<tr>
	<td></td>
    <td><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
    </tr>
</table>
</form>
<?php
break;
case "foto":
?>
<hr>
<h4><span class="glyphicon glyphicon-user"></span> Foto Data Siswa</h4>
<hr>
<?php
$query2 = mysql_query ("SELECT * FROM siswa WHERE nis = '$_GET[id]'");
while ($data = mysql_fetch_array ($query2))
{
?>
<table class="table table-striped">
	<tr>
	<?php
	if ($data[foto]=="")
	{
	?>
		<td><img src="modul/mod_siswa/foto/profile-icon.png" width="250px" height="300px"></td>
	<?php
	}
	else
	{
	?>
		<td><img src="modul/mod_siswa/foto/<?php echo $data[foto];?>" width="250px" height="300px"></td>
	<?php
	}
	?>
	</tr>
	<tr>
		<td><button class="btn btn-info" onclick=self.history.back()><span class="glyphicon glyphicon-share-alt"></span> Kembali</button></td>
	</tr>
</table>
<?php
}
}
?>