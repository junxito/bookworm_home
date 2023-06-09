<?php include("includes/a_config.php"); 
$compra= CompraController::fetchCompraFromId($_POST['idCompra']);
$libro = LibroController::fetchLibroFromId($_POST['idLibro']);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body class="bodycarr">

    <?php include("includes/headerFase2.php"); ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><span class='sr-only'>Enlace a inicio</span><i class="fa-solid fa-house-chimney breadcrumb"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detalle Compra</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-8 carrito">
                    <h1>Detalle Compra</h1>
                </div>
            </div>


            <div class="row text-dark">
                <!-- PRODUCTOS -->
                <div class="col-md-7">
                    <div class="card">
                        <div class="row">

                            <div class="col-md-6 producto">
                                <img class="imagenCarr" src="./assets/img/content/<?php echo $libro->portada; ?>" alt="imagen de compra">
                            </div>
                            <div class="col-md-6 producto justify-content-center">

                                <div class="row">
                                    <span><?php echo $libro->titulo; ?></span>
                                    <span class="labelcarr"><?php echo $libro->precio; ?>€</span> <!-- Fase2: Falta propiedad "for"-->
                                    <span class="labelcarr1"><?php echo $libro->descripcion; ?></span>
                                </div>
                                <div class="row cantidad">
                                    <span class="labelcarr">Cantidad:</span>
                                    <form action="">
                                        <label class="sr-only" for="valor">Cantidad</label>
                                        <input type="number" name="valor" id="valor" value="<?php echo $compra->cantidad?>" disabled>
                                    </form>
                                </div>
                            </div>
                            <div class="horizontal">
                                <hr>
                            </div>

                        </div>


                    </div>

                </div>

                <div class="col-md-5">
                    <div class="card card-resumen">
                        <br>
                        <form>
                            <span class="resumenpedido">Resumen del pedido</span>
                            <div class="col">
                                <span class="subtotal">Subtotal</span><span class="numsubtotal"><?php echo $libro->precio; ?>€</span>
                            </div>
                            <span class="methodsend">Elige una opción de envío:</span>
                            <div class="col entregaestandar">
                                <input id="entrega" type="radio" name="envio" value="estandar" disabled>
                                <label for="entrega">Entrega Estándar</label><span class="numenvioestandar">2.50€</span>
                            </div>

                            <div class="col entregagratis">
                                <input id="entrega" type="radio" name="entrega" value="gratis" checked disabled>
                                <span for="entrega">Entrega Gratis</span><span class="numenviogratis">0.00€</span>
                            </div>

                            <div class="col importetotal">
                                <span class="btnC">Importe Total(IVA inc):</span><span class="numtotal btnC"><?php echo $libro->precio; ?>€</span>
                            </div>
                            <br>
                            <!-- <div class="row pagar">
                                <div class="col-md">
                                    <a href="pago.php"><input type="submit" name="pagar-submit" id="pagar-submit" class="form-control btn btn-pequeño btnC" value="Pagar"><span class='sr-only btnC'>Enlace a pagar</span></input></a>
                                </div>
                            </div> -->

                        </form>
                    </div>
                </div>
            </div>

            <div class="row continuar">
                <a class="ahref btn-continuarCompra" href="index.php">
                    <div class="col-md ">
                        <i class="fa-solid fa-house-chimney continuarcomprando"></i>
                        <span class="btnC">Continuar Comprando</span>
                    </div>
                </a>
            </div>

        </div>

    </main>

    <?php include("includes/footerFase2.php"); ?>
</body>

</html>