<?php include("includes/a_config.php");

if (isset($_POST['anadir-submit'])) {
    if (is_uploaded_file($_FILES['foto']['tmp_name'])){
        $fich=time()."-".$_FILES['foto']['name'];
        $ruta="./assets/img/content/".$fich;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        $libroNew= new Libro("", $_POST['titulo'], $_POST['descripcion'], $_POST['fechapost'], $_POST['precio'], $_POST['autor'], $_POST['stock'], $_POST['editorial'], $_POST['isbn'], $_POST['edicion'], $fich, $_POST['genero']);
        $insercionLibro= LibroController::newLibro($libroNew);
        if($insercionLibro){
            $msg= "Libro añadido correctamente!";
            header('Location:crudAdministrador.php?msg='.$msg);
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/head-tag-contents.php");?>
    </head>
    <body>

    <?php include("includes/headerFase2.php");?>
        <main>
            <div class="container-registro">
                <div class="row">
                    <div class="col-md-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-nav">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house-chimney breadcrumb"></i></a></li>
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
                                        <a href="#" class="active" id="register-form-link">Añadir Libro</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                            <div class="row">

                                <div class="col-lg-12 text-light">
                                    <form id="register-form" action="" method="POST" role="form" style="display: block;" enctype="multipart/form-data">
                                    <!-- Mostrar Imagen -->
                                        <div class="form-group">
                                            <label for="foto">Introduce una imagen del libro:</label><br>
                                            <input type="file" name="foto" required>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="titulo">Titulo</label>
                                                <input type="text" name="titulo" tabindex="2" class="form-control" required>
                                            </div>

                                            <div class="col-md-4 form-group">
                                            <label for="isbn">ISBN</label>
                                                <input type="text" name="isbn" tabindex="2" class="form-control" required>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="genero">Género</label>
                                                <select name="genero" id="genero" required>
                                                    <option value="">Seleccione un género</option>
                                                    <option value="romance">Romance</option>
                                                    <option value="fantasia">Fantasía</option>
                                                    <option value="cienciaficcion">Ciencia Ficción</option>
                                                    <option value="misterio">Misterio</option>
                                                    <option value="terror">Terror</option>
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
                                                                echo '<option value="'.$a->id.'">'.$a->nombrefull.'</option>';
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="fechapost">Fecha de publicación</label>
                                                <input type="date" name="fechapost" tabindex="2" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="edicion">Edición</label>
                                                <select name="edicion" id="edicion" required>
                                                    <option value="">Seleccione una edición</option>
                                                    <option value="Tapa blanda">Tapa Blanda</option>
                                                    <option value="Tapa dura">Tapa Dura</option>
                                                    <option value="Cuero">Cuero</option>
                                                    <option value="Ilustrada">Ilustrada</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-4 form-group">
                                                <label for="precio">Precio</label>
                                                <input type="text" name="precio" tabindex="2" class="form-control" required>
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label for="stock">Stock</label>
                                                <input type="text" name="stock" tabindex="2" class="form-control" required>
                                            </div>

                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="editorial">Editorial</label>
                                                <input type="text" name="editorial" tabindex="2" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="descripcion">Descripción del Libro:</label>
                                                <textarea name="descripcion" rows="4" cols="50" required></textarea>
                                            </div>
                                        </div>

                                        <div class="row-button">
                                            <div class="col-md-5 form-group">
                                            <input type="submit" name="anadir-submit" tabindex="4" class="form-control btn btn-mediano" value="AÑADIR LIBRO">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-4"></div>
                <div class="my-4"></div>
            </div>
        </main>
        <?php include("includes/footerFase2.php");?>

    </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</html>