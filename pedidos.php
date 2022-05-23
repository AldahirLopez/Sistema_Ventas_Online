<?php
    include 'registros/conexion.php';
    include_once 'servicios/sesion/user.php';
    include_once 'servicios/sesion/user_session.php';
    $userSession = new UserSession();
    $user = new User();
    $user->setUser($userSession->getCurrentUser()); 
    if(isset($_SESSION['user'])){
      ?>
      <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Ver Pedido</title>
        <!-- mio -->
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link href="fontawesome/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" integrity="sha512-+1GzNJIJQ0SwHimHEEDQ0jbyQuglxEdmQmKsu8KI7QkMPAnyDrL9TAnVyLPEttcTxlnLVzaQgxv2FpLCLtli0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Css -->
        <link rel="stylesheet" href="css/header.css">   
        <link rel="stylesheet" href="css/listar_pedidos.css">  
      </head>
      <body>
    <header>
    <?php
    include_once('header/header.php');
    ?>
     <script src="js/menu.js"> </script> 
   </header>
     <!--Pedidos-->
     <table>

      <tr><th colspan="9"><h1>Lista de pedidos</h1></th></tr>
      <tr>

      <th>Imagen</th>
      <th>Producto</th>
      <th>Talla</th>
      <th>Cantidad</th>
      <th>Sub_Total</th>
      <th>Estado del envio</th>
      <th>Paqueteria</th>
      <th>Guia</th>
      

      </tr>

      <?php
       $userid = $user->getUseid();
       $resultado=$conexion ->query("select * from venta where id_usuario = $userid") or die($conexion -> error);
       while($mostrar=mysqli_fetch_array($resultado)){
            $idventa = $mostrar['id_venta'];
            $resultado2=$conexion ->query("select * from venta_productos where id_venta = $idventa") or die($conexion -> error);
            while($mostrar2=mysqli_fetch_array($resultado2)){
              $idproduct = $mostrar2['id_producto'];
              $resultado3=$conexion ->query("select * from items where id = $idproduct") or die($conexion -> error);
              while($mostrar3=mysqli_fetch_array($resultado3)){
                ?>
                <tr>
                <td><img width='80' height='80' src="data:jpg;base64,<?php echo  base64_encode($mostrar3['img']); ?>"></td>
                <td><?php echo $mostrar3['nombre'] ?></td>
                <td><?php echo $mostrar3['talla'] ?></td>
                <td><?php echo $mostrar2['cantidad'] ?></td>
                <td><?php echo $mostrar2['precio'] ?></td>
                <td>
                  <?php 
                  switch ($mostrar['estado']) {
                    case "1":
                        ?><i class="fas fa-store-alt"></i><?php echo "Pendiente de envio";
                        break;
                    case "2":
                        ?><i class="fas fa-truck"></i></i><?php echo "Enviado";
                        break;
                    case "3":
                       ?><i class="fas fa-shipping-fast"></i><?php echo "En transito";
                        break;
                    case "4":
                      ?><i class="fas fa-truck-loading"></i><?php echo "Entregado";
                    break;
                }  ?>
               </td>
               <td><?php echo $mostrar['paqueteria'] ?></td>
               <td><?php echo $mostrar['guia'] ?></td>
              </tr>
              <?php
              }
            }
       }    
      ?>

      </table>
    </body>
  </html>
<?php
}else{
  header("Location: servicios/login/validad.php");
}
?>

