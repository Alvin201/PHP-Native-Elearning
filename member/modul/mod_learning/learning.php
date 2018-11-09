<?php
session_start();
switch($_GET[action])
{
  default:
$kode_mapel = $_GET ['id'];
$mapel = mysql_query ("SELECT * FROM mapel WHERE kode_mapel = '$kode_mapel'");
$data = mysql_fetch_array ($mapel);
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-tag"></span> Mata Pelajaran <?php echo $data[nama_mapel];?></b>
<hr>
<?php
echo"<b><a href='?module=learning&action=nilai&id=$kode_mapel'><span class='glyphicon glyphicon-signal'></span> Hasilku</a></b>";
?>
<hr>
<table class="table table-striped">
<thead>
<tr>
		<th style="text-align:center">Pertemuan</th>
		<th style="text-align:center">Unduh Modul</th>
		<th style="text-align:center">Latihan</th>
</tr>
</thead>
<tbody>
<?php
$query = mysql_query("SELECT kode_soal,
							 pertemuan,
							 modul,
							 tgl_mulai,
							 tgl_selesai
							 
						FROM soal 

						WHERE 
							kode_mapel = '$kode_mapel'");
while ($row = mysql_fetch_array ($query))
{
	$tglSekarang 	 	 = date('Y-m-d');
	$tglMulai		     = $row['tgl_mulai'];
	$tglSelesai		 	 = $row['tgl_selesai'];

	$pecah1	= explode("-", $tglSekarang);
	$date1	= $pecah1[2];
	$month1	= $pecah1[1];
	$year1	= $pecah1[0];

	$pecah2 = explode("-", $tglSelesai);
	$date2	= $pecah2[2];
	$month2	= $pecah2[1];
	$year2	= $pecah2[0];

	$jd1 = GregorianToJD($month1, $date1, $year1);
	$jd2 = GregorianToJD($month2, $date2, $year2);

	$selisih  = $jd2 - $jd1;
	
 
echo"
<tr>
	<input type='hidden' value='$row[kode_soal]'>
	<td style='text-align:center'>Pertemuan $row[pertemuan]</td>";
	$query2 = mysql_query ("SELECT * FROM latihan WHERE nis = '$_SESSION[nis]' AND kode_soal = '$row[kode_soal]' ");
	$dt = mysql_fetch_array ($query2);
	if (($selisih < 7) && ($selisih >= 0) && ($dt[nilai] <= 0))
	{ 
		echo"<td style='text-align:center'><a href='donwload.php?id=$row[modul]'><button class='btn btn-success'><span class='glyphicon glyphicon-cloud-download'></span> Unduh</button></a></td>";
		echo"<td style='text-align:center'><a href=?module=learning&action=latihan&id=$row[kode_soal]><button class='btn btn-primary'><span class='glyphicon glyphicon-share-alt'></span> Kerjakan</button></a></center></td>";
	}
	else if (($selisih < 7) && ($selisih >= 0) && ($dt[nilai] > 0))
	{
		echo"<td style='text-align:center'><a href='donwload.php?id=$row[modul]'><button class='btn btn-success'><span class='glyphicon glyphicon-cloud-download'></span> Unduh</button></a></td>";
		echo"<td style='text-align:center'><b class='title'><span class='glyphicon glyphicon-ok-circle'></span> Sudah Dikerjakan</b></td>";		
	}
	else if ($selisih < 0)
	{
		echo"<td style='text-align:center'><a href='donwload.php?id=$row[modul]'><button class='btn btn-success'><span class='glyphicon glyphicon-cloud-download'></span> Unduh</button></a></td>";
		echo"<td style='text-align:center'><b class='title'><span class='glyphicon glyphicon-remove-circle'></span> Sudah Telat</b></td>";		
	}
	else 
	{
		echo "<td style='text-align:center'><b class='title'><span class='glyphicon glyphicon-ban-circle'></span> Belum Mulai</b></td>";
		echo "<td style='text-align:center'><b class='title'><span class='glyphicon glyphicon-ban-circle'></span> Belum Mulai</b></td>";
	}
echo"</tr>";
}
?>
</tbody></table>
<?php
break; 
case "latihan":
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-tag"></span> Soal Latihan</b>
<hr>
<script type="text/javascript">
function countDown(secs, elem){
    var element = document.getElementById(elem);
    element.innerHTML = "<p>Anda Mempunyai <b>"+secs+"</b> Detik untuk mengerjakan</h2>";
    if(secs < 1) {
        document.quiz.submit();
    }
    else{
        secs--;
        setTimeout('countDown('+secs+',"'+elem+'")',1500);
    }
}
function validate() {
return true;
}
</script>
<div id="status"></div>
<script type="text/javascript">
    countDown(600,"status");
</script>
<?php
echo"<b>Pilih Jawaban Dari Soal Dibawah Ini:</b>";
		$hasil=mysql_query("SELECT * FROM pertanyaan WHERE kode_soal =  '$_GET[id]'");
		$jumlah=mysql_num_rows($hasil);
		$urut=0;
		while($row =mysql_fetch_array($hasil))
		{
			$kode_soal		=	$row["kode_soal"];
			$id_pertanyaan	=	$row["id_pertanyaan"];
			$pertanyaan		=	$row["pertanyaan"];
			$pilihan_a		=	$row["pilihan_a"];
			$pilihan_b		=	$row["pilihan_b"];
			$pilihan_c		=	$row["pilihan_c"];
			$pilihan_d		=	$row["pilihan_d"]; 
			
			echo"<form method='post' name='quiz' id='myquiz' onsubmit='return validate()' action='?module=learning&action=hasil' enctype='multipart/form-data'>";
			?>
			<input type="hidden" name="kode_soal" value=<?php echo $kode_soal; ?>>
			<input type="hidden" name="id_pertanyaan[]" value=<?php echo $id_pertanyaan; ?>>
			<input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
			<table class="table table-striped">
			<tr>
			  	<td width="17"><?php echo $urut=$urut+1; ?></font></td>
			  	<td width="430"><b><?php echo "$pertanyaan"; ?></b></td>
			</tr>
			<tr>
			  	<td height="21">&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id_pertanyaan; ?>]" type="radio" value="A" required> <?php echo $pilihan_a;?></td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id_pertanyaan; ?>]" type="radio" value="B" required> <?php echo $pilihan_b;?></td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id_pertanyaan; ?>]" type="radio" value="C" required> <?php echo $pilihan_c;?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id_pertanyaan; ?>]" type="radio" value="D" required> <?php echo $pilihan_d;?></td>
            </tr>
			</table>
		<?php
		}
		?>
        	<tr>
				<td>&nbsp;</td>
			  	<td><button name="submitbutton" type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"> Selesai</button></td>
            </tr>
		</form>
        </p>

