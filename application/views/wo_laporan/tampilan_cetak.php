!
<div class="row">
  <div class="col-md-4"><img style="position: absolute; top: 30px; left :325px;" height="70" width="70" src="<?php echo base_url("img/logo.png") ?>" alt="logo"></div>
  <div class="col-md-8 text-center">
    <h1 style="font-size: 24px;text-align: center;">Laporan <?php echo $namaLaporan ?></h1>
    <h3 style="text-align: right;">Periode : <?php echo $tanggalAwal ?> -  <?php echo $tanggalAkhir ?></h3>


    <style>
      table,th,td{
        text-align: center;
        border-collapse: collapse;
      }
      th{
        font-size: 14px;
        border-style: groove;
      }
      td{
        font-size: 12px;
        border-style: groove;
        /*border-style: groove;*/
      }
    </style>


    <div class="table-responsive">
      <table class="table table-hover text-nowrap table-sm text-center" style="margin-bottom: 10px">
        <tr>
          <th class="th-sm">No</th>
          <th class="th-sm">Status</th>

          <th class="th-sm">User</th>
          <th class="th-sm">Package</th>
          <!-- <th class="th-sm">Id Detail Include</th> -->
          <th class="th-sm">Pemesanan</th>
          <th class="th-sm">Booking</th>
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
          <!-- $newDate = date("d-m-Y", strtotime($originalDate)); -->
          <td><?php echo date("d M Y", strtotime($wo_pemesanan->tanggal_pemesanan ))?></td>
          <td><?php echo date("d M Y", strtotime($wo_pemesanan->tanggal_booking ))?></td>
          <td><?php echo number_format($wo_pemesanan->total_uang_masuk,0,",",".") ?></td>
          <td><?php echo number_format($wo_pemesanan->total_uang_bayar,0,",",".") ?></td>
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
      <tr>
        <td colspan="8" >&nbsp</td>
      </tr>
      <tr>
        <td colspan="6">TOTAL</td>
        <td><?php echo 'Rp. '.number_format($data_total_uang_masuk,0,",",".") ?></td>
        <td><?php echo 'Rp. '.number_format($data_total_uang_bayar,0,",",".") ?></td>
      </tr>
    </table>
  </div>



</div>
</div>