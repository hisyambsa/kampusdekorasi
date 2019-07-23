<script>

  $('.btn_pass').click(function() {
    let data = $(this).data("value");
    $('#idUpdate').val(data);
  });

    $('.btn_passPegawai').click(function() {
    let data = $(this).data("value");
    let dataHref = $(this).data("href");

    $('#idUpdatePassPegawai').val(data);
    $('#btn-ubahPass').attr('href', dataHref);
    
  });

  $('#klikPassword').on('click', function() {

    let idUpdate =$('#idUpdate').val();
    let pass=$('#passAdmin').val();
    if (pass!='') {
      cekPasswordAdmin(idUpdate, pass);
    }else{
      alert('password tidak boleh kosong');
    }
  });

  function cekPasswordAdmin(idUpdate,pass) {
    $.ajax({
      url: "<?php echo base_url("ajax/cekPasswordAdmin")?>",
            type: "post", // To protect sensitive data
            data: {
              pass: pass
               //and any other variables you want to pass via POST
             },
             success:function(data){
              let hasil = data;
              if (hasil =='true') {
                // Simulate an HTTP redirect:
                window.location.replace(idUpdate);
              }else if(hasil=='false'){
                alert('Password Salah');
              }

            },error: function() {
              alert('Gagal Melakukan Ajax');
            }
          });
    // $(".form-group").removeClass('d-none');
  }
</script>
