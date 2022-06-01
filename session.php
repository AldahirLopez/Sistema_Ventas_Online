<?php
    include_once 'servicios/sesion/user.php';
    include_once 'servicios/sesion/user_session.php';
    $userSession = new UserSession();
    $user = new User();
    if(isset($_SESSION['carrito']))
    {
        $arreglo = $_SESSION['carrito'];
        if(isset($_SESSION['user'])){
            //echo "hay sesion";
            $user->setUser($userSession->getCurrentUser());
            header('location: checkout.php');

        }else 
        if(isset($_POST['username']) && isset($_POST['password'])){
            
            $userForm = $_POST['username'];
            $passForm = $_POST['password'];

            $user = new User();
            if($user->userExists($userForm, $passForm)){
                //echo "Existe el usuario";
                $userSession->setCurrentUser($userForm);
                $user->setUser($userForm);
                
                header('location:checkout.php');
                
            }else{
                //echo "No existe el usuario";
                ?> 
            <h3 class="bad">¡EL usuario y/o contraseña no existe!</h3>
            <?php
                include_once 'vistas_user/vista_login.php';
            }
        }else{
            //echo "login";
            
            include_once 'vistas_user/vista_login.php';
        }
        
    }else{
     header("location: index.php");
    }
?>