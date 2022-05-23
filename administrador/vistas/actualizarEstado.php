<?php
if(isset($_GET['id'])){
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
<link href="../../fontawesome/css/all.css" rel="stylesheet">
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
        window.location.href="listar_pedidos.php";
      }
    </script>
    </div>
    <form method="post" class="form-register">
    <h4>Formulario de actualizacion de la venta: </h4>
    <input class="controls" type="text" name="paqueteria" id="paqueteria" placeholder="Ingrese la paqueteria">
                <input class="controls" type="text" name="guia" id="guia" placeholder="Ingrese la guia">
                <h4>Selecione el estado del envio</h4>
                <select id="estado" name="estado" class="controls" >
                  <option id="1" value="1">Pendiente de envio</option>
                  <option id="2" value="2">Enviado</option>
                  <option id="3" value="3">En transito</option>
                  <option id="4" value="4">Entregado</option>
                </select>
                <input class="botons" type="submit" name="Registrar" value="Registrar">
 </form>  
   <?php
    include("../registros/actualizarEnvio.php");
   ?>
</body>
</html>
<?php
}
?>
