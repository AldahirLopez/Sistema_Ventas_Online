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
    <button class="estado" title="Editar"><a href="actualizarProducto.php?id=<?php echo $mostrar['id'] ?>"><i class="far fa-edit"></i></button>
    <button class="estado" title="Borrar"><a href="../registros/eliminarProducto.php?id=<?php echo $mostrar['id'] ?>"><i class="fas fa-trash-alt"></i></button>
    <button id="btn-abrir-popup<?php echo $mostrarpagos['id_pago'];?>" class="btn-abrir-popup">Ver Pagos</button>
               <div class="overlay" id="overlay<?php echo $mostrarpagos['id_pago'];?>">
                <div class="popup" id="popup<?php echo $mostrarpagos['id_pago'];?>">
                <a href="#" id="btn-cerrar-popup<?php echo $mostrarpagos['id_pago'];?>" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                <script type="text/javascript">
                  var btnAbrirPopup<?php echo $mostrarpagos['id_pago'];?> = document.getElementById('btn-abrir-popup<?php echo $mostrarpagos['id_pago'];?>'),
                    overlay<?php echo $mostrarpagos['id_pago'];?> = document.getElementById('overlay<?php echo $mostrarpagos['id_pago'];?>'),
                    popup<?php echo $mostrarpagos['id_pago'];?> = document.getElementById('popup<?php echo $mostrarpagos['id_pago'];?>'),
                    btnCerrarPopup<?php echo $mostrarpagos['id_pago'];?> = document.getElementById('btn-cerrar-popup<?php echo $mostrarpagos['id_pago'];?>');

                  btnAbrirPopup<?php echo $mostrarpagos['id_pago'];?>.addEventListener('click', function(){
                    overlay<?php echo $mostrarpagos['id_pago'];?>.classList.add('active');
                    popup<?php echo $mostrarpagos['id_pago'];?>.classList.add('active');
                  });

                  btnCerrarPopup<?php echo $mostrarpagos['id_pago'];?>.addEventListener('click', function(e){
                    e.preventDefault();
                    overlay<?php echo $mostrarpagos['id_pago'];?>.classList.remove('active');
                    popup<?php echo $mostrarpagos['id_pago'];?>.classList.remove('active');
                  });
               </script> 
    </div></td>
	
</tr>

<?php
}
?>

</table>

</body>
</html>