<script src="<?php echo base_url('assets/node_modules/mdbootstrap/js/mdb-pro.min.js') ?>"></script>
<!-- Javascript -->
<script>
  $(window).on("load", function () {
    $('#mdb-preloader').fadeOut('slow',function () {
      "<?php if ($this->session->userdata('pesan')<>''): ?>"
      "<?php $pesan = $this->session->userdata('pesan'); ?>"
      "<?php $dataJenisPesan = substr($pesan, 0,8); ?>"
      "<?php if ($dataJenisPesan=='Berhasil') { ?>"
      "<?php $jenisPesan ='success'; ?>"
      "<?php }  ?>"      
      redirectPesan('<?php echo $jenisPesan ?>','<?php echo $pesan ?>');
      "<?php endif ?>"
    });
  });
</script>



<script src="<?php echo base_url('assets/node_modules/mdbootstrap/js/file-upload.js') ?>"></script>  
<script src="<?php echo base_url('assets/node_modules/jquery-validation/dist/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('assets/node_modules/jquery-validation/dist/localization/messages_id.js') ?>"></script>
<script src="<?php echo base_url('assets/node_modules/chart.js/dist/Chart.bundle.js') ?>"></script>

<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js') ?>"></script>
<script src='<?php echo base_url('assets/node_modules/fullcalendar/dist/moment.min.js'); ?>'></script>
<script src='<?php echo base_url('assets/node_modules/fullcalendar/dist/fullcalendar.js'); ?>'></script>


<script>

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

           // Material Select Initialization
           $(document).ready(function() {
             $('.mdb-select').materialSelect();

             $('.file-upload').file_upload();
           });

           $(".validasi").validate();


// SideNav Button Initialization
$(".button-collapse").sideNav();
// SideNav Scrollbar Initialization
var sideNavScrollbar = document.querySelector('.custom-scrollbar');
Ps.initialize(sideNavScrollbar);

</script>
<script>
  $('.file_upload').file_upload();

</script>
<script>
  $('#login_register').popover('');
</script>
<script>
  $(window).on("load", function () {
    $('#mdb-preloader').fadeOut('slow');
  });
</script>
<!-- ./ container -->

<script>
    // initialize scrollspy
    $('body').scrollspy({
      target: '.dotted-scrollspy'
    });

    // initialize lightbox
    $(function () {
      $("#mdb-lightbox-ui ").load("mdb-addons/mdb-lightbox-ui.html ");
    });

    /* WOW.js init */
    new WOW().init();

    $('.navbar-collapse a').click(function () {
      $(".navbar-collapse ").collapse('hide');
    });

  </script>
  <!-- jquey-ui datepicker -->
  <script>

    $(".ambilTanggal").datepicker({
          // showAnim: "fold",
          dateFormat: "yy-mm-dd", 
          monthNames: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],

        });
      </script>

    </div> 
  </main>
</body>
</html>