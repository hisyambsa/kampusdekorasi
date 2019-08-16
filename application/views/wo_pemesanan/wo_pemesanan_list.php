
<div class="row">
    <div class="col-md-1 text-center mt-2">
        <button class="btn btn-flat btn-rounded hoverable btn-kembali"><h4><i class="fas fa-chevron-circle-left"></i></h4></button>
    </div>
    <div class="col-md-3 text-center mt-2">
        <?php echo anchor(site_url('wo_pemesanan/create'),'Tambah Pemesanan', 'class="btn btn-primary btn-rounded d-inline"'); ?>
        <br>
        <br>
    </div>
    <div class="col-md-4 text-center">
        <h2 style="margin-top:0px">Daftar Pemesanan</h2>

    </div>
    <div class="col-md-4 text-right">
        <form action="<?php echo site_url('wo_pemesanan/index'); ?>" class="form-group" method="get">
            <div class="input-group">
                <input type="text" class="form-control mt-2" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php 
                    if ($q <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('wo_pemesanan'); ?>" class="btn btn-amber">Ulangi</a>
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

            <th class="th-sm">Nama User Pemesanan</th>
            <th class="th-sm">Nama Package Pemesanan</th>
            <!-- <th class="th-sm">Id Detail Include Pemesanan</th> -->
            <th class="th-sm">Tanggal Pemesanan</th>
            <th class="th-sm">Tanggal Booking</th>
            <th class="th-sm">Total Uang Masuk</th>
            <th class="th-sm">Total Uang Bayar</th>
            <th class="th-sm">Foto Bukti</th>
            <th class="th-sm">Aksi</th>
            </tr><?php
            foreach ($wo_pemesanan_data as $wo_pemesanan)
            {
                ?>
                <tr>
                 <td width="80px"><?php echo ++$start ?></td>
                 <td>


                    <?php if ($wo_pemesanan->status==1) {
                        // echo '<button id="konfirmasi" class="btn btn-warning btn-sm">Menunggu Konfirmasi</button>';
                        echo ' <button href="" data-idPackage="'.$wo_pemesanan->id_package.'" data-namaPackage="'.$wo_pemesanan->nama_package.'" data-idUser="'.$wo_pemesanan->id_user.'" data-namaUser="'.$wo_pemesanan->nama_user.'" data-tanggalPemesanan="'.$wo_pemesanan->tanggal_pemesanan.'" data-tanggalBooking="'.$wo_pemesanan->tanggal_booking.'" data-uangMasuk="'.$wo_pemesanan->total_uang_masuk.'" data-uangBayar="'.$wo_pemesanan->total_uang_bayar.'" data-fotoBukti="'.$wo_pemesanan->foto_bukti.'"  class="btn btn-warning btn-sm btn-rounded float-right" data-toggle="modal" data-target="#modalKonfirmasi" data-status="'.$wo_pemesanan->status.'" data-idpemesanan="'.$wo_pemesanan->id_pemesanan.'">Menunggu Konfirmasi Booking</button> ';
                    }else if ($wo_pemesanan->status==2) {
                        echo "menunggu konfirmasi Pelunasan";
                    }else if ($wo_pemesanan->status==3) {
                        echo ' <button href="" data-idPackage="'.$wo_pemesanan->id_package.'" data-namaPackage="'.$wo_pemesanan->nama_package.'" data-idUser="'.$wo_pemesanan->id_user.'" data-namaUser="'.$wo_pemesanan->nama_user.'" data-tanggalPemesanan="'.$wo_pemesanan->tanggal_pemesanan.'" data-tanggalBooking="'.$wo_pemesanan->tanggal_booking.'" data-uangMasuk="'.$wo_pemesanan->total_uang_masuk.'" data-uangBayar="'.$wo_pemesanan->total_uang_bayar.'" data-fotoBukti="'.$wo_pemesanan->foto_bukti.'"  class="btn btn-secondary btn-sm btn-rounded float-right" data-toggle="modal" data-target="#modalKonfirmasi" data-status="'.$wo_pemesanan->status.'" data-idpemesanan="'.$wo_pemesanan->id_pemesanan.'">Menunggu Konfirmasi Pelunasan</button> ';
                    }elseif ($wo_pemesanan->status==4) {
                        echo "status tidak terdefinisi";
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
                <td style="text-align:center" width="120px">
                    <a href="<?php echo base_url().'wo_pemesanan/read/'.$wo_pemesanan->id_pemesanan ?>"  class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat">
                       <span class="fa fa-eye"></span>
                   </a>
                   <a onclick="redirectPesan('info','mohon tunggu...')" href="<?php echo base_url().'wo_pemesanan/update/'.$wo_pemesanan->id_pemesanan ?>"  class="btn btn-sm btn-warning" data-toggle="tooltip" title="Ubah">
                    <span class="fa fa-edit"></span>
                </a>
                <a onclick="return confirmHapus('Hapus','anda yakin akan menghapus data?','<?php echo 'wo_pemesanan/delete/'.$wo_pemesanan->id_pemesanan ?>')" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus">
                  <span class="fa fa-trash"></span>
              </a>
          </td>
      </tr>
      <?php
  }
  if ($start==0) {
    ?>
    <script>
      redirectPesan('error','Data tidak ditemukan');
  </script>   
<?php } ?>
</table>
</div>
<div class="row mt-2">
    <div class="col-md-4">
        <a href="#" class="btn btn-elegant btn-sm disabled ">Jumlah Data Wo_pemesanan : <?php echo $total_rows ?></a>
        <?php echo anchor(site_url('wo_pemesanan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-8 text-right">
        <?php echo $pagination ?>
    </div>
</div>

<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Konfirmasi Pelunasa</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body mx-3">
  <form action="#" method="post" enctype="multipart/form-data" autocomplete="off" id="form_update_status">
      <div class="row">
        <div class="col-md">
          <div class="form-group">
            <label for="int">User Pemesanan <?php echo form_error('id_user_pemesanan') ?> </label>
            <!-- <input type="text" class="form-control" name="id_user_pemesanan" id="Masukan id_user_pemesanan" placeholder="Id User Pemesanan" value="<?php echo $id_user_pemesanan; ?>" /> -->
            <input type="text" readonly class="form-control" name="nama_user_pemesanan" id="nama_user_pemesanan" placeholder="Nama User" value="" />
        </div>
        <div class="form-group">
          <label for="int">Package Pemesanan <?php echo form_error('id_package_pemesanan') ?></label>
          <!-- <input type="text" class="form-control" name="id_package_pemesanan" id="Masukan id_package_pemesanan" placeholder="Id Package Pemesanan" value="<?php echo $id_package_pemesanan; ?>" /> -->

          <input type="text" readonly class="form-control" name="nama_package_pemesanan" id="nama_package_pemesanan" placeholder="Nama Package" value="" />

      </div>

      <div class="form-group">
        <label for="date">Tanggal Pemesanan <?php echo form_error('tanggal_pemesanan') ?></label>
        <input type="text" class="form-control datepicker" readonly name="tanggal_pemesanan" id="tanggal_pemesanan" placeholder="Tanggal Pemesanan" value="" />
    </div>
    <div class="form-group">
      <label for="date">Tanggal Booking <?php echo form_error('tanggal_booking') ?></label>
      <input type="text" required class="form-control datepicker" name="tanggal_booking" id="tanggal_booking" placeholder="Tanggal Booking" value="" />
  </div>
  <div class="form-group">
      <label for="double">Jumlah Transfer<?php echo form_error('total_uang_masuk') ?></label>
      <input type="number" required min="0" class="form-control" name="total_uang_masuk" id="total_uang_masuk" placeholder="Masukan Jumlah Transfer" value="" />
  </div>
  <div class="form-group">
      <label for="double">Total Uang Bayar <?php echo form_error('total_uang_bayar') ?></label>
      <input type="number" class="form-control" name="total_uang_bayar" id="total_uang_bayar" placeholder="Total Uang Bayar" value="" />
  </div>
</div>
<div class="col-md">
<!--           <div class="form-group">
            <label for="varchar">Foto Bukti <?php echo form_error('foto_bukti') ?></label>
            <input type="text" class="form-control" name="foto_bukti" id="Masukan foto_bukti" placeholder="Foto Bukti" value="<?php echo $foto_bukti; ?>" />
        </div> -->
        <div class="form-group text-center">
            <label for="varchar">Foto Bukti Transfer</label> <?php echo form_error('foto_bukti') ?>
            <img style="max-width: 400px;max-height: 250px;" id="imgBukti" class="" src="<?php echo base_url('uploads/bukti/').'10_2019-07-17.jpeg'; ?>" alt="foto Bukti">
        </div>
        <div class="form-group d-none">
          <label for="int">Status  <?php echo form_error('status') ?></label>
          <!-- <input type="text" class="form-control" name="status" id="Masukan status" placeholder="Status" value="<?php echo $status; ?>" /> -->
          <select 
          required class="browser-default custom-select" name="status" id="status">
          <option value="">Pilih Status</option>
          <option  <?php if (isset($status)){ ?>
            <?php if ($status==1){ ?>
              selected
              <?php 
          }
      }else{?>
        selected
    <?php }
    ?> value="1">Menunggu Konfirmasi</option>
    <option <?php if (isset($status)){ ?>
        <?php if ($status==2){ ?>
          selected
          <?php 
      }
  }
  ?>value="2">Menunggu Pelunasan</option>
  <option <?php if (isset($status)){ ?>
    <?php if ($status==3){ ?>
      selected
      <?php 
  }
}
?> value="3">Menunggu Konfirmasi Pelunasan</option>
<option <?php if (isset($status)){ ?>
    <?php if ($status==4){ ?>
      selected
      <?php 
  }
}
?>value="4">Lunas dan Selesai</option>
</select>
</div>      
<button type="submit" id="submitPemesanan" class="btn btn-warning btn-block btn-rounded"><?php echo 'KONFIRMASI' ?></button> 
</div>
</div>

<input type="hidden" name="id_pemesanan" id="id_pemesanan" value="" /> 

</form> 

</div>
<div class="modal-footer d-flex justify-content-center">
</div>
</div>
</div>
</div>



