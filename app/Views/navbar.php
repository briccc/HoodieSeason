<nav class="navbar navbar-expand-lg p-1 navbar-dark bg-dark color-white text-navbar sticky-top ">
  <div class="container-fluid">
    <a class="navbar-brand link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="<?php echo base_url('/'); ?>">
        <img src="assets/img/logoxfin.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-center">
          <h1 class="brand-text">HoodieSeason</h1>
      </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" aria-current="page" href="<?php echo base_url('/'); ?>"><i class="bi bi-house-door"></i></a>
        </li>
        <li class="nav-item">
        <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" aria-current="page" href="<?php echo base_url('productos'); ?>"><i class="bi bi-box2-heart"></i></a>
        </li>
        
  
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-info-circle"></i>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url('quienessomos');?>">Quienes Somos</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('contacto');?>">Contacto</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('comercializacion');?>">Comercialización</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url('terminosyusos');?>">Términos y usos</a></li>
          </ul>
        </li>

        <?php if(session('login')){ ?>
        <li class="nav-item">
        <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" aria-current="page" href="<?php echo base_url('verCarrito'); ?>"><i class="bi-solid bi bi-cart"></i></a>
        </li>
        <li class="nav-item">
        <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" aria-current="page"><i class="bi bi-person-check"></i><?php echo session('nombre');?></a>
        </li>
        <li class="nav-item">
        <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" aria-current="page" href="<?php echo base_url('cerrarSesion'); ?>"><i class="bi bi-box-arrow-right"></i></a>
        </li>

        <?php } else { ?>
      <li class="nav-item">
        <a class="nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2" aria-current="page" href="<?php echo base_url('iniciarSesion'); ?>"><i class="bi bi-person"></i> </i></a>
        </li>

        <?php } ?>
        

      </ul>


    </div>
  </div>
</nav>