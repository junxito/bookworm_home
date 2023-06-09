<?php include("includes/a_config.php");

if (isset($_POST['register-submit'])) {
    if (UsuarioController::fetchUsuarioFromEmail($_POST['email'])) {
        header('Location:index.php?errorCode=1');
    } else {
        $usuarioNew = new Usuario("", $_POST['email'], $_POST['password'], $_POST['username'], $_POST['lastname1'], $_POST['lastname2'], $_POST['pais'], $_POST['postalcode'], $_POST['phone'], $_POST['rol'], $_POST['saldo']);
        $insercionUsuario = UsuarioController::newUsuario($usuarioNew);
        if ($insercionUsuario) {
            $_SESSION['usuario'] = $usuarioNew;
            header('Location:index.php?codeRegister=1');
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
                            <li class="breadcrumb-item"><a href="index.php" ><i class="fa-solid fa-house-chimney breadcrumb"></i><span class="sr-only">Inicio</span></a></li>
                            <li class="breadcrumb-item">Iniciar sesion</li>
                            <li class="breadcrumb-item">Crear cuenta</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="container-formulario">
                <div class="panel panel-register">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-12">
                                <i class="fa-sharp fa-solid fa-user"></i>
                            </div>
                            <div class="col-12">
                                <a href="#" class="active" id="register-form-link">CREAR CUENTA</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 text-light">
                                <form id="register-form" action="" method="POST" style="display: block;">
                                    <div class="form-group">
                                        <label for="email">Correo electronico</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="@example.com" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Al menos 6 caracteres" pattern="^[A-Za-z\d.]{6, }$" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">Confirma tu contrtaseña</label>
                                        <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirmar contraseña" pattern="^[A-Za-z\d.]{6, }$" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Nombre</label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Nombre de usuario" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname1">Apellido 1</label>
                                        <input type="text" name="lastname1" id="lastname1" class="form-control" placeholder="Apellido 1" pattern="^[A-Za-z]+$" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname2">Apellido 2</label>
                                        <input type="text" name="lastname2" id="lastname2" class="form-control" placeholder="Apellido 2" pattern="^[A-Za-z]+$" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pais">País</label>
                                        <input type="text" name="pais" id="pais"  class="form-control" placeholder="País" pattern="^[A-Za-z]+$" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="postalcode">Código Postal</label>
                                        <input type="text" name="postalcode" id="postalcode" class="form-control" placeholder="Código Postal del país" pattern="^\d{5}$" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Teléfono</label>
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Teléfono de contacto" pattern="^\d{9}$" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="rol" hidden></label>
                                        <input type="text" name="rol" id="rol" hidden value="cliente">
                                    </div>
                                    <div class="form-group">
                                        <label for="saldo" hidden></label>
                                        <input type="text" name="saldo" id="saldo" hidden value="100">
                                    </div>
                                    <div class="row-button">
                                        <input type="submit" name="register-submit" id="register-submit" class="form-control btn btn-mediano" value="REGISTRARSE">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  buttonRegister">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <a href="inicioSesion.php"><input type="submit" name="register-submit" class="form-control btn btn-grande" value="¿Ya tiene cuenta? Inicie Sesion"><span class="sr-only">¿Ya tiene cuenta? Inicie Sesion</span></a>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </main>
    <?php include("includes/footerFase2.php"); ?>
</body>
<script>
    function refreshCaptcha() {
        document.querySelector(".captcha-image").src = 'includes/captcha.php?' + Date.now();
    }


    // validacion de parte del cliente
    document.getElementById("submit").addEventListener("click", function(event) {
        event.preventDefault();

        var response = document.getElementById("captchaResponse").value;

        // Check if the response is correct
        // if (response != "correct") {
        //     // Show error message
        //     document.getElementById("errorMessage").innerHTML = "CAPTCHA incorrecto, por favor intenta de nuevo.";
        // } else {
        //     // Submit the form
        //     document.getElementById("form").submit();
        // }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</html>