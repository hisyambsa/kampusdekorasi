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

</script>