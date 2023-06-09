<?php 

class Libro {
    private $id;
    private $titulo;
    private $descripcion;
    private $fechapost;
    private $precio;
    private $idAutor;
    private $stock;
    private $editorial;
    private $isbn;
    private $edicion;
    private $portada;
    private $genero;


    public function __construct($id, $titulo, $descripcion, $fechapost, $precio, $idAutor, $stock, $editorial, $isbn, $edicion, $portada, $genero){
        $this->id=$id;
        $this->titulo=$titulo;
        $this->descripcion=$descripcion;
        $this->fechapost=$fechapost;
        $this->precio=$precio;
        $this->idAutor=$idAutor;
        $this->stock=$stock;
        $this->editorial=$editorial;
        $this->isbn=$isbn;
        $this->edicion=$edicion;
        $this->portada=$portada;
        $this->genero=$genero;
    }

    public function __get($param){
        return $this->$param;
    }

    public function __set($name, $value){
        $this->$name=$value;
    }
}

?>