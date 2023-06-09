<?php
require_once 'Conexion.php';
require_once 'Valoracion.php';

class ValoracionController{
    public static function fetchAll(){
        try{
            $conex=new Conexion();
            $result=$conex->prepare("SELECT * FROM valoracion");
            $result->execute();
            if($result->rowCount()){
                $v=new self();
                while($reg=$result->fetchObject()){
                    $v=new Valoracion($reg->id, $reg->rating, $reg->comentario, $reg->idLibro, $reg->idUsuario);
                    $valoraciones[]=$v;
                }
            }else {
                $valoraciones = false;
            }
            unset($conex);
            return $valoraciones;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function newValoracion($valoracionNew){
        try{
            $conex= new Conexion();
            $result=$conex->exec("INSERT INTO valoracion(rating, comentario, idLibro, idUsuario) VALUES($valoracionNew->rating, '$valoracionNew->comentario', $valoracionNew->idLibro, $valoracionNew->idUsuario)");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function updateValoracion($valoracionUpdate){
        try{
            $conex= new Conexion();
            $result=$conex->exec("UPDATE valoracion SET rating=$valoracionUpdate->rating, comentario='$valoracionUpdate->comentario', idLibro=$valoracionUpdate->idLibro, idUsuario=$valoracionUpdate->idUsuario WHERE idValoracion=$valoracionUpdate->id");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function deleteValoracion($idValoracionDeleted){
        try{
            $conex= new Conexion();
            $result=$conex->exec("DELETE FROM valoracion WHERE id=$idValoracionDeleted");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
}
?>