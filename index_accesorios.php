<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RR Desing</title>
    <!-- mio -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" integrity="sha512-+1GzNJIJQ0SwHimHEEDQ0jbyQuglxEdmQmKsu8KI7QkMPAnyDrL9TAnVyLPEttcTxlnLVzaQgxv2FpLCLtli0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css -->
    <link rel="stylesheet" href="css/header.css">   
    <link rel="stylesheet" href="css/index.css">   
  </head>
  <body>
    
    <header>
    <?php
    include_once('header/header.php');
    ?>
     <script src="js/menu.js"> </script> 
    </header>
        <!--===Product-section=1(HTML)===================================================================-->
    <section class="products-slider">
        <!--heading-------------------------------->
        <div class="slider-heading">
            <h3> Agregado <span> Recientemente.</span></h3>
        </div>
        <!--product-container---------------------->
        <div class="product-container">
    <!--==slider-===============================----->
    <ul class="autoWidth" class="cs-hidden">
    <!--==card===========================-->   
          <?php
          
          include ('registros/conexion.php');
          $resultado=$conexion ->query("select * from items where cantidad >= 1 and categoria = 'accesorios' limit 0,20") or die($conexion -> error);
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
        <!--===Product-section=1(HTML)===================================================================-->
        <section class="products-slider">
        <!--heading-------------------------------->
        <div class="slider-heading">
        </div>
        <!--product-container---------------------->
        <div class="product-container">
    <!--==slider-===============================----->
    <ul class="autoWidth" class="cs-hidden">
    <!--==card===========================-->   
          <?php
          
          include ('registros/conexion.php');
          $resultado=$conexion ->query("select * from items where cantidad >= 1 and categoria = 'accesorios' limit 20,40") or die($conexion -> error);
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
        <!--===Product-section=1(HTML)===================================================================-->
        <section class="products-slider">
        <!--heading-------------------------------->
        <div class="slider-heading">
        </div>
        <!--product-container---------------------->
        <div class="product-container">
    <!--==slider-===============================----->
    <ul class="autoWidth" class="cs-hidden">
    <!--==card===========================-->   
          <?php
          
          include ('registros/conexion.php');
          $resultado=$conexion ->query("select * from items where cantidad >= 1 and categoria = 'accesorios' limit 40,100") or die($conexion -> error);
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