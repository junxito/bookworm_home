<?php include("includes/a_config.php");

if (isset($_POST['cambio-submit'])) {
    if (is_uploaded_file($_FILES['foto']['tmp_name'])){
        $fich=time()."-".$_FILES['foto']['name'];
        $ruta="./assets/img/content/".$fich;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        $libroNew= new Libro($_SESSION['libroEdit']->id, $_POST['titulo'], $_POST['descripcion'], $_POST['fechapost'], $_POST['precio'], $_POST['autor'], $_POST['stock'], $_POST['editorial'], $_POST['isbn'], $_POST['edicion'], $fich, $_POST['genero']);
        $insercionLibro= LibroController::updateLibro($libroNew);
        if($insercionLibro){
            $msg= "Libro editado correctamente!";
            header('Location:crudAdministrador.php?msg='.$msg);
        }
    }
    else {
        $libroNew= new Libro($_SESSION['libroEdit']->id, $_POST['titulo'], $_POST['descripcion'], $_POST['fechapost'], $_POST['precio'], $_POST['autor'], $_POST['stock'], $_POST['editorial'], $_POST['isbn'], $_POST['edicion'], $_SESSION['libroEdit']->portada, $_POST['genero']);
        $insercionLibro= LibroController::updateLibro($libroNew);
        if($insercionLibro){
            $msg= "Libro editado correctamente!";
            header('Location:crudAdministrador.php?msg='.$msg);
        }
    }
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
        <div class="container-registro">
            <div class="row">
                <div class="col-md-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house-chimney breadcrumb"></i><span class="sr-only">Home</span></a></li>
                            <li class="breadcrumb-item">Gestion de Administrador</li>
                            <li class="breadcrumb-item">Editar Libro</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="container-formulario">
                <div class="panel panel-register">
                    <div class="panel-heading">
                        <div class="row-register">
                            <div class="col-md-6-register"> <!--Fase2: No debes crear la clase col-md-6-register -->
                                <i class="fa-sharp fa-solid fa-user"></i>
                            </div>
                            <div class="col-md-6-register">
                                <a href="#" class="active" id="register-form-link">Editar Libro</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-lg-12">
                                    <form id="register-form" action="crudAdminisstrador.php" method="POST" role="form" style="display: block;" enctype="multipart/form-data">
                                        <!-- Mostrar Imagen -->
                                        <div class="col-lg-12 text-light">
                                    <form id="register-form" action="" method="POST" role="form" style="display: block;" enctype="multipart/form-data">
                                    <!-- Mostrar Imagen -->
                                        <div class="form-group">
                                        <img src="./assets/img/content/<?php echo $_SESSION['libroEdit']->portada; ?>" width="50%" alt="<?php echo $_SESSION['libroEdit']->portada; ?>">
                                            <label for="foto">Introduce una portada del libro:</label><br>
                                            <input type="file" name="foto" >
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="titulo">Titulo</label>
                                                <input type="text" name="titulo" tabindex="2" class="form-control" required value="<?php echo $_SESSION['libroEdit']->titulo ?>">
                                            </div>

                                            <div class="col-md-4 form-group">
                                            <label for="isbn">ISBN</label>
                                                <input type="text" name="isbn" tabindex="2" class="form-control" required value="<?php echo $_SESSION['libroEdit']->isbn ?>">
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="genero">Género</label>
                                                <select name="genero" id="genero" required>
                                                    <option value="romance" <?php if ($_SESSION['libroEdit']->genero == 'romance') echo 'selected'; ?>>Romance</option>
                                                    <option value="fantasia" <?php if ($_SESSION['libroEdit']->genero == 'fantasia') echo 'selected'; ?>>Fantasía</option>
                                                    <option value="cienciaficcion" <?php if ($_SESSION['libroEdit']->genero == 'cienciaficcion') echo 'selected'; ?>>Ciencia Ficción</option>
                                                    <option value="misterio" <?php if ($_SESSION['libroEdit']->genero == 'misterio') echo 'selected'; ?>>Misterio</option>
                                                    <option value="terror" <?php if ($_SESSION['libroEdit']->genero == 'terror') echo 'selected'; ?>>Terror</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="autor">Autor</label>
                                                <select name="autor" id="autor" required>
                                                    <option value="">Seleccione un género</option>
                                                    <?php
                                                        $autores = AutorController::fetchAll();
                                                        if ($autores) {
                                                            foreach ($autores as $a) {
                                                                if ($a->id == $_SESSION['libroEdit']->idAutor) {
                                                                    echo '<option value="'.$a->id.'" selected>'.$a->nombrefull.'</option>';
                                                                } else {
                                                                    echo '<option value="'.$a->id.'">'.$a->nombrefull.'</option>';
                                                                }
                                                                
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="fechapost">Fecha de publicación</label>
                                                <input type="date" name="fechapost" tabindex="2" class="form-control" required value="<?php echo $_SESSION['libroEdit']->fechapost ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="edicion">Edición</label>
                                                <select name="edicion" id="edicion" required>
                                                    <option value="Tapa blanda" <?php if ($_SESSION['libroEdit']->edicion == 'Tapa blanda') echo 'selected'; ?>>Tapa Blanda</option>
                                                    <option value="Tapa dura" <?php if ($_SESSION['libroEdit']->edicion == 'Tapa dura') echo 'selected'; ?>>Tapa Dura</option>
                                                    <option value="Cuero" <?php if ($_SESSION['libroEdit']->edicion == 'Cuero') echo 'selected'; ?>>Cuero</option>
                                                    <option value="Ilustrada" <?php if ($_SESSION['libroEdit']->edicion == 'Ilustrada') echo 'selected'; ?>>Ilustrada</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-4 form-group">
                                                <label for="precio">Precio</label>
                                                <input type="text" name="precio" tabindex="2" class="form-control" required value="<?php echo $_SESSION['libroEdit']->precio ?>">
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label for="stock">Stock</label>
                                                <input type="text" name="stock" tabindex="2" class="form-control" required value="<?php echo $_SESSION['libroEdit']->stock ?>">
                                            </div>

                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="editorial">Editorial</label>
                                                <input type="text" name="editorial" tabindex="2" class="form-control" required value="<?php echo $_SESSION['libroEdit']->editorial ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="descripcion">Descripción del Libro:</label>
                                                <textarea name="descripcion" rows="4" cols="50" required><?php echo $_SESSION['libroEdit']->descripcion ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row-button">
                                            <div class="col-md-5 form-group">
                                                <input type="submit" name="cambio-submit" id="cambio-submit"  class="form-control btn btn-mediano" value="EDITAR LIBRO">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="my-4"></div>
            <div class="my-4"></div>
        </div>
    </main>
    <?php include("includes/footerFase2.php"); ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</html>