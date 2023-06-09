<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>

<body class="bodyzp">
<?php include("includes/headerFase2.php");?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house-chimney breadcrumb"></i><span class="sr-only">Inicio</span></a></li>
                        <li class="breadcrumb-item">Iniciar Sesión</li>
                        <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">  
                    <div class="col-md-3">
                        <div class="perfil-foto">
                            <img class="foto-redondita" alt="Foto de perfil de usuario" src="https://img.freepik.com/vector-premium/icono-circulo-usuario-anonimo-ilustracion-vector-estilo-plano-sombra_520826-1931.jpg?w=740">
                            <span class="span-font-per"> <?php echo $_SESSION ['usuario']->nombre ?> </span>
                            <span> <?php echo $_SESSION ['usuario']->email ?> </span>
                        </div>
                    </div>
                    

                    <div class="col-md-5">
                        <div class="perfil-central">
                            <div class="titulo-perfil">
                                <h4>Perfil</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre" class="labels">Nombre</label>
                                    <input type="text" id="nombre" class="form-control" value= <?php echo $_SESSION ['usuario']->nombre ?> disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstname" class="labels">Apellido 1</label>
                                    <input type="text" id="firstname" class="form-control" value= <?php echo $_SESSION ['usuario']->apellido1 ?> disabled >
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="labels">Apellido 2</label>
                                    <input type="text" id="lastname" class="form-control" value= <?php echo $_SESSION ['usuario']->apellido2 ?> disabled >
                                </div>
                                <div class="col-md-6">
                                    <label for="saldo" class="labels">Saldo</label>
                                    <input type="text" id="saldo" class="form-control" value= <?php echo $_SESSION ['usuario']->saldo ?> disabled >
                                </div>
                            </div>
                            <div class="margin-col row">
                                <div class="col-md-12">
                                    <label for="phone" class="labels">Número de Teléfono</label>
                                    <input type="text" id="phone" class="form-control" value= <?php echo $_SESSION ['usuario']->tlf ?> disabled>
                                </div>

                                <div class="col-md-12">
                                    <label for="pais" class="labels">Pais</label>
                                    <input type="text" id="pais" class="form-control" value= <?php echo $_SESSION ['usuario']->pais ?> disabled >
                                </div>
                                <div class="col-md-12">
                                    <label for="postalcode" class="labels">Código Postal</label>
                                    <input type="text" id="postalcode" class="form-control" placeholder="Código Postal" value= <?php echo $_SESSION ['usuario']->cp ?> disabled >
                                </div>
                                <div class="col-md-12">
                                    <label for="email" class="labels">Email</label>
                                    <input type="text" id="email" class="form-control" placeholder="Email ID" value= <?php echo $_SESSION ['usuario']->email ?> disabled >
                                </div>
                                <div class="col-md-12">
                                    <label for="rol" class="labels">Rol</label>
                                    <input type="text" id="rol" class="form-control" placeholder="Rol" value= <?php echo $_SESSION ['usuario']->rol ?> disabled >
                                </div>
                            </div>

                            <div class="margin-col row">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="perfil-central row">
                            <div class="col-md-12">
                                <h4>Tu Cuenta</h4>
                            </div>
                            <div class="col-md-12">
                                <ul class="listazp">
                                    
                                    <li><a class="azp" href="carrito.php">Mis compras</a></li>
                                    
                                </ul>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</main>

<?php include("includes/footerFase2.php"); ?>

</body>
</html>