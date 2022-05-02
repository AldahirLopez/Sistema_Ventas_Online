<?php
include 'db.php';

class User extends Database{
    private $nombre;
    private $username;


    public function userExists($user, $pass){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE username = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->useid = $currentUser['id_usuario'];
            $this->usename = $currentUser['username'];
            $this->usenom = $currentUser['nombre'];
            $this->useapellidos = $currentUser['apellidos'];
            $this->usetelefono = $currentUser['telefono'];
            $this->usecorreo = $currentUser['correo_e'];
            $this->userol = $currentUser['rol'];
            $this->usefecha = $currentUser['fecha'];
            $this->usefoto = $currentUser['foto'];
        }
    }

    public function getUseid(){
        return $this->useid;
    }

    public function getUser(){
        return $this->usename;
    }

    public function getNombre(){
        return $this->usenom;
    }
    public function getApe(){
        return $this->useapellidos;
    }
    public function getTel(){
        return $this->usetelefono;
    }
    public function getCorreo(){
        return $this->usecorreo;
    }
    public function getFecha(){
        return $this->userol;
    }
    public function getFoto(){
        return $this->usefoto ;
    }
    public function getRol(){
        return $this->userol ;
    }
    

}

?>