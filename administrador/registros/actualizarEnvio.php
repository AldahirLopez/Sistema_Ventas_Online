<?php 

include("../../registros/conexion.php");

if (isset($_POST['Registrar'])) {
    if (strlen($_POST['paqueteria'])) {
		$guia = trim($_POST['guia']);
        $paq = trim($_POST['paqueteria']);
        $estado = (int)trim($_POST['estado']);
	
		$consulta = $conexion -> query("UPDATE venta SET estado=$estado, guia='$guia', paqueteria='$paq' WHERE id_venta=".$_GET['id']) or die($conexion->error);
	}
}


?>