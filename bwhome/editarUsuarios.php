<?php include("includes/a_config.php");

if (isset($_POST['edit-submit'])) {
    $usuarioNew = new Usuario($_SESSION['usuarioEdit']->id, $_POST['email'], $_POST['password'], $_POST['username'], $_POST['lastname1'], $_POST['lastname2'], $_POST['pais'], $_POST['postalcode'], $_POST['phone'], $_POST['rol'], "");
    $usuarioEdit = UsuarioController::updateUsuario($usuarioNew);
    if ($usuarioEdit) {
        $msg= "Usuario editado correctamente!";
        header('Location:crudAdministrador.php?msg='.$msg);
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
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house-chimney breadcrumb"></i><span class="sr-only">Inicio</span></a></li>
                            <li class="breadcrumb-item"> Gestion de Administrador</li>
                            <li class="breadcrumb-item">Editar Usuario</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="container-formulario">
                <div class="panel panel-register p-2">
                    <div class="panel-heading">
                        <div class="row-register">
                            <div class="col-md-6-register">
                                <i class="fa-sharp fa-solid fa-user"></i>
                            </div>
                            <div class="col-md-6-register">
                                <a href="#" class="active" id="register-form-link">EDITAR CUENTA</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 text-light">
                                <form id="register-form" action="" method="POST" role="form" style="display: block;">
                                    <div class="form-group">
                                        <label for="email">Correo electronico</label>
                                        <input type="email" name="email" id="email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value=<?php echo $_SESSION['usuarioEdit']->email ?> required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input type="password" name="password" id="password" class="form-control" value=<?php echo $_SESSION['usuarioEdit']->password ?> required pattern="^[A-Za-z\d.]{6, }$">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Nombre</label>
                                        <input type="text" name="username" id="username" class="form-control" pattern="^[A-Za-zñÑáéíóúÁÉÍÓÚ.\s]+$" value=<?php echo $_SESSION['usuarioEdit']->nombre ?> required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname1">Apellido 1</label>
                                        <input type="text" name="lastname1" id="lastname1" class="form-control" pattern="^[A-Za-zñÑáéíóúÁÉÍÓÚ.\s]+$" value=<?php echo $_SESSION['usuarioEdit']->apellido1 ?> required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname2">Apellido 2</label>
                                        <input type="text" name="lastname2" id="lastname2" class="form-control" pattern="^[A-Za-zñÑáéíóúÁÉÍÓÚ.\s]+$" value=<?php echo $_SESSION['usuarioEdit']->apellido2 ?> required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pais">País</label>
                                        <input type="text" name="pais" id="pais" class="form-control" pattern="^[A-Za-zñÑáéíóúÁÉÍÓÚ.\s]+$" value=<?php echo $_SESSION['usuarioEdit']->pais ?> required>
                                    </div>
                                    <div class="form-group">
                                        <label for="postalcode">Código Postal</label>
                                        <input type="text" name="postalcode" id="postalcode" class="form-control" pattern="^\d{5}$" value=<?php echo $_SESSION['usuarioEdit']->cp ?> required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Teléfono</label>
                                        <input type="text" name="phone" id="phone" class="form-control" pattern="^\d{9}$" value=<?php echo $_SESSION['usuarioEdit']->tlf ?> required>
                                    </div>
                                    <div class="form-group">
                                        <label for="rol">Rol</label>
                                        <select name="rol" id="rol">
                                            <option value="administrador" <?php if ($_SESSION['usuarioEdit']->rol == 'administrador') {
                                                                                echo 'selected';
                                                                            } ?>>Administrador</option>
                                            <option value="cliente" <?php if ($_SESSION['usuarioEdit']->rol == 'cliente') {
                                                                        echo 'selected';
                                                                    } ?>>Cliente</option>
                                        </select>
                                    </div>
                                    <div class="row-button">
                                        <input type="submit" name="edit-submit" class="form-control btn btn-mediano" value="EDITAR USUARIO">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separador my-3"></div>
        </div>
        </div>
    </main>
    <?php include("includes/footerFase2.php"); ?>

</body>

</html>