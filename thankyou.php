<?php
        include("registros/conexion.php");
        include_once 'servicios/sesion/user.php';
        include_once 'servicios/sesion/user_session.php';
        $userSession = new UserSession();
        $user = new User();
        $user->setUser($userSession->getCurrentUser()); 
        if(isset($_SESSION['user'])){
          if(isset($_SESSION['carrito'])){
            if(isset($_GET['id_direc'])){
              $arreglo = $_SESSION['carrito'];
              (int)$total = 0;
              (int)$envio = 125;
              for($i=0;$i<count($arreglo);$i++)
              {
                if( $arreglo[$i]['Categoria'] == 't-shirt'){
                  $envio = 0;
                }
                $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'] );
              }       
              $userid = $user->getUseid();
              $username = $user->getUser();
              $nom = $user->getNombre();
              $fecha = date('Y-m-d');
              $totalfinal = (int)$total;
              $estado = 1;
              $conexion -> query("insert into venta(id_usuario,fecha,total,estado) 
              values($userid,'$fecha',$totalfinal,$estado)")or die($conexion->error);
              $id_venta = $conexion -> insert_id;
              for($i=0;$i<count($arreglo);$i++)
              {
                  $conexion -> query("insert into venta_productos(id_venta,id_producto,cantidad,talla,precio,sub_total) 
                  values(
                  $id_venta,
                  ".$arreglo[$i]['Id'].",
                  ".$arreglo[$i]['Cantidad'].",
                  ".$arreglo[$i]['Precio'].",
                  ".$arreglo[$i]['Talla'].",
                  ".$arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']."
                  )")or die($conexion->error);;
                  $conexion ->query("update items set cantidad = cantidad-".$arreglo[$i]['Cantidad']." where id=".$arreglo[$i]['Id'])or die($conexion -> error);
              }
              $final=$total+$envio;
              $fecha = date("Y-m-d");
              $conexion -> query("insert into pago(id_venta,id_direccion,fecha,total)
              values('$id_venta','".$_GET['id_direc']."','$fecha','$final')")or die($conexion -> error);
          }else{
              header("Location: index.php");
          }
        }
      }    
        unset($_SESSION['carrito']);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Grcaias por tu compra</title>
    <!-- mio -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/cca00cc8a6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" integrity="sha512-+1GzNJIJQ0SwHimHEEDQ0jbyQuglxEdmQmKsu8KI7QkMPAnyDrL9TAnVyLPEttcTxlnLVzaQgxv2FpLCLtli0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css -->
    <link rel="stylesheet" href="css/header.css">   
    <link rel="stylesheet" href="css/index.css"> 
    <link rel="stylesheet" href="css/gracias.css">   
  </head>
  <body>
    
    <header>
    <?php
    include_once('header/header.php');
    ?>
     <script src="js/menu.js"> </script> 
    </header>

          <div class="gracias">
            <span><i class="fas fa-check-circle"></i></span>
            <h2 class="letrero1">Gracias por tu compra!</h2>
            <p class="letrero2">Tu pedido esta en proceso de envio.</p>
            <button><a href="pedidos.php" class="button"><i class="fas fa-box"></i> Ver pedido</a></button>
          </div>
 
   <!--===Product-section=1(HTML)===================================================================-->
   <section class="products-slider">
        <!--heading-------------------------------->
        <div class="slider-heading">
            <h3>Recomendado<span></span></h3>
        </div>
        <!--product-container---------------------->
        <div class="product-container">
    <!--==slider-===============================----->
    <ul class="autoWidth" class="cs-hidden">
    <!--==card===========================-->   
          <?php
          
          include ('registros/conexion.php');
          $resultado=$conexion ->query("select * from items where cantidad >= 1") or die($conexion -> error);
          while($fila = mysqli_fetch_array($resultado)){         
          ?>
            <li class="item-a">
            <div class="product-box">
            <a href="itemone.php?id=<?php echo $fila[0];?>"><!--**link**demo-->
              <!--ID producto-->
              <input type="hidden" id="id" value="<?php echo $fila['id'];?>">
              <!--heading----->
              <strong class="nom"><?php echo $fila["nombre"];?></strong>
              <!--img--------->
            <img class="img" src="data:image/jpg;base64, <?php echo  base64_encode($fila['img']); ?>"/>
              <!--colors------>
              <div class="avalible-colors">
              
              </div>
              <!--buy & price-->
              <div class="buy-price">
                  <!--price-->
                  <p> <i class="fas fa-money-bill"></i>$<?php echo $fila["precio"];?></p>
                  <button class="buy-btn"><i class="fas fa-shopping-cart"></i></button>
              </div>
                </a>
              </div>
              </li> 
              <?php
                }
              ?>    
    </ul>      
</div>
</section>
      <!--js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>
      <script src="js/slider.js"></script>  
  </body>
</html>
