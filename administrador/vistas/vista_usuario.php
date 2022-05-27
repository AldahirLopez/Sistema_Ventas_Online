<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/menu_admi.css">
  <title>Formulario Registro</title>
</head>
<body>
<div class="encabezado">
	
</div>
    
<main>
<button class="botons" onclick="login()"><i class="fas fa-arrow-left"></i></button>
    <script type="text/javascript">
      function login(){
        window.location.href="../menu.php";
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
				<p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
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
				<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			</div>

			<!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__telefono">
				<label for="telefono" class="formulario__label">Teléfono</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="4491234567"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
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
		
		<?php
			include("../registros/usuario.php");
		?>  
</main>
<footer>
	<div class="encabezado"></div>
</footer>

<script src="../../js/validad.js"></script>
</body>

</html>