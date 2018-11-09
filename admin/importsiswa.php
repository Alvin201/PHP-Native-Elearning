<?php
mysql_connect('localhost', 'root', ''); //koneksi
mysql_select_db('db_learning'); //database

//=================================================================//
require_once 'excel_reader2.php';  //memanggil fungsi pembaca file excel

$data = new Spreadsheet_Excel_Reader();
$fileexcel = $_FILES['upload']['name']; //mengambil nilai dari file field
$data->read($fileexcel);


for ($x=2; $x <= count($data->sheets[0]["cells"]); $x++) {
    // Mendefinisikan Shell dalam File Excel Sejumlah Field yang ada di tabel
    $nis = $data->sheets[0]["cells"][$x][1];
	$nama = $data->sheets[0]["cells"][$x][2];
    $kelas = $data->sheets[0]["cells"][$x][3];
	$jenis_kelamin = $data->sheets[0]["cells"][$x][4];
	$tgl_lahir = $data->sheets[0]["cells"][$x][5];
	$alamat = $data->sheets[0]["cells"][$x][6];
	$no_telp = $data->sheets[0]["cells"][$x][7];
	$pass = $data->sheets[0]["cells"][$x][5];
// Simpan Ke Tabel
   	$cari=mysql_fetch_array(mysql_query("select*from siswa"));
	$caridata=$cari['nis'];
	if($caridata==$nis){
	$simpan =mysql_query("UPDATE siswa set nama='$nama', kelas='$kelas', jenis_kelamin='$jenis_kelamin', tgl_lahir='$tgl_lahir', alamat='$alamat', no_telp='$no_telp', password='$pass' where nis='$nis')");
	
	}
	else
	{
    $simpan = mysql_query("INSERT INTO siswa (nis,nama,kelas,jenis_kelamin,tgl_lahir,alamat,no_telp,password) VALUES ('$nis','$nama', '$kelas', '$jenis_kelamin', '$tgl_lahir', '$alamat', '$no_telp', '$pass')");
	
   
 if (!$simpan){
 echo "Data Ke ".$x." GAGAL disimpan!";
 }
 
}
?>
<script type="text/javascript">
alert('Data Terupload');
document.location='index.php?module=siswa';
</script>

<?php
}



?>