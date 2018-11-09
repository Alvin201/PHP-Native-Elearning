<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include('../config/koneksi.php');
session_start();

if (!empty($_SESSION['id_admin'])) {
	header('location:index.php');
}
?>
<html>
<head>
<title>Administrator - Login</title>
<link href="../css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
<div id="header">
	<center><img src="../icon/login.png" width="90px" height="90px"><h1> Login</h1></center>
</div>
<div id="main">
<?php 
//kode php ini kita gunakan untuk menampilkan pesan eror
if (!empty($_GET["error"])) {
	if ($_GET["error"] == 1) {
		echo "<center><span class='error'><h3>Username dan Password tidak boleh kosong!</h3></span></center>";
	} else if ($_GET["error"] == 2) {
		echo "<center><span class='error'><h3>Username tidak boleh kosong!</h3></span></center>";
	} else if ($_GET["error"] == 3) {
		echo "<center><span class='error'><h3>Password tidak boleh kosong!</h3></span></center>";
	} else if ($_GET["error"] == 4) {
		echo "<center><span class='error'><h3>Username dan Password tidak cocok!</h3></span></center>";
	}
}
?>
<center>
<form name="login" action="otentikasi.php" method="post">
<table>
	<tr>
    	<td><input class="textbox" type="text" name="id_admin" placeholder="ID Admin" maxlength="8"/></td>
    </tr>
	<tr>
    	<td><input class="textbox"  type="password" name="password" placeholder="Password" maxlength="6" /></td>
    </tr>
	<tr align="right">
    	<td colspan="3"><input class="submitBiru" type="submit" name="login" value="Login" /><input class="submitMerah" type="reset" name="login" value="Batal" /></td>
    </tr>
</table>
</form>
</center>
</div>
</div>
</body>
</html>