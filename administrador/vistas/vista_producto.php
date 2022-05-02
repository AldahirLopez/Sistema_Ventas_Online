<?php 

include("../../registros/conexion.php");
$consulta = "SELECT nombre FROM  proveedor";
$consulta2 = "SELECT talla,id_talla FROM  talla";
$resultado = mysqli_query($conexion,$consulta);
$resultado2 = mysqli_query($conexion,$consulta2);

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
        window.location.href="../menu.php";
      }
    </script>
    </div>
    <form method="post" class="form-register" enctype="multipart/form-data">
    <h4>Formulario Registro</h4>
    <input class="controls" type="text" name="nombre" id="nombre" placeholder="Nombre">
    <input class="controls" type="text" name="cantidad" id="cantidad" placeholder="Cantidad">
    <input class="controls" type="text" name="precio" id="precio" placeholder="Precio">
    <input class="controls" type="text" name="descripcion" id="descripcion" placeholder="Descripcion">
    <input class="controls" type="text" name="categoria" id="categoria" placeholder="Categoria">
    <input class="controls" type="text" name="sub_cat" id="sub_cat" placeholder="Sub_Categoria">
    <input class="controls" type="file" name="ruta_img" require="">

    <select class="controls" name="proveedor">
                    <?php 
                        while($datos = mysqli_fetch_array($resultado))
                        {
                    ?>
                            <option value="<?php echo $datos['nombre']?>"> <?php echo $datos['nombre']?> </option>
                    <?php
                        }
                    ?> 
    </select>
    <input class="controls" type="text" name="talla" id="talla" placeholder="talla">                  


    <input class="botons" type="submit" name="Registrar" value="Registrar"> 
 </form>  
   <?php
    include("../registros/producto.php");
   ?>
</body>
</html>
