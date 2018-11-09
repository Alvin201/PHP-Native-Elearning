<?php
$aksi="modul/mod_cari_topik/aksi_cari_topik.php";
switch($_GET[action])
{
  default:
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-globe"></span> Semua Teman</b>
<hr>
<?php
echo "<table class='table table-striped'><tr><td class=judul_head>&#187; Hasil Pencarian</td></tr>";

  // Hanya mencari berita, apabila diperlukan bisa ditambahkan utk mencari agenda, pengumuman, dll
	$cari   = mysql_query("SELECT * FROM siswa WHERE nama LIKE '%$_POST[kata]%'");
	$jumlah = mysql_num_rows($cari);

  if ($jumlah > 0){
    echo "<tr><td class=isi>
          <br>Ditemukan <b>$jumlah</b> Teman dengan kata kunci <b>$_POST[kata]</b> : <ul>"; 
    
    while($r=mysql_fetch_array($cari)){
      echo "<li><a href=?module=teman&action=profil&id=$r[nis]>$r[nama]</a></li>";
    }      
    echo "</ul></td></tr>";
  }
  else{
    echo "<tr><td class=judul>
          Tidak ditemukan Teman dengan kata <b>$_POST[kata]</b></td></tr>";
  }

	echo "<tr><td class=kembali><br>
        [ <a href=javascript:history.go(-1)>Kembali</a> ]</td></tr></table>";	 		  
break;
}
?>