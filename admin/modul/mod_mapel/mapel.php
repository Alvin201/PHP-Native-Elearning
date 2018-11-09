<?php
$aksi="modul/mod_mapel/aksi_mapel.php";
switch($_GET[action])
{
  default:
?>
<hr>
<h4><span class="glyphicon glyphicon-book"></span> Data Mata Pelajaran</h4>
<hr>
<?php
echo"
<button class='btn btn-success' onclick=\"window.location.href='?module=mapel&action=tambah';\"><span class='glyphicon glyphicon-plus'></span> Tambah Mata Pelajaran</button>
<br/>
<br/>";
//tampil mapel
?>
<table class="table table-striped">
<tr class='judul'>
		<th>No</th>
		<th>Kode Mata Pelajaran</th>
		<th>Nama Mata Pelajaran</th>
        <th colspan="2" style="text-align:center;">Aksi</th>
</tr>
<?php
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM mapel");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$query = mysql_query("SELECT * FROM mapel ORDER BY kode_mapel DESC LIMIT $start, $per_hal");
$no = 1;
while ($row = mysql_fetch_array ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[0]</td>
	<td>$row[1]</td>
	<td><center><a href=?module=mapel&action=edit&id=$row[0]><button class='btn btn-primary'><span class='glyphicon glyphicon-pencil'></span> Edit</button></a></center></td>
	<td><center><a href=\"$aksi/?module=mapel&action=hapus&id=$row[0]\" onClick=\" return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><button class='btn btn-primary'><span class='glyphicon glyphicon-trash'></span> Hapus</button></a></center></td>
</tr>
";
$no++;
}
?>
</table>
<ul class="pagination">
	<li><a href="?module=mapel&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=mapel&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=mapel&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>
<?php
break;

//tambah siswa
case "tambah":
?>
<hr>
<h4><span class="glyphicon glyphicon-book"></span> Tambah Data Mata Pelajaran</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
//automation
$query = mysql_query ("SELECT MAX(kode_mapel) AS kode FROM mapel");
		  $r = mysql_fetch_array ($query);
		  $kode = $r['kode'];
		  $tambah = (int) substr ($kode,3,4);
		  $next = $tambah+1;
		 $id ="MP-".sprintf("%04s", $next);
?>
<?php
echo"<form id='form1' method='post' action='$aksi?module=mapel&action=input' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
    <tr>
    <td><b>Kode Mapel</b></td>
    <td><input name="kode_mapel" value="<?php echo $id;?>" type="text" maxlength="7" readonly="readonly"></td>
    </tr>
	
    <tr>
    <td><b>Nama Mapel</b></td>
    <td><input name="nama_mapel" type="text" maxlength="50" class="required"></td>
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
//welcome
$query2 = mysql_query ("SELECT * FROM mapel WHERE kode_mapel = '$_GET[id]'");
$rows = mysql_fetch_array ($query2);
?>
<hr>
<h4><span class="glyphicon glyphicon-book"></span> Edit Data Mata Pelajaran</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
echo"<form id='form1' method='post' action='$aksi?module=mapel&action=update' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
    <input name="kode_mapel" value="<?php echo $rows[kode_mapel];?>" type="hidden">
	
    <tr>
    <td><b>Nama Mapel</b></td>
    <td><input name="nama_mapel" id="nama_mapel" type="text" maxlength="50" value="<?php echo $rows[nama_mapel];?>" class="required"></td>
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