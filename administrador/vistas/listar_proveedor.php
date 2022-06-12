<!DOCTYPE html>
<html lang="en">
<head>
<link href="../../fontawesome/css/all.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../../css/admin-header.css">
  <link rel="stylesheet" type="text/css" href="../../css/menu_admi.css">
  <link rel="stylesheet" href="../../css/listar_productos.css">
  <title>Registro Proveedores</title>
</head>
<body>
    <div class="menu">
    <button class="botons" onclick="login()"><i class="fas fa-arrow-left"></i></button>
        <script type="text/javascript">
          function login(){
            window.location.href="../menu.php";
          }
        </script>
    <button class="botons3" onclick="producto()">Agregar Nuevo Proveedor</button>
        <script type="text/javascript">
          function producto(){
            window.location.href="vista_proveedor.php";
          }
        </script>
    </div>
    <table>


<tr><th colspan="6"><h1>Listado de productos</h1></th></tr>
<tr>

<th>ID</th>
<th>Nombre</th>
<th>Teléfono</th>
<th>Correo</th>
<th class="direc">Dirección</th>
<th>Acción</th>

</tr>

<?php
include('../../registros/conexion.php');
$sql="select * from proveedor";
$resultado=mysqli_query($conexion,$sql);

while($mostrar=mysqli_fetch_array($resultado))

{
?>

<tr>
	<td><?php echo $mostrar['id_proveedor'] ?></td>
	<td><?php echo $mostrar['nombre'] ?></td>
	<td><?php echo $mostrar['telefono'] ?></td>
  <td><?php echo $mostrar['correo_e'] ?></td>
  <td class="direc"><?php echo $mostrar['direccion'] ?></td>
  <td>
    <div class="options">
    <button class="estado"><a href="actualizarProducto.php?id=<?php echo $mostrar['id_proveedor'] ?>"><i class="far fa-edit"></i></button>
    <button class="estado"><a href="../registros/eliminarProducto.php?id=<?php echo $mostrar['id_proveedor'] ?>"><i class="fas fa-trash-alt"></i></button>
    </div></td>
	
</tr>

<?php
}
?>

</table>
</body>

</html>