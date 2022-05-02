<?php 

include("../../registros/conexion.php");

if (isset($_POST['Registrar'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['cantidad']) >= 1 && strlen($_POST['precio']) >= 1 && strlen($_POST['descripcion']) >= 1 && strlen($_POST['categoria']) >= 1 && strlen($_POST['sub_cat']) >= 1) {
		$nom = trim($_POST['nombre']);
        $cantidad = trim($_POST['cantidad']);
        $precio = trim($_POST['precio']);
	    $desc = trim($_POST['descripcion']);
        $categoria = strtolower(trim($_POST['categoria']));
		$sub_cat = strtolower(trim($_POST['sub_cat']));


        $img = addslashes(file_get_contents($_FILES['ruta_img']['tmp_name']));

        $proveedor = trim($_POST['proveedor']);

		$talla = strtolower(trim($_POST['talla']));

	    $consulta = "INSERT INTO items(nombre, cantidad, precio, descripcion, categoria, sub_categoria, img, proveedor, talla) VALUES ('$nom','$cantidad','$precio','$desc','$categoria','$sub_cat','$img','$proveedor','$talla')";
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
