<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

    <?php include("includes/headerFase2.php"); ?>

    <div class="pago container d-flex justify-content-center mt-5 mb-5">

        <div class="row g-3">

            <div class="col-md-6">
                <span class="metodo pago">Método de pago</span>
                <div class="card">
                    <div class="card">

                        <div class="card-header">
                            <h2 class="iconos credito">
                                <button class="btn btn-light btn-block text-left p-3 rounded-0">
                                    <div class="d-flex align-items-center justify-content-between">

                                        <span>Tarjeta de credito</span>
                                        <div class="icons">
                                            <img src="https://i.imgur.com/2ISgYja.png" width="40" alt="mastercard">
                                            <img src="https://i.imgur.com/W1vtnOV.png" width="40" alt="visa">
                                            <img src="https://i.imgur.com/35tC99g.png" width="40" alt="stripe">
                                        </div>

                                    </div>
                                </button>
                            </h2>
                        </div>

                        <div>
                            <div class="card-body payment-card-body">
                                <i class="fa fa-credit-card"></i><span class="font-weight-normal card-text">Número de tarjeta</span>
                                <div class="input">
                                    <label for="tarjetaCredito"><span class="sr-only">Campo de tarjeta de crédito</span></label>
                                    <input type="text" name="tarjetaCredito" id="tarjetaCredito" class="form-control" placeholder="0000 0000 0000 0000">
                                </div>

                                <div class="row mt-3 mb-3">
                                    <div class="col-md-6">
                                        <i class="fa fa-calendar"></i><span class="font-weight-normal card-text">Fecha de expiración</span>
                                        <div class="input">
                                            <label for="campoFecha"><span class="sr-only">Fecha</span></label>
                                            <input type="text" class="form-control" placeholder="MM/YY" name="campoFecha" id="campoFecha">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <i class="fa fa-lock"></i><span class="font-weight-normal card-text">CVC/CVV</span>
                                        <div class="input">
                                            <label for="cvv"><span class="sr-only">CVV</span></label>
                                            <input type="text" class="form-control" placeholder="000" name="cvv" id="cvv">
                                        </div>
                                    </div>
                                </div>

                                <span class="text transaccion>
                                    <i class="fa fa-lock"></i>
                                    Transacción segura
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <span class="metodo pago">Resumen</span>
                <div class="card">

                    <div class="d-flex justify-content-between p-3">

                        <div class="d-flex flex-column">
                            <span>Total <i class="fa fa-caret-down"></i></span>
                        </div>

                        <div class="mt-1">
                            <sup class="precio">€79.99</sup>
                            <span class="iva">/Iva incluido</span>
                        </div>

                    </div>

                    <hr class="mt-0 line">

                    <div class="p-3">

                        <div class="d-flex justify-content-between mb-2">

                            <span>Descuentos aplicados</span>
                            <span>-€2.00</span>

                        </div>

                        <div class="d-flex justify-content-between">

                            <span>I.V.A <i class="fa fa-clock-o"></i></span>
                            <span>+21%</span>

                        </div>


                    </div>

                    <hr class="mt-0 line">


                    <div class="p-3 d-flex justify-content-between">

                        <div class="d-flex flex-column">

                            <span>Transporte(Envío estandar)</span>
                            <small>24-48h</small>

                        </div>
                        <span>€2.5</span>



                    </div>


                    <div class="p-3">

                        <button class="btn btn-primary btn-block btn-confirmarPago btnC">Confirmar pago</button>
                        <div class="text-center">
                            <div class="mt-3"><a class="m-2 btnC" href="#">¿Tiene un codigo de descuento?</a></div>
                        </div>

                    </div>




                </div>
            </div>
        </div>

    </div>

    <?php include("includes/footerFase2.php"); ?>

</body>

</html>