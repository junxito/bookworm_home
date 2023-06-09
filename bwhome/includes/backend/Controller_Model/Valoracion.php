<?php 

class Valoracion {
    private $id;
    private $rating;
    private $comentario;
    private $idLibro;
    private $idUsuario;

    public function __construct($id, $rating, $comentario, $idLibro, $idUsuario){
        $this->id=$id;
        $this->rating=$rating;
        $this->comentario=$comentario;
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