<?php
require_once 'Conexion.php';
require_once 'Autor.php';

class AutorController{
    public static function fetchAll(){
        try{
            $conex=new Conexion();
            $result=$conex->prepare("SELECT * FROM autor");
            $result->execute();
            if($result->rowCount()){
                $a=new self();
                while($reg=$result->fetchObject()){
                    $a=new Autor($reg->id, $reg->nombrefull, $reg->biografia, $reg->foto);
                    $autores[]=$a;
                }
            }else {
                $autores = false;
            }
            unset($conex);
            return $autores;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function fetch3(){
        try{
            $conex=new Conexion();
            $result=$conex->prepare("SELECT * FROM autor LIMIT 3");
            $result->execute();
            if($result->rowCount()){
                $a=new self();
                while($reg=$result->fetchObject()){
                    $a=new Autor($reg->id, $reg->nombrefull, $reg->biografia, $reg->foto);
                    $autores[]=$a;
                }
            }else {
                $autores = false;
            }
            unset($conex);
            return $autores;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function fetchAutorFromId($idAutor){
        try{
            $conex= new Conexion();
            $result=$conex->prepare("SELECT * FROM autor WHERE id=:idA");
            $result->bindParam(":idA", $idAutor);
            $result->execute();
            if ($result->rowCount()){
                $reg=$result->fetchObject();
                $autor=new Autor($reg->id, $reg->nombrefull, $reg->biografia, $reg->foto);

            } else{
                $autor=false;
            }
            unset($conex);
            return $autor;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function newAutor($autorNew){
        try{
            $conex= new Conexion();
            $result=$conex->exec("INSERT INTO autor(nombrefull, biografia, foto) VALUES('$autorNew->nombrefull', '$autorNew->biografia', '$autorNew->foto')");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function updateAutor($autorUpdate){
        try{
            $conex= new Conexion();
            $result=$conex->exec("UPDATE autor SET nombrefull='$autorUpdate->nombrefull', biografia='$autorUpdate->biografia', foto='$autorUpdate->foto' WHERE id=$autorUpdate->id");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function deleteAutor($idAutorDeleted){
        try{
            $conex= new Conexion();
            $result=$conex->exec("DELETE FROM autor WHERE id=$idAutorDeleted");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
}
?>