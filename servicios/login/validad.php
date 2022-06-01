<?php
include_once '../sesion/user.php';
include_once '../sesion/user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once '../../perfil/user_perfil.php';

}else 
if(isset($_POST['username']) && isset($_POST['password'])){
    
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        
        header("Location: ../../index.php");
        
    }else{
        //echo "No existe el usuario";
        
        include_once '../../vistas_user/vista_login.php';
        ?> 
    <h3 class="bad">¡EL usuario y/o contraseña no existe!</h3>
    <?php
    }
}else{
    //echo "login";
    
    include_once '../../vistas_user/vista_login.php';
}
?>