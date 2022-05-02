<?php
    include("../../registros/conexion.php");
    if(isset($_GET['id'])){
    $consulta = "SELECT nombre FROM  proveedor";
    $resultado2 = mysqli_query($conexion,$consulta);    
    $resultado = $conexion -> query("select * from items where id=".$_GET['id']) or die($conexion->error);
    $fila = mysqli_fetch_row($resultado); 
?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://kit.fontawesome.com/cca00cc8a6.js" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../../css/menu_admi.css">
  <title>Formulario Registro</title>
</head>
<body>

    <div class="contenedor">
    <button class="botons2" onclick="login()"><i class="fas fa-arrow-left"></i></button>
    <script type="text/javascript">
      function login(){
        window.location.href="listar_productos.php";
      }
    </script>
    </div>
    <form method="post" class="form-register" enctype="multipart/form-data">
    <h4>Formulario Registro</h4>
    <input class="controls" type="text" name="nombre" id="nombre" value="<?php echo $fila[1] ?>">
    <input class="controls" type="text" name="cantidad" id="cantidad" value="<?php echo $fila[2] ?>">
    <input class="controls" type="text" name="precio" id="precio" value="<?php echo $fila[3] ?>">
    <input class="controls" type="text" name="descripcion" id="descripcion" value="<?php echo $fila[4] ?>">
    <input class="controls" type="text" name="categoria" id="categoria" value="<?php echo $fila[5] ?>">
    <input class="controls" type="text" name="sub_cat" id="sub_cat" value="<?php echo $fila[6] ?>">
    <input class="controls" type="text" name="talla" id="talla" value="<?php echo $fila[9] ?>">                  
    <select class="controls" name="proveedor">
                    <?php 
                        while($datos = mysqli_fetch_array($resultado2))
                        {
                    ?>
                            <option value="<?php echo $datos['nombre']?>"> <?php echo $datos['nombre']?> </option>
                    <?php
                        }
                    ?> 
    </select>
    <input class="controls" type="file" name="ruta_img">
    <input class="botons" type="submit" name="Registrar" value="Registrar"> 
 </form>  
   <?php
    include("../registros/actualizarProducto.php");
   ?>
</body>
</html>
<?php
}
?>
