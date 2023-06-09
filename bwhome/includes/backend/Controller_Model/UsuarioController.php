<?php 
require_once 'Conexion.php';
require_once 'Usuario.php';

class UsuarioController{
    public static function fetchUsuarioLogin($email, $pass){
        try{
            $conex= new Conexion();
            $result=$conex->prepare("SELECT * FROM usuario WHERE email=:email AND password=:pass");
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->execute();
            if ($result->rowCount()){
                $reg=$result->fetchObject();
                $usuario= new Usuario($reg->id, $reg->email, $reg->password, $reg->nombre, $reg->apellido1, $reg->apellido2, $reg->pais, $reg->cp, $reg->tlf, $reg->rol, $reg->saldo);

            } else{
                $usuario=false;
            }
            unset($conex);
            return $usuario;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function fetchAll(){
        try{
            $conex=new Conexion();
            $result=$conex->prepare("SELECT * FROM usuario");
            $result->execute();
            if($result->rowCount()){
                $u=new self();
                while($reg=$result->fetchObject()){
                    $u=new Usuario($reg->id, $reg->email, $reg->password, $reg->nombre, $reg->apellido1, $reg->apellido2, $reg->pais, $reg->cp, $reg->tlf, $reg->rol, $reg->saldo);
                    $usuarios[]=$u;
                }
            }else {
                $usuarios = false;
            }
            unset($conex);
            return $usuarios;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function fetchUsuarioFromEmail($email){
        try{
            $conex= new Conexion();
            $result=$conex->prepare("SELECT * FROM usuario WHERE email=:email");
            $result->bindParam(":email", $email);
            $result->execute();
            if ($result->rowCount()){
                $reg=$result->fetchObject();
                $usuario= new Usuario($reg->id, $reg->email, $reg->password, $reg->nombre, $reg->apellido1, $reg->apellido2, $reg->pais, $reg->cp, $reg->tlf, $reg->rol, $reg->saldo);

            } else{
                $usuario=false;
            }
            unset($conex);
            return $usuario;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function fetchUsuariofromId($idUsuario){
        try{
            $conex= new Conexion();
            $result=$conex->prepare("SELECT * FROM usuario WHERE id=:id");
            $result->bindParam(":id", $idUsuario);
            $result->execute();
            if ($result->rowCount()){
                $reg=$result->fetchObject();
                $usuario= new Usuario($reg->id, $reg->email, $reg->password, $reg->nombre, $reg->apellido1, $reg->apellido2, $reg->pais, $reg->cp, $reg->tlf, $reg->rol, $reg->saldo);

            } else{
                $usuario=false;
            }
            unset($conex);
            return $usuario;
        } catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function newUsuario($usuarioNew){
        try{
            $conex= new Conexion();
            $result=$conex->exec("INSERT INTO usuario(email, password, nombre, apellido1, apellido2, pais, cp, tlf, rol, saldo) VALUES('$usuarioNew->email', '$usuarioNew->password', '$usuarioNew->nombre', '$usuarioNew->apellido1', '$usuarioNew->apellido2', '$usuarioNew->pais', '$usuarioNew->cp', '$usuarioNew->tlf', '$usuarioNew->rol', $usuarioNew->saldo)");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function updateUsuario($usuarioUpdate){
        try{
            $conex= new Conexion();
            $result=$conex->exec("UPDATE usuario SET email='$usuarioUpdate->email', Password='$usuarioUpdate->password', nombre='$usuarioUpdate->nombre', apellido1='$usuarioUpdate->apellido1', apellido2='$usuarioUpdate->apellido2', pais='$usuarioUpdate->pais', cp='$usuarioUpdate->cp', tlf='$usuarioUpdate->tlf', rol='$usuarioUpdate->rol' WHERE id=$usuarioUpdate->id");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
    public static function disminuirSaldo($idUsuario, $saldoFinal){
        try{
            $conex= new Conexion();
            $result=$conex->exec("UPDATE usuario SET saldo = $saldoFinal WHERE id=$idUsuario");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }

    public static function deleteUsuario($idUsuarioDeleted){
        try{
            $conex= new Conexion();
            $result=$conex->exec("DELETE FROM usuario WHERE id=$idUsuarioDeleted");

            unset($conex);
            return $result;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
}
?>