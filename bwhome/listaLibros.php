<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

    <?php include("includes/headerFase2.php"); ?>

    <main>
        <div class="container-offerts">
            <div class="row no-gutter">
                <div class="col-md-4 ">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">
                        <ol id="breadcrumb-id" class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house-chimney breadcrumb"></i><span class="sr-only">Home</span></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lista Productos</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-8 title-offerts">
                    <h1 class="h1-title-offerts">Listado Productos</h1>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="card offerts">
                    <div class="card-img offerts">
                        <img src="assets/zerotwo/1.jpg" class="img-fluid offerts"> 
                    </div>
                        <div class="card-img-bottom offerts">
                        <a href="visProducto.php">Figura de anime: Zero Two
                        49.99€</a>
                        </div>
                </div>
            </div> -->

            <div class="row no-gutter">
                <div class="col-12">
                    <!-- Aqui empieza el foreach -->
                    <?php 
                    if (isset($_POST['barraBusqueda'])) {
                        echo '<h1>Búsqueda por:  '.$_POST['barraBusqueda'].'</h1>';
                        $libros = LibroController::fetchLibroFromTitulo($_POST['barraBusqueda']);
                        if ($libros) {
                            $i=1;
                            
                                echo "<div class='row'>";
                            
                            foreach ($libros as $l) {
                            
                                ?>
                                <div class="col-md-3">
                                    <div class="card offerts">
                                        <div class="card-img offerts">
                                            <img src="./assets/img/content/<?php echo $l->portada; ?>" class="img-fluid offerts" alt="<?php echo $l->titulo; ?>" >
                                        </div>
                                        <div tabindex="0" class="card-img-bottom offerts">
                                            <a class="link-primary" href="visProducto.php?idLibro=<?php echo $l->id; ?>"><?php echo $l->titulo;?></a>
                                            <p class="text-dark"><?php echo 'Edición: '.$l->edicion.'&nbsp&nbsp&nbsp&nbsp&nbsp'.$l->precio.'€';?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($i%4==0 ) {
                                    echo "</div>";
                                    echo "<div class='row'>";
                                }

                                $i++;
                            }                     
                        }
                    } elseif (isset($_GET['genero'])) {
                        echo '<h1>Búsqueda por género:</h1></br>';
                        $libros = LibroController::fetchLibrosFromGenero($_GET['genero']);
                        if ($libros) {
                            $i=1;
                            
                                echo "<div class='row'>";
                            
                            foreach ($libros as $l) {
                            
                                ?>
                                <div class="col-md-3">
                                    <div class="card offerts">
                                        <div class="card-img offerts">
                                            <img src="./assets/img/content/<?php echo $l->portada; ?>" class="img-fluid offerts" alt="<?php echo $l->titulo; ?>" >
                                        </div>
                                        <div tabindex="0" class="card-img-bottom offerts">
                                            <a class="link-primary" href="visProducto.php?idLibro=<?php echo $l->id; ?>"><?php echo $l->titulo;?></a>
                                            <p class="text-dark"><?php echo 'Edición: '.$l->edicion.'&nbsp&nbsp&nbsp&nbsp&nbsp'.$l->precio.'€';?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($i%4==0 ) {
                                    echo "</div>";
                                    echo "<div class='row'>";
                                }

                                $i++;
                            }                     
                        }
                    } else {
                    
                        $libros = LibroController::fetchAll();
                        if ($libros) {
                            $i=1;
                            
                                echo "<div class='row'>";
                            
                            foreach ($libros as $l) {
                            
                                ?>
                                <div class="col-md-3">
                                    <div class="card offerts">
                                        <div class="card-img offerts">
                                            <img src="./assets/img/content/<?php echo $l->portada; ?>" class="img-fluid offerts" alt="<?php echo $l->titulo; ?>" >
                                        </div>
                                        <div tabindex="0" class="card-img-bottom offerts">
                                            <a class="link-primary" href="visProducto.php?idLibro=<?php echo $l->id; ?>"><?php echo $l->titulo;?></a>
                                            <p class="text-dark"><?php echo 'Edición: '.$l->edicion.'&nbsp&nbsp&nbsp&nbsp&nbsp'.$l->precio.'€';?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($i%4==0 ) {
                                    echo "</div>";
                                    echo "<div class='row'>";
                                }

                                $i++;
                            }                            
                        }
                    }
                    ?>
                    
                </div>
            </div>

        </div>

    </main>

    <?php include("includes/footerFase2.php"); ?>

</body>

</html>