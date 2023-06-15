<?php include("includes/a_config.php");

if (isset($_POST['anadir-submit'])) {
    $usuarioNew= new Usuario("", $_POST['email'], $_POST['password'], $_POST['username'], $_POST['lastname1'], $_POST['lastname2'], $_POST['pais'], $_POST['postalcode'], $_POST['phone'], $_POST['rol'], $_POST['saldo']);
    $insercionUsuario= UsuarioController::newUsuario($usuarioNew);
    if($insercionUsuario){
        $msg= "Usuario creado correctamente!";
        header('Location:crudAdministrador.php?msg='.$msg);
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
                                <li class="breadcrumb-item">Gestion de Administrador</li>
                                <li class="breadcrumb-item">Añadir Usuarios</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-formulario">
                    <div class="panel panel-register">
                            <div class="panel-heading">
                                <div class="row-register">
                                    <div class="col-md-6-register">
                                        <i class="fa-sharp fa-solid fa-user"></i>
                                    </div>
                                    <div class="col-md-6-register">
                                        <a href="#" class="active" id="register-form-link">AÑADIR CUENTA</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 text-light">
                                    <form id="register-form" action="" method="post" role="form" style="display: block;">
                                        <div class="form-group">
                                            <p>Correo electronico</p>
                                            <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="@example.com" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required>
                                        </div>
                                        <div class="form-group">
                                            <p>Contraseña</p>
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Al menos 6 caracteres" required pattern="^[A-Za-z\d.]{6, }$">
                                        </div>
                                        <div class="form-group">
                                            <p>Nombre</p>
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Nombre de usuario" pattern="^[A-Za-zñÑáéíóúÁÉÍÓÚ.\s]+$" required>
                                        </div>
                                        <div class="form-group">
                                            <p>Apellido 1</p>
                                            <input type="text" name="lastname1" id="lastname1" tabindex="1" class="form-control" placeholder="Apellido 1" pattern="^[A-Za-zñÑáéíóúÁÉÍÓÚ.\s]+$" required>
                                        </div>
                                        <div class="form-group">
                                            <p>Apellido 2</p>
                                            <input type="text" name="lastname2" id="lastname2" tabindex="1" class="form-control" placeholder="Apellido 2" pattern="^[A-Za-zñÑáéíóúÁÉÍÓÚ.\s]+$" required>
                                        </div>
                                        <div class="form-group">
                                            <p>País</p>
                                            <input type="text" name="pais" id="pais" tabindex="1" class="form-control" placeholder="País" pattern="^[A-Za-zñÑáéíóúÁÉÍÓÚ.\s]+$" required>
                                        </div>
                                        <div class="form-group">
                                            <p>Código Postal</p>
                                            <input type="text" name="postalcode" id="postalcode" tabindex="1" class="form-control" placeholder="Código Postal del país" pattern="^\d{5}$" required>
                                        </div>
                                        <div class="form-group">
                                            <p>Teléfono</p>
                                            <input type="text" name="phone" id="phone" tabindex="1" class="form-control" placeholder="Teléfono de contacto" pattern="^\d{9}$" required>
                                        </div>
                                        <div class="form-group">
                                            <p>Saldo</p>
                                            <input type="text" name="saldo" id="saldo" tabindex="1" class="form-control" placeholder="100" required>
                                        </div>
                                        <div class="form-group">
                                            <p>Rol</p>
                                            <select name="rol">
                                                <option value="cliente">Cliente</option>
                                                <option value="administrador">Administrador</option>
                                            </select>
                                        </div>
                                        <div class="row-button">
                                            <input type="submit" name="anadir-submit"  tabindex="4" class="form-control btn btn-mediano" value="AÑADIR USUARIO">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include("includes/footerFase2.php");?>

    </body>
</html>