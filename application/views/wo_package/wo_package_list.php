
<div class="row">
  <div class="col-md-1 text-center mt-2">
    <a href="<?php echo base_url('admin') ?>">
      <button class="btn btn-flat btn-rounded hoverable btn-kembali"><h4><i class="fas fa-chevron-circle-left"></i></h4></button>
    </a>
  </div>
  <div class="col-md-3 text-center mt-2">
    <?php echo anchor(site_url('wo_package/create'),'Buat Wo_package', 'class="btn btn-primary btn-rounded d-inline"'); ?>
    <br>
    <br>
  </div>
  <div class="col-md-4 text-center">
    <h2 style="margin-top:0px">Daftar Wo_package</h2>

  </div>
  <div class="col-md-4 text-right">
    <form action="<?php echo site_url('wo_package/index'); ?>" class="form-group" method="get">
      <div class="input-group">
        <input type="text" class="form-control mt-2" name="q" value="<?php echo $q; ?>">
        <span class="input-group-btn">
          <?php 
          if ($q <> '')
          {
            ?>
            <a href="<?php echo site_url('wo_package'); ?>" class="btn btn-amber">Ulangi</a>
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
      <th class="th-sm">Nama Package</th>
      <th class="th-sm">Jenis Package</th>
      <th class="th-sm">Detail Package</th>
      <th class="th-sm">Harga Package</th>
      <th class="th-sm">Foto Package</th>
      <th class="th-sm">Aksi</th>
      </tr><?php
      foreach ($wo_package_data as $wo_package)
      {
        ?>
        <tr>
         <td width="80px"><?php echo ++$start ?></td>
         <td><?php echo $wo_package->nama_package ?></td>
         <td>
          <?php if ($wo_package->jenis_package==1) {
            echo 'Gedung / Aula';
         } else if($wo_package->jenis_package==2) {
           echo 'Rumahan';
         }else {
          echo "tidak terdefinisi";
         }
         ?>
       </td>
       <td><?php echo $wo_package->detail_package ?></td>
       <td><?php echo $wo_package->harga_package ?></td>
       <!-- <td><?php echo $wo_package->foto_package ?></td> -->
       <td><a href="<?php echo base_url('uploads/package/'.$wo_package->foto_package) ?>" target="_blank"><img class="zoom" height="30" width="30" src="<?php echo base_url('uploads/package/'.$wo_package->foto_package) ?>" alt="<?php echo $wo_package->foto_package ?>"></a></td>
       <td style="text-align:center" width="120px">
        <a href="<?php echo base_url().'wo_package/read/'.$wo_package->id_package ?>"  class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat">
         <span class="fa fa-eye"></span>
       </a>
       <a onclick="redirectPesan('info','mohon tunggu...')" href="<?php echo base_url().'wo_package/update/'.$wo_package->id_package ?>"  class="btn btn-sm btn-warning" data-toggle="tooltip" title="Ubah">
         <span class="fa fa-edit"></span>
       </a>
       <a onclick="return confirmHapus('Hapus','anda yakin akan menghapus data?','<?php echo 'wo_package/delete/'.$wo_package->id_package ?>')" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus">
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
    <a href="#" class="btn btn-elegant btn-sm disabled ">Jumlah Data Wo_package : <?php echo $total_rows ?></a>
  </div>
  <div class="col-md-8 text-right">
    <?php echo $pagination ?>
  </div>
</div>