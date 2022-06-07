<?php

$mes = $_POST['mes'];
$mi = number_format(date('m'));
$mo = $mi+1;
if($mes <= $mo){
	header("Location: repoMes.php?mes=$mes");
	exit;
}
else 
echo '<script> alert("El mes aun no esta disponible para reporte");
window.location.href="repoMes.php";</script>';
  exit;


?>