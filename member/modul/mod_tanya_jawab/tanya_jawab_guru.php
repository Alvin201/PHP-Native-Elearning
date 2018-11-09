<?php
session_start();
$aksi="modul/mod_tanya_jawab/aksi_tanya_jawab.php";
switch($_GET[action])
{
  default:
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-question-sign"></span> Tanya Jawab Dengan Guru</b>
<hr>
<?php
echo"<a href='?module=tanya_jawab_guru&action=tambah'><button class='btn btn-success'><span class='glyphicon glyphicon-question-sign'></span> Ajukan Pertanyaan</button></a>"; 
?>
<br>
<br>
<table class="table table-striped">
<?php
$query = mysql_query ("SELECT * FROM tanya_jawab WHERE nis = '$_SESSION[nis]'");
while ($data = mysql_fetch_array($query))
{
 $tgl_post   = tgl_indo($data[tgl_tanya]);
?>
	<tr colspan='5'>
	<?php
		echo"<td class=judul><b>$data[pertanyaan]</b></td>
	</tr>
	<tr>";
	?>
	<?php
		echo"<td class=isi_kecil> Dalam: $data[kategori] Pada: $tgl_post Jam $data[jam_tanya] WIB</i></td>
	</tr>
	<tr>";
		echo"<td class=judul><span class='glyphicon glyphicon-thumbs-up'></span><a href='?module=tanya_jawab_guru&action=lihat_jawaban&id=$data[id_tanya_jawab]'> Lihat Jawaban</a></td></tr>";
}
echo"</table>";
break;
case "tambah":
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-question-sign"></span> Pengajuan Pertanyaan</b>
<hr>
<?php
echo"<form method='post' action='$aksi?module=tanya_jawab_guru&action=input' enctype='multipart/form-data'>";
?>
<table class="table table-striped">
<tr>
	<td>Kategori <span class="error">*</span></td>
	<td><select name="kategori" required>
		<option value="">-Pilih Salah Satu-</option>
		<option value="IPA">IPA</option>
		<option value="IPS">IPS</option>
		</select></td>
</tr>
<tr>
	<td colspan="2"><textarea name="pertanyaan" id="loko" style='width: 650px; height: 350px;'></textarea></td>
</tr>
<tr>
	<td colspan="2"><button class="btn btn-primary" type="submit"> Kirim</button> <button class="btn btn-danger" onclick="self.history.back()"> Batal</button></td>
</tr>
</table>
</form>
<?php
break;
case "lihat_jawaban":
?>
<?php
$query = mysql_query ("SELECT * FROM tanya_jawab WHERE id_tanya_jawab = '$_GET[id]'");
$data = mysql_fetch_array($query);
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-question-sign"></span> Jawaban</b>
<hr>
<?php
echo"[ <a href=javascript:history.go(-1)>Kembali</a> ]";
?>
<br>
<br>
<table class="table table-striped">
<tr>
		<td class="judul"> <?php echo $data['pertanyaan'];?></td>
</tr>
<?php
$query = mysql_query ("SELECT a.nama, b.tgl_jawab, b.jam_jawab, b.jawaban FROM admin a, jawaban b WHERE a.id_admin = b.id_admin AND b.id_tanya_jawab = '$_GET[id]'");
while ($data = mysql_fetch_array($query))
{
 $tgl_post   = tgl_indo($data[tgl_jawab]);
?>
	<tr>
	<?php
		echo"<td class=isi>$data[jawaban]</td>
	</tr>
	<tr>
		<td class='isi_kecil'>Dijawab oleh: $data[nama] Pada: $tgl_post Jam $data[jam_jawab] WIB</td></tr>";
}
echo"</table>";
break;
}
?>