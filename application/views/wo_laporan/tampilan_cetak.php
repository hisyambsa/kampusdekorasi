<a href="<?php echo base_url('laporan/cetakLaporan') ?>">

  <a href="#" class="btn btn-elegant btn-sm disabled ">Jumlah Data : <?php echo $total_rows ?></a>

</a>
<div class="row">
  <div class="col-md-12 text-center">
    <h1 class="h1 ">Laporan <?php echo $namaLaporan ?></h1>
    <h3 class="h3"><?php echo $tanggalAwal ?> -  <?php echo $tanggalAkhir ?></h3>



<div class="table-responsive">
    <table class="table table-hover text-nowrap table-sm text-center" style="margin-bottom: 10px">
        <tr>
            <th class="th-sm">No</th>
            <th class="th-sm">Status</th>

            <th class="th-sm">Nama User</th>
            <th class="th-sm">Nama Package</th>
            <!-- <th class="th-sm">Id Detail Include</th> -->
            <th class="th-sm">Tanggal Pemesanan</th>
            <th class="th-sm">Tanggal Booking</th>
            <th class="th-sm">Uang Masuk</th>
            <th class="th-sm">Total</th>
            </tr>
            <?php

             $data_total_uang_masuk = 0;
                  $data_total_uang_bayar =0; 
            foreach ($wo_pemesanan_data as $wo_pemesanan)
            {
                ?>
                <tr>
                   <td width="80px"><?php echo ++$start ?></td>
                   <td>

                    <?php if ($wo_pemesanan->status==1) {
                        echo "belum bayar";
                    }else if ($wo_pemesanan->status==2) {
                        echo "sudah bayar dp";
                    }else if ($wo_pemesanan->status==3) {
                        echo "sudah konfirmasi dp";
                    }elseif ($wo_pemesanan->status==4) {
                        echo "sudah bayar";
                    }else {echo "status tidak terdefinisi";}?>

                </td>
                <td><?php echo $wo_pemesanan->nama_user ?></td>
                <td><?php echo $wo_pemesanan->nama_package ?></td>
                <!-- <td><?php echo $wo_pemesanan->id_detail_include_pemesanan ?></td> -->
                <td><?php echo $wo_pemesanan->tanggal_pemesanan ?></td>
                <td><?php echo $wo_pemesanan->tanggal_booking ?></td>
                <td><?php echo $wo_pemesanan->total_uang_masuk ?></td>
                <td><?php echo $wo_pemesanan->total_uang_bayar ?></td>
                  </tr>
                  <?php
                  
                  $data_total_uang_masuk += $wo_pemesanan->total_uang_masuk;
                  $data_total_uang_bayar += $wo_pemesanan->total_uang_bayar; 
              }
              if ($start==0) {
                ?>
                <script>
                  redirectPesan('error','Data tidak ditemukan');
              </script>   
          <?php } ?>
          <td colspan="6">TOTAL</td>
          <td><?php echo 'Rp. '.number_format($data_total_uang_masuk,0,",",".") ?></td>
          <td><?php echo 'Rp. '.number_format($data_total_uang_bayar,0,",",".") ?></td>
      </table>
  </div>



  </div>
</div>