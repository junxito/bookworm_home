<?php include("includes/a_config.php");

if (isset($_POST['eliminarCompra'])) {
    $compra = CompraController::fetchCompraFromId($_POST['idCompra']);
    $libro = LibroController::fetchLibroFromId($compra->idLibro);
    $compraEliminar = CompraController::deleteCompra($_POST['idCompra']);
    $saldoFinal = $_SESSION['usuario']->saldo + ($compra->cantidad * $libro->precio);
    $stockFinal = $libro->stock + $compra->cantidad;
    if ($compraEliminar) {
        $subirStock = LibroController::disminuirStock($libro->id, $stockFinal);
        if ($_SESSION['usuario']->rol == 'cliente') {
            $subirSaldo = UsuarioController::disminuirSaldo($_SESSION['usuario']->id, $saldoFinal);
        }
        $msg= "Compra reembolsada correctamente!";
    } else {
        $msg= "Tu compra no se ha podido reembolsar";
    }
    
    header('Location:listaCompras.php?msg='.$msg);
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
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house-chimney breadcrumb"></i><span class="sr-only">Home</span></a></li>
                        <li class="breadcrumb-item">Mis Compras</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="container-md">
            <?php
            if(isset($_GET['msg'])){
                echo "<br><div class='alert alert-success' role='alert'>".$_GET['msg']."</div><br>";
            }
            ?>
            <div class="row-administrador">
                <div class="col-md title-administrador">
                    <h1 class="h1-title-administrador">Mis Compras</h1>
                </div>
            </div>

            <div class="row ">
                <div class="col-md-2">

                </div>

                <div class="col-md-8">
                    <div class="table-responsive-sm">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Portada</th>
                                    <th>ISBN</th>
                                    <th>Titulo</th>
                                    <th>Fecha del pedido</th>
                                    <th>Cantidad</th>
                                    <th>Precio Total</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>

                            <tbody class="table-light">
                                <?php
                                $compras = CompraController::fetchCompraFromIdUsuario($_SESSION['usuario']->id);
                                if ($compras) {
                                    foreach ($compras as $c) {
                                        $libro = LibroController::fetchLibroFromId($c->idLibro);
                                        $usuario = UsuarioController::fetchUsuariofromId($c->idUsuario);
                                ?>
                                        <tr>
                                            <td><img src="./assets/img/content/<?php echo $libro->portada; ?>" width="50%" alt="<?php echo $libro->titulo ?>"></td>
                                            <td><?php echo $libro->isbn; ?></td>
                                            <td><?php echo $libro->titulo; ?></td>
                                            <td><?php echo $c->fechapedido; ?></td>
                                            <td><?php echo $c->cantidad; ?></td>
                                            <td><?php echo $libro->precio * $c->cantidad; ?></td>
                                            <td>
                                                <form action="detalleCompra.php" method="POST">
                                                    <input type="hidden" name="idLibro" value="<?php echo $c->idLibro; ?>">
                                                    <input type="hidden" name="idCompra" value="<?php echo $c->id; ?>">
                                                    <input type="submit" name="verDetalleCompra" value="Ver compra" class="btn btn-success">
                                                </form>
                                                <form action="" method="POST">                                                    
                                                    <input type="hidden" name="idCompra" value="<?php echo $c->id; ?>">
                                                    <input type="submit" name="eliminarCompra" value="Solicitar Reembolso" class="btn btn-danger">
                                                </form>
                                                
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>                            
                </div>
                
            </div>
        </div>
        <br>

    </main>


    <?php include("includes/footerFase2.php"); ?>

</body>

</html>