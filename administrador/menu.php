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
				<link rel="stylesheet" type="text/css" href="../css/menu_admi.css">	
				<link rel="stylesheet" href="../css/popuppedidos.css">  
				<title>Administracion | Administrador </title>  
				</head>
				<body>
					<header>
						<div class="top">
						<div>
						<button class="botons" onclick="index()"><i class="fas fa-arrow-left"></i></button>
						<script type="text/javascript">
						function index(){
							window.location.href="../index.php";
						}
						</script>
						</div>
						<div class="user">
						<h2>Hola Administrador - <?php echo $user->getNombre();?></h2>
						</div>
						<div class="notificaciones">
						<?php
						include ('../registros/conexion.php');
						$contador = 0;
						$resultado=$conexion ->query("select * from items where cantidad <= 3") or die($conexion -> error);
						while($fila = mysqli_fetch_array($resultado)){ 
							$contador++;
						}        
						?>
						<button id="btn-abrir-noti" class="btn-abrir-noti"><i class="fas fa-bell"></i><span><?php echo $contador ?></span></button>
						<div class="overlay" id="overlay">
							<div class="popup" id="popup">
							<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
							<script type="text/javascript">
							var btnAbrirPopup  = document.getElementById('btn-abrir-noti'),
								overlay  = document.getElementById('overlay'),
								popup  = document.getElementById('popup'),
								btnCerrarPopup  = document.getElementById('btn-cerrar-popup');
									console.log(btnAbrirPopup);
							btnAbrirPopup .addEventListener('click', function(){
								overlay .classList.add('active');
								popup .classList.add('active');
							});

							btnCerrarPopup .addEventListener('click', function(e){
								e.preventDefault();
								overlay .classList.remove('active');
								popup .classList.remove('active');
							});
						</script>
						<?php
						include ('../registros/conexion.php');
						$resultado=$conexion ->query("select * from items where cantidad <= 3") or die($conexion -> error);
						while($fila = mysqli_fetch_array($resultado)){         
						?>
						<div class="noti-text">	
							<div class="img-product">
							<img class="img" src="data:image/jpg;base64, <?php echo  base64_encode($fila['img']); ?>"/>
							</div>
							<div class="txt-info">
							<strong class="nom"><?php echo $fila["nombre"];?></strong>
							<div class="detail-descriptiona"><?php echo $fila["descripcion"];?></div>
							</div>				
						</div>
						<?php
						}
						?>
						</div>
						</div>
						<button class="noti" onclick="perfil()">Perfil</button>
						<script type="text/javascript">
						function perfil(){
							window.location.href="/ventas/servicios/login/validad.php";
						}
						</script>
						</div>
					</header>
				<div class="user">
					<h1>Menú</h1>
				</div>
				<div class="content">
					<div class="conten-info">
						<img src="../img/admin/productos.jpg">
						<center>
						<h3>Productos</h3>
						</center>
						<p>En este modulo puedes administrar los productos agregar, eliminar y modificar</p>
						<button class="buy-btn" onclick="productos()">Ir a productos</button>
						<script type="text/javascript">
						function productos(){
							window.location.href="vistas/listar_productos.php";
						}
						</script>
					</div>
					<div class="conten-info">
					<img src="../img/admin/proveedores.jpg">
						<center>
						<h3>Proveedores</h3>
						</center>
						<p>En este modulo puedes administrar los proveedores agregar, eliminar y modificar</p>
						<button class="buy-btn" onclick="proveedores()">Ir a proveedores</button>
						<script type="text/javascript">
						function proveedores(){
							window.location.href="vistas/listar_proveedor.php";
						}
						</script>
					</div>
					<div class="conten-info">
					<img src="../img/admin/reportes.png">
						<center>
						<h3>Reporte de ventas</h3>
						</center>
						<p>En este modulo puedes visualizar los reportes de ventas</p>
						<button class="buy-btn" onclick="reventas()">Ir a reporte de ventas</button>
						<script type="text/javascript">
						function reventas(){
							window.location.href="registros/reporte_ventas.php";
						}
						</script>

					</div>
					<div class="conten-info">
					<img src="../img/admin/ventas.jpg">
						<center>
						<h3>Ventas</h3>
						</center>
						<p>En este modulo puedes administrar las ventas agregar, eliminar y modificar</p>
						<button class="buy-btn" onclick="ventas()">Ir a ventas</button>
						<script type="text/javascript">
						function ventas(){
							window.location.href="vistas/listar_pedidos.php";
						}
						</script>
					</div>
					<div class="conten-info">
					<img src="../img/admin/usuarios.png">
						<center>
						<h3>Usuarios</h3>
						</center>
						<p>En este modulo puedes administrar los usuarios agregar, eliminar y modificar</p>
						<button class="buy-btn" onclick="usuario()">Ir a usuarios</button>
						<script type="text/javascript">
						function usuario(){
							window.location.href="vistas/listar_usuarios.php";
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
