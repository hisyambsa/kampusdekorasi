
<div class="row">
  <div class="col-md-1 text-center mt-2">
    <a href="<?php echo base_url('admin') ?>">
      <button class="btn btn-flat btn-rounded hoverable btn-kembali"><h4><i class="fas fa-chevron-circle-left"></i></h4></button>
    </a>
  </div>
  <div class="col-md-3 text-center mt-2">
    <?php echo anchor(site_url('wo_include/create'),'Buat Add On Package', 'class="btn btn-primary btn-rounded d-inline"'); ?>
    <br>
    <br>
  </div>
  <div class="col-md-4 text-center">
    <h2 style="margin-top:0px">Daftar Add On Package</h2>
  </div>
  <div class="col-md-4 text-right">
    <form action="<?php echo site_url('wo_include/index'); ?>" class="form-group" method="get">
      <div class="input-group">
        <input type="text" class="form-control mt-2" name="q" value="<?php echo $q; ?>">
        <span class="input-group-btn">
          <?php 
          if ($q <> '')
          {
            ?>
            <a href="<?php echo site_url('wo_include'); ?>" class="btn btn-amber">Ulangi</a>
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
      <th class="th-sm">Nama Add On</th>
      <th class="th-sm">Harga Add On</th>
      <th class="th-sm">Satuan Add On</th>
      <th class="th-sm">Foto Add On</th>
      <th class="th-sm">Aksi</th>
      </tr><?php
      foreach ($wo_include_data as $wo_include)
      {
        ?>
        <tr>
         <td width="80px"><?php echo ++$start ?></td>
         <td><?php echo $wo_include->nama_include ?></td>
         <td><?php echo $wo_include->harga_include ?></td>
         <td><?php echo $wo_include->satuan_include ?></td>
         <!-- <td><?php echo $wo_include->foto_include ?></td> -->
         <td> <a href="<?php echo base_url('uploads/package/'.$wo_include->foto_include) ?>" target="_blank"><img class="zoom" height="30" width="30" src="<?php echo base_url('uploads/include/'.$wo_include->foto_include) ?>" alt="<?php echo $wo_include->foto_include ?>"></a>
         </td>
         <td style="text-align:center" width="120px">
          <a href="<?php echo base_url().'wo_include/read/'.$wo_include->id_include ?>"  class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat">
            <span class="fa fa-eye"></span>
          </a>
          <a onclick="redirectPesan('info','mohon tunggu...')" href="<?php echo base_url().'wo_include/update/'.$wo_include->id_include ?>"  class="btn btn-sm btn-warning" data-toggle="tooltip" title="Ubah">
            <span class="fa fa-edit"></span>
          </a>
          <a onclick="return confirmHapus('Hapus','anda yakin akan menghapus data?','<?php echo 'wo_include/delete/'.$wo_include->id_include ?>')" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus">
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
    <a href="#" class="btn btn-elegant btn-sm disabled ">Jumlah Data Wo_include : <?php echo $total_rows ?></a>
  </div>
  <div class="col-md-8 text-right">
    <?php echo $pagination ?>
  </div>
</div>