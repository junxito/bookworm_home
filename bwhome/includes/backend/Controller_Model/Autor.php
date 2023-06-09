<?php 

class Autor {
    private $id;
    private $nombrefull;
    private $biografia;
    private $foto;

    public function __construct($id, $nombrefull, $biografia, $foto){
        $this->id=$id;
        $this->nombrefull=$nombrefull;
        $this->biografia=$biografia;
        $this->foto=$foto;
    }

    public function __get($param){
        return $this->$param;
    }

    public function __set($name, $value){
        $this->$name=$value;
    }
}
?>