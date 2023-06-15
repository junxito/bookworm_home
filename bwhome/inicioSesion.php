<?php

include("includes/a_config.php");
include("includes/dbconnection.php");
include("includes/googleconnect.php");



if (isset($_SESSION['usuario'])) {
    header('Location:index.php');
}
if (isset($_POST['login-button'])) {
    $user = UsuarioController::fetchUsuarioLogin($_POST['email'], $_POST['password']);
    if (!$user)
        $errorSesion = "Usuario o contraseña incorrectos!"; //echo "No se ha podido loguear";
    else {
        $_SESSION['usuario'] = UsuarioController::fetchUsuarioLogin($_POST['email'], $_POST['password']);
        header('Location:index.php');
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



        <div class="row">
            <div class="col-md-4">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house-chimney breadcrumb"></i><span class="sr-only">Inicio</span></a></li>
                        <li class="breadcrumb-item">Iniciar Sesion</li>
                    </ol>

                </nav>
            </div>
        </div>
        <?php //SI HAY ERROR EN EL LOGIN -->
        if (isset($errorSesion)) {
        ?>
            <div class="alert alert-danger">
                <strong><?php echo $errorSesion ?></strong> Compruebe las credenciales
            </div>
        <?php } //Fin
        ?>

        <div class="container-formulario">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row-sesion">
                        <div class="col-md-6-icon">
                            <i class="fa-sharp fa-solid fa-user"></i>
                        </div>
                        <div class="col-md-6-inicio">
                            <a href="#" class="active" id="login-form-link">INICIAR SESIÓN</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row-sesion">
                        <div class="col-lg-12 sesion text-light">
                            <!-- FORMULARIO -->
                            <form id="login-form" action="" method="post" role="form" style="display: block;">
                                <div class="form-group">
                                    <label for="email"><p>Dirección de correo</p></label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="" value="" pattern="^[a-z0-9]+(.[_a-z0-9]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,15})$">
                                </div>
                                <div class="form-group">
                                    <label for="password"><p>Contraseña</p></label>
                                    <input type="password" name="password" id="password"  class="form-control" placeholder="" pattern="^[A-Za-z\d.]+$">
                                </div>
                                <div class="row-button">
                                    <input type="submit" name="login-button" id="login-button" class="form-control btn btn-mediano" value="Iniciar sesión">
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row buttonRegister">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="crearCuenta.php"><input type="submit" name="register-submit" class="form-control btn btn-grande" value="¿No tiene cuenta?"><span class="sr-only">¿No tiene cuenta? Pulsa aquí</span></a>
            </div>
            <div class="col-md-4"></div>
        </div>
    </main>
    <?php include("includes/footerFase2.php"); ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</html>