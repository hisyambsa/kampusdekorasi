<!-- Grid row -->
<body class="pink-skin">


  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark primary-color text-white sticky-top scrolling-navbar">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="<?php echo base_url('img/logo_favicon.png') ?>" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar"
      aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navBar">
      <ul class="navbar-nav mr-auto smooth-scroll">
        <li class="nav-item">
          <a class="nav-link text-uppercase" href="<?php echo base_url('beranda') ?>">Beranda <span class="sr-only">(current)</span></a>
        </li>
        <!-- <li class="nav-item"> -->
          <!-- <a class="nav-link text-uppercase" href="<?php echo base_url('beranda/package') ?>" data-offset="100">Package</a> -->
          <!-- </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">PACKAGE</a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo base_url('beranda/packageGedung_Aula') ?>">GEDUNG / AULA</a>
              <a class="dropdown-item" href="<?php echo base_url('beranda/packageRumahan') ?>">RUMAHAN</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="<?php echo base_url('beranda/include_package') ?>" data-offset="100">Include</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="<?php echo base_url('beranda/syarat_ketentuan') ?>" data-offset="100">Syarat dan Ketentuan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="<?php echo base_url('beranda/pemesanan') ?>" data-offset="100">Pemesanan</a>
          </li>
        </ul>
        <!-- Social Icon  -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="https://www.instagram.com/hisyambsa" class="nav-link"><i class="fab fa-facebook-f light-green-text-2"></i></a>
          </li>
          <li class="nav-item">
            <a href="https://www.instagram.com/hisyambsa" class="nav-link"><i class="fab fa-twitter light-green-text-2"></i></a>
          </li>
          <li class="nav-item">
            <a href="https://www.instagram.com/hisyambsa" class="nav-link"><i class="fab fa-instagram light-green-text-2"></i></a>
          </li>
          <?php if (is_null($this->session->userdata('id_user'))): ?>
            <li class="nav-item">
              <a type="button" class="nav-link" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" title="Login" data-content="
              <div class='form-group'>
                <form class='text-center' action='<?php echo base_url()?>login/auth' method='post' style='color: #757575;'>
                  <input type='password' name='username' placeholder='Nomor Hp' class='form-control' maxlength='20'>
                  <br> 
                  <input type='password' name='password' placeholder='Tangggal Lahir' class='form-control' maxlength='10'>
                  <br>
                  <button type='submit' class='btn btn-primary btn-block'>» Masuk </button> </form>
                  &nbsp
                  <a href='<?php echo base_url('beranda/pendaftaran') ?>'><button type='' class='btn btn-success btn-block'>» Pendaftaran </button></a>                         
                </div>
                " id="login_register">
                Login / Pendaftaran
              </a>
            </li>
            <?php else: ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('nama'); ?></a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?php echo base_url('beranda/profile') ?>">PROFILE</a>
              <a class="dropdown-item" href="<?php echo base_url('login/logout') ?>">KELUAR</a>
            </div>
          </li>     
          <?php endif ?>
          
        </ul>
      </div>
    </div>
  </nav>