<?php 
include("../../registros/conexion.php");
$consulta2 = "DELETE FROM items WHERE id=".$_GET['id'];
$resultado = mysqli_query($conexion,$consulta2);
if ($resultado) {
    ?> 
    <h3 class="ok">¡Se ha eliminado correctamente!</h3>
    
   <?php
   header("Location: ../vistas/listar_productos.php");
} else {
    ?> 
    <h3 class="bad">¡Ups ha ocurrido un error!</h3>
   <?php
}

?>