<?php include("includes/a_config.php");

if (!isset($_GET['idAutor'])) {
    header("Location:index.php");
}
$autor = AutorController::fetchAutorFromId($_GET['idAutor']);
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
        <div class="card"> 
            <div class="row g-2">
                <div class="col-md-6 border-end">
                    <div class="d-flex justify-content-center">
                        <div class="main_image justify-content-center"> <img src="./assets/img/content/<?php echo $autor->foto; ?>" id="main_product_image"  alt="imagen principal"> <!-- Fase2: No se puede poner la propiedad width!!!! está totalmente obsoleto, eso va en scss--> </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 right-side mt-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2><?php echo $autor->nombrefull; ?></h2>
                        </div>
                        <div class="mt-4 pr-3 letra">
                            <p style="font-size: large;"><?php echo $autor->biografia; ?></p>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row my-4">
        <h1 class="mt-5 ml-5">Libros del autor: </h1>
            <div class="col mb-5">
                <?php
                    $libros = LibroController::fetchLibroFromIdAutor($autor->id);
                    if ($libros) {
                        $i=1;
                        
                            echo "<div class='row'>";
                        
                        foreach ($libros as $l) {
                        
                            ?>
                            <div class="col-md-3">
                                <div class="card offerts">
                                    <div class="card-img offerts">
                                        <a href="visProducto.php?idLibro=<?php echo $l->id; ?>"><img src="./assets/img/content/<?php echo $l->portada; ?>" class="img-fluid offerts" alt="<?php echo $l->titulo; ?>" ></a>
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
                ?>
            </div>
        </div>
    </div>
    </div>
    
    <?php include("includes/footerFase2.php"); ?>
    
</body>

</html>
