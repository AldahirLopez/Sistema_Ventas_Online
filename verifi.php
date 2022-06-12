<?php
include 'registros/conexion.php';
$link=mysqli_connect('localhost','root','','sistema_online');

$mes = $_POST['mes'];
$mi = number_format(date('m'));
$mo = $mi+1;
$con=0;

foreach ($link->query("SELECT vpro.id_venta, vpro.id_producto, vpro.cantidad, vpro.talla,vpro.precio, ven.total, ven.fecha , 
ven.id_venta from venta_productos vpro INNER JOIN venta ven on (vpro.id_venta=ven.id_venta)
WHERE MONTH(fecha)=$mes AND YEAR(fecha)=2022; ") as $row) {

    $con = $con+1;
    
}
if($con!=0){
    if($mes <= $mo){

	header("Location: repoMes.php?mes=$mes");
	exit;
	}
} 

else 
echo '<script> alert("No hay ventas registradas");
window.location.href="reporte_vTodo.php";</script>';
  exit;


?>