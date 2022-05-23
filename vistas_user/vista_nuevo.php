<!DOCTYPE html>
<html lang="en">
<head>
  <!-- mio -->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" integrity="sha512-+1GzNJIJQ0SwHimHEEDQ0jbyQuglxEdmQmKsu8KI7QkMPAnyDrL9TAnVyLPEttcTxlnLVzaQgxv2FpLCLtli0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css -->
    <link rel="stylesheet" href="../css/header.css">   
    <link rel="stylesheet" href="../css/login.css"> 
  <title>Formulario Registro</title>
</head>
<body>
<header>
<div class="text">Menu</div>
            <div class="btn">
                <span class="fas fa-bars"></span>
                </div>
                <nav class="sidebar">
                  <div class="text">Menu</div>
                  <ul>
                    <li class="active"><a href="#">Para Ti</a></li>
                    <li>
                      <a href="#" class="menu1-btn">Estilo<span id="icon" class="fas fa-caret-down uno"></span></a>
                      <ul class="menu1-show">
                        <li><a href="#">Ropa</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Acerca de Nosotros</a></li>
                  </ul>
                </nav>
            </div>
            <div class="text2">RR Desing MX</div>
            <div class="contenedor">
            <div class = "search-main">
                      <input type = "text" id="idbusqueda" placeholder="Buscar">
                      <button class = "btn-main btn-search"><i class="fas fa-search" aria-hidden="true" style="color: white;"></i></button>
                  </div>
                  <div class ="options-main">       
                      <div class="item-option" title="Perfil"><a href="#"><i class="fas fa-user" style="color: white;"></a></i></div>
                      <div class="item-option" title="Carrito"><a href="#"><i class="fas fa-shopping-basket" style="color: white;"></a></i></div> 
                  </div>
                  
        </div>
    </header>
    <div class="titulo">RR Dsesing Mx</div>
    <div class="titulo2">Bienvenido</div>
    <div class="conten">
    <button class="botons2" onclick="login()"><i class="fas fa-arrow-left"></i></button>
    <script type="text/javascript">
      function login(){
        window.location.href="../index.php";
      }
    </script>
    </div>
    <form method="post" class="form-register" enctype="multipart/form-data">
    <h4>Formulario Registro</h4>
    <input class="controls" type="text" name="usuario" id="usuario" placeholder="Usuario">
    <input class="controls" type="text" name="nombres" id="nombres" placeholder="Nombre(s)">
    <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
    <input class="controls" type="text" name="telefono" id="telefono" placeholder="Telefono a 10 digitos">
    <input class="controls" type="text" name="correo" id="correo" placeholder="Email">
    <input class="controls" type="password" name="password" id="password" placeholder="Contraseña">
    <div class="titulo4">Foto de perfil(Opcional)</div> 
    <input class="controls" type="file" name="ruta_img" require="">
    <input class="botons" type="submit" name="Registrar" value="Registrar">
    <p><a href="../servicios/login/validad.php">¿Ya tengo Cuenta?</a></p> 
 </form> 
 <div class="logo"><img  src="../img/logos/logo_gris.png"></div>
 <?php
    include("../registros/registro_usuario.php");
  ?>
        <!--js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>
 </body>
</html> 
  
