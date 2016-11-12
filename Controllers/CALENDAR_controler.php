<?php
include '../Views/CALENDAR_view.php';
error_reporting (0);
$horario = array('10','11','12','13','14','15','16','17','18','19','20','21','22');	

$valor=$_GET['acc'];
$aux=$_GET['var'];
if(!isset($valor)){
$com = date('Y-m-d');
	}
else if($valor=="ant"){
	$com = date("Y-m-d", strtotime("$aux -1 week"));
}
else if($valor="sig"){
	$com = date("Y-m-d", strtotime("$aux +1 week"));
}

new CALENDAR_view($horario,$com);

?>