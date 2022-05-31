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
<button class="botons3" onclick="usuario()">Agregar nuevo usuario</button>
    <script type="text/javascript">
      function usuario(){
        window.location.href="vista_usuario.php";
      }
    </script>
</div>
<table>


<tr><th colspan="7"><h1>Listado de usuarios</h1></th></tr>
<tr>

<th>User Name</th>
<th>Nombre</th>
<th>Apellidos</th>
<th>Telefono</th>
<th>Correo</th>
<th>Rol</th>
<th>Fecha</th>

</tr>

<?php

$sql="select * from usuario";
$resultado=mysqli_query($conexion,$sql);

while($mostrar=mysqli_fetch_array($resultado))

{
?>

<tr>
	<td><?php echo $mostrar['username'] ?></td>
	<td><?php echo $mostrar['nombre'] ?></td>
	<td><?php echo $mostrar['apellidos'] ?></td>
	<td><?php echo $mostrar['telefono'] ?></td>
  <td><?php echo $mostrar['correo_e'] ?></td>
  <td><?php echo $mostrar['rol'] ?></td>
  <td><?php echo $mostrar['fecha'] ?></td>
</tr>

<?php
}
?>

</table>

</body>
</html>