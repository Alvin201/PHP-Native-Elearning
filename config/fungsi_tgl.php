<?php
function hitunghari($awal, $akhir){
	$tgl_mulai = strtotime($awal);
	$tgl_akhir = strtotime($akhir);
	$jeda = abs($tgl_mulai - $tgl_akhir);

	return floor($jeda/(60*60*24));
}
?>