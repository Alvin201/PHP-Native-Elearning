<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../config/koneksi.php";
include "../config/indonesiandate.php";
include "../config/library.php";
include "../config/class_paging.php";
include "../config/fungsi_tgl.php";
session_start();
//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['nis']) || empty($_SESSION['nis'])) {
	//redirect ke halaman login
	header('location:../index.php');
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
			<div class="col-sm-4"> <!---Ukuran 4 untuk judul---->
           <a href="?module=beranda"><img src="../ico/header.png" width="250px" height="30px"></a>
            </div>
        	<div class="col-sm-8"> <!---Ukuran 4 untuk nav---->
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
            <div class="col-sm-6 col-lg-3">
            	
				<?php 
				include ("sidebar.php");
				?>
            </div>
			<div class="col-sm-6 col-lg-7">
            	
				<?php 
				include ("content.php");
				?>
            </div>
			<div class="col-sm-6 col-lg-2">
            	
				<?php 
				include ("widget.php");
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
<script src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="../tinymcpuk/jscripts/tiny_mce/tiny_lokomedia.js" type="text/javascript"></script>
<script src="../js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
$(function()
{
	$("a[rel=popover]").popover(
	{
		placement : 'left',
		trigger : 'hover'
	});
})
</script>
</body>
</html>