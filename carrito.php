<?php
 session_start();
 include 'registros/conexion.php';
 if(isset($_SESSION['carrito'])){
     //si ya esta agregado
     if(isset($_GET['id'])){
        $arreglo = $_SESSION['carrito'];
        $encontro = false;
        $numero = 0;
        for($i=0;$i<count($arreglo);$i++){
          if($arreglo[$i]['Id'] == $_GET['id']){
            $encontro = true;
            $numero=$i;
          }
        }
        if($encontro == true){
          $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad']+1;
          $_SESSION['carrito']=$arreglo;
        }else{
          //no estaba 
          $nombre="";
          $precio="";
          $imagen="";
          $res = $conexion -> query('select * from items where id='.$_GET['id'])or die($conexion -> error );
          $fila = mysqli_fetch_row($res);
          $nombre=$fila[1];
          $precio=$fila[3];
          $imagen=$fila[7];
          $desc=$fila[4];
          $talla=$fila[9];
          $categoria=$fila[6];
          $arregloNuevo = array(
              'Id' => $_GET['id'],
              'Nombre' => $nombre,
              'Precio' => $precio,
              'Imagen' => $imagen,
              'Descripcion' => $desc,
              'Talla' => $talla,
              'Categoria' => $categoria,
              'Cantidad' => 1
          );
          array_push($arreglo, $arregloNuevo);
          $_SESSION['carrito'] = $arreglo;
        }
     }

 }else{
     //si no existe
     if(isset($_GET['id'])){
         $nombre="";
         $precio="";
         $imagen="";
         $res = $conexion -> query('select * from items where id='.$_GET['id'])or die($conexion -> error );
         $fila = mysqli_fetch_row($res);
         $nombre=$fila[1];
         $precio=$fila[3];
         $imagen=$fila[7];
         $desc=$fila[4];
         $talla=$fila[9];
         $categoria=$fila[6];
         $arreglo[] = array(
             'Id' => $_GET['id'],
             'Nombre' => $nombre,
             'Precio' => $precio,
             'Imagen' => $imagen,
             'Descripcion' => $desc,
             'Talla' => $talla,
             'Categoria' => $categoria,
             'Cantidad' => 1
         );
         $_SESSION['carrito']=$arreglo;
     }
 }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RR Desing Carrito</title>
    <!-- mio -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" integrity="sha512-+1GzNJIJQ0SwHimHEEDQ0jbyQuglxEdmQmKsu8KI7QkMPAnyDrL9TAnVyLPEttcTxlnLVzaQgxv2FpLCLtli0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css -->
    <link rel="stylesheet" href="css/header.css">   
    <link rel="stylesheet" href="css/carrito.css"> 
    <link rel="stylesheet" href="css/index.css">  
  </head>
  <body>
    
        <header>
        <?php
        include_once('header/header.php');
        ?>
        <script src="js/menu.js"> </script> 
        </header>
            <div class="site-blocks-table">
            <table>

              <tr><th colspan="6"><h1>Carrito de compras</h1></th></tr>
              <tr>

              <th>Imagen</th>
              <th>Producto</th>
              <th>Talla</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Acción</th>

              </tr>

              <?php
              $total = 0;
             if(isset($_SESSION['carrito']))
              {
                $arregloCarrito = $_SESSION['carrito'];
                for($i=0;$i<count($arregloCarrito);$i++)
                {
                  $talla = $arregloCarrito[$i]['Talla'];
                  $total = $total + ($arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad'] );
              ?>

              <tr>
                <td><img width='80' height='80' src="data:jpg;base64,<?php echo base64_encode($arregloCarrito[$i]['Imagen']); ?>"></td>
                <td><?php echo $arregloCarrito[$i]['Nombre']; ?></td>
                <td>
                <?php 
                  $talla  = $arregloCarrito[$i]['Talla'];
                      if($talla=='Chica' || $talla=='Mediana' || $talla=='Grande' || $talla=='Extra Grande' || $talla == 'unitalla'){
                        ?>
                        <i class="fas fa-tshirt"></i>Talla: <?php echo $arregloCarrito[$i]['Talla']; ?>
                        <?php
                      }else{
                        if($talla=='16oz' || $talla == '24oz'){
                          ?>
                          <i class="fas fa-prescription-bottle"></i>
                          <?php
                        }else{
                          
                        }           
                      }
                      ?>
                </p>
                </td>
                
                

                  
              
               

                <td class="cant<?php echo $arregloCarrito[$i]['Id'];?>">$<?php echo $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']; ?></td>
                <td><p>Piezas: <?php echo $arregloCarrito[$i]['Cantidad']; ?></p>
                
              </td>
                <td>
                    <a href="#" type="button" class="eliminar" data-id="<?php echo $arregloCarrito[$i]['Id'];?>"><i class="fas fa-trash"></i></a>
                </td>
                
              </tr>
              <?php } } ?>
              <tr>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
              <div class="total">Total:<?php echo $total;?></div>
                </td>
                <td>
                  <button class="pagar" onclick="window.location='session.php'">Pagar: <i class="fas fa-cash-register"></i></button>
                </td>
              </tr>
              </table>
              

            </div>

      <!--js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>
      <script src="js/slider.js"></script> 
      <script>
        $(document).ready(function(){
          $(".eliminar").click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var boton =$(this);

            $.ajax({
              method: 'POST',
              url: './servicios/carrito/eliminarCarrito.php',
              data:{
                id:id
              }
            }).done(function(respuesta){
                boton.parent('td').parent('tr').remove();
            });
          });
          $(".cantidad").keyup(function(){
            var cantidad = $(this).val();
            var precio = $(this).data("precio");
            var id = $(this).data("id");
            incrementar(cantidad,precio,id);
          });
          function incrementar(cantidad, precio, id){
            var multi = parseFloat(cantidad)* parseFloat(precio)
            $(".cant"+id).text("$"+multi.toFixed(2));
            $.ajax({
              method: 'POST',
              url: './servicios/carrito/actualizar.php',
              data:{
                id:id,
                cantidad:cantidad
              }
            }).done(function(respuesta){
  
            });
          }
        });
      </script> 
  </body>
</html>