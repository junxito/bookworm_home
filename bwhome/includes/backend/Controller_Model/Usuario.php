<?php 

class Usuario {
    private $id;
    private $email;
    private $password;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $pais;
    private $cp;
    private $tlf;
    private $rol;    
    private $saldo;

    public function __construct($id, $email, $password, $nombre, $apellido1, $apellido2, $pais, $cp, $tlf, $rol, $saldo){
        $this->id=$id;
        $this->email=$email;
        $this->password=$password;
        $this->nombre=$nombre;
        $this->apellido1=$apellido1;
        $this->apellido2=$apellido2;        
        $this->pais=$pais;
        $this->cp=$cp;
        $this->tlf=$tlf;
        $this->rol=$rol;
        $this->saldo=$saldo;
    }

    public function __get($param){
        return $this->$param;
    }

    public function __set($name, $value){
        $this->$name=$value;
    }
}
?>