<!DOCTYPE html>
<html lang="en">
<head>
<link href="../../fontawesome/css/all.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../../css/admin-header.css">
  <link rel="stylesheet" type="text/css" href="../../css/menu_admi.css">
  <title>Formulario Registro</title>
</head>
<body>
    <div class="menu">
    <button class="btn-registro-back" onclick="login()"><i class="fas fa-arrow-left"></i></button>
    <script type="text/javascript">
      function login(){
        window.location.href="listar_proveedor.php";
      }
    </script>
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
				<label for="usuario" class="formulario__label">Nombres</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="john123"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
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

      <!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__telefono">
				<label for="telefono" class="formulario__label">Direccion</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="Calle y Numero"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
			</div>

      <!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__telefono">
				<label for="telefono" class="formulario__label">Codigo Postal</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="Calle y Numero"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
			</div>

      <!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__telefono">
				<label for="telefono" class="formulario__label">Direccion</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="Calle y Numero"><h4 style="color:#FF0000";>*</h4>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
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
</body>
</html>