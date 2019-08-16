<body class="fixed-sn pink-skin">

  <!--Double navigation-->
  <header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4">
      <ul class="custom-scrollbar">
        <li>&nbsp</li>
        <!-- Logo -->
        <li>
          <div class="logo-wrapper waves-light">
            <a href="#"><img src="<?php echo base_url('img/logo.png') ?>" alt="logo" class="img-fluid"></a>
          </div>
        </li>
        <!--/. Logo -->
        <!--Search Form-->
        <hr>
        <!--/.Search Form-->
        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">
            <li id="menu-item-77919" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-77919">
              <a class=" waves-effect" href="<?php echo base_url('admin') ?>"><i class="fas fa-home"></i> Beranda</a>
            </li>
            <?php if ($this->session->userdata('akses')==1): ?>
              <li id="menu-item-43623" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children  menu-item-43623"><a class="collapsible-header waves-effect arrow-r"><i class="fab fa-css3"></i> Master Admin<i class="fa fa-angle-down rotate-icon"></i></a>
               <div class="collapsible-body"  style="display: block;"> 
                <ul class="sub-menu">
                  <li id="menu-item-77919" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-77919">
                    <a class=" waves-effect" href="<?php echo base_url('wo_akses') ?>"><i class="fas fa-user-tag"></i> Akses Level</a>
                    <li id="menu-item-77919" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-77919">
                      <a class=" waves-effect" href="<?php echo base_url('wo_admin') ?>"><i class="fas fa-user-friends"></i> Admin</a>
                    </li>
                  </ul>
                </div>
              </li>
            <?php endif ?>
            <li id="menu-item-43623" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children  menu-item-43623"><a class="collapsible-header waves-effect arrow-r"><i class="fab fa-css3"></i> Master Kampus Dekorasi<i class="fa fa-angle-down rotate-icon"></i></a>
             <div class="collapsible-body"  style="display: block;"> 
              <ul class="sub-menu">
                <li id="menu-item-77919" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-77919">
                  <a class=" waves-effect" href="<?php echo base_url('wo_Package') ?>"><i class="fas fa-user-tag"></i> Package</a>
                  <li id="menu-item-77919" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-77919">
                    <a class=" waves-effect" href="<?php echo base_url('wo_Include') ?>"><i class="fas fa-user-friends"></i> Add On Package</a>
                  </li>
                  <li id="menu-item-77919" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-77919">
                    <a class=" waves-effect" href="<?php echo base_url('wo_User') ?>"><i class="fas fa-user-friends"></i> User</a>
                  </li>
                </ul>
              </div>
            </li>
            <li id="menu-item-77919" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-77919">
              <a href="<?php echo base_url('wo_pemesanan') ?>"><i class="fas fa-sign-out-alt"></i> Pemesanan</a>
            </li>
            <li id="menu-item-77919" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-77919">
              <a href="<?php echo base_url('laporan') ?>"><i class="fas fa-sign-out-alt"></i> Laporan</a>
            </li>
            <li id="menu-item-77919" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-77919">
              <a href="<?php echo base_url('login/logoutAdmin') ?>"><i class="fas fa-sign-out-alt"></i> Keluar</a>
            </li>
          </ul>
        </li>
        <!--/. Side navigation links -->
      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar navbar-toggleable-md navbar-expand-sm scrolling-navbar double-nav fixed-top navbar-dark bg-dark">
      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
      </div>
      <div class="float-left">
        <a href="#"><?php
        echo "&nbsp&nbsp".$this->session->userdata('username'); ?>
      </a>
    </div>
    <ul class="nav navbar-nav nav-flex-icons ml-auto">
      <li class="nav-item">
        <a class="nav-link">&nbsp <span class="text-white">© Kampus Dekorasi | Amailia Cahya Rudiana-2019</span></a>
      </li>
    </ul>
  </nav>
  <!-- /.Navbar -->
</header>
<?php
$url = $this->uri->segment(1);
?>
<?php if ($url != 'admin'): ?>
  <main class="mx-5">
    <!--/.Double navigation-->
    <div class="container">
      <?php endif ?>