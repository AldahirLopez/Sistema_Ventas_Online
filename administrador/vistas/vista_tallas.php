<?php 
include("../../registros/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link href="../../fontawesome/css/all.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../../css/menu_admi.css">
  <title>Formulario tallas</title>
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
    <h4>Formulario tallas</h4>    
    <input class="controls" type="text" name="talla" id="talla" placeholder="Talla">
    <input class="botons" type="submit" name="Registrar" value="Registrar"> 
 </form>  
   <?php
    include("../registros/talla.php");
   ?>
</body>
</html>
