<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="../../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/perfil.css">   
</head>
<header></header>

<body>
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                <img src="data:jpg;base64,<?php echo  base64_encode($user->getFoto()); ?>">
                    <button type="button" class="boton-avatar">
                        <i class="far fa-image" style="color: black;"></i>
                    </button>
                </div>
                <button type="button" class="boton-portada" onclick="home()">
                <i class="fas fa-home"></i> Pagina Principal
                <script type="text/javascript">
                    function home(){
                        window.location.href="../../index.php";
                    }
                </script>
                </button>    
                <?php
                if($user->getRol()==2){
                ?>
                <button type="button" class="boton-portada2" onclick="carrito()">
                <i class="fas fa-cog"></i> Administrador
                <script type="text/javascript">
                    function carrito(){
                        window.location.href="../../administrador/menu.php";
                    }
                </script>    
                </button>

                <?php
                }else{
                    ?>
                    <button type="button" class="boton-portada2" onclick="carrito()">
                <i class="fas fa-shopping-basket"></i> Carrito
                <script type="text/javascript">
                    function carrito(){
                        window.location.href="../../carrito.php";
                    }
                </script>    
                </button>
                <?php
                }
                ?>
                <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"> <?php echo $user->getUser();  ?></h3>
            </div>
            
        </div>
            </div>
            
        </div>
        <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li><i class="icono fas fa-map-signs"></i> Nombre: <?php echo $user->getNombre();  ?> <?php echo $user->getApe();  ?></li>
                    <li><i class="icono fas fa-phone-alt"></i> Teléfono: <?php echo $user->getTel();  ?></li>
                    <li><i class="icono fas fa-briefcase"></i> Dirección: </li>
                    <li><i class="icono fas fa-building"></i> Correo electrónico: <?php echo $user->getCorreo(); ?></li>
                    <li><a href="../../pedidos.php"><i class="icono fas fa-truck" style="color:black"></i></a>Pedidos</li>
                    <li><a href="../sesion/logout.php"><i class="icono fas fa-sign-out-alt"></i></a>Salir</li>
                    
                </ul>
            </div>
    </section>
</style>
</body>

</html>