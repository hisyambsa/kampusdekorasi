<div class="container">
  <div class="mt-5">
    <br>
    <div class="border border-secondary p-3">
      <div class="row">
        <div class="col-md-8 text-center align-middle">
          <p class="h2 text-center ">Daftar Pemesanan</p>
        </div>
        <div class="col-md-4 text-right">
          <form action="<?php echo site_url('beranda/pemesanan'); ?>" class="form-group" method="get" autocomplete="off">
            <div class="input-group">
              <input type="text" class="form-control mt-2" name="q" value="<?php echo $q; ?>">
              <span class="input-group-btn">
                <?php 
                if ($q <> '')
                {
                  ?>
                  <a href="<?php echo site_url('beranda/pemesanan'); ?>" class="btn btn-amber">Ulangi</a>
                  <?php
                }
                ?>
                <button class="btn btn-dark-green" type="submit">Cari</button>
              </span>
            </div>
          </form>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover text-nowrap table-sm text-center" style="margin-bottom: 10px">
          <tr>
            <th class="th-sm">No</th>
            <th class="th-sm">Status</th>

            <th class="th-sm">Nama User</th>
            <th class="th-sm">Nama Package</th>
            <!-- <th class="th-sm">Id Detail Include Pemesanan</th> -->
            <th class="th-sm">Tanggal Pemesanan</th>
            <th class="th-sm">Tanggal Booking</th>
            <th class="th-sm">Total Uang Masuk</th>
            <th class="th-sm">Total Uang Bayar</th>
            <th class="th-sm">Foto Bukti</th>
            </tr><?php
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
              <td><a href="<?php echo base_url('uploads/bukti/'.$wo_pemesanan->foto_bukti) ?>" target="_blank"><img class="zoom" height="30" width="30" src="<?php echo base_url('uploads/bukti/'.$wo_pemesanan->foto_bukti) ?>" alt="<?php echo $wo_pemesanan->foto_bukti ?>"></a></td>
            </tr>
            <?php
          }
          if ($start==0) {
            ?>
            <script>
              redirectPesan('error','Belum ada Pemesanna');
            </script>   
          <?php } ?>
        </table>
      </div>
      <div class="row mt-2">
        <div class="col-md-4">
          <a href="#" class="btn btn-elegant btn-sm disabled ">Jumlah Data Pemesanan : <?php echo $total_rows ?></a>
        </div>
        <div class="col-md-8 text-right">
          <?php echo $pagination ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer Links-->
  <div class="container ">

    <!--First row-->
    <div class="row ">

      <!--First column-->
      <div class="col-md-12 my-4">
        <div class="container-fluid text-right">
          © 2019 Copyright: <a href="https://instagram.com/amailiacahya" target="_blank"> Skripsi Amailia Cahya Rudiana </a>
        </div>
      </div>
      <!--/First column-->
    </div>
    <!--/First row-->

  </div>
  <!--/Footer Links-->