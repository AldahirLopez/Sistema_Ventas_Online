<?php
session_start();
include("registros/conexion.php");
if(isset($_GET['id'])){
  $resultado = $conexion -> query("select * from items where id=".$_GET['id']) or die($conexion->error);
  if(mysqli_num_rows($resultado)>0){
    $fila = mysqli_fetch_row($resultado);
  }else{
    header("Location: ./index.php");
  }
}else{
    header("Location: ./index.php");
}
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
    <link rel="stylesheet" href="css/single.css"> 
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
    <center>
      <div class="product-boxa">
        <!--ID producto-->
        <input type="hidden" id="id" value="<?php echo $fila[0];?>">
        
        <!--img--------->
        <img class="img" src="data:image/jpg;base64, <?php echo  base64_encode($fila[7]); ?>"/>
        <!--colors------>
        <!--heading----->
        <div class="cont">
        <center>
        <strong class="nom"><?php echo $fila[1];?></strong>
        </center>
        <div class="detail-descriptiona"><?php echo $fila[4];?></div>
        <?php 
            $talla  = $fila[9];
                if($talla=='disponible'){
                  ?>
                  <div class="select">
                    <select class="select" id="select">
                      <option class="opntions" value="0">Selecciona una talla:</option>
                      <option class="opntions" value="1">Chica</option>
                      <option class="opntions" value="2">Mediana</option>
                      <option class="opntions" value="3">Grande</option>
                      <option class="opntions" value="4">Extra Grande</option>
                    </select>
                  </div>
                <?php
                }else{
                ?>
                 <div class="select">
                    <select class="select" id="select">
                      <option class="opntions" value="0">Sin tallas:</option>
                    </select>
                  </div>
                
                <?php    
                }
                ?>
              
        <!--buy & price-->
        
        <div class="buy-pricea">
            <!--price-->
            <p> <i class="fas fa-money-bill"></i>$<?php echo $fila[3];?></p>
            <p> <i class="fas fa-cubes"></i>Stock:<?php echo $fila[2];?> </p>
            <p> 
            
            <?php 
            $talla  = $fila[9];
                if($talla=='disponible'){
                  ?>
                  <i class="fas fa-tshirt"></i>Tallas:Disponibles
                  <?php
                }else{
                  ?>
                  <i class="fas fa-prescription-bottle"></i>
                  <?php
                }
                 ?>
          </p>
            <!--btn---->           
        </div> 
        <center>
        <button class="buy-btn" onclick="carrito()"><i class="fas fa-shopping-cart"></i></button>
            <script type="text/javascript">
              function carrito(){
                var combo = document.getElementById("select");
                var selected = combo.options[combo.selectedIndex].text;
                window.location.href="anadir_carrito.php?id=<?php echo $fila[0];?>"+"&id_talla="+selected;
              }
        </script>
        </center>
        </div>    
       </center>
        <!--===Product-section=1(HTML)===================================================================-->
        <section class="products-slider">
        <!--heading-------------------------------->
        <div class="slider-heading">
            <h3> Destacado <span></span></h3>
        </div>
        <!--product-container---------------------->
        <div class="product-container">
    <!--==slider-===============================----->
    <ul class="autoWidth" class="cs-hidden">
    <!--==card===========================-->   
          <?php
          include ('registros/conexion.php');
          $resultado2=$conexion ->query("select * from items where cantidad >= 1") or die($conexion -> error);
          while($fila2 = mysqli_fetch_array($resultado2)){         
          ?>
            <li class="item-a">
            <div class="product-box">
            <a href="itemone.php?id=<?php echo $fila2[0];?>"><!--**link**demo-->
              <!--ID producto-->
              <input type="hidden" id="id" value="<?php echo $fila2['id'];?>">
              <!--heading----->
              <strong class="nom"><?php echo $fila2["nombre"];?></strong>
              <!--img--------->
            <img class="img" src="data:image/jpg;base64, <?php echo  base64_encode($fila2['img']); ?>"/>
              <!--colors------>
              <!--buy & price-->
              <div class="buy-price">
                  <!--price-->
                  <p> <i class="fas fa-money-bill"></i>$<?php echo $fila2["precio"];?></p>
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