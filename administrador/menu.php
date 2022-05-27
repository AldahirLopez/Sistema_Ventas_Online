<?php
include_once '../servicios/sesion/user.php';
include_once '../servicios/sesion/user_session.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    if($user->getRol()==2){
	?>
			<!DOCTYPE html>
			<html>	
			<head>
			<link href="../fontawesome/css/all.css" rel="stylesheet">
				<link rel="stylesheet" type="text/css" href="../css/menu_admi2.css">		
				<title>Administracion | Administrador </title>  
				</head>
				<body>
					<header>
						<div class="top">
						<div>
						<a href="../index.php">Menu principal</a>
						</div>
						<div>
						<h2>Hola Administrador - <?php echo $user->getNombre();?></h2>
						</div>
						<div>
						<a href="../perfil/user_perfil.php">Salir</a>
						</div>
						</div>
					</header>
				<div class="user">
					<h1>Menu</h1>
				</div>
				<div class="content">
					<div class="conten-info">
						<img src="../img/admin/productos.jpg">
						<h3>Productos</h3>
						<p>En esta seccion puedes administrar los productos agregar, eliminar y modificar</p>
						<button class="buy-btn" onclick="productos()">Ir a productos</button>
						<script type="text/javascript">
						function productos(){
							window.location.href="vistas/listar_productos.php";
						}
						</script>
					</div>
					<div class="conten-info">
					<img src="../img/admin/proveedores.jpg">
						<h3>Proveedores</h3>
						<p>En esta seccion puedes administrar los proveedores agregar, eliminar y modificar</p>
						<button class="buy-btn" onclick="proveedores()">Ir a proveedores</button>
						<script type="text/javascript">
						function proveedores(){
							window.location.href="vistas/listar_proveedor.php";
						}
						</script>
					</div>
					<div class="conten-info">
					<img src="../img/admin/reportes.png">
						<h3>Reporte de ventas</h3>
						<p>En esta seccion puedes visualizar los reportes de ventas</p>
						<button class="buy-btn" onclick="reventas()">Ir a reporte de ventas</button>
						<script type="text/javascript">
						function reventas(){
							window.location.href="vistas/listar_pedidos.php";
						}
						</script>

					</div>
					<div class="conten-info">
					<img src="../img/admin/ventas.jpg">
						<h3>Ventas</h3>
						<p>En esta seccion puedes administrar las ventas agregar, eliminar y modificar</p>
						<button class="buy-btn" onclick="ventas()">Ir a ventas</button>
						<script type="text/javascript">
						function ventas(){
							window.location.href="vistas/listar_pedidos.php";
						}
						</script>
					</div>
					<div class="conten-info">
					<img src="../img/admin/usuarios.png">
						<h3>Usuarios</h3>
						<p>En esta seccion puedes administrar los usuarios agregar, eliminar y modificar</p>
						<button class="buy-btn" onclick="usuario()">Ir a usuarios</button>
						<script type="text/javascript">
						function usuario(){
							window.location.href="vistas/vista_usuario.php";
						}
						</script>
					</div>
				</div>
				</body>
			</html>
<?php
    }else{
        header('location:../index.php');
    }

}else{
    //echo "lNo tiene sesion";  
    header('location:../index.php');
}
