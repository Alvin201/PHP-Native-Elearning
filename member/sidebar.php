<?php
session_start();
$query = mysql_query ("SELECT * FROM siswa WHERE nis = '$_SESSION[nis]'");
$data = mysql_fetch_array ($query);
?>
<div class="arrowlistmenu">
<ul>
<?php
if ($data[foto]=="")
{
?>
	<li><center><img src="../admin/modul/mod_siswa/foto/profile-icon.png" class="avatar" width='128px' height='128px'/></center></li>
	<li><center><b><?php echo $data['nama'];?></b></center></li>
	<li><center><b><?php echo $data['nis'];?></b></center></li>
	<li><center><p class="title"><span class="glyphicon glyphicon-gift"></span> <?php echo $data['tgl_lahir'];?> | <span class="glyphicon glyphicon-map-marker"></span> <?php echo $data['kelas'];?></p></center></li>
	
<?php
}
else
{
?>
	<li><center><img src="../admin/modul/mod_siswa/foto/<?php echo $data[foto];?>" class="avatar" width='128px' height='128px'/></center></li>
	<li><center><b><?php echo $data['nama'];?></b></center></li>
	<li><center><b><?php echo $data['nis'];?></b></center></li>
	<li><center><p class="title"><span class="glyphicon glyphicon-gift"></span> <?php echo $data['tgl_lahir'];?> |  <span class="glyphicon glyphicon-map-marker"></span> <?php echo $data['kelas'];?></p></center></li>
	
<?php
}
?>
</ul>
<hr>
<?php
		$tampil = mysql_query ("SELECT * FROM mapel");
			?>
			<div class="arrowlistmenu">
			<?php
		while ($dt = mysql_fetch_array ($tampil))
		{
				?>
				<ul>
					<li><a href="?module=learning&id=<?php echo $dt[kode_mapel];?>"><img src="../ico/glyphicons-501-education.png" width="24" height="24"> <?php echo $dt[nama_mapel];?></a></li>
				</ul>
		<?php
		}
		?>
				
				<ul>
					<li><a href="?module=forum"><img src="../ico/glyphicons-310-comments.png" width="24" height="24"> Forum Diskusi</a></li>
					<li><a href="?module=tanya_jawab_guru"><img src="../ico/glyphicons-195-circle-question-mark.png" width="24" height="24"> Tanya Jawab Guru</a></li>
				</ul>
				</div>
</div>
	
