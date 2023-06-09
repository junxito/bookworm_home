<?php
include("includes/a_config.php");

if (isset($_POST['register-submit'])) {
  $usuarioNew = new Usuario("", $_POST['email'], $_POST['password'], $_POST['username'], $_POST['lastname1'], $_POST['lastname2'], $_POST['pais'], $_POST['postalcode'], $_POST['phone'], $_POST['rol'], $_POST['saldo']);
  $insercionUsuario = UsuarioController::newUsuario($usuarioNew);
  if ($insercionUsuario) {
    $usuario = UsuarioController::fetchUsuarioFromEmail($_POST['email']);
    $_SESSION['usuario'] = $usuarioNew;
    $_SESSION['iduser'] = $usuario->id;
    header('Location:index.php?codeRegister=1');
  }
}
