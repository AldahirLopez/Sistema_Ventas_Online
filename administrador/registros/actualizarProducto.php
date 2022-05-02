<?php 
include("../../registros/conexion.php");
if (isset($_POST['Registrar'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['cantidad']) >= 1 && strlen($_POST['precio']) >= 1 && strlen($_POST['descripcion']) >= 1 && strlen($_POST['categoria']) >= 1 &&  strlen($_POST['sub_cat']) >= 1 && strlen($_POST['talla']) >= 1 ){
		$nom = trim($_POST['nombre']);
		$cantidad = trim($_POST['cantidad']);
		$precio = trim($_POST['precio']);
		$desc = trim($_POST['descripcion']);
		$categoria = strtolower(trim($_POST['categoria']));
		$sub_cat = strtolower(trim($_POST['sub_cat']));
		$talla = strtolower(trim($_POST['talla']));
		$img = $_FILES['ruta_img']['tmp_name'];	
		if(empty($img))
		{
			$consulta2 = "UPDATE items SET nombre='$nom', cantidad='$cantidad', precio='$precio' , descripcion='$desc' , categoria='$categoria' , sub_categoria='$sub_cat' , talla='$talla' WHERE id=".$_GET['id'];
	        $resultado = mysqli_query($conexion,$consulta2);
		
		}else{

			$img2 = addslashes(file_get_contents($img));
			$consulta = "UPDATE items SET nombre='$nom', cantidad='$cantidad', precio='$precio' , descripcion='$desc' , categoria='$categoria' , sub_categoria='$sub_cat' , talla='$talla', img='$img2' WHERE id=".$_GET['id'];
			$resultado = mysqli_query($conexion,$consulta);
		}
		if ( $resultado) {
	    	?> 
	    	<h3 class="ok">¡Se ha actualizado correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Edite los Campos !</h3>
           <?php
	 }
}
?>