<?php
  include_once 'servicios/sesion/user.php';
  include_once 'servicios/sesion/user_session.php';
  $userSession = new UserSession();
  $user = new User();
  $arreglo = $_SESSION['carrito'];
  $user->setUser($userSession->getCurrentUser());  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RR Desing Compra</title>
    <!-- mio -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" integrity="sha512-+1GzNJIJQ0SwHimHEEDQ0jbyQuglxEdmQmKsu8KI7QkMPAnyDrL9TAnVyLPEttcTxlnLVzaQgxv2FpLCLtli0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css -->
    <link rel="stylesheet" href="css/header.css">  
    <link rel="stylesheet" href="css/datospagos.css">   
    <link rel="stylesheet" href="css/popup.css"> 
  </head>
  <body>
    
    <header>
    <?php
    include_once('header/header.php');
    ?>
     <script src="js/menu.js"> </script> 
    </header>
    

     <!--Datos de pago-->
     <div class='container'>
      <div class='window'>
         <div class='order-info'>
                <div class='order-info-content'>
                  <h2>Detalles de los productos</h2>
                  <div class='line'></div>
                  <?php
                $total = 0;
                $letrero = 'Gratis';
                $envio = false;
                $contador =0;
                $arreglo = $_SESSION['carrito'];
                $datos = array();
                for($i=0;$i<count($arreglo);$i++)
                {
                  if( $arreglo[$i]['Categoria'] == 't-shirt'){
                    $envio = true;
                    if($arreglo[$i]['Cantidad'] >= 1 && $arreglo[$i]['Categoria'] == 't-shirt'){
                      $contador = $contador+$arreglo[$i]['Cantidad'];
                      if($contador == 3){
                        $total = $total-$arreglo[$i]['Precio'];
                        $contador = 0;
                      }
                    }
                  }
                  $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
                  // Crea un ítem en la preferencia
                 
                ?>
                  
             <table class='order-table'>
               <tbody>
                <tr>
                  <td><img  src="data:jpg;base64,<?php echo base64_encode($arreglo[$i]['Imagen']); ?>" class='full-width'></img>
                  </td>
                  <td>
                    <br> <span class='thin'><?php echo $arreglo[$i]['Nombre']; ?></span>
                    <br> <?php echo $arreglo[$i]['Descripcion']; ?><br> <span class='thin small'> 
                      Piezas: <?php echo $arreglo[$i]['Cantidad'];?> 
                     <p><?php echo $arreglo[$i]['Talla']; ?></p>
                      <br><br></span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class='price'>$<?php echo $arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'] ?></div>
                  </td>
                </tr>  
              </tbody>
            </table> 
            <?php 
          } 
          ?>
        <div class='line'></div>
        <div class='total'>
          <span style='float:left;'>
            <div class='thin dense'>Sub Total:</div>
            TOTAL:
          </span>
          <span style='float:right; text-align:right;'>
            <div class='thin dense'>
             </div>
            <div class='thin dense'>$<?php echo $total?></div>
            $<?php echo $total?>
          </span>
        </div>
</div>
</div>

        <div class='credit-info'>
          <div class='credit-info-content'>
            <table class='half-input-table'>
                
               </td></tr>
            </table>
            <img src='img/logos/logo_gris.png' height='80' class='credit-card-image' id='credit-card-image'></img>
            <form  action="venta.php" method="post" >
            <input class='input-field' type="hidden" name="id" id="id" value="<?php echo $user->getUseid()?>" ></input>
            Nombre: 
            <input class='input-field' type="text" name="nombre" id="nombre" placeholder="" require ></input>
            Apellido:
            <input class='input-field' type="text" name="apellido" id="apellido" placeholder="" require></input>
            Dirección:
            <input class='input-field' type="text" name="direccion" id="direccion" placeholder="" require></input>
            C.P.:
            <input class='input-field' type="number"  name="cp" id="cp" min="1" max="999999999999"  placeholder="" require></input>
            <script>
                  var input=  document.getElementById('cp');
                  input.addEventListener('input',function(){
                    if (this.value.length > 5) 
                      this.value = this.value.slice(0,5); 
                  })
              </script>
            Referencias del domicilio:
            <input class='input-field' name="ref" id="ref" placeholder="" require ></input>
            Teléfono:
            <input class='input-field' name="telefono" id="telefono" placeholder="" require ></input>
            Correo electrónico:
            <input class='input-field' name="correo" id="correo" placeholder="" require></input>
            <?php
            if($envio == true){
            ?>
                    <center>
                    <h3 style=" font-size: 25px;" >Envío Gratis</h3>
                    </center>
            
            <?php
            }else{
            ?>
                    <select class="input-field" name="envio">
                      <option style="background-color: black;" value="0">Selecciona un envío:</option>
                      <option style="background-color: black;" value="50">Toluca y Metepec $50</option>
                      <option style="background-color: black;" value="125">Resto de la republica $125</option>
                    </select>
            
            <?php
            }
            ?>      
            <center>
            <input class="botons" type="submit" ></input>
            </center>
            </form> 
            </div>          
        </div>
        
      </div>
</div>
  </body>
</html>