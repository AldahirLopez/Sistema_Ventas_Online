<?php
    include 'registros/conexion.php';
    include_once 'servicios/sesion/user.php';
    include_once 'servicios/sesion/user_session.php';
    
      ?>
      <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title> Reporte Ventas</title>
        <!-- mio -->
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link href="fontawesome/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" integrity="sha512-+1GzNJIJQ0SwHimHEEDQ0jbyQuglxEdmQmKsu8KI7QkMPAnyDrL9TAnVyLPEttcTxlnLVzaQgxv2FpLCLtli0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Css -->
        <link rel="stylesheet" href="css/listar_pedidos.css">
        <link rel="stylesheet" href="css/listar_productos.css">
        <link rel="stylesheet" type="text/css" href="css/admin-header.css">
        <link rel="stylesheet" href="css/menu_admi.css">
        <style type="text/css">
        body {
    background-color: #80808024;
}
        </style>
      </head>
      <body>
    <header>

    <style type="text/css">
      form{
  background-color: black;
  border-style: 1;
  border:0px solid white;
  cursor: pointer;
  background-color: black;
  color: white;
  font-family: 'Roboto', sans-serif;
  background-color: #80808024;
}
/* estilo etiqueta*/
form label{
	width:72px;
	font-weight:bold;
	display:inline-block;
}
			
    </style>
     <script src="js/menu.js"> </script> 
   </header>
<div class="menu">
<button class="botons" onclick="login()"><i class="fas fa-arrow-left"></i></button>
    <script type="text/javascript">
      function login(){
        window.location.href="administrador/menu.php";
      }
    </script>
</div>
   <!--Buscador de ventas-->
    
   <form class="nav" method="POST" action="reporte_ventas.php" onSubmit="return validarForm(this)" style="text-align:center">

    <!--<input type="month" id="mes" name="mes">-->
    
    <input type="text" placeholder="BUSCAR VENTA" name="palabra" id="palabra">
 
    <input type="submit" value="BUSCAR" name="buscar">
    
 
</form>


<script type="text/javascript">
    function validarForm(formulario) 
    {
        if(formulario.palabra.value.length==0) 
        { //¿Tiene 0 caracteres?
          if(formulario.mes.value.length==0) {
            formulario.palabra.focus();  // Damos el foco al control
            alert('Debes rellenar este campo'); //Mostramos el mensaje
            <?php
            $vari=1;?>
            return false; 
        }
         } //devolvemos el foco  
         return true; //Si ha llegado hasta aquí, es que todo es correcto 
     }   $vari=0;
</script>

<?php
                    //creamos tabla reporte
                    ?>
                    <div>
                        <form action="verifi.php" target="_blank" method="POST" style="text-align:right">
                            <div class="form-group row">
                                    <select class="custom-select" id="mes" name="mes" required>
                                        <option value="" disabled selected>ELIGE UN MES..</option>
                                        <option value="1">ENERO</option>
                                        <option value="2">FEBRERO</option>
                                        <option value="3">MARZO</option>
                                        <option value="4">ABRIL</option>
                                        <option value="5">MAYO</option>
                                        <option value="6">JUNIO</option>
                                       <!-- <option value="7">JULIO</option>
                                        <option value="8">AGOSTO</option>
                                        <option value="9">SEPTIEMBRE</option>
                                        <option value="10">OCTUBRE</option>
                                        <option value="11">NOVIEMBRE</option>
                                        <option value="12">DICIEMBRE</option>-->
                                    </select>
                                    
                                
                              <button type="submit" style="background-color: #0b2fa3; border-color: #0b2fa3; color:#ffffff">GENERAR PDF</button>
                            </div>
                        </form>
                    
     <!--ventas-->
     <table style="align-content: flex-end" >

      <tr><th colspan="9"><h1>Reporte de Ventas</h1></th></tr>
      <tr>

      <th>id_venta</th>
      <th>Fecha</th>
      <th>Producto</th>
      <th>cantidad</th>
      <th>Talla</th>
      <th>Precio</th>
      <th>Total</th>
      

      </tr>

      <?php
      $fechaActual = date('d-m-Y');
      
    if($vari==1){
      
      $pal=$_POST['palabra'];
      $resultado=$conexion ->query("select vpro.id_venta, vpro.id_producto, vpro.cantidad, vpro.talla,vpro.precio, ven.total, ven.fecha , 
       ven.id_venta from venta_productos vpro INNER JOIN venta ven on (vpro.id_venta=ven.id_venta) where vpro.id_venta like '%$pal%'") or die($conexion -> error);
       while($mostrar=mysqli_fetch_array($resultado)){
                ?>
                <tr>
                <td><?php echo $mostrar['id_venta'] ?></td>
                <td><?php echo $mostrar['fecha'] ?></td>
                <td><?php echo $mostrar['id_producto'] ?></td>
                <td><?php echo $mostrar['cantidad'] ?></td>
                <td><?php echo $mostrar['talla'] ?></td>
                <td><?php echo $mostrar['precio'] ?></td>
                <td><?php echo $mostrar['total'] ?></td>
                </tr>

              <?php
              }
    }if($vari==0){
      $resultado=$conexion ->query("SELECT vpro.id_venta, vpro.id_producto, vpro.cantidad, vpro.talla,vpro.precio, ven.total, ven.fecha , 
      ven.id_venta from venta_productos vpro INNER JOIN venta ven on (vpro.id_venta=ven.id_venta) where ven.fecha like '%$fechaActual%'") or die($conexion -> error);
      while($mostrar=mysqli_fetch_array($resultado)){
               ?>
               <tr>
               <td><?php echo $mostrar['id_venta'] ?></td>
               <td><?php echo $mostrar['fecha'] ?></td>
               <td><?php echo $mostrar['id_producto'] ?></td>
               <td><?php echo $mostrar['cantidad'] ?></td>
              <td><?php echo $mostrar['talla'] ?></td>
              <td><?php echo $mostrar['precio'] ?></td>
              <td><?php echo $mostrar['total'] ?></td>
             </tr>
             <?php
             }
    }
           
      ?>

      </table>
						</div>
    </body>
  </html>
<?php

?>

