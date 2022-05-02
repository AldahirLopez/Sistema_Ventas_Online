<?php 

include("../../registros/conexion.php");

if (isset($_POST['Registrar'])) {
    if (strlen($_POST['nombres']) >= 1  && strlen($_POST['telefono']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['direccion']) >= 1 ) {
		$nom = trim($_POST['nombres']);
        $tel = trim($_POST['telefono']);
	    $email = trim($_POST['correo']);
        $direc = trim($_POST['direccion']);
	    $fechareg = date("Y-m-d");
	    $consulta = "INSERT INTO proveedor(nombre, telefono, correo_e, direccion, fecha) VALUES ('$nom','$tel','$email','$direc','$fechareg')";
	    $resultado = mysqli_query($conexion,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Se ha registrado correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}

?>