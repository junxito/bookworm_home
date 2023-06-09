<?php 

class Compra {
    private $id;
    private $fechapedido;
    private $cantidad;
    private $idLibro;
    private $idUsuario;

    public function __construct($id, $fechapedido, $cantidad, $idLibro, $idUsuario){
        $this->id=$id;
        $this->fechapedido=$fechapedido;
        $this->cantidad=$cantidad;
        $this->idLibro=$idLibro;
        $this->idUsuario=$idUsuario;
    }

    public function __get($param){
        return $this->$param;
    }

    public function __set($name, $value){
        $this->$name=$value;
    }
}
?>