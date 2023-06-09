<?php

class Conexion extends PDO{
    private $dns="mysql:host=localhost;dbname=mytfg;charset=utf8mb4";
    private $user="root";
    private $pass="";

    public function __construct(){
        parent::__construct($this->dns, $this->user, $this->pass);
    }
}

?>