<!DOCTYPE html>
<html lang="en">
<head>
<link href="../../fontawesome/css/all.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../../css/admin-header.css">
  <link rel="stylesheet" type="text/css" href="../../css/menu_admi.css">
  <title>Formulario Registro</title>
</head>
<body>
    <div class="encabezado">
	
    </div>
    <button class="btn-registro-back" onclick="login()"><i class="fas fa-arrow-left"></i></button>
    <script type="text/javascript">
      function login(){
        window.location.href="listar_proveedor.php";
      }
    </script>
    <form method="post" class="form-register">
    <center>
    <h4>Formulario Registro</h4>
    </center>
    <input class="controls" type="text" name="nombres" id="nombres" placeholder="Nombre">
    <input class="controls" type="text" name="telefono" id="telefono" placeholder="Telefono a 10 digitos">
    <input class="controls" type="text" name="correo" id="correo" placeholder="Email">
    <input class="controls" type="text" name="direccion" id="direccion" placeholder="Domicilio">
    <center>
    <input class="btnregistrar" type="submit" name="Registrar" value="Registrar">
    </center>
 </form>  
   <?php
    include("../registros/proveedor.php");
   ?>
</body>
</html>