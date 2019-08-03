<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous"> -->
  <!-- <script defer src="https://use.fontawesome.com/releases/v5.4.2/js/all.js" integrity="sha384-wp96dIgDl5BLlOXb4VMinXPNiB32VYBSoXOoiARzSTXY+tsK8yDTYfvdTyqzdGGN" crossorigin="anonymous"></script> -->

  <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.css') ?>">
  <script src="<?php echo base_url('assets/fontawesome/js/all.js') ?>"></script>

  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo $judul ?></title>
  <link rel="stylesheet" id='compiled.css-css' media="all" href="<?php echo base_url('assets/node_modules/mdbootstrap/css/mdb-pro.min.css') ?>">

  <!-- mystyle -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/myStyle.css') ?>">
  <link rel='stylesheet' href='<?php echo base_url('assets/node_modules/fullcalendar/dist/fullcalendar.css'); ?>' />
  <link rel='stylesheet' href='<?php echo base_url('assets/jquery-ui/jquery-ui.css'); ?>' />

<link rel="stylesheet" href="<?php echo base_url('assets/pickadate/lib/themes/classic.date.css') ?>">



  <script src="<?php echo base_url('assets/node_modules/sweetalert2/dist/sweetalert2.all.js') ?>"></script>


  <div id="mdb-preloader" class="flex-center">
    <div id="preloader-markup">
<!--Big blue-->
<div class="preloader-wrapper active">
  <div class="spinner-layer spinner-blue-only">
    <div class="circle-clipper left">
      <div class="circle"></div>
    </div>
    <div class="gap-patch">
      <div class="circle"></div>
    </div>
    <div class="circle-clipper right">
      <div class="circle"></div>
    </div>
  </div>
</div>
    </div>
    <p class="text-white"> &nbsp &nbsp Loading...</p>
  </div>

  


  
  <script>

    let base_url = '<?php echo base_url();?>'

  </script>
</head>


<script>
  function redirectPesan(type='error',pesan) {
    Swal.fire({
      type: type,
      title: pesan,
      showConfirmButton: false,
      timer: 2000
    })
  }

  function confirmHapus(judul='tidak ada judul',pesan='tidak ada pesan',pindah='<?php echo base_url();?>') {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false,
    })
    swalWithBootstrapButtons.fire({
      title: judul,
      text: pesan,
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        window.location=pindah;
      }else if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.cancel
    ) {

      }
    })
  }
</script>




