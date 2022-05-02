<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../css/listar_productos.css">
<link rel="stylesheet" href="../../css/menu_admi.css">
<script src="https://kit.fontawesome.com/cca00cc8a6.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include('../../registros/conexion.php');?>
<div class="contenedor">
    <button class="botons2" onclick="login()"><i class="fas fa-arrow-left"></i></button>
    <script type="text/javascript">
      function login(){
        window.location.href="../menu.php";
      }
    </script>
    </div>
<table>

<tr><th colspan="6"><h1>Listado de productos</h1></th></tr>
<tr>

<th>Imagen</th>
<th>Producto</th>
<th>Precio</th>
<th>Stock</th>
<th>Acción</th>

</tr>

<?php

$sql="select * from items";
$resultado=mysqli_query($conexion,$sql);

while($mostrar=mysqli_fetch_array($resultado))

{
?>

<tr>
	<td><img width='80' height='80' src="data:jpg;base64,<?php echo  base64_encode($mostrar['img']); ?>"></td>
	<td><?php echo $mostrar['nombre'] ?></td>
	<td><?php echo $mostrar['precio'] ?></td>
	<td><?php echo $mostrar['cantidad'] ?></td>
  <td>
    <div class="options">
    <button class="estado"><a href="actualizarProducto.php?id=<?php echo $mostrar['id'] ?>"><i class="far fa-edit"></i></button>
    <button class="estado"><a href="../registros/eliminarProducto.php?id=<?php echo $mostrar['id'] ?>"><i class="fas fa-trash-alt"></i></button>
    </div></td>
	
</tr>

<?php
}
?>

</table>

</body>
</html>