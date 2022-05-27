<?php
    include '../../registros/conexion.php';
    include_once '../../servicios/sesion/user.php';
    include_once '../../servicios/sesion/user_session.php';
    $userSession = new UserSession();
    $user = new User();
    $user->setUser($userSession->getCurrentUser()); 
?>
      <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Ver Pedido</title>
        <!-- mio -->
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link href="../../fontawesome/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" integrity="sha512-+1GzNJIJQ0SwHimHEEDQ0jbyQuglxEdmQmKsu8KI7QkMPAnyDrL9TAnVyLPEttcTxlnLVzaQgxv2FpLCLtli0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Css -->
        <link rel="stylesheet" href="../../css/listar_pedidos_admin.css"> 
        <link rel="stylesheet" href="../../css/popuppedidos.css">  
        <link rel="stylesheet" type="text/css" href="../../css/admin-header.css">
      </head>
      <body>
      <div class="menu">
      <button class="botons" onclick="login()"><i class="fas fa-arrow-left"></i></button>
          <script type="text/javascript">
            function login(){
              window.location.href="../menu.php";
            }
          </script>
      </div>
     <!--Pedidos-->
     
     <table>
      <tr><th colspan="6"><h1>Lista de pedidos</h1></th></tr>
      <tr>

      <th>Pago</th>
      <th>Venta</th>
      <th>Direccion</th>
      <th>Productos</th>
      <th>Estado del envio</th>
      <th>Actualizar</th>
      </tr>
      
      
      <?php
      //consulta de los pagos
       $pagos=$conexion ->query("select * from pago") or die($conexion -> error);
       while($mostrarpagos=mysqli_fetch_array($pagos)){
            //consulta de los ventas con el pago
            $idventa = $mostrarpagos['id_venta'];
            $iddireccion = $mostrarpagos['id_direccion'];
            
            ?>
            <tr>
               <td>
               <button id="btn-abrir-popup<?php echo $mostrarpagos['id_pago'];?>" class="btn-abrir-popup">Ver Pagos</button>
               <div class="overlay" id="overlay<?php echo $mostrarpagos['id_pago'];?>">
                <div class="popup" id="popup<?php echo $mostrarpagos['id_pago'];?>">
                <a href="#" id="btn-cerrar-popup<?php echo $mostrarpagos['id_pago'];?>" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <script type="text/javascript">
                  var btnAbrirPopup<?php echo $mostrarpagos['id_pago'];?> = document.getElementById('btn-abrir-popup<?php echo $mostrarpagos['id_pago'];?>'),
                    overlay<?php echo $mostrarpagos['id_pago'];?> = document.getElementById('overlay<?php echo $mostrarpagos['id_pago'];?>'),
                    popup<?php echo $mostrarpagos['id_pago'];?> = document.getElementById('popup<?php echo $mostrarpagos['id_pago'];?>'),
                    btnCerrarPopup<?php echo $mostrarpagos['id_pago'];?> = document.getElementById('btn-cerrar-popup<?php echo $mostrarpagos['id_pago'];?>');

                  btnAbrirPopup<?php echo $mostrarpagos['id_pago'];?>.addEventListener('click', function(){
                    overlay<?php echo $mostrarpagos['id_pago'];?>.classList.add('active');
                    popup<?php echo $mostrarpagos['id_pago'];?>.classList.add('active');
                  });

                  btnCerrarPopup<?php echo $mostrarpagos['id_pago'];?>.addEventListener('click', function(e){
                    e.preventDefault();
                    overlay<?php echo $mostrarpagos['id_pago'];?>.classList.remove('active');
                    popup<?php echo $mostrarpagos['id_pago'];?>.classList.remove('active');
                  });
               </script>  
                <div class="pagos">
                  <table>
                  <tr><th colspan="5"><h1>Lista de pagos</h1></th></tr>
                      <tr>
                      <th>Pago</th>
                      <th>Venta</th>
                      <th>Direccion</th>
                      <th>Fecha</th>
                      <th>Total</th>
                      </tr>
                      <tr>
                      <td>
                        <?php echo $mostrarpagos['id_pago'] ?>
                      </td>
                      <td>
                        <?php echo $mostrarpagos['id_venta'] ?>
                      </td>
                      <td>
                        <?php echo $mostrarpagos['id_direccion'] ?>
                      </td>
                      <td>
                        <?php echo $mostrarpagos['fecha'] ?>
                      </td>
                      <td>
                        <?php echo $mostrarpagos['total'] ?>
                      </td>
                      </tr>
                  </table>
                 </div>
                </div>
               </td>
              

               <td>
               <button id="btn-abrir-popup-ventas<?php echo $mostrarpagos['id_venta'];?>" class="btn-abrir-popup-ventas">Ver Ventas</button>
               <div class="overlay-ventas" id="overlay-ventas<?php echo $mostrarpagos['id_venta'];?>">
                <div class="popup-ventas" id="popup-ventas<?php echo $mostrarpagos['id_venta'];?>">
                <a href="#" id="btn-cerrar-popup-ventas<?php echo $mostrarpagos['id_venta'];?>" class="btn-cerrar-popup-ventas"><i class="fas fa-times"></i></a>
                <script type="text/javascript">
                  var btnAbrirPopupventas<?php echo $mostrarpagos['id_venta'];?> = document.getElementById('btn-abrir-popup-ventas<?php echo $mostrarpagos['id_venta'];?>'),
                    overlayventas<?php echo $mostrarpagos['id_venta'];?> = document.getElementById('overlay-ventas<?php echo $mostrarpagos['id_venta'];?>'),
                    popupventas<?php echo $mostrarpagos['id_venta'];?> = document.getElementById('popup-ventas<?php echo $mostrarpagos['id_venta'];?>'),
                    btnCerrarPopupventas<?php echo $mostrarpagos['id_venta'];?> = document.getElementById('btn-cerrar-popup-ventas<?php echo $mostrarpagos['id_venta'];?>');

                  btnAbrirPopupventas<?php echo $mostrarpagos['id_venta'];?>.addEventListener('click', function(){
                    overlayventas<?php echo $mostrarpagos['id_venta'];?>.classList.add('active');
                    popupventas<?php echo $mostrarpagos['id_venta'];?>.classList.add('active');
                  });

                  btnCerrarPopupventas<?php echo $mostrarpagos['id_venta'];?>.addEventListener('click', function(e){
                    e.preventDefault();
                    overlayventas<?php echo $mostrarpagos['id_venta'];?>.classList.remove('active');
                    popupventas<?php echo $mostrarpagos['id_venta'];?>.classList.remove('active');
                  });
               </script>
                  <div class="pagos">
                  <table>
                  <tr><th colspan="6"><h1>Lista de ventas</h1></th></tr>
                      <tr>
                      <th>Venta</th>
                      <th>Usuario</th>
                      <th>Fecha</th>
                      <th>Total</th>
                      <th>Guia</th>
                      <th>Paqueteria</th>
                      </tr>
                        <?php
                        $ventas=$conexion ->query("select * from venta where id_venta = $idventa") or die($conexion -> error);
                        while($mostrarventas=mysqli_fetch_array($ventas)){
                        ?>
                        <tr>
                          <td>
                            <?php echo $mostrarventas['id_venta'] ?>
                          </td>
                          <td>
                            <?php echo $mostrarventas['id_usuario'] ?>
                          </td>
                          <td>
                            <?php echo $mostrarventas['fecha'] ?>
                          </td>
                          <td>
                            <?php echo $mostrarventas['total'] ?>
                          </td>
                          <td>
                            <?php echo $mostrarventas['guia'] ?>
                          </td>
                          <td>
                            <?php echo $mostrarventas['paqueteria'] ?>
                          </td>
                        </tr>
                        <?php
                        }
                        ?>
                  </table>
                 </div>
                </div>
               </td>

               <td>
               <button id="btn-abrir-popup-d<?php echo $mostrarpagos['id_direccion'];?>" class="btn-abrir-popup-d">Ver Direccion</button>
               <div class="overlay-d" id="overlay-d<?php echo $mostrarpagos['id_direccion'];?>">
                <div class="popup-d" id="popup-d<?php echo $mostrarpagos['id_direccion'];?>">
                <a href="#" id="btn-cerrar-popup-d<?php echo $mostrarpagos['id_direccion'];?>" class="btn-cerrar-popup-d"><i class="fas fa-times"></i></a>
                <script type="text/javascript">
                  var btnAbrirPopupd<?php echo $mostrarpagos['id_direccion'];?> = document.getElementById('btn-abrir-popup-d<?php echo $mostrarpagos['id_direccion'];?>'),
                    overlayd<?php echo $mostrarpagos['id_direccion'];?> = document.getElementById('overlay-d<?php echo $mostrarpagos['id_direccion'];?>'),
                    popupd<?php echo $mostrarpagos['id_direccion'];?> = document.getElementById('popup-d<?php echo $mostrarpagos['id_direccion'];?>'),
                    btnCerrarPopupd<?php echo $mostrarpagos['id_direccion'];?> = document.getElementById('btn-cerrar-popup-d<?php echo $mostrarpagos['id_direccion'];?>');

                  btnAbrirPopupd<?php echo $mostrarpagos['id_direccion'];?>.addEventListener('click', function(){
                    overlayd<?php echo $mostrarpagos['id_direccion'];?>.classList.add('active');
                    popupd<?php echo $mostrarpagos['id_direccion'];?>.classList.add('active');
                  });

                  btnCerrarPopupd<?php echo $mostrarpagos['id_direccion'];?>.addEventListener('click', function(e){
                    e.preventDefault();
                    overlayd<?php echo $mostrarpagos['id_direccion'];?>.classList.remove('active');
                    popupd<?php echo $mostrarpagos['id_direccion'];?>.classList.remove('active');
                  });
               </script>
                  <div class="pagos">
                  <table>
                  <tr><th colspan="7"><h1>Direccion de envio</h1></th></tr>
                      <tr>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Direccion</th>
                      <th>CP</th>
                      <th>Referencias</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      </tr>
                        <?php
                        $direccion=$conexion ->query("select * from direccion where id_direccion = $iddireccion") or die($conexion -> error);
                        while($mostrardirec=mysqli_fetch_array($direccion)){
                        ?>
                        <tr>
                          <td>
                            <?php echo $mostrardirec['nombre'] ?>
                          </td>
                          <td>
                            <?php echo $mostrardirec['apellidos'] ?>
                          </td>
                          <td>
                            <?php echo $mostrardirec['direccion'] ?>
                          </td>
                          <td>
                            <?php echo $mostrardirec['cp'] ?>
                          </td>
                          <td>
                            <?php echo $mostrardirec['referencias'] ?>
                          </td>
                          <td>
                            <?php echo $mostrardirec['telefono'] ?>
                          </td>
                          <td>
                            <?php echo $mostrardirec['correo'] ?>
                          </td>
                        </tr>
                        <?php
                        }
                        ?>
                  </table>
                 </div>
                </div>
               </td>


               <td>
               <button id="btn-abrir-popup-p<?php echo $mostrarpagos['id_venta'];?>" class="btn-abrir-popup-p">Ver Productos</button>
               <div class="overlay-p" id="overlay-p<?php echo $mostrarpagos['id_venta'];?>">
                <div class="popup-p" id="popup-p<?php echo $mostrarpagos['id_venta'];?>">
                <a href="#" id="btn-cerrar-popup-p<?php echo $mostrarpagos['id_venta'];?>" class="btn-cerrar-popup-p"><i class="fas fa-times"></i></a>
                <script type="text/javascript">
                  var btnAbrirPopupp<?php echo $mostrarpagos['id_venta'];?> = document.getElementById('btn-abrir-popup-p<?php echo $mostrarpagos['id_venta'];?>'),
                    overlayp<?php echo $mostrarpagos['id_venta'];?> = document.getElementById('overlay-p<?php echo $mostrarpagos['id_venta'];?>'),
                    popupp<?php echo $mostrarpagos['id_venta'];?> = document.getElementById('popup-p<?php echo $mostrarpagos['id_venta'];?>'),
                    btnCerrarPopupp<?php echo $mostrarpagos['id_venta'];?> = document.getElementById('btn-cerrar-popup-p<?php echo $mostrarpagos['id_venta'];?>');

                  btnAbrirPopupp<?php echo $mostrarpagos['id_venta'];?>.addEventListener('click', function(){
                    overlayp<?php echo $mostrarpagos['id_venta'];?>.classList.add('active');
                    popupp<?php echo $mostrarpagos['id_venta'];?>.classList.add('active');
                  });

                  btnCerrarPopupp<?php echo $mostrarpagos['id_venta'];?>.addEventListener('click', function(e){
                    e.preventDefault();
                    overlayp<?php echo $mostrarpagos['id_venta'];?>.classList.remove('active');
                    popupp<?php echo $mostrarpagos['id_venta'];?>.classList.remove('active');
                  });
               </script>
                  <div class="pagos">
                  <table>
                  <tr><th colspan="4"><h1>Productos</h1></th></tr>
                      <tr>
                      <th>Nombre</th>
                      <th>Imagen</th>
                      <th>Talla</th>
                      <th>Cantidad</th>
                      </tr>
                        <?php
                        $ventapro=$conexion ->query("select * from venta_productos where id_venta = $idventa") or die($conexion -> error);
                        while($mostrarpro=mysqli_fetch_array($ventapro)){
                        $idpro = $mostrarpro['id_producto'];
                        $pro=$conexion ->query("select * from items where id = $idpro") or die($conexion -> error);
                        $mostrarproitem=mysqli_fetch_array($pro)
                        ?>
                        <tr>
                          <td>
                            <?php echo $mostrarproitem['nombre'] ?>
                          </td>
                          <td>
                          <img width='80' height='80' src="data:jpg;base64,<?php echo  base64_encode($mostrarproitem['img']); ?>">
                          </td>
                          <td>
                            <?php echo $mostrarpro['talla'] ?>
                          </td>
                          <td>
                            <?php echo $mostrarpro['cantidad'] ?>
                          </td>
                        </tr>
                        <?php
                        }
                        ?>
                  </table>
                 </div>
                </div>
               </td>
               <td>
               <?php 
               $ventas=$conexion ->query("select * from venta where id_venta = $idventa") or die($conexion -> error);
               while($mostrarventas=mysqli_fetch_array($ventas)){
                              switch ($mostrarventas['estado']) {
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
                            }
                            }  ?>
               </td>
               <td>
               <a href="actualizarEstado.php?id=<?php echo $idventa ?>" ><button class="estado">Actualizar Envio</button></a>
               </td>
            </tr>
      <?php
       }
      ?>
      </table>
    </body>
  </html>
<?php
?>

