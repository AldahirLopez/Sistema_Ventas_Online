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
    <div class="titulo"></div>
    <main>
<button class="botons" onclick="login()"><i class="fas fa-arrow-left"></i></button>
    <script type="text/javascript">
      function login(){
        window.location.href="../index.php";
      }
	</script>
	<center>
	<h4>Registro de Usuario</h4>
	</center>
	<h4 style="color:#FF0000";> *Campos Obligatorios</h4>
    <form method="post" class="formulario" id="formulario" enctype="multipart/form-data">
    <!-- Grupo: Usuario -->
			<div class="formulario__grupo" id="grupo__usuario">
				<label for="usuario" class="formulario__label">Usuario</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="john123"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

			<!-- Grupo: Nombre -->
			<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombre" class="formulario__label">Nombres</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="John Doe"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El nombre solo puede contener letras.</p>
			</div>

      <!-- Grupo: Apellidos -->
			<div class="formulario__grupo" id="grupo__apellidos">
				<label for="nombre" class="formulario__label">Apellidos Paterno</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="apellidos" id="apellidos" placeholder="John Doe"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El nombre solo puede contener letras.</p>
			</div>

       <!-- Grupo: Direccion Calle-->
			<div class="formulario__grupo" id="grupo__direccion">
				<label for="direccion" class="formulario__label">Apellido Materno</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="direccion" id="direccion" placeholder="John Doe"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El nombre solo puede contener letras.</p>
			</div>
	  	
			<!-- Grupo: Contraseña -->
			<div class="formulario__grupo" id="grupo__password">
				<label for="password" class="formulario__label">Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" name="password" id="password"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La contraseña tiene que ser de 8 a 12 dígitos. Debe contener mayúsculas, minúsculas, números o dígitos especiales (@-#$%*)</p>	
			</div>

			<!-- Grupo: Contraseña 2 -->
			<div class="formulario__grupo" id="grupo__password2">
				<label for="password2" class="formulario__label">Repetir Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" name="password2" id="password2"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
			</div>

			<!-- Grupo: Correo Electronico -->
			<div class="formulario__grupo" id="grupo__correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El correo solo puede contener letras, números, puntos, guiones y guion bajo.</p>
			</div>

			<!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__telefono">
				<label for="telefono" class="formulario__label">Teléfono</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="4491234567"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El telefono solo puede contener números y únicamente 10 dígitos.</p>
			</div>

			<div class="formulario__grupo">
			<label for="foto" class="formulario__label"><h4 style="color:#FF0000";>Foto de perfil*</h4></label>
			<input class="formulario__input" type="file" name="ruta_img" require="">
			</div> 

			<div class="formulario__grupo">
			<label for="rol" class="formulario__label"><h4 style="color:#FF0000";>Selecione el Rol *</h4></label>
			<select class="formulario__input" id="rolSelect" name="rolSelect">
			<option value="0">Seleccionar...</option>
			<option value="1">Usuario</option>
			<option value="2">Administrador</option>
			</select>
			</div>
    		<!-- Grupo: Registrar -->
			<div class="formulario__grupo" id="grupo__terminos">
			
			</div>
			<!-- Grupo: Registrar -->
			<div class="formulario__grupo" id="grupo__terminos">
			
			</div>
			<!-- Grupo: Terminos y Condiciones -->
			<div class="formulario__grupo" id="grupo__terminos">
				<label class="formulario__label">
					<input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
					Acepto los Terminos y Condiciones
				</label>
			</div>
			<!-- Grupo: Registrar -->
			
			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>	
			</div>
			<!-- Grupo: Registrar -->
			<div class="formulario__grupo" id="grupo__terminos">
			
			</div>
			<!-- Grupo: Registrar -->
			<div class="formulario__grupo" id="grupo__terminos">
			
			</div>
			<!-- Grupo: Registrar -->
			<div class="formulario__grupo" id="grupo__terminos">

			</div>
			<!-- Grupo: Registrar -->
			<div class="formulario__grupo" id="grupo__terminos">
			<center>
			<input class="btnregistrar" type="submit" name="Registrar" value="Registrar">
			</center>
			</div>
			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			</div>
			
		</form>
</main>
 <?php
    include("../registros/registro_usuario.php");
  ?>
        <!--js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>
 </body>
</html> 
  
