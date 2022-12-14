<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <?php if($_SESSION['id_rol'] == 1){ ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Usuarios
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="usuario.php">Listar Usuarios</a></li>
              <li><a class="dropdown-item" href="#">Asignar Permisos</a></li>
            </ul>
          </li>
        <?php } ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Compras
          </a>
          <ul class="dropdown-menu">
            <?php if($_SESSION['id_rol'] != 0) { ?>
              <li><a class="dropdown-item" href="compras.php?ac=cs">Crear Solicitud</a></li>
              <li><a class="dropdown-item" href="compras.php?ac=ms">Mis Solicitudes</a></li>
              <?php if($_SESSION['id_rol'] == 1){ ?>
                <li><a class="dropdown-item" href="compras.php?ac=vs">Ver solicitudes</a></li>
              <?php } ?>
              <?php } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>