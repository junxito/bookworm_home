<?php include("includes/a_config.php");
if (isset($_POST['editarUsuario'])) {
    $usuarioEdit = UsuarioController::fetchUsuarioFromEmail($_POST['email']);
    if ($usuarioEdit) {
        $_SESSION['usuarioEdit'] = $usuarioEdit;
        header('Location:editarUsuarios.php');
    }
}
if (isset($_POST['recargarUsuario'])) {
    $recargarUsuario = UsuarioController::recargarSaldo($_POST['idUsuario']);
    $msg= "Saldo de usuario recargado correctamente!";
    header('Location:crudAdministrador.php?msg='.$msg);
    
}
if (isset($_POST['editarLibro'])) {
    $libroEdit = LibroController::fetchLibroFromId($_POST['idLibro']);
    if ($libroEdit) {
        $_SESSION['libroEdit'] = $libroEdit;
        header('Location:editarLibro.php');
    }
}
if (isset($_POST['editarAutor'])) {
    $autorEdit = AutorController::fetchAutorFromId($_POST['idAutor']);
    if ($autorEdit) {
        $_SESSION['autorEdit'] = $autorEdit;
        header('Location:editarAutor.php');
    }
}

if (isset($_POST['eliminarUsuario'])) {
    $usuarioEliminar = UsuarioController::deleteUsuario($_POST['idUsuario']);
    $valoracionEliminar= ValoracionController::deleteValoracionFromIdUsuario($_POST['idUsuario']);
    $compraEliminar= CompraController::deleteComprafromIdUsuario($_POST['idUsuario']);
    $msg= "Usuario eliminado correctamente!";
    header('Location:crudAdministrador.php?msg='.$msg);
}
if (isset($_POST['eliminarLibro'])) {
    $libroEliminar = LibroController::deleteLibro($_POST['idLibro']);
    $valoracionEliminar= ValoracionController::deleteValoracionFromIdLibro($_POST['idLibro']);
    $compraEliminar= CompraController::deleteComprafromIdLibro($_POST['idLibro']);
    $msg= "Libro eliminado correctamente!";
    header('Location:crudAdministrador.php?msg='.$msg);
}
if (isset($_POST['eliminarValoracion'])) {
    $valoracionEliminar = ValoracionController::deleteValoracion($_POST['idValoracion']);
    $msg= "Valoracion eliminado correctamente!";
    header('Location:crudAdministrador.php?msg='.$msg);
}
if (isset($_POST['eliminarAutor'])) {
    $autorEliminar = AutorController::deleteAutor($_POST['idAutor']);
    $librosEliminados = LibroController::fetchLibroFromIdAutor($_POST['idAutor']);
    $libroEliminar = LibroController::deleteLibroFromIdAutor($_POST['idAutor']);
    foreach ($librosEliminados as $l) {
        $valoracionEliminar= ValoracionController::deleteValoracionFromIdLibro($l->id);
        $compraEliminar= CompraController::deleteComprafromIdLibro($l->id);
    }
    $msg= "Autor eliminado correctamente!";
    header('Location:crudAdministrador.php?msg='.$msg);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

    <?php include("includes/headerFase2.php"); ?>

    <main>
        <div class="row">
            <div class="col-md-4">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house-chimney breadcrumb"></i><span class="sr-only">Home</span></a></li>
                        <li class="breadcrumb-item">Gestión del Administrador</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="container-md">
            <?php
            if(isset($_GET['msg'])){
                echo "<br><div class='alert alert-success' role='alert'>".$_GET['msg']."</div><br>";
            }
            ?>
            <div class="row-administrador">
                <div class="col-md title-administrador">
                    <h1 class="h1-title-administrador">Gestión del Administrador</h1>
                </div>
            </div>

            <form action="" method="POST">
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <input type="submit" name="usu-submit" class="form-control btn btn-mediano" value="Usuarios"></a>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="valo-submit" class="form-control btn btn-mediano" value="Valoraciones"></a>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="libro-submit" class="form-control btn btn-mediano" value="Libros"></a>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="autor-submit" class="form-control btn btn-mediano" value="Autores"></a>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="compra-submit" class="form-control btn btn-mediano" value="Compras"></a>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['usu-submit'])) {
            ?>
                <div class="row ">
                    <div class="row justify-content-center mb-3">
                        <div class="col-md-5">
                            <form action="anadirUsuarios.php" method="POST">
                                    <input type="submit" class="btn-anadir text-light" name="anadirUsuario" value="AÑADIR USUARIO">
                                </form>
                        </div>
                    </div>
                    <div class="col-md-2">

                    </div>

                    <div class="col-md-7">
                        
                        <div class="table-responsive-sm">
                            <table class="table table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Email</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>País</th>
                                        <th>CP</th>
                                        <th>Teléfono</th>
                                        <th>Rol</th>
                                        <th>Saldo</th>
                                        <th>Operaciones</th>
                                    </tr>
                                </thead>

                                <tbody class="table-light">
                                    <?php
                                    $usuarios = UsuarioController::fetchAll();
                                    if ($usuarios) {
                                        foreach ($usuarios as $u) {
                                    ?>
                                            <tr>
                                                <td><?php echo $u->email; ?></td>
                                                <td><?php echo $u->nombre; ?></td>
                                                <td><?php echo $u->apellido1 . " " . $u->apellido2; ?></td>
                                                <td><?php echo $u->pais; ?></td>
                                                <td><?php echo $u->cp; ?></td>
                                                <td><?php echo $u->tlf; ?></td>
                                                <td><?php echo $u->rol; ?></td>
                                                <td><?php echo $u->saldo; ?></td>
                                                <td>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="email" value="<?php echo $u->email; ?>">
                                                        <input type="hidden" name="idUsuario" value="<?php echo $u->id; ?>">
                                                        <input type="submit" name="recargarUsuario" value="Recargar saldo" class="btn btn-primary"<?php
                                                                                                                                            if ($u->email == $_SESSION['usuario']->email) {
                                                                                                                                                echo "hidden";
                                                                                                                                            }
                                                                                                                                            ?>>
                                                        <input type="submit" name="editarUsuario" value="Editar" class="btn btn-success">
                                                        <input type="submit" name="eliminarUsuario" value="Eliminar" class="btn btn-danger" <?php
                                                                                                                                            if ($u->email == $_SESSION['usuario']->email) {
                                                                                                                                                echo "hidden";
                                                                                                                                            }
                                                                                                                                            ?>>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>
                        
                    </div>

                <?php
            }


            if (isset($_POST['libro-submit'])) {
                ?>
                    <div class="row ">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <form action="anadirLibro.php" method="POST">
                                    <input type="submit" class="btn-anadir text-light" name="anadirLibro" value="AÑADIR LIBRO">
                                </form>
                                <br>
                            </div>
                        </div>
                        <div class="col-md-1">

                        </div>

                        <div class="col-md-9">
                            <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Portada</th>
                                            <th>ISBN</th>
                                            <th>Titulo</th>
                                            <th>Género</th>
                                            <th>Autor</th>
                                            <th>Editorial</th>
                                            <th>Edición</th>
                                            <th>Fecha Publicación</th>
                                            <th>Precio</th>
                                            <th>Stock</th>
                                            <th>Operaciones</th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-light">
                                        <?php
                                        $libros = LibroController::fetchAll();
                                        if ($libros) {
                                            foreach ($libros as $l) {
                                                $autor = AutorController::fetchAutorFromId($l->idAutor);
                                        ?>
                                                <tr>
                                                    
                                                    <td><img src="./assets/img/content/<?php echo $l->portada; ?>" width="100%" alt="<?php echo $l->titulo ?>"></td>
                                                    <td><?php echo $l->isbn; ?></td>
                                                    <td><?php echo $l->titulo; ?></td>
                                                    <td><?php echo $l->genero; ?></td>
                                                    <td><?php echo $autor->nombrefull; ?></td>
                                                    <td><?php echo $l->editorial; ?></td>
                                                    <td><?php echo $l->edicion; ?></td>
                                                    <td><?php echo $l->fechapost; ?></td>
                                                    <td><?php echo $l->precio.'€'; ?></td>
                                                    <td><?php echo $l->stock.' unidades'; ?></td>
                                                    <td>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="idLibro" value="<?php echo $l->id; ?>">
                                                            <input type="submit" name="editarLibro" value="Editar" class="btn btn-success">
                                                            <input type="submit" name="eliminarLibro" value="Eliminar" class="btn btn-danger">
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>                            
                        </div>                       
                        
                    </div>
                    <?php
                }

                    
            if (isset($_POST['valo-submit'])) {
                ?>
                    <div class="row my-5">
                        <div class="col-md-2">

                        </div>

                        <div class="col-md-8">
                            <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Portada</th>
                                            <th>Titulo</th>
                                            <th>Rating</th>
                                            <th>Comentario</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Operación</th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-light">
                                        <?php
                                        $valoraciones = ValoracionController::fetchAll();
                                        if ($valoraciones) {
                                            foreach ($valoraciones as $v) {
                                                $libro = LibroController::fetchLibroFromId($v->idLibro);
                                                $usuario = UsuarioController::fetchUsuariofromId($v->idUsuario);
                                        ?>
                                                <tr>
                                                    <td><img src="./assets/img/content/<?php echo $libro->portada; ?>" width="50%" alt="<?php echo $libro->titulo ?>"></td>
                                                    <td><?php echo $libro->titulo; ?></td>
                                                    <td><?php echo $v->rating.' estrellas'; ?></td>
                                                    <td><?php echo $v->comentario; ?></td>
                                                    <td><?php echo $usuario->nombre; ?></td>
                                                    <td><?php echo $usuario->email; ?></td>
                                                    <td>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="idValoracion" value="<?php echo $v->id; ?>">
                                                            <input type="submit" name="eliminarValoracion" value="Eliminar" class="btn btn-danger">
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                    
            if (isset($_POST['autor-submit'])) {
                ?>
                    <div class="row">
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-5">
                                <form action="anadirAutor.php" method="POST">
                                    <input type="submit" class="btn-anadir text-light" name="anadirAutor" value="AÑADIR AUTOR">
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3">

                        </div>

                        <div class="col-md-6">
                            <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Operaciones</th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-light">
                                        <?php
                                        $autores = AutorController::fetchAll();
                                        if ($autores) {
                                            foreach ($autores as $a) {
                                        ?>
                                                <tr>
                                                    <td><img src="./assets/img//content/<?php echo $a->foto; ?>" width="50%" alt="<?php echo $a->foto ?>"></td>
                                                    <td><?php echo $a->nombrefull; ?></td>
                                                    <td>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="idAutor" value="<?php echo $a->id; ?>">
                                                            <input type="submit" name="editarAutor" value="Editar" class="btn btn-success">
                                                            <input type="submit" name="eliminarAutor" value="Eliminar" class="btn btn-danger">
                                                            
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                    
            if (isset($_POST['compra-submit'])) {
                ?>
                    <div class="row my-5">
                        <div class="col-md-2">

                        </div>

                        <div class="col-md-7">
                            <div class="table-responsive-sm">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Portada</th>
                                            <th>ISBN</th>
                                            <th>Titulo</th>
                                            <th>Fecha del pedido</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Nombre Usuario</th>
                                            <th>Email</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody class="table-light">
                                        <?php
                                        $compras = CompraController::fetchAll();
                                        if ($compras) {
                                            foreach ($compras as $c) {
                                                $libro = LibroController::fetchLibroFromId($c->idLibro);
                                                $usuario = UsuarioController::fetchUsuariofromId($c->idUsuario);
                                        ?>
                                                <tr>
                                                    <td><img src="./assets/img/content/<?php echo $libro->portada; ?>" width="50%" alt="<?php echo $libro->titulo ?>"></td>
                                                    <td><?php echo $libro->isbn; ?></td>
                                                    <td><?php echo $libro->titulo; ?></td>
                                                    <td><?php echo $c->fechapedido; ?></td>
                                                    <td><?php echo $c->cantidad; ?></td>
                                                    <td><?php echo $libro->precio; ?></td>
                                                    <td><?php echo $usuario->nombre; ?></td>
                                                    <td><?php echo $usuario->email; ?></td>
                                                </tr>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                    ?>

                    




    </main>


    <?php include("includes/footerFase2.php"); ?>

</body>

</html>