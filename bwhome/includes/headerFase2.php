<!-- HEADER -->
<nav class="navbar navbar-expand-sm navbar-light bg-primary navPrincipal">
  <div class="container-fluid">
    <!-- Logo -->
    <a class="navbar-brand" href="index.php"><img class="" src="./assets/img/logoBook.png" alt=logotipo></a>
    <img src="./assets/img/tituloBook.png" alt="tituloBook" class="w-25">

    <!-- Barra de busqueda-->
    <form class="d-flex d-none d-sm-block ms-auto w-25" action="listaLibros.php" method="POST">
      <div class="input-group">
        <label for="barraBusqueda"><span class="sr-only">Barra de búsqueda</span> </label>
        <input class="form-control border-end-0 border rounded-3" name="barraBusqueda" id="barraBusqueda" type="search" placeholder="Busca tu título!">
        <span class="input-group-append">

          <button class="btn btn-outline-secondary bg-white border-start-0 border rounded-pill ms-n3" type="submit">
            <span class='sr-only'>Buscar</span>
            <i class="fa fa-search"></i>
          </button>

        </span>
      </div>
    </form>

    <ul class="navbar-nav">

      <?php
      if (isset($_SESSION['usuario'])) { //MOSTRAR ICONOS LOGUEADO
      ?>

        <!-- Icono de Perfil -->
        <li class="nav-item px-1">
          <a class="nav-link icons" aria-current="page" href="zonaPrivada.php">
            <i class="fa-solid fa-user mx-1"></i>Perfil
          </a>
        </li>
        <!-- Icono de compra -->
        <li class="nav-item px-1">
          <a class="nav-link icons" href="listaCompras.php">
            <i href="" class="fa-solid fa-cart-shopping mx-1"></i>Mis Compras
          </a>
        </li>
        <!-- DESCONECTARSE -->
        <li class="nav-item px-1">
          <a class="nav-link icons" href="../logout.php">
            <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
          </a>
        </li>
      <?php } else { //SI NO ESTA LOGUEADO MOSTRAMOS INICIO DE SESION
      ?>
        <!-- Icono de Iniciar -->
        <li class="nav-item px-1">
          <a class="nav-link icons" aria-current="page" href="inicioSesion.php">
            <i class="fa-solid fa-user mx-1" id="login_button" <?php if (isset($_COOKIE["login_button"])) ?>></i>Iniciar Sesión
          </a>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>
<!-- NAVBAR OPCIONES DE NAVEGACION -->
<nav class="navbar navbar-expand-sm navbar-light bg-secondary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex d-sm-none ms-auto w-50">
      <div class="input-group">
        <label for="barraBusqueda1"><span class="sr-only">Barra de búsqueda</span> </label>
        <input class="form-control border-end-0 border rounded-3" type="search" placeholder="Search" name="barraBusqueda1" id="barraBusqueda1">
        <span class="input-group-append">
          <button class="btn btn-outline-secondary bg-white border-start-0 border rounded-pill ms-n3" type="button">
            <span class='sr-only'>Buscar</span>
            <i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <div class="collapse navbar-collapse navbarC" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="listaLibros.php?genero=romance">Romance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listaLibros.php?genero=fantasia">Fantasía</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listaLibros.php?genero=terror">Terror</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listaLibros.php?genero=misterio">Misterio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listaLibros.php?genero=cienciaficcion">Ciencia Ficción</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listaLibros.php">Nuestros Libros</a>
        </li>
      </ul>
    </div>
  </div>
</nav>