<?php 

include("conexion.php");

if (isset($_POST['Registrar'])) {
    if (strlen($_POST['nombres']) >= 1 && strlen($_POST['apellidos']) >= 1 && strlen($_POST['telefono']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['usuario']) >= 1) {
        $user = trim($_POST['usuario']);
		$nom = trim($_POST['nombres']);
        $ape = trim($_POST['apellidos']);
        $tel = trim($_POST['telefono']);
	    $email = trim($_POST['correo']);
	    $fechareg = date("Y-m-d");
        $contra = trim($_POST['password']);
		$img = $_FILES['ruta_img']['tmp_name'];
		if(empty($img))
		{
			$img2 = addslashes(file_get_contents('../img/user/usuario_perfil.jpg'));
			$consulta = "INSERT INTO usuario(username, nombre, apellidos, telefono, correo_e, rol, fecha, password, foto) VALUES ('$user','$nom','$ape','$tel','$email','1','$fechareg','$contra','$img2')";
            $resultado = mysqli_query($conexion,$consulta);
		
		}else{

			$img2 = addslashes(file_get_contents($img));
			$consulta = "INSERT INTO usuario(username, nombre, apellidos, telefono, correo_e, rol, fecha, password, foto) VALUES ('$user','$nom','$ape','$tel','$email','1','$fechareg','$contra','$img2')";
            $resultado = mysqli_query($conexion,$consulta);
		}
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