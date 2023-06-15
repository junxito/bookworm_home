<?php
require_once 'Conexion.php';
require_once 'Libro.php';

class LibroController{
    public static function fetchAll(){
        try{
            $conex=new Conexion();
            $result=$conex->prepare("SELECT * FROM libro");
            $result->execute();
            if($result->rowCount()){
                $l=new self();
                while($reg=$result->fetchObject()){
                    $l=new Libro($reg->id, $reg->titulo, $reg->descripcion, $reg->fechapost, $reg->precio, $reg->idAutor, $reg->stock, $reg->editorial, $reg->isbn, $reg->edicion, $reg->portada, $reg->genero);
                    $libros[]=$l;
                }
            }else {
                $libros = false;
            }
            unset($conex);
            return $libros;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function fetch5(){
        try{
            $conex=new Conexion();
            $result=$conex->prepare("SELECT * FROM libro ORDER BY id DESC LIMIT 5");
            $result->execute();
            if($result->rowCount()){
                $l=new self();
                while($reg=$result->fetchObject()){
                    $l=new Libro($reg->id, $reg->titulo, $reg->descripcion, $reg->fechapost, $reg->precio, $reg->idAutor, $reg->stock, $reg->editorial, $reg->isbn, $reg->edicion, $reg->portada, $reg->genero);
                    $libros[]=$l;
                }
            }else {
                $libros = false;
            }
            unset($conex);
            return $libros;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    

    public static function fetchLibroFromId($idLibro){
        try{
            $conex= new Conexion();
            $result=$conex->prepare("SELECT * FROM libro WHERE id=:idL");
            $result->bindParam(":idL", $idLibro);
            $result->execute();
            if ($result->rowCount()){
                $reg=$result->fetchObject();
                $libro=new Libro($reg->id, $reg->titulo, $reg->descripcion, $reg->fechapost, $reg->precio, $reg->idAutor, $reg->stock, $reg->editorial, $reg->isbn, $reg->edicion, $reg->portada, $reg->genero);

            } else{
                $libro=false;
            }
            unset($conex);
            return $libro;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function fetchLibroFromIdAutor($idAutor){
        try{
            $conex= new Conexion();
            $result=$conex->prepare("SELECT * FROM libro WHERE idAutor=:idAutor");
            $result->bindParam(":idAutor", $idAutor);
            $result->execute();
            if($result->rowCount()){
                $l=new self();
                while($reg=$result->fetchObject()){
                    $l=new Libro($reg->id, $reg->titulo, $reg->descripcion, $reg->fechapost, $reg->precio, $reg->idAutor, $reg->stock, $reg->editorial, $reg->isbn, $reg->edicion, $reg->portada, $reg->genero);
                    $libros[]=$l;
                }
            }else {
                $libros = false;
            }
            unset($conex);
            return $libros;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function fetchLibroFromTitulo($titulo){
        try{
            $conex= new Conexion();
            $result=$conex->prepare("SELECT * FROM libro WHERE titulo LIKE :titulo ");
            $result->bindValue(":titulo", '%'.$titulo.'%');
            $result->execute();
            if($result->rowCount()){
                $l=new self();
                while($reg=$result->fetchObject()){
                    $l=new Libro($reg->id, $reg->titulo, $reg->descripcion, $reg->fechapost, $reg->precio, $reg->idAutor, $reg->stock, $reg->editorial, $reg->isbn, $reg->edicion, $reg->portada, $reg->genero);
                    $libros[]=$l;
                }
            }else {
                $libros = false;
            }
            unset($conex);
            return $libros;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function fetchLibrosFromGenero($genero){
        try{
            $conex= new Conexion();
            $result=$conex->prepare("SELECT * FROM libro WHERE genero=:genero");
            $result->bindParam(":genero", $genero);
            $result->execute();
            if($result->rowCount()){
                $l=new self();
                while($reg=$result->fetchObject()){
                    $l=new Libro($reg->id, $reg->titulo, $reg->descripcion, $reg->fechapost, $reg->precio, $reg->idAutor, $reg->stock, $reg->editorial, $reg->isbn, $reg->edicion, $reg->portada, $reg->genero);
                    $libros[]=$l;
                }
            }else {
                $libros = false;
            }
            unset($conex);
            return $libros;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function newLibro($libroNew){
        try{
            $conex= new Conexion();
            $result=$conex->exec("INSERT INTO libro(titulo, descripcion, fechapost, precio, idAutor, stock, editorial, isbn, edicion, portada, genero) VALUES('$libroNew->titulo', '$libroNew->descripcion', '$libroNew->fechapost', $libroNew->precio, $libroNew->idAutor, $libroNew->stock, '$libroNew->editorial', $libroNew->isbn, '$libroNew->edicion', '$libroNew->portada', '$libroNew->genero')");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function updateLibro($libroUpdate){
        try{
            $conex= new Conexion();
            $result=$conex->exec("UPDATE libro SET titulo='$libroUpdate->titulo', descripcion='$libroUpdate->descripcion', fechapost='$libroUpdate->fechapost', precio='$libroUpdate->precio', idAutor='$libroUpdate->idAutor', stock='$libroUpdate->stock', editorial='$libroUpdate->editorial', isbn='$libroUpdate->isbn', edicion='$libroUpdate->edicion', portada='$libroUpdate->portada', genero='$libroUpdate->genero' WHERE id=$libroUpdate->id");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function disminuirStock($idLibro, $stockFinal){
        try{
            $conex= new Conexion();
            $result=$conex->exec("UPDATE libro SET stock = $stockFinal WHERE id=$idLibro");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function deleteLibro($idLibroDeleted){
        try{
            $conex= new Conexion();
            $result=$conex->exec("DELETE FROM libro WHERE id=$idLibroDeleted");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function deleteLibroFromIdAutor($idLibroDeleted){
        try{
            $conex= new Conexion();
            $result=$conex->exec("DELETE FROM libro WHERE idAutor=$idLibroDeleted");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
}
?>