<div class="nav-container">
<ul class="nav nav-justified">
	<li><div><form action="?module=hasilcaritopik" method="post">
			<input class="search" type="text" name="kata" placeholder="Cari Topik...">	
			<input class="button" type="submit" value="Cari">		
			</form>
	 </div></li>
	<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-cog'></span> Pengaturan</a>
		<ul class='dropdown-menu'>
			<li><a href='?module=foto&id=<?php echo $_SESSION[nis];?>'><span class='glyphicon glyphicon-picture'></span> Ganti Foto Profil</a></li>
			<li><a href='?module=password&id=<?php echo $_SESSION[nis];?>'><span class='glyphicon glyphicon-lock'></span> Ganti Password</a></li>
		</ul>
	</li>
	<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
</ul>
</div>























































