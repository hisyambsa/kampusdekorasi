<script>

  $('#form_submit').submit(function(e) {


    let id_user_pemesanan =$('#id_user_pemesanan').val();
    let id_package_pemesanan=$('#id_package_pemesanan').val();

    let tanggal_booking =$('#tanggal_booking').val();
    let tanggal_pemesanan=$('#id_package_pemesanan').val();





    if (id_package_pemesanan=='') {
      alert('Belum ada package terpilih');
    }else if (tanggal_booking=='') {
      alert('tanggal Booking masih kosong')
    }else{

      e.preventDefault(); 

      $.ajax({
        url: "<?php echo base_url("ajax/insertPemesanan")?>",
            type: "post", // To protect sensitive data
            // data: {
            //   id_user_pemesanan: id_user_pemesanan,
            //   id_package_pemesanan: id_package_pemesanan,
            //   tanggal_booking: tanggal_booking
            //    //and any other variables you want to pass via POST
            //  },

            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,  

            success:function(dataPemesanan){
              let hasil = dataPemesanan;
              if (hasil =='berhasil') {
                // Simulate an HTTP redirect:
                // alert('berhasil simpan');
                window.location.replace('pemesanan');
              }else if(hasil!='berhasil'){
                alert(hasil);
              }

            },error: function() {
              alert('Gagal Melakukan Ajax');
            }
          });
    // $(".form-group").removeClass('d-none');


  }

});

  $('#modalBooking').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);

   let dataHarga = button.data("harga");
   $('#total_uang_bayar').val(dataHarga);
 })

  $('#modalKonfirmasi').on('show.bs.modal', function (event) {




    var button = $(event.relatedTarget);

    let fotobukti = button.data('fotobukti');

    let status = button.data("status");
    if (status==1 || status==3) {
    $("#form_update_status").attr("action",base_url+'wo_pemesanan/update_status/'+status);
    }else{
       $("#form_update_status").attr("action",base_url+'wo_pemesanan/update_status_user/'+status);
    }


if (status==1) {
  $('#submitPemesanan').html('konfirmasi Booking');
    $('#submitPemesanan').addClass('btn-warning');
    $('#submitPemesanan').removeClass('btn-secondary');
}else{
  $('#submitPemesanan').html('Konfirmasi Pelunasan');
    $('#submitPemesanan').addClass('btn-secondary');
    $('#submitPemesanan').removeClass('btn-warning');
}

    $("#imgBukti").attr("src",base_url+'uploads/bukti/'+fotobukti);
    let idpemesanan = button.data("idpemesanan");
    $('#id_pemesanan').val(idpemesanan);


    let idpackage = button.data("idpackage");
    $('#id_package_pemesanan').val(idpackage);
    let namapackage = button.data("namapackage");
    $('#nama_package_pemesanan').val(namapackage);

    let iduser = button.data("iduser");
    $('#id_user_pemesanan').val(iduser);
    let namauser = button.data("namauser");
    $('#nama_user_pemesanan').val(namauser);

    let tanggalpemesanan = button.data("tanggalpemesanan");
    $('#tanggal_pemesanan').val(tanggalpemesanan);
    let tanggalbooking = button.data("tanggalbooking");
    $('#tanggal_booking').val(tanggalbooking);

    let uangmasuk = button.data("uangmasuk");
    $('#total_uang_masuk').val(uangmasuk);
    let uangbayar = button.data("uangbayar");
    $('#total_uang_bayar').val(uangbayar);
  })

</script>