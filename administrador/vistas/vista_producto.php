<?php 
	include("../../registros/conexion.php");
	$consulta = "SELECT nombre FROM  proveedor";
	$resultado = mysqli_query($conexion,$consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/admin-header.css">
  <link rel="stylesheet" type="text/css" href="../../css/menu_admi.css">
  <title>Formulario Producto</title>
</head>
<body>
<div class="encabezado">
	
</div>
  <main>
    <button class="btn-registro-back" onclick="login()"><i class="fas fa-arrow-left"></i></button>
    <script type="text/javascript">
      function login(){
        window.location.href="listar_productos.php";
      }
    </script>
	<center>
	<h4>Registro de productos</h4>
	</center> 
    <form method="post" class="formulario" id="formulario" enctype="multipart/form-data">
    <!-- Grupo: Nombre Producto -->
			<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombre" class="formulario__label">Nombre</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Articulo ">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener números, letras y guión bajo.</p>
			</div>

			<!-- Grupo: Cantidad -->
			<div class="formulario__grupo" id="grupo__cantidad">
				<label for="cantidad" class="formulario__label">Cantidad</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="cantidad" id="cantidad" placeholder="123">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La cantidad solo acepta números.</p>
			</div>

      <!-- Grupo: Precio -->
			<div class="formulario__grupo" id="grupo__precio">
				<label for="precio" class="formulario__label">Precio</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="precio" id="precio" placeholder="MXN-$12.23">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El precio solo contiene números y puntos.</p>
			</div>

       <!-- Grupo: Descripcion -->
			<div class="formulario__grupo" id="grupo__descripcion">
				<label for="descripcion" class="formulario__label">Descripción</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="descripcion" id="descripcion" placeholder="Camisa color blanca, manga corta">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Escriba una descripción válida</p>
			</div>

	  <!-- Grupo: Talla -->
	  <div class="formulario__grupo" id="grupo__talla">
				<label for="talla" class="formulario__label">Talla</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="talla" id="talla" placeholder="Camisa color blanca, manga corta">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Escriba una talla válida</p>
			</div>

			<!-- Grupo: Categoria -->
			<div class="formulario__grupo" id="grupo__categoria">
				<label for="categoria" class="formulario__label">Categoría</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="categoria" id="categoria">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La categoría solo acepta letras</p>
			</div>

			<!-- Grupo: Sub Categoria -->
			<div class="formulario__grupo" id="grupo__sub_cat">
				<label for="sub_cat" class="formulario__label">Sub Categoría</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="sub_cat" id="sub_cat">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Solo acepta letras y acentos.</p>
			</div>

      <!-- Grupo: Imagen -->
			<div class="formulario__grupo">
			<label for="foto" class="formulario__label">Foto del producto</label>
			<input class="formulario__input" type="file" name="ruta_img" require="">
			</div> 

      <!-- Grupo: Proveedor -->
      <div class="formulario__grupo">
			<label for="foto" class="formulario__label">Proveedor</label>
      <select class="formulario__input" id="proveedor" name="proveedor">
                    <?php 
                        while($datos = mysqli_fetch_array($resultado))
                        {
                    ?>
                            <option value="<?php echo $datos['nombre']?>"> <?php echo $datos['nombre']?> </option>
                    <?php
                        }
                    ?> 
      </select>
			</div> 
			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>	
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
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">¡Formulario enviado exitosamente!</p>
			</div>
			
		</form>  
    <?php
    include("../registros/producto.php");
   ?>
    </main>

   <script src="../../js/validad.js"></script>
</body>
</html>
