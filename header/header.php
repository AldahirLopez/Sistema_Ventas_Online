<div class="text">Menú</div>
      <div class="btn">
          <span class="fas fa-bars"></span>
          </div>
          <nav class="sidebar">
            <div class="text">Menú</div>
            <ul>
              <li class="active"><a href="index.php">Para Ti</a></li>
              <li>
                <a href="#" class="menu1-btn">Ropa<span id="icon" class="fas fa-caret-down uno"></span></a>
                <ul class="menu1-show">
                  <li><a href="index_ropa_t-shirt.php">T-Shirt</a></li>
                  <li><a href="index_ropa_hoddies.php">Hoodies</a></li>
                </ul>
              </li>
              <li>
                <a href="index_accesorios.php" class="menu2-btn">Accesorios<span id="icon"></span></a>
              </li>
              <li>
                <a href="index_ropa_tecnologia.php" class="menu3-btn">Tecnologia<span id="icon"></span></a>
              </li>
              <li>
                <a href="index_belleza.php" class="menu4-btn">Belleza<span id="icon"></span></a>
              </li>
              <li>
                <a href="index_ropa_salud.php" class="menu5-btn">Salud<span id="icon"></span></a>
              </li>
              <li><a href="#">Acerca de Nosotros</a></li>
            </ul>
          </nav>
       </div>
       <div class="text2"><a href="index.php"><i class="fas fa-home"></i> RR Desing MX</a></div>
       <div class="contenedor">
       <form action="index_busqueda.php" method="GET">
       <div class = "search-main">
                <input type = "text" id="idbusqueda" placeholder="Buscar" name="texto">
                <button class = "btn-main btn-search"><i class="fas fa-search" aria-hidden="true" style="color: white;"></i></button>
            </div>
        </form>
            <div class ="options-main">       
                <div class="item-option" title="Perfil"><a href="servicios/login/validad.php"><i class="fas fa-user" style="color: white;"></a></i></div>
                <div class="item-option" title="Carrito"><a href="carrito.php"><i class="fas fa-shopping-basket" style="color: white;"><span class="count">
                  <?php
                  
                  if(isset($_SESSION['carrito'])){
                    echo count($_SESSION['carrito']);
                  }else{
                    echo 0;
                  }
                  ?>
                </span></a></i></div> 
            </div>
            
  </div>