<?php
break;
session_start();
case "hasil":
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-star"></span> Score</b>
<hr>
<?php
echo"<b>Selamat!!! Hasil Anda setelah mengerjakan soal adalah dan mendapatkan bintang: </b>";
			if(isset($_POST['submitbutton']))
			{
				$pilihan		=$_POST["pilihan"];
				$id_pertanyaan	=$_POST["id_pertanyaan"];
				$jumlah			=$_POST['jumlah'];
				$kode_soal		=$_POST['kode_soal'];
				
				$score=0;
				$benar=0;
				$salah=0;
				$kosong=0;
			
				for ($i=0;$i<$jumlah;$i++)
				{
					//id nomor soal
					$nomor = $id_pertanyaan[$i];
				
					//jika user tidak memilih jawaban
					if (empty($pilihan[$nomor]))
					{
						$kosong++;
					}
					else
					{
						//jawaban dari user
						$jawaban = $pilihan[$nomor];
						
						//cocokan jawaban user dengan jawaban di database
						$query = mysql_query("SELECT * FROM pertanyaan WHERE id_pertanyaan='$nomor' AND kunci_jawaban='$jawaban'");
						
						$cek=mysql_num_rows($query);
						
						if($cek)
						{
							//jika jawaban cocok (benar)
							$benar++;
						}
						else
						{
							//jika salah
							$salah++;
						}
					
					} 
						$score = $benar*20;
			}
		mysql_query ("INSERT INTO latihan VALUES ('$_SESSION[nis]', '$kode_soal', '$score')");
		}
?>
		<table class="table table-striped">
		<tr>
			<td width="12%">Benar</td><td width="88%">= <?php echo $benar;?> soal x 20 point</td>
		</tr>
		<tr>
			<td>Salah</td><td>= <?php echo $salah;?> soal</td>
		</tr>
		<tr>
			<td><b>Score</b></td><td>= <b><?php echo $score;?></b> Point</td>
			<?php
			for ($i = 0; $i < $benar; $i++)
			{
				echo"<span class='glyphicon glyphicon-star'></span>";
				$i + 1;
			}
			?>
		</tr>
		</table>   
<?php
break;
case "nilai":
$kode_mapel = $_GET[id];
$mapel = mysql_query ("SELECT * FROM mapel WHERE kode_mapel = '$kode_mapel'");
$data = mysql_fetch_array ($mapel);
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-star-empty"></span> Nilai <?php echo $data[nama_mapel];?></b>
<hr>
<table class="table table-striped">
<thead>
<tr>
		<th width="200px">Kode Soal</th>
		<th width="300px">Pertemuan</th>
		<th>Nilai</th>
</tr>
</thead>
<tbody>
<?php
$query = mysql_query ("SELECT a.kode_soal,
							  b.pertemuan,
							  a.nilai
						FROM latihan a,
							 soal b
						WHERE 
							a.kode_soal = b.kode_soal AND a.nis = '$_SESSION[nis]' AND b.kode_mapel = '$kode_mapel'");
while ($row = mysql_fetch_array ($query))
{
echo"
<tr>
	<td>$row[kode_soal]</td>
	<td>Pertemuan $row[pertemuan]</td>
	<td style='text-align:center'>$row[nilai]</td>
</tr>
";
}
?>
</tbody></table>
<br>
<?php
$tampil = mysql_query ("SELECT * FROM latihan, soal WHERE nis = '$_SESSION[nis]' AND soal.kode_soal = latihan.kode_soal AND soal.kode_mapel = '$kode_mapel'");
$jumlah = mysql_num_rows($tampil);
$rata = mysql_query ("SELECT SUM(nilai) AS nilai FROM latihan, soal WHERE nis = '$_SESSION[nis]' AND soal.kode_soal = latihan.kode_soal AND soal.kode_mapel = '$kode_mapel'");
$nilai = mysql_fetch_array($rata);
$x = $nilai['nilai'];
$value = $x/$jumlah;
$y = $jumlah/15;
$persen = $y * 100;
?>
<table class="table table-striped">
<tr>
	<td><b>Nilai Rata-Rata<td></b>:</td></td><td> <?php echo $value;?></td>
</tr>
<tr>
	<td><b>Prosentase Mengerjakan Soal<td></b>:</td></td><td><?php echo $persen;?> %</td>
</tr>
</table>
<?php
}
?>