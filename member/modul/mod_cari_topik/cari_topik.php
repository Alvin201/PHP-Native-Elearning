<?php
$aksi="modul/mod_cari_topik/aksi_cari_topik.php";
switch($_GET[action])
{
  default:
?>
<hr>
<b class="title"><span class="glyphicon glyphicon-comment"></span> Forum Diskusi</b>
<hr>
<?php
echo"<a href='?module=forum&action=tambah'><button class='btn btn-success'><span class='glyphicon glyphicon-paperclip'></span> Buat Topik Baru</button></a>"; 
?>
<br>
<br>
<?php
echo "<table class='table table-striped'><tr><td class=judul_head>&#187; Hasil Pencarian</td></tr>";

  // Hanya mencari berita, apabila diperlukan bisa ditambahkan utk mencari agenda, pengumuman, dll
	$cari   = mysql_query("SELECT * FROM topik WHERE judul_topik LIKE '%$_POST[kata]%'");
	$jumlah = mysql_num_rows($cari);

  if ($jumlah > 0){
    echo "<tr><td class=isi>
          <br>Ditemukan <b>$jumlah</b> Topik dengan kata kunci <b>$_POST[kata]</b> : <ul>"; 
    
    while($r=mysql_fetch_array($cari)){
      echo "<li><a href=?module=forum&action=detail_topik&id=$r[id_topik]>$r[judul_topik]</a></li>";
    }      
    echo "</ul></td></tr>";
  }
  else{
    echo "<tr><td class=judul>
          Tidak ditemukan Topik dengan kata <b>$_POST[kata]</b></td></tr>";
  }

	echo "<tr><td class=kembali><br>
        [ <a href=javascript:history.go(-1)>Kembali</a> ]</td></tr></table>";	 		  
break;
}
?>