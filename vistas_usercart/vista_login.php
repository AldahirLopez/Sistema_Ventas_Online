<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tienda Online</title>
    <!-- mio -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/cca00cc8a6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css" integrity="sha512-+1GzNJIJQ0SwHimHEEDQ0jbyQuglxEdmQmKsu8KI7QkMPAnyDrL9TAnVyLPEttcTxlnLVzaQgxv2FpLCLtli0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css -->
    <link rel="stylesheet" href="css/header.css">   
    <link rel="stylesheet" href="css/login.css">   
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
    <div class="titulo">RR Desing Mx</div>
    <div class="titulo2">Bienvenido</div>
          <div class="conten">
          <button class="botons2" onclick="login()"><i class="fas fa-arrow-left"></i></button>
          <script type="text/javascript">
            function login(){
              window.location.href="index.php";
            }
          </script>
          </div>
             <form action="#" method="post" class="form-register">
                <h4>Login</h4>
                Username: <input class="controls" type="text" name="username"  placeholder="Usuario">
                Password: <input class="controls" type="password" name="password" placeholder="Contraseña"> 
                <input class="botons" type="submit"  value="Iniciar sesion">
                <p><a href="vistas_usercart/vista_nuevo.php">NO TENGO CUENTA</a></p>
            </form>  
            <div class="logo"><img  src="img/logos/logo_gris.png"></div>
          
  </body>
</html>

