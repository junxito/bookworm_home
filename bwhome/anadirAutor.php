<?php include("includes/a_config.php");

if (isset($_POST['anadir-submit'])) {
    if (is_uploaded_file($_FILES['foto']['tmp_name'])){
        $fich=time()."-".$_FILES['foto']['name'];
        $ruta="./assets/img/content/".$fich;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        $autorNew= new Autor("", $_POST['nombrefull'], $_POST['biografia'],  $fich);
        $insercionAutor= AutorController::newAutor($autorNew);
        if($insercionAutor){
            $msg= "Autor añadido correctamente!";
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
                                        <a href="#" class="active" id="register-form-link">Añadir Autor</a>
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
                                            <label for="foto">Introduce una imagen del Autor:</label><br>
                                            <input type="file" name="foto" required>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="nombrefull">Nombre Completo:</label>
                                                <input type="text" name="nombrefull" tabindex="2" class="form-control" pattern="^[A-Za-zñÑáéíóúÁÉÍÓÚ.\s]+$" placeholder="Nombre" required>
                                            </div>

                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="biografia">Biografía del Autor:</label>
                                                <textarea name="biografia" rows="4" cols="50" placeholder="Introduzca información del autor" required></textarea>
                                            </div>
                                        </div>

                                        <div class="row-button">
                                            <div class="col-md-5 form-group">
                                            <input type="submit" name="anadir-submit" tabindex="4" class="form-control btn btn-mediano" value="AÑADIR AUTOR">
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