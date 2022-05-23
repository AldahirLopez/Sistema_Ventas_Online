<?php 

include("../../registros/conexion.php");

if (isset($_POST['Registrar'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['apellidos']) >= 1 && strlen($_POST['telefono']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['direccion']) >= 1 && strlen($_POST['usuario']) >= 1) {
        $user = trim($_POST['usuario']);
		$nom = trim($_POST['nombre']);
        $ape = trim($_POST['apellidos']);
        $tel = trim($_POST['telefono']);
	    $email = trim($_POST['correo']);
        $direc = trim($_POST['direccion']);
	    $fecha = date("Y-m-d");
        $rol = (int)trim($_POST['rolSelect']);
        $contra = trim($_POST['password']);
		$img = addslashes(file_get_contents($_FILES['ruta_img']['tmp_name']));
	    $consulta = "INSERT INTO usuario(username, nombre, apellidos, telefono, correo_e, direccion, rol, fecha, password, foto) VALUES ('$user','$nom','$ape','$tel','$email','$direc','$rol','$fecha','$contra','$img')";
	    $resultado = mysqli_query($conexion,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Te has registrado correctamente!</h3>
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