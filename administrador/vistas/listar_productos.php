<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../css/listar_productos.css">
<link rel="stylesheet" href="../../css/menu_admi.css">
<link rel="stylesheet" type="text/css" href="../../css/admin-header.css">
<link rel="stylesheet" href="../../css/popuppedidos.css">  
<link href="../../fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
<?php include('../../registros/conexion.php');?>
<div class="menu">
<button class="botons" onclick="login()"><i class="fas fa-arrow-left"></i></button>
    <script type="text/javascript">
      function login(){
        window.location.href="../menu.php";
      }
    </script>
<button class="botons3" onclick="producto()">Agregar Nuevo Producto</button>
    <script type="text/javascript">
      function producto(){
        window.location.href="vista_producto.php";
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
<th>Acciones</th>

</tr>

<?php
$sql="select * from items";
$sql2="select * from items";
$resultado=mysqli_query($conexion,$sql);
$total = mysqli_query($conexion,$sql2);
$row=mysqli_num_rows($total);
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
    <button class="estado" title="Editar"><a href="actualizarProducto.php?id=<?php echo $mostrar['id'] ?>"><i class="far fa-edit"></i></button>
    <button class="estado" title="Borrar"><a href="../registros/eliminarProducto.php?id=<?php echo $mostrar['id'] ?>"><i class="fas fa-trash-alt"></i></button>
    </div></td>
</tr>

<?php
}
?>

</table>
<h1><?php echo $row ?> <h1>
</body>
</html>