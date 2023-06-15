<?php include("includes/a_config.php");
$libro = LibroController::fetchLibroFromId($_GET['idLibro']);
$autor = AutorController::fetchAutorFromId($libro->idAutor);
if (!isset($_SESSION['usuario'])) {
    header("Location:inicioSesion.php");
}
if (!isset($_GET['idLibro'])) {
    header("Location:index.php");
}

if (isset($_POST['comprarAhora'] )) {
    $saldoFinal = $_SESSION['usuario']->saldo - ($_POST['cantidad'] * $libro->precio);
    $stockFinal = $libro->stock - $_POST['cantidad'];
    if ($saldoFinal > 0 && $stockFinal > 0 && $_POST['cantidad']>0) {
        $fecha = date('Y-m-d');
        $compraNew = new Compra("", $fecha, $_POST['cantidad'], $_GET['idLibro'], $_SESSION['usuario']->id); 
        $insercionCompra= CompraController::newCompra($compraNew);
        if($insercionCompra){
            $bajarStock = LibroController::disminuirStock($_GET['idLibro'], $stockFinal);
            if ($_SESSION['usuario']->rol == 'cliente') {
                $bajarSaldo = UsuarioController::disminuirSaldo($_SESSION['usuario']->id, $saldoFinal);
            }
        }       
        

    } else {
        $redflagsaldo= true;
    }
} 

