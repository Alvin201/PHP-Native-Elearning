<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../config/koneksi.php";
include "../config/indonesiandate.php";
include "../config/library.php";
include "../config/class_paging.php";
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['id_admin']) || empty($_SESSION['id_admin'])) {
	//redirect ke halaman login
	header('location:login.php');
}
?>
<html>
<head>
<title>.:: E-Learning System ::.</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../ico/logo.png" rel="shortcut icon" />
<link href="../css/layout.css" rel="stylesheet" media="screen">
<link href="../lib/css/default.css" rel="stylesheet" />
<link href="../css/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media
queries -->
<!--[if lt IE 9]>
<script src="../../assets/js/html5shiv.js"></script>
<script src="../../assets/js/respond.min.js"></script>
<![endif]-->
<style type="text/css">
label.error {
color: red; padding-right: .50em; font-size:11px; font-weigth:normal;
}
</style>
</head>
<body>
<header>
	<div class="container">
    	<div class="row">
			<div class="col-sm-12"> <!---Ukuran 4 untuk judul---->
			<a href="?module=beranda"><img src="../ico/admin-logo.png" width="250px" height="30px"></a>
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
            <div class="col-sm-6 col-lg-2">
			<?php include ("sidebar.php");?>	
            </div>
			<div class="col-sm-6 col-lg-10">
			<?php echo"<h4 class='judul'>$hari_ini, "; echo tgl_indo(date("Y m d")); echo " | "; echo date("H:i:s");echo " WIB</h4>";?>
			<?php include ("content.php");?>  
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
<script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
<script src="../lib/zebra_datepicker.js" type="text/javascript"></script>
<script src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="../tinymcpuk/jscripts/tiny_mce/tiny_lokomedia.js" type="text/javascript"></script>
<script src="../js/jquery.validate.js" type="text/javascript"></script>
<script src="../js/validasi.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('#tanggal').Zebra_DatePicker({
            format: 'Y-m-d',
            months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
            days : ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu'],
            days_abbr : ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu']
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#tanggal2').Zebra_DatePicker({
            format: 'Y-m-d',
            months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
            days : ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu'],
            days_abbr : ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu']
        });
    });
</script>
<script>
$(document).ready(function(){
$("#formku").validate();
});
</script>
</body>
</html>