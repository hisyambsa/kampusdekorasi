
<div class="row">
  <div class="col-md-1 text-center mt-2">
        <a href="<?php echo base_url('admin') ?>">
            <button class="btn btn-flat btn-rounded hoverable btn-kembali"><h4><i class="fas fa-chevron-circle-left"></i></h4></button>
        </a>
  </div>
  <div class="col-md-3 text-center mt-2">
    <?php echo anchor(site_url('wo_akses/create'),'Buat Akses', 'class="btn btn-primary btn-rounded d-inline"'); ?>
    <br>
    <br>
  </div>
  <div class="col-md-4 text-center">
    <h2 style="margin-top:0px">Daftar Akses</h2>
  </div>
  <div class="col-md-4 text-right">
    <form action="<?php echo site_url('wo_akses/index'); ?>" class="form-group" method="get">
      <div class="input-group">
        <input type="text" class="form-control mt-2" name="q" value="<?php echo $q; ?>">
        <span class="input-group-btn">
          <?php
          if ($q <> '')
          {
          ?>
          <a href="<?php echo site_url('wo_akses'); ?>" class="btn btn-amber">Ulangi</a>
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
      <th class="th-sm">Nama Akses</th>
      <th class="th-sm">Grup</th>
      <th class="th-sm">Aksi</th>
    </tr><?php
    foreach ($wo_akses_data as $wo_akses)
    {
    ?>
    <tr>
      <td width="80px"><?php echo ++$start ?></td>
      <td><?php echo $wo_akses->nama_akses ?></td>
      <td><?php echo $wo_akses->grup ?></td><td style="text-align:center" width="120px">
      <a href="<?php echo base_url().'wo_akses/read/'.$wo_akses->id_akses ?>"  class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat">
        <span class="fa fa-eye"></span>
      </a>
      <a onclick="redirectPesan('info','anda akan diarahkan ke form ubah data')" href="<?php echo base_url().'wo_akses/update/'.$wo_akses->id_akses ?>"  class="btn btn-sm btn-warning" data-toggle="tooltip" title="Ubah">
        <span class="fa fa-edit"></span>
      </a>
      <a onclick="return confirmHapus('Hapus','anda yakin akan menghapus data?','<?php echo 'wo_akses/delete/'.$wo_akses->id_akses ?>')"   class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus">
        <span class="fa fa-trash"></span>
      </a>
    </td>
  </tr>
  <?php
  }
  if ($start==0) {
  ?>
  <script>
  alert('Data tidak ditemukan');
  </script>
  <?php } ?>
</table>
</div>
<div class="row mt-2">
<div class="col-md-4">
  <a href="#" class="btn btn-elegant btn-sm disabled ">Jumlah Data Akses : <?php echo $total_rows ?></a>
</div>
<div class="col-md-8 text-right">
  <?php echo $pagination ?>
</div>
</div>