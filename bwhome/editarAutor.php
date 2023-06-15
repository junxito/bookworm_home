<?php include("includes/a_config.php");

if (isset($_POST['cambio-submit'])) {
    if (is_uploaded_file($_FILES['foto']['tmp_name'])){
        $fich=time()."-".$_FILES['foto']['name'];
        $ruta="./assets/img/content/".$fich;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        $autorNew= new Autor($_SESSION['autorEdit']->id, $_POST['nombrefull'], $_POST['biografia'],  $fich);
        $insercionAutor= AutorController::updateAutor($autorNew);
        if($insercionAutor){
            $msg= "Autor editado correctamente!";
            header('Location:crudAdministrador.php?msg='.$msg);
        }
    }
    else {
        $autorNew= new Autor($_SESSION['autorEdit']->id, $_POST['nombrefull'], $_POST['biografia'],  $_SESSION['autorEdit']->foto);
        $insercionAutor= AutorController::updateAutor($autorNew);
        if($insercionAutor){
            $msg= "Autor editado correctamente!";
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
                            <li class="breadcrumb-item">Editar Producto</li>
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
                                <a href="#" class="active" id="register-form-link">Editar Autor</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-lg-12 text-light">
                                    <form id="register-form" action="crudAdminisstrador.php" method="POST" role="form" style="display: block;" enctype="multipart/form-data">
                                        <!-- Mostrar Imagen -->
                                        <div class="form-group">
                                            <img src="./assets/img/content/<?php echo $_SESSION['autorEdit']->foto; ?>" width="50%" alt="<?php echo $_SESSION['autorEdit']->foto; ?>">
                                            <label for="foto">Introduce una imagen del autor:</label>
                                            <input type="file" id="foto" name="foto">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="nombrefull">Nombre Completo:</label>
                                                <input type="text" name="nombrefull" id="nombrefull" pattern="^[A-Za-zñÑáéíóúÁÉÍÓÚ.\s]+$" class="form-control" value="<?php echo $_SESSION['autorEdit']->nombrefull ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="biografia">Biografía del Autor:</label>
                                                <textarea id="biografia" name="biografia" rows="4" cols="50" required><?php echo $_SESSION['autorEdit']->biografia ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row-button">
                                            <div class="col-md-5 form-group">
                                                <input type="submit" name="cambio-submit" id="cambio-submit"  class="form-control btn btn-mediano" value="EDITAR AUTOR">
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