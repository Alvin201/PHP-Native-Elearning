<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "config/koneksi.php";
include "config/indonesiandate.php";
include "config/library.php";
include "config/class_paging.php";

?>
<html>
<head>
<title >.:: E-Learning System ::.</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="ico/logo.png" rel="shortcut icon" />
<link href="css/layout.css" rel="stylesheet" media="screen">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media
queries -->
<!--[if lt IE 9]>
<script src="../../assets/js/html5shiv.js"></script>
<script src="../../assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<header>
	<div class="container">
    	<div class="row">
			<div class="col-sm-12"> <!---Ukuran 4 untuk judul---->
			<?php include ("welcome.php");?>
            </div>
        </div>
    </div>
</header>
<div class="container" style="padding-top:10px; padding-bottom:10px;">
    	<div class="row">
        
        </div>
</div>
<div id="content">
	<div class="container">
    	<div class="row">
            <div class="col-sm-6 col-lg-8">
            	
				<?php 
				$page = @$_GET['page'];
				$file= "$page.php";
				if (!file_exists($file))
				{
					include ("beranda.php");
				}
				else //jika file tidak ada
				{
					include ("$page.php");
				}
				?>
            </div>
			<div class="col-sm-6 col-lg-4">
			<center><img src="ico/logo.png" class="avatar" width="100px" height="100px"></center><br>
			<center><img src="ico/sublogo.png" width="150px" height="30px"></center><br><br>
            	<?php 
				//kode php ini kita gunakan untuk menampilkan pesan eror
				if (!empty($_GET['error'])) {
					if ($_GET['error'] == 1) {
						echo "<center><span class='error'><h5>Username dan Password tidak boleh kosong!</h5></span></center>";
					} else if ($_GET['error'] == 2) {
						echo "<center><span class='error'><h5>Username tidak boleh kosong!</h5></span></center>";
					} else if ($_GET['error'] == 3) {
						echo "<center><span class='error'><h5>Password tidak boleh kosong!</h5></span></center>";
					} else if ($_GET['error'] == 4) {
						echo "<center><span class='error'><h5>Username dan Password tidak cocok!</h5></span></center>";
					}
				}
				include ("sidebar.php");
				?>
            </div>
        </div>
    </div>
</div>
<hr>
<footer>
	<div class="container">
    <center><p class="title">&copy; 2016 Created By PebasQOD ID</p>
    </div>
</footer>
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>