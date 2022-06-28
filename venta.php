<?php
    include 'registros/conexion.php';
    include_once 'servicios/sesion/user.php';
    include_once 'servicios/sesion/user_session.php';
    $userSession = new UserSession();
    $user = new User();
          //registro de datos de la venta para el envio  
          $conexion -> query("insert into direccion(nombre, apellidos, cp, estado, municipio, calle, numeroext, numeroint, referencias, telefono, correo) 
          values(
            '".$_POST['nombre']."',
            '".$_POST['apellido']."',
            '".$_POST['cp']."',
            '".$_POST['estado']."',
            '".$_POST['municipio']."',
            '".$_POST['direccion']."',
            '".$_POST['numext']."',
            '".$_POST['numint']."',
            '".$_POST['ref']."',
            '".$_POST['telefono']."',
            '".$_POST['correo']."'
             )")or die($conexion -> error);
            $id_direc = $conexion -> insert_id;
            $envio =  (int)trim($_POST['envio']); 
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
                // SDK de Mercado Pago
                require __DIR__ .  '/vendor/autoload.php';
                // Agrega credenciales
                MercadoPago\SDK::setAccessToken('TEST-1669952161703630-053115-461a36c7bd6727a66e37e281b22fdb2b-1133936196');
                // Crea un objeto de preferencia
                $preference = new MercadoPago\Preference();                          
                $preference->back_urls = array(
                    "success" => "/localhost/ventas/thankyou.php?id_direc=$id_direc",
                    "failure" => "errorpago.php?error=failure",
                    "pending" => "errorpago.php?error=pending"
                );
                $preference->auto_return = "approved";


                $total = 0;
                $letrero = 'Gratis';
                $contador =0;
                $arreglo = $_SESSION['carrito'];
                $datos = array();
                for($i=0;$i<count($arreglo);$i++)
                {
                  if( $arreglo[$i]['Categoria'] == 't-shirt'){
                    $envio = 0;
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
                      <p>  <?php echo $arreglo[$i]['Talla']; ?> </p>
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

          $item = new MercadoPago\Item();
          $item->title = 'RR-Desing';
          $item->quantity = 1;
          $item->unit_price = $total+$envio;
          $datos[]=$item;
          $preference->items = $datos;
          $preference->save();
          ?>
        <div class='line'></div>
        <div class='total'>
          <span style='float:left;'>
            <div class='thin dense'>Costo de envio:</div>
            <div class='thin dense'>Sub Total:</div>
            TOTAL:
          </span>
          <span style='float:right; text-align:right;'>
            <div class='thin dense'>
            <?php
             if($envio == 0){
             ?>
                  <?php echo $letrero;?>
            <?php
             }else{
            ?>
                  $<?php echo $envio;?>
             <?php
             }
             ?>
            </div>
            <div class='thin dense'>$<?php echo $total?></div>
            $<?php echo $total+$envio ?>
          </span>
        </div>
</div>
</div>
        <div class='credit-info'>
          <div class='credit-info-content'>
            <table class='half-input-table'>
                
               </td></tr>
               <?php
                include 'registros/conexion.php';
                $direc=$conexion ->query("select * from direccion where id_direccion =$id_direc") or die($conexion -> error);
                $fila = mysqli_fetch_array($direc)
               ?>
            </table>
            <img src='img/logos/logo_gris.png' height='80' class='credit-card-image' id='credit-card-image'></img>
            Nombre: 
            <input class='input-field' type="text" name="nombre" id="nombre" placeholder="<?php echo $fila[1]?>" readonly></input>
            Apellido:
            <input class='input-field' type="text" name="apellido" id="apellido" placeholder="<?php echo $fila[2]?>" readonly></input>
            C.P.:
            <input class='input-field' type="number"  name="cp" id="cp" min="1" max="999999999999"  placeholder="<?php echo $fila[3]?>" readonly></input>
            <script>
                  var input=  document.getElementById('cp');
                  input.addEventListener('input',function(){
                    if (this.value.length > 5) 
                      this.value = this.value.slice(0,5); 
                  })
              </script>
            Estado:
            <input class='input-field' type="text" name="estado" id="estado" placeholder="<?php echo $fila[4]?>" readonly></input>
            Municipio:
            <input class='input-field' type="text" name="municipio" id="municipio" placeholder="<?php echo $fila[5]?>" readonly></input>
            Calle/Dirección:
            <input class='input-field' type="text" name="direccion" id="direccion" placeholder="<?php echo $fila[6]?>" readonly></input>
            Número exterior:
            <input class='input-field' type="text" name="numext" id="numext" placeholder="<?php echo $fila[7]?>" readonly></input>
            Número interior:
            <input class='input-field' type="text" name="numint" id="numint" placeholder="<?php echo $fila[8]?>" readonly></input>
            Referencias del domicilio:
            <input class='input-field' name="ref" id="ref" placeholder="<?php echo $fila[9]?>" readonly></input>
            Teléfono:
            <input class='input-field' type="number" name="telefono" id="telefono" max="999999999999" placeholder="<?php echo $fila[10]?>" readonly></input>
            <script>
                  var input=  document.getElementById('telefono');
                  input.addEventListener('input',function(){
                    if (this.value.length > 10) 
                      this.value = this.value.slice(0,10); 
                  })
              </script>
            Correo electrónico:
            <input class='input-field' name="correo" id="correo" placeholder="<?php echo $fila[11]?>" readonly></input>
            <center>
            <center>
            <button id="btn-abrir-popup" class="btn-abrir-popup">Pagar</button>
            </center>
            </div>        
            <!--pagar-->
            <div class="overlay" id="overlay">
                <div class="popup" id="popup">
                <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <h3>ELIGE UN METODO DE PAGO</h3>
                <h4>recuerda consultar nuestras promociones</h4>
                <div class="pagos">
                <i class="far fa-handshake"></i>
                <script
                src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"
                data-preference-id="<?php echo $preference->id; ?>">
                </script>
                </div>
                </div>
            </div>
             
            
        </div>
      </div>
</div>
<script src="js/popup.js"></script>
  </body>
</html>


