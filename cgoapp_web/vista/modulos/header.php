<div id="header">
  <nav class="navbar navbar-expand-lg">
    <img src=".\vista\presentacion\img\icono.png">
    <a class="navbar-brand" href="inicio">CGOAPP WEB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <i class="bi bi-list"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <div class="navbar-nav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="inicio" id="Inicio" title="Ir al inicio"><i class="bi bi-house-door-fill"></i> Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://cgomaps.000webhostapp.com" target="_blank" id="cgomaps" title="Ir a CGOMaps"><i class="bi bi-geo-alt-fill"></i> CGOMaps</a>
          </li>
        </ul>      
      </div>
      <ul class="navbar-nav ml-auto mr-3">
        <li class="nav-item mr-1">
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="bi bi-person-circle">  </i>
              <?php
              if (isset($_SESSION["usuario"])) {
                $usuario = unserialize($_SESSION["usuario"]);
                echo '  '.$usuario;
              }
              ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <a class="nav-link opciones" href="salir" title="Cerrar Sesión">
              <i class="bi bi-box-arrow-right"></i> Salir
              </a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>