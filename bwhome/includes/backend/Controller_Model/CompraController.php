<?php
require_once 'Conexion.php';
require_once 'Compra.php';

class CompraController{
    public static function fetchAll(){
        try{
            $conex=new Conexion();
            $result=$conex->prepare("SELECT * FROM compra");
            $result->execute();
            if($result->rowCount()){
                $c=new self();
                while($reg=$result->fetchObject()){
                    $c=new Compra($reg->id, $reg->fechapedido, $reg->cantidad, $reg->idLibro, $reg->idUsuario);
                    $compras[]=$c;
                }
            }else {
                $compras = false;
            }
            unset($conex);
            return $compras;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function fetchCompraFromId($idCompra){
        try{
            $conex= new Conexion();
            $result=$conex->prepare("SELECT * FROM compra WHERE id=:idC");
            $result->bindParam(":idC", $idCompra);
            $result->execute();
            if ($result->rowCount()){
                $reg=$result->fetchObject();
                $compra=new Compra($reg->id, $reg->fechapedido, $reg->cantidad, $reg->idLibro, $reg->idUsuario);

            } else{
                $compra=false;
            }
            unset($conex);
            return $compra;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function newCompra($compraNew){
        try{
            $conex= new Conexion();
            $result=$conex->exec("INSERT INTO compra(fechapedido, cantidad, idLibro, idUsuario) VALUES('$compraNew->fechapedido', $compraNew->cantidad, $compraNew->idLibro, $compraNew->idUsuario)");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function deleteCompra($idCompraDeleted){
        try{
            $conex= new Conexion();
            $result=$conex->exec("DELETE FROM compra WHERE id=$idCompraDeleted");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function deleteComprafromIdLibro($idCompraDeleted){
        try{
            $conex= new Conexion();
            $result=$conex->exec("DELETE FROM compra WHERE idLibro=$idCompraDeleted");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function deleteComprafromIdUsuario($idCompraDeleted){
        try{
            $conex= new Conexion();
            $result=$conex->exec("DELETE FROM compra WHERE idUsuario=$idCompraDeleted");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function fetchCompraFromIdUsuario($idUsuario){
        try{
            $conex= new Conexion();
            $result=$conex->prepare("SELECT * FROM compra WHERE idUsuario=:idUsuario");
            $result->bindParam(":idUsuario", $idUsuario);
            $result->execute();
            if($result->rowCount()){
                $c=new self();
                while($reg=$result->fetchObject()){
                    $c=new Compra($reg->id, $reg->fechapedido, $reg->cantidad, $reg->idLibro, $reg->idUsuario);
                    $compras[]=$c;
                }
            }else {
                $compras = false;
            }
            unset($conex);
            return $compras;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
}
?>