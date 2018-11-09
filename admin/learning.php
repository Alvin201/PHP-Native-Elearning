<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include ("../config/koneksi.php");
include ("../config/indonesiandate.php");
include ("../config/library.php");

session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['id_admin']) || empty($_SESSION['id_admin'])) {
	//redirect ke halaman login
	header('location:login.php');
}
?>

<html>
<head>
<title>.:: Administrator ::.</title>
<style type="text/css">
@import "media/css/demo_table_jui.css";
@import "media/themes/smoothness/jquery-ui-1.8.4.custom.css";
</style>
<script src="media/js/jquery.js"></script>
<script src="media/js/jquery.dataTables.js"></script>
<link href="../css/jquery-ui.css" rel="stylesheet" />
<link href="../css/style.css" rel="stylesheet" />
<link href="../css/val.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/additional-methods.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/validasi.js"></script>
<script src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="../tinymcpuk/jscripts/tiny_mce/tiny_lokomedia.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#datepicker").datepicker({
	  dateFormat : "dd-mm-yy",
	  changeMonth : true,
	  changeYear : true
	});
  });
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#datatables').dataTable({
	"oLanguage": {
	"sLengthMenu":
	"Tampilkan _MENU_ Data Perhalaman",
	"sSearch": "Silahkan Cari : ",
	"sZeroRecords":
	"Maaf, tidak ada data yang ditemukan",
	"sInfo":
	"Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
	"sInfoEmpty":
	"Menampilkan 0 s/d 0 dari 0 data",
	"sInfoFiltered":
	"(di filter dari _MAX_ total data)",
	"oPaginate": {
	"sFirst":
	"First",
	"sLast": "Last",
	"sPrevious":
	"Previous",
	"sNext": "Next"
	}
	},
	"sPaginationType":"full_numbers",
	"bJQueryUI":true
	});
	})
</script>
</head>
<body>
<div id="wrapper">
	<div id="header">
	<table>
	<tr>
		<td><img alt="Admin" src="images/logo.png" width="200" height="40" /></td>
	</tr>
	</table>
	</div>
		<div id="nav">
		</div>
		<div id="content">
		<?php echo"<h4>$hari_ini, "; echo tgl_indo(date("Y m d")); echo " | "; echo date("H:i:s");echo " WIB</h4>";?>
				<?php include ("content.php");?>    
		</div>
		<div id="sidebar">
				<?php include ("sidebar.php");?>
		</div>
	<div id="footer">
	<hr>
	<center>Copyright &copy; 2015 Created By Faridho</center>
	</div>
</div>
</body>
</html>