if (isset($_POST['botonComentario'])) {
    $valoracionNew = new Valoracion("", $_POST['finalEstrellas'], $_POST['comentario'], $_GET['idLibro'], $_SESSION['usuario']->id);
    $insercionValoracion = ValoracionController::newValoracion($valoracionNew);
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body class="text-dark">

    <?php include("includes/headerFase2.php"); 
    
    ?>

    <div class="visProducto container mt-5 mb-5">
        <?php
        if (isset($_POST['comprarAhora'])) {
            echo "<div class='alert alert-success' role='alert'>Compra realizada con éxito! <a href='listaCompras.php'>Aquí puedes ver que tu compra se ha realizado</a></div>";
        } elseif (isset($redflagsaldo)) {
            echo "<div class='alert alert-danger' role='alert'>No se pudo realizar la compra </div>";
        }
        ?>
        <div class="card"> <!-- Fase2: No se pueden poner cosas fuera del layout! -->
            <div class="row g-2">
                <div class="col-md-6 border-end">
                    <div class="d-flex justify-content-center">
                        <div class="main_image justify-content-center"> <img src="./assets/img/content/<?php echo $libro->portada; ?>" id="main_product_image"  alt="imagen principal"> <!-- Fase2: No se puede poner la propiedad width!!!! está totalmente obsoleto, eso va en scss--> </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 right-side">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3><?php echo $libro->titulo; ?></h3>
                        </div>
                        <h4><?php echo $libro->precio; ?>€ &nbsp;&nbsp;&nbsp;&nbsp;Edición: <?php echo $libro->edicion; ?></h4>
                        <h5>Editorial: <?php echo $libro->editorial; ?></h5>
                        <p style="font-size: medium;">Publicado en: <?php echo $libro->fechapost; ?></p>
                        <p style="font-size: medium;">Autor: <a href="visAutor.php?idAutor=<?php echo $autor->id; ?>"><?php echo $autor->nombrefull; ?></a></p>
                        <span><a href="#Resenia" class="btnC">Reseñas</a><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></span>
                        <div class="mt-2 pr-3 letra">
                            <p style="font-size: medium;"><?php echo $libro->descripcion; ?></p>
                            
                        </div>
                        <?php
                        if ($libro->stock > 0) {
                            ?>
                            <form action="" method="POST">
                                <div>
                                    <label class="labelcarr" for="cantidad">Cantidad:</label> 
                                    <input type="number" name="cantidad" id="cantidad" value="1">
                                </div>
                                <div class="mt-3">
                                    <!-- <button class="btn btn-sm botonsito b1 mt-3">Añadir a la cesta</button> -->
                                    <input type="submit" name="comprarAhora" class="btn btn-sm btn-block botonsito b2 mt-3" value="Comprar ahora"></input>
                                </div>
                            </form>
                            <?php
                        } else {
                            echo '<h3>Sin stock</h3>';
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row my-4">
            <!-- VALORACIONES Y COMENTARIOS -->
            <div class="col my-5">
                <div class="row d-flex justify-content-center">
                    <div class="col text-center" style="color: #037091;">
                        <h3 id="Resenia">RESEÑAS</h3>
                    </div>
                </div>

                <!-- ROW PARA PERFILES Y COMENTARIOS -->
                <form action="" method="POST">
                    <div class="row d-flex justify-content-center my-5">
                        <div class="col-md-2">
                            <div class="perfil-foto-valo">
                                <img class="foto-redondita-valo" alt="imagen de perfil" src="https://img.freepik.com/vector-premium/icono-circulo-usuario-anonimo-ilustracion-vector-estilo-plano-sombra_520826-1931.jpg?w=740">
                                <span class="span-font-valo">
                                    <?php if (isset($_SESSION['usuario'])) {
                                        echo $_SESSION['usuario']->nombre;
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>

                        <!-- ESTRELLAS -->

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="valoracion">
                                        <p class="clasificacion">
                                            <input id="radio1" type="radio" name="estrellas" value="5">
                                            <label for="radio1"><i class="fa-solid fa-star"></i></label>

                                            <input id="radio2" type="radio" name="estrellas" value="4">
                                            <label for="radio2"><i class="fa-solid fa-star"></i></label>

                                            <input id="radio3" type="radio" name="estrellas" value="3">
                                            <label for="radio3"><i class="fa-solid fa-star"></i></label>

                                            <input id="radio4" type="radio" name="estrellas" value="2">
                                            <label for="radio4"><i class="fa-solid fa-star"></i></label>

                                            <input id="radio5" type="radio" name="estrellas" value="1">
                                            <label for="radio5"><i class="fa-solid fa-star"></i></label>

                                        </p>
                                        <p><b><u><?php echo $_SESSION['usuario']->nombre . " " . $_SESSION['usuario']->apellido1 . " " . $_SESSION['usuario']->apellido2 ?></u></b></p>
                                    </div>
                                </div>
                            </div>
                            <script>
                                var quill = new Quill('#editor-container', {
                                    modules: {
                                        formula: true,
                                        syntax: true,
                                        toolbar: '#toolbar-container'
                                    },
                                    placeholder: 'Escribe un comentario...',
                                    theme: 'snow'
                                });

                                const changeRating = document.querySelectorAll('input[name=estrellas]');
                                changeRating.forEach((radio) => {
                                    radio.addEventListener('change', getRating);
                                });

                                function getRating() {
                                    let estrellas = document.querySelector('input[name=estrellas]:checked').value;
                                    let finalEstrellas = document.querySelector('#finalEstrellas');
                                    finalEstrellas.value = estrellas;
                                }

                                function getQuillValue() {
                                    const valoracion = document.querySelector('#comentario');
                                    valoracion.value = quill.getText();
                                }
                            </script>

                            <div class="row">
                                <!--  <textarea class="comen" name="comentario" id="mostrar-contenido" cols="50" rows="6"></textarea> -->
                                <div class="col">
                                    <textarea name="comentario" id="comentario" cols="30" rows="10"></textarea>
                                    <input type="text" name="finalEstrellas" id="finalEstrellas" hidden>
                                    <input type="submit" name="botonComentario" id="botonComentario" onclick="getRating()" value="Enviar Comentario">
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
                <?php
                $valoraciones = ValoracionController::fetchValoracionFromIdLibro($libro->id);
                if ($valoraciones) {
                    foreach ($valoraciones as $v) {
                        $usuarioComentario = UsuarioController::fetchUsuariofromId($v->idUsuario);
                        if ($usuarioComentario) {
                ?>
                            <div class="row d-flex justify-content-center my-5">
                                <div class="col-md-2">
                                    <div class="perfil-foto-valo">
                                        <img class="foto-redondita-valo" src="https://img.freepik.com/vector-premium/icono-circulo-usuario-anonimo-ilustracion-vector-estilo-plano-sombra_520826-1931.jpg?w=740">
                                        <span class="span-font-valo">
                                            <?php
                                            echo $usuarioComentario->nombre;

                                            ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- ESTRELLAS -->

                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col">
                                            <div class="valoracion">
                                                <p class="clasificacion2">
                                                    <input  type="radio" name="estrellas2-<?php echo $v->id;?>" <?php if($v->rating==5) echo "checked"?> value="5" disabled>
                                                    <label for="radio1"><i class="fa-solid fa-star"></i></label>

                                                    <input  type="radio" name="estrellas2-<?php echo $v->id;?>" <?php if($v->rating==4) echo "checked"?> value="4" disabled>
                                                    <label for="radio2"><i class="fa-solid fa-star"></i></label>

                                                    <input  type="radio" name="estrellas2-<?php echo $v->id;?>" <?php if($v->rating==3) echo "checked"?> value="3" disabled>
                                                    <label for="radio3"><i class="fa-solid fa-star"></i></label>

                                                    <input  type="radio" name="estrellas2-<?php echo $v->id;?>" <?php if($v->rating==2) echo "checked"?> value="2" disabled>
                                                    <label for="radio4"><i class="fa-solid fa-star"></i></label>

                                                    <input  type="radio" name="estrellas2-<?php echo $v->id;?>" <?php if($v->rating==1) echo "checked"?> value="1" disabled>
                                                    <label for="radio5"><i class="fa-solid fa-star"></i></label>

                                                </p>
                                                <p><b><u><?php echo $usuarioComentario->nombre . " " . $usuarioComentario->apellido1 . " " . $usuarioComentario->apellido2 ?></u></b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p>"<?php echo $v->comentario; ?>"</p> 
                                    </div>
                                </div>

                            </div>
                <?php
                        }
                    }
                }
                ?>

            </div>
        </div>


    </div>
    

    <?php include("includes/footerFase2.php"); ?>
</body>

</html>