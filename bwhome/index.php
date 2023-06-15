<?php include("includes/a_config.php"); ?>
<?php include("includes/dbconnection.php"); ?>
<?php include("includes/googleconnect.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

    <?php include("includes/headerFase2.php"); ?>

    <?php 
    if(isset($_GET['codeRegister'])){
        echo "<br><div class='alert alert-success' role='alert'>Usuario registrado con éxito!</div><br>";
    }
    if(isset($_GET['errorCode'])){
        echo "<br><div class='alert alert-danger' role='alert'>No puede registrarse, el usuario ya existe!</div><br>";
    }
    ?>
    <!-- <div class="tituloindex">
        <h1>Bienvenidos al Hogar del Bookworm</h1>
    </div> -->
    
    <!-- 

    <main> -->
    <img src="../assets/img/content/Bienvenido al Hogar del Bookworm.png" class="imgmain d-block w-100" alt="...">
    <?php

        if (($login_button == '') && (!isset($_SESSION['iduser']))) {                       
            include("includes/registermodal.php");
        }
        
        /*Si la session es de un admin aparecerá un Botón que lo dirigirá al crud */
        if(isset($_SESSION['usuario']) && $_SESSION['usuario']->rol=='administrador'){
            ?>
            <form action="crudAdministrador.php" method="POST">
                <input type="submit" name="crudAdministrador" class="btn-crudAdmin"  value="CRUD ADMINISTRADOR">
            </form>
            <?php
        }
            

    ?> 
        <section>
            <h1 class="my-5 mx-5">Últimos libros</h1>
            <div class="container-img text-center my-3">
                <div class="row mx-auto my-auto justify-content-center">
                    <!-- col -->
                    <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner pequenio" role="listbox">
                            <?php 
                            $libros = LibroController::fetch5();
                            $activo=true;
                            if ($libros) {
                                foreach ($libros as $l) {
                                    ?>
                                        <div class="carousel-item pequenio <?php if ($activo) echo "active"; $activo=false;?> text-dark">
                                        <div class="col-md-3">
                                           <div class="card">
                                                <div class="card-img">
                                                    <a href="visProducto.php?idLibro=<?php echo $l->id ?>"><img src="assets/img/content/<?php echo $l->portada;?>" class="img-fluid" alt="<?php echo $l->titulo;?>"></a>
                                                </div>
                                                <a href="visProducto.php?idLibro=<?php echo $l->id ?>" class="card-img-bottom" tabindex="0"><?php echo $l->titulo.'&nbsp;&nbsp;&nbsp;&nbsp;'.$l->precio; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
                                }
                            }
                            ?>

                            

                        </div>
                        <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Posterior</span>
                        </a>
                    </div>
                </div>
            </div>
            <h1 class="my-5 mx-5">Autores</h1>
            <div class="container-img text-center my-3">
                <div class="row pequeño">
                    <?php
                    $autores = AutorController::fetchAll();
                    if ($autores) {
                        foreach ($autores as $a) {
                            ?>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <a href="visAutor.php?idAutor=<?php echo $a->id; ?>"><img src="assets/img/content/<?php echo $a->foto; ?>" class="img-fluid" alt="<?php echo $a->nombrefull; ?>"></a>
                                    </div>
                                    <a class="card-img-bottom text-dark" tabindex="0" href="visAutor.php?idAutor=<?php echo $a->id; ?>"><?php echo $a->nombrefull; ?>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    
                </div>
            </div>
            
            <!--Carousel img-->
             <script>
                let items = document.querySelectorAll('.carousel .carousel-item.pequenio')

                items.forEach((el) => {
                    const minPerSlide = 3
                    let next = el.nextElementSibling
                    for (var i = 1; i < minPerSlide; i++) {
                        if (!next) {
                            // wrap carousel by using first child
                            next = items[0]
                        }
                        let cloneChild = next.cloneNode(true)
                        el.appendChild(cloneChild.children[0])
                        next = next.nextElementSibling
                    }
                })
            </script> 
        </section>
    </main>

    <?php include("includes/footerFase2.php"); ?>

</body>

</html>