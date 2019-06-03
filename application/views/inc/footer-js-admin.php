<script src="<?php echo base_url('assets/node_modules/mdbootstrap/js/mdb-pro.min.js') ?>"></script>


<!-- Javascript -->
<script>
  $(window).on("load", function () {
    $('#mdb-preloader').fadeOut('slow',function () {
      "<?php if ($this->session->userdata('pesan')<>''): ?>"
      "<?php $pesan = $this->session->userdata('pesan'); ?>"
      redirectPesan('error','<?php echo $pesan ?>');

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


    !function(t){t.fn.mdbCarousel3d=function(e){let n,a,l,r=t.extend({vertical:!1,interval:5e3,autoplay:!0},e),i=t(this),o=t(this).find(".carousel-3d-inner"),s=o.find(".carousel-3d-item"),c=s.length,u=0,f=r.vertical?"rotateX":"rotateY";function d(){let t=a*u*-1;o.css({transform:"translateZ("+-n+"px) "+f+"("+t+"deg)"})}function h(){u++,d()}function v(){f=r.vertical?"rotateX":"rotateY";let t=i.outerHeight(),e=i.outerWidth();s.css({height:t-50}),s.css({width:e-50}),function(){a=360/c;let t=o.outerWidth(),e=o.outerHeight(),l=r.vertical?e:t;n=Math.round(l/2/Math.tan(Math.PI/c));for(let t=0;t<s.length;t++){let e=s[t];if(t<c){e.style.opacity=1;let l=a*t;e.style.transform=f+"("+l+"deg) translateZ("+n+"px)"}else e.style.opacity=0,e.style.transform="none"}d()}()}t(this).find(".prev-btn").on("click",function(){clearInterval(l),u--,d(),r.autoplay&&(l=setInterval(h,r.interval))}),t(this).find(".next-btn").on("click",function(){clearInterval(l),h(),r.autoplay&&(l=setInterval(h,r.interval))}),v(),r.autoplay&&(l=setInterval(h,r.interval)),t(window).resize(v)}}(jQuery);

    $('.carousel-3d-controls').mdbCarousel3d();



  </script>

</div> 
</main>
</body>
</html>