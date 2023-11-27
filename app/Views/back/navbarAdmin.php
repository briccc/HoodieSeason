<nav class="navbar navbar-expand-lg p-1 navbar-dark bg-dark color-white text-navbar sticky-top ">
  <div class="container-fluid">
    <a class="navbar-brand link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="<?php echo base_url('inicioAdmin'); ?>">
        <img src="<?php echo base_url('assets/img/logo2.ico');?>" alt="Logo" width="50" height="50" class="d-inline-block align-text-center">
          <h1 class="brand-text">HoodieSeason</h1>
      </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" aria-current="page" href="<?php echo base_url('inicioAdmin'); ?>">Mi Tienda</a>
        </li>
 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Productos
          </a>
          <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="<?php echo base_url('gestionar');?>">Gestionar Productos</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('agregarProducto');?>">Registrar Productos</a></li>
          </ul>
        </li>
        

        <li class="nav-item">
        <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" aria-current="page" href="<?php echo base_url('verUsuarios'); ?>">Usuarios</a>
        </li>
        <li class="nav-item">
        <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" aria-current="page" href="<?php echo base_url('verConsultas'); ?>">Consultas</a>
        </li>
        <li class="nav-item">
        <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" aria-current="page" href="<?php echo base_url('verVentas'); ?>">Ventas</a>
        </li>
        <li class="nav-item">
        <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" aria-current="page"><?php echo session('nombre');?></a>
        </li>
        <li class="nav-item">
        <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" aria-current="page" href="<?php echo base_url('cerrarSesion'); ?>">Salir</a>
        </li>
        

      </ul>


    </div>
  </div>
</nav>