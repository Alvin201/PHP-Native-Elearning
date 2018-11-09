<?php
session_start();
$aksi="modul/mod_soal/aksi_soal.php";
switch($_GET[action])
{
  default:
?>
<hr>
<h4><span class="glyphicon glyphicon-th-list"></span> Data Soal</h4>
<hr>
<?php
$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
$data = mysql_fetch_array ($admin);
echo"<input type=hidden value=$data[level]>";
if ($data[level]== 'TU')
{

}
else
{
	echo"<button class='btn btn-success' onclick=\"window.location.href='?module=soal&action=tambah';\"><span class='glyphicon glyphicon-plus'></span> Tambah Data Soal</button>";
}
echo"<br/>
<br/>";
//Tampil Soal
?>
<table class="table table-striped">
<tr class='judul'>
		<th>No</th>
		<th>Kode Soal</th>
		<th>Mapel</th>
		<th>Pert.</th>
		<th>Tgl Mulai</th>
		<th>Tgl Selesai</th>
        <th colspan="4" style="text-align:center;">Aksi</th>
</tr>
<?php
if ($data[level]=='Guru IPA')
{
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM soal");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$ipa = 'IPA';
$query = mysql_query("SELECT a.kode_soal,
							 a.pertemuan,
							 b.nama_mapel,
							 a.tgl_mulai,
							 a.tgl_selesai,
							 a.jumlah_pertanyaan
					  FROM
							soal a,
							mapel b
					   WHERE
							a.kode_mapel = b.kode_mapel AND b.nama_mapel = '$ipa'
						ORDER BY
							a.kode_soal DESC LIMIT $start, $per_hal");					
$no = 1;
while ($row = mysql_fetch_array ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[kode_soal]</td>
	<td>$row[nama_mapel]</td>
	<td>$row[pertemuan]</td>
	<td>$row[tgl_mulai]</td>
	<td>$row[tgl_selesai]</td>
	<input type='hidden' value=$row[jumlah_pertanyaan]>
	<td>";
	$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
	$data = mysql_fetch_array ($admin);
	echo"<input type=hidden value=$data[level]>";
	if ($data[level]== 'TU')
	{
		echo"<center>Hanya Guru</center>";
	}
	else
	{
		echo"<center><a href=?module=soal&action=edit&id=$row[0]><span class='glyphicon glyphicon-edit'></span> Edit</a></center>";
	}
	echo"</td>";
	echo"<td>";
	$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
	$data = mysql_fetch_array ($admin);
	echo"<input type=hidden value=$data[level]>";
	if ($data[level]== 'TU')
	{
		echo"<center>Hanya Guru</center>";
	}
	else
	{
		echo"<center><a href=?module=soal&action=lihat_pertanyaan&id=$row[0]><span class='glyphicon glyphicon-search'></span> Lihat Pertanyaan</a></center>";
	}
	echo"</td>";
	echo"<td>";
	if ($row[jumlah_pertanyaan]==5)
	{
		echo"<center>Sudah Ada Pertanyaan</center>";
	}
	else
	{
		$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
		$data = mysql_fetch_array ($admin);
		echo"<input type=hidden value=$data[level]>";
		if ($data[level]=='TU')
		{
			echo"<center>Hanya Guru</center>";
		}
		else
		{
			echo"<center><a href=?module=soal&action=buat_pertanyaan&id=$row[0]><span class='glyphicon glyphicon-list-alt'></span> Buat Pertanyaan</a></center>";
		}
	}	
echo"</td>
<td>";
$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
$data = mysql_fetch_array ($admin);
echo"<input type=hidden value=$data[level]>";
if ($data[level]== 'TU')
{
	echo"<center><a href=cetak-laporan.php?id=$row[kode_soal]><span class='glyphicon glyphicon-print'></span> Cetak Nilai</a></center>";
}
else if ($data[level]== 'Admin')
{
	echo"<center><a href=cetak-laporan.php?id=$row[kode_soal]><span class='glyphicon glyphicon-print'></span> Cetak Nilai</a></center>";
}
else
{
	echo"<center>Hanya TU</center>";
}
echo"</td></tr>";
$no++;
}
}
else if ($data[level]=='Guru IPS')
{
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM soal");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$ips = 'IPS';
$query = mysql_query("SELECT a.kode_soal,
							 a.pertemuan,
							 b.nama_mapel,
							 a.tgl_mulai,
							 a.tgl_selesai,
							 a.jumlah_pertanyaan
					  FROM
							soal a,
							mapel b
					   WHERE
							a.kode_mapel = b.kode_mapel AND b.nama_mapel = '$ips'
						ORDER BY
							a.kode_soal DESC LIMIT $start, $per_hal");					
$no = 1;
while ($row = mysql_fetch_array ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[kode_soal]</td>
	<td>$row[nama_mapel]</td>
	<td>$row[pertemuan]</td>
	<td>$row[tgl_mulai]</td>
	<td>$row[tgl_selesai]</td>
	<input type='hidden' value=$row[jumlah_pertanyaan]>
	<td>";
	$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
	$data = mysql_fetch_array ($admin);
	echo"<input type=hidden value=$data[level]>";
	if ($data[level]== 'TU')
	{
		echo"<center>Hanya Guru</center>";
	}
	else
	{
		echo"<center><a href=?module=soal&action=edit&id=$row[0]><span class='glyphicon glyphicon-edit'></span> Edit</a></center>";
	}
	echo"</td>";
	echo"<td>";
	$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
	$data = mysql_fetch_array ($admin);
	echo"<input type=hidden value=$data[level]>";
	if ($data[level]== 'TU')
	{
		echo"<center>Hanya Guru</center>";
	}
	else
	{
		echo"<center><a href=?module=soal&action=lihat_pertanyaan&id=$row[0]><span class='glyphicon glyphicon-search'></span> Lihat Pertanyaan</a></center>";
	}
	echo"</td>";
	echo"<td>";
	if ($row[jumlah_pertanyaan]==5)
	{
		echo"<center>Sudah Ada Pertanyaan</center>";
	}
	else
	{
		$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
		$data = mysql_fetch_array ($admin);
		echo"<input type=hidden value=$data[level]>";
		if ($data[level]=='TU')
		{
			echo"<center>Hanya Guru</center>";
		}
		else
		{
			echo"<center><a href=?module=soal&action=buat_pertanyaan&id=$row[0]><span class='glyphicon glyphicon-list-alt'></span> Buat Pertanyaan</a></center>";
		}
	}	
echo"</td>
<td>";
$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
$data = mysql_fetch_array ($admin);
echo"<input type=hidden value=$data[level]>";
if ($data[level]== 'TU')
{
	echo"<center><a href=cetak-laporan.php?id=$row[kode_soal]><span class='glyphicon glyphicon-print'></span> Cetak Nilai</a></center>";
}
else if ($data[level]== 'Admin')
{
	echo"<center><a href=cetak-laporan.php?id=$row[kode_soal]><span class='glyphicon glyphicon-print'></span> Cetak Nilai</a></center>";
}
else
{
	echo"<center>Hanya TU</center>";
}
echo"</td></tr>";
$no++;
}
}
else if ($data[level]=='TU')
{
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM soal");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$query = mysql_query("SELECT a.kode_soal,
							 a.pertemuan,
							 b.nama_mapel,
							 a.tgl_mulai,
							 a.tgl_selesai,
							 a.jumlah_pertanyaan
					  FROM
							soal a,
							mapel b
					   WHERE
							a.kode_mapel = b.kode_mapel
						ORDER BY
							a.kode_soal DESC LIMIT $start, $per_hal");					
$no = 1;
while ($row = mysql_fetch_array ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[kode_soal]</td>
	<td>$row[nama_mapel]</td>
	<td>$row[pertemuan]</td>
	<td>$row[tgl_mulai]</td>
	<td>$row[tgl_selesai]</td>
	<input type='hidden' value=$row[jumlah_pertanyaan]>
	<td>";
	$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
	$data = mysql_fetch_array ($admin);
	echo"<input type=hidden value=$data[level]>";
	if ($data[level]== 'TU')
	{
		echo"<center>Hanya Guru</center>";
	}
	else
	{
		echo"<center><a href=?module=soal&action=edit&id=$row[0]><span class='glyphicon glyphicon-edit'></span> Edit</a></center>";
	}
	echo"</td>";
	echo"<td>";
	$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
	$data = mysql_fetch_array ($admin);
	echo"<input type=hidden value=$data[level]>";
	if ($data[level]== 'TU')
	{
		echo"<center>Hanya Guru</center>";
	}
	else
	{
		echo"<center><a href=?module=soal&action=lihat_pertanyaan&id=$row[0]><span class='glyphicon glyphicon-search'></span> Lihat Pertanyaan</a></center>";
	}
	echo"</td>";
	echo"<td>";
	if ($row[jumlah_pertanyaan]==5)
	{
		echo"<center>Sudah Ada Pertanyaan</center>";
	}
	else
	{
		$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
		$data = mysql_fetch_array ($admin);
		echo"<input type=hidden value=$data[level]>";
		if ($data[level]=='TU')
		{
			echo"<center>Hanya Guru</center>";
		}
		else
		{
			echo"<center><a href=?module=soal&action=buat_pertanyaan&id=$row[0]><span class='glyphicon glyphicon-list-alt'></span> Buat Pertanyaan</a></center>";
		}
	}	
echo"</td>
<td>";
$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
$data = mysql_fetch_array ($admin);
echo"<input type=hidden value=$data[level]>";
if ($data[level]== 'TU')
{
	echo"<center><a href=cetak-laporan.php?id=$row[kode_soal]><span class='glyphicon glyphicon-print'></span> Cetak Nilai</a></center>";
}
else if ($data[level]== 'Admin')
{
	echo"<center><a href=cetak-laporan.php?id=$row[kode_soal]><span class='glyphicon glyphicon-print'></span> Cetak Nilai</a></center>";
}
else
{
	echo"<center>Hanya TU</center>";
}
echo"</td></tr>";
$no++;
}
}
else if ($data[level]=='Admin')
{
//paging
$per_hal = 5;
$jumlah_record = mysql_query ("SELECT COUNT(*) FROM soal");
$jum = mysql_result($jumlah_record, 0);
$halaman = ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
$query = mysql_query("SELECT a.kode_soal,
							 a.pertemuan,
							 b.nama_mapel,
							 a.tgl_mulai,
							 a.tgl_selesai,
							 a.jumlah_pertanyaan
					  FROM
							soal a,
							mapel b
					   WHERE
							a.kode_mapel = b.kode_mapel
						ORDER BY
							a.kode_soal DESC LIMIT $start, $per_hal");					
$no = 1;
while ($row = mysql_fetch_array ($query))
{
echo"
<tr class='konten'>
	<td>$no</td>
	<td>$row[kode_soal]</td>
	<td>$row[nama_mapel]</td>
	<td>$row[pertemuan]</td>
	<td>$row[tgl_mulai]</td>
	<td>$row[tgl_selesai]</td>
	<input type='hidden' value=$row[jumlah_pertanyaan]>
	<td>";
	$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
	$data = mysql_fetch_array ($admin);
	echo"<input type=hidden value=$data[level]>";
	if ($data[level]== 'TU')
	{
		echo"<center>Hanya Guru</center>";
	}
	else
	{
		echo"<center><a href=?module=soal&action=edit&id=$row[0]><span class='glyphicon glyphicon-edit'></span> Edit</a></center>";
	}
	echo"</td>";
	echo"<td>";
	$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
	$data = mysql_fetch_array ($admin);
	echo"<input type=hidden value=$data[level]>";
	if ($data[level]== 'TU')
	{
		echo"<center>Hanya Guru</center>";
	}
	else
	{
		echo"<center><a href=?module=soal&action=lihat_pertanyaan&id=$row[0]><span class='glyphicon glyphicon-search'></span> Lihat Pertanyaan</a></center>";
	}
	echo"</td>";
	echo"<td>";
	if ($row[jumlah_pertanyaan]==5)
	{
		echo"<center>Sudah Ada Pertanyaan</center>";
	}
	else
	{
		$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
		$data = mysql_fetch_array ($admin);
		echo"<input type=hidden value=$data[level]>";
		if ($data[level]=='TU')
		{
			echo"<center>Hanya Guru</center>";
		}
		else
		{
			echo"<center><a href=?module=soal&action=buat_pertanyaan&id=$row[0]><span class='glyphicon glyphicon-list-alt'></span> Buat Pertanyaan</a></center>";
		}
	}	
echo"</td>
<td>";
$admin = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
$data = mysql_fetch_array ($admin);
echo"<input type=hidden value=$data[level]>";
if ($data[level]== 'TU')
{
	echo"<center><a href=cetak-laporan.php?id=$row[kode_soal]><span class='glyphicon glyphicon-print'></span> Cetak Nilai</a></center>";
}
else if ($data[level]== 'Admin')
{
	echo"<center><a href=cetak-laporan.php?id=$row[kode_soal]><span class='glyphicon glyphicon-print'></span> Cetak Nilai</a></center>";
}
else
{
	echo"<center>Hanya TU</center>";
}
echo"</td></tr>";
$no++;
}
}
?>
</table>
<ul class="pagination">
	<li><a href="?module=soal&page=<?php echo $page -1 ?>"> &laquo; </a></li>
</ul>
<?php 
for($x=1;$x<=$halaman;$x++)
{
	?>
	<ul class="pagination">
		<li><a href="?module=soal&page=<?php echo $x ?>"><?php echo $x ?></a></li>
	</ul>
	<?php
}
?>
<ul class="pagination">
	<li><a href="?module=soal&page=<?php echo $page +1 ?>"> &raquo; </a></li>
</ul>
<?php
break;
//tambah soal
case "tambah":
?>
<hr>
<h4><span class="glyphicon glyphicon-th-list"></span> Tambah Data Soal</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
//automation
$query = mysql_query ("SELECT MAX(kode_soal) AS kode FROM soal");
		  $r = mysql_fetch_array ($query);
		  $kode = $r['kode'];
		  $tambah = (int) substr ($kode,3,4);
		  $next = $tambah+1;
		 $id ="SL-".sprintf("%04s", $next);
?>
<?php
echo"<form id='form1' method='post' action='$aksi?module=soal&action=input' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
    <input name="kode_soal" value="<?php echo $id;?>" type="hidden">

	<tr>
    <td><b>Pilih Mapel</b></td>
    <td><select name="kode_mapel" class="required">
		<option value="">-Pilih Salah Satu-</option>
	<?php
	$tampil = mysql_query ("SELECT * FROM admin WHERE id_admin = '$_SESSION[id_admin]'");
	$data = mysql_fetch_array ($tampil);
	if ($data[level]=='Guru IPA')
	{
	$ipa = 'IPA';
	$mapel = mysql_query("SELECT * FROM mapel WHERE nama_mapel = '$ipa'");
	while ($data = mysql_fetch_array ($mapel))
	{
	?>
		<option value="<?php echo $data[0];?>"><?php echo $data[1];?></option>
	<?php
	}
	}
	else if ($data[level]=='Guru IPS')
	{
	$ips = 'IPS';
	$mapel = mysql_query("SELECT * FROM mapel WHERE nama_mapel = '$ips'");
	while ($data = mysql_fetch_array ($mapel))
	{
	?>
		<option value="<?php echo $data[0];?>"><?php echo $data[1];?></option>
	<?php
	}
	}
	else if ($data[level]=='Admin')
	{
	$mapel = mysql_query("SELECT * FROM mapel");
	while ($data = mysql_fetch_array ($mapel))
	{
	?>
		<option value="<?php echo $data[0];?>"><?php echo $data[1];?></option>
	<?php
	}
	}
	?>
	</select></td>
    </tr>
	
	<tr>
    <td><b>Pertemuan</b></td>
    <td><input name="pertemuan" type="text" maxlength="2" class="required number"></td>
    </tr>

    <tr>
    <td><b>Tgl Mulai</b></td>
    <td><input name="tgl_mulai" type="text" id="tanggal"></td>
    </tr>

    <tr>
    <td><b>Tgl Selesai</b></td>
    <td><input name="tgl_selesai" type="text" id="tanggal2"></td>
    </tr>
	
	 <tr>
     <td><b>Upload Modul</b></td>
     <td><input type="file" name="modul" class="required"></td>
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
<h4><span class="glyphicon glyphicon-th-list"></span> Edit Data Soal</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
$query2 = mysql_query ("SELECT * FROM soal WHERE kode_soal = '$_GET[id]'");
$rows = mysql_fetch_array ($query2);
?>
<?php
echo"<form id='form1' method='post' action='$aksi?module=soal&action=update' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
    <input name="kode_soal" type="hidden" value="<?php echo $rows[kode_soal];?>">
	
    <tr>
    <td><b>Kode Mapel</b></td>
    <td><select name="kode_mapel" class="required">
		<option value="<?php echo $rows[kode_mapel];?>"><?php echo $rows[kode_mapel];?></option>
	<?php
	$mapel = mysql_query("SELECT * FROM mapel");
	while ($data = mysql_fetch_array ($mapel))
	{
	?>
		<option value="<?php echo $data[0];?>"><?php echo $data[1];?></option>
	<?php
	}
	?>
	</select></td>
    </tr>
	
	<tr>
    <td><b>Pertemuan</b></td>
    <td><input name="pertemuan" type="text" maxlength="2" value="<?php echo $rows[pertemuan];?>" class="required number"></td>
    </div>

    <tr>
    <td><b>Tgl Mulai</b></td>
    <td><input name="tgl_mulai" type="text" id="tanggal" value="<?php echo $rows[tgl_mulai];?>"></td>
    </div>

    <tr>
    <td><b>Tgl Selesai</b></td>
    <td><input name="tgl_selesai" type="text" id="tanggal2" value="<?php echo $rows[tgl_selesai];?>"></td>
    </div>
	
	<tr>
    <td><b>Upload Modul</b></td>
    <td><input type="file" name="modul_edit" class="required"><br>
	<p>*) Apabila Modul Tidak Diubah, dikosongkan saja</p></td>
    </tr>
	<tr>
	<td></td>
    <td><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
    </tr>
</table>
</form>    
<?php
break;
case "lihat_pertanyaan":
?>
<hr>
<h4><span class="glyphicon glyphicon-th-list"></span> Daftar Pertanyaan</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
$query3 = mysql_query ("SELECT * FROM pertanyaan WHERE kode_soal = '$_GET[id]'");
$no = 1;
while ($data = mysql_fetch_array ($query3))
{
?>
<?php
?>
<table class="table table-striped">
<tr class='isi'>
        <td><?php echo $no;?>. <?php echo $data[pertanyaan];?></td>
</tr>
<tr class='isi'>
		<td><ul>
			<li><?php echo $data[pilihan_a];?></li>
			<li><?php echo $data[pilihan_b];?></li>
			<li><?php echo $data[pilihan_c];?></li>
			<li><?php echo $data[pilihan_d];?></li>
			<li>Jawaban: <span class="wajib"> <?php echo $data[kunci_jawaban];?></span></li><input type="hidden" name="kunci_jawaban" value="<?php echo $data[kunci_jawaban];?>">
		</ul>
<?php
echo"<a href='?module=soal&action=ubah_pertanyaan&id=$data[id_pertanyaan]'><button class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span> Edit</button></a></td></tr>";
echo"</table>";
$no++;
}
break;
case "ubah_pertanyaan":
?>
<hr>
<h4><span class="glyphicon glyphicon-th-list"></span> Edit Pertanyaan</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
$query2 = mysql_query ("SELECT * FROM pertanyaan WHERE id_pertanyaan = '$_GET[id]'");
$rows = mysql_fetch_array ($query2);
echo"<form id='form1' method='post' action='$aksi?module=soal&action=update_pertanyaan' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
	<input name="id_pertanyaan" type="hidden" value="<?php echo $rows[id_pertanyaan];?>">
	<tr>
    <td><b>Pertanyaan</b></td>
    <td><textarea name="pertanyaan" id="pertanyaan" maxlength="500" cols="50" class="required"><?php echo $rows[pertanyaan];?></textarea></td>
    </tr>
	
	<tr>
    <td><b>Pilihan A</b></td>
    <td><textarea name="pilihan_a" maxlength="500" cols="50" class="required"><?php echo $rows[pilihan_a];?></textarea></td>
    </tr>
	
	<tr>
    <td><b>Pilihan B</b></td>
    <td><textarea name="pilihan_b" maxlength="500" cols="50" class="required"><?php echo $rows[pilihan_b];?></textarea></td>
    </tr>
	
	<tr>
    <td><b>Pilihan C</b></td>
    <td><textarea name="pilihan_c" maxlength="500" cols="50" class="required"><?php echo $rows[pilihan_c];?></textarea></td>
    </tr>
	
	<tr>
    <td><b>Pilihan D</b></td>
    <td><textarea name="pilihan_d" maxlength="500" cols="50" class="required"><?php echo $rows[pilihan_d];?></textarea></td>
    </tr>

	
	<tr>
    <td><b>Kunci Jawaban</b></td>
    <td><select name="kunci_jawaban" class="required">
		<option value="<?php echo $rows[kunci_jawaban];?>"><?php echo $rows[kunci_jawaban];?></option>
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>
		<option value="D">D</option>
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
case "buat_pertanyaan":
?>
<hr>
<h4><span class="glyphicon glyphicon-th-list"></span> Buat Pertanyaan</h4>
<hr>
<?php
echo" <a href=javascript:history.go(-1)><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a> ";
?>
<?php
$query4 = mysql_query ("SELECT * FROM soal WHERE kode_soal = '$_GET[id]'");
$rows = mysql_fetch_array ($query4);
echo"<form method='post' action='$aksi?module=soal&action=simpan_pertanyaan' enctype='multipart/form-data'>";
$jumlah = 5;
for ($i=0; $i<$jumlah; $i++)
{
	$nomor = $i + 1;
	echo"<b>Soal No. $nomor</b><br/>";
	echo"<hr>";	
?>
<table class="table table striped">
<tr>
	<input name="kode_soal[]" type="hidden" value="<?php echo $rows[kode_soal];?>">
	<td>Pertanyaan <span class="wajib">*</span></td>
    <td><textarea name="pertanyaan[]" maxlength="500" cols="50" required></textarea></td>
</tr>
<tr>
	
	<td>Pilihan A <span class="wajib">*</span></td>
    <td><textarea name="pilihan_a[]" maxlength="500" cols="50" required></textarea></td>
</tr>
<tr>
	
	<td>Pilihan B <span class="wajib">*</span></td>
    <td><textarea name="pilihan_b[]" cols="50" required></textarea></td>
</tr>
<tr>
	
	<td>Pilihan C <span class="wajib">*</span></td>
    <td><textarea name="pilihan_c[]" maxlength="500" cols="50" required></textarea></td>
</tr>
<tr>
	
	<td>Pilihan D <span class="wajib">*</span></td>
    <td><textarea name="pilihan_d[]" maxlength="500" cols="50" required></textarea></td>
</tr>
<tr>
	
	<td>Kunci Jawaban <span class="wajib">*</span></td>
    <td><select name="kunci_jawaban[]" required>
		<option value="">-Pilih Salah Satu-</option>
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>
		<option value="D">D</option>
		</select></td>
</tr>
</table>	
<?php
}
if ($jumlah > 0)
{
?>
	
    <button class="btn btn-primary" name="simpan" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
  
<?php
}
?>
</form>
<?php
}
?>
