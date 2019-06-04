<?php if ($this->session->userdata('pesan')<>''): ?>
  <?php $pesan = $this->session->userdata('pesan'); ?>
  <script>
    redirectPesan('error','<?php echo $pesan ?>');
  </script>
<?php endif ?>


<!-- Grid row -->
<body class="pink-skin">

  
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark primary-color text-white sticky-top scrolling-navbar">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="<?php echo base_url('img/logo_favicon.png') ?>" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto smooth-scroll">
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="<?php echo base_url('beranda') ?>">Beranda <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="<?php echo base_url('beranda/package') ?>" data-offset="100">Package</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="<?php echo base_url('beranda/include') ?>" data-offset="100">Include</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="<?php echo base_url('beranda/syarat_ketentuan') ?>" data-offset="100">Syarat dan Ketentuan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" href="<?php echo base_url('pemesanan') ?>" data-offset="100">Pemesanan</a>
          </li>
        </ul>
        <!-- Social Icon  -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link"><i class="fab fa-facebook-f light-green-text-2"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"><i class="fab fa-twitter light-green-text-2"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"><i class="fab fa-instagram light-green-text-2"></i></a>
          </li>
          <li class="nav-item">
            <a type="button" class="nav-link" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" title="Login" data-content="
            <div class='form-group'>
              <input type='text' placeholder='Usename' class='form-control' maxlength='5'>
              <br> 
              <input type='text' placeholder='Password' class='form-control' maxlength='5'>
              <br>
              <a href='index.php?page=upload'><button type='' class='btn btn-primary btn-block'>» Masuk </button></a> 
              &nbsp
              <a href='<?php echo base_url('beranda/pendaftaran') ?>'><button type='' class='btn btn-success btn-block'>» Pendaftaran </button></a>                         
            </div>
            " id="login_register">
            Registrasi / Pendaftaran
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>