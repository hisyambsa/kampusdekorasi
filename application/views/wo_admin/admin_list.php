
<div class="row">
  <div class="col-md-1 text-center mt-2">
        <a href="<?php echo base_url('admin') ?>">
            <button class="btn btn-flat btn-rounded hoverable btn-kembali"><h4><i class="fas fa-chevron-circle-left"></i></h4></button>
        </a>
  </div>
  <div class="col-md-3 text-center mt-2">
    <?php echo anchor(site_url('wo_admin/create'),'Buat User', 'class="btn btn-primary btn-rounded d-inline"'); ?>
    <br>
    <br>
  </div>
  <div class="col-md-4 text-center">
    <h2 style="margin-top:0px">Daftar User</h2>
  </div>
  <div class="col-md-4 text-right">
    <form action="<?php echo site_url('wo_admin/index'); ?>" class="form-group" method="get">
      <div class="input-group">
        <input type="text" class="form-control mt-2" name="q" value="<?php echo $q; ?>">
        <span class="input-group-btn">
          <?php
          if ($q <> '')
          {
            ?>
            <a href="<?php echo site_url('wo_admin'); ?>" class="btn btn-amber">Ulangi</a>
            <?php
          }
          ?>
          <button class="btn btn-dark-green" type="submit">Cari</button>
        </span>
      </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-md-12 text-center">
    <div class="table-responsive">
      <table class="table table-hover text-nowrap table-sm text-center" style="margin-bottom: 10px">
        <tr>
          <th class="th-sm">No</th>
          <th class="th-sm">Aksi</th>
          <th class="th-sm">Username</th>
          <th class="th-sm">Nama</th>
          <!-- <th class="th-sm">Password</th> -->
          <th class="th-sm">Created/Last Updated</th>
          <th class="th-sm">Last Login</th>
          <th class="th-sm">Nama Akses</th>
          </tr><?php
          foreach ($wo_admin_data as $wo_admin)
          {
            ?>
            <?php if ($wo_admin->id_admin!='1'): ?>
              <tr>
                <td width="80px"><?php echo ++$start ?></td>
                <td style="text-align:center" width="120px">
            <!-- <a href="<?php echo base_url().'wo_admin/read/'.encrypt_url($wo_admin->id_admin) ?>"  class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat">
              <span class="fa fa-eye"></span>
            </a> -->
            <a href="" data-value="<?php echo base_url().'wo_admin/update/'.encrypt_url($wo_admin->id_admin) ?>" class="btn btn-sm btn-warning btn_pass" data-toggle="modal" data-target="#modalLogin" title="Ubah">
              <span class="fa fa-edit"></span>
            </a>
          </td>
          <td><?php echo $wo_admin->username ?></td>
          <td><?php echo $wo_admin->nama ?></td>
          <!-- <td><?php echo $wo_admin->password ?></td> -->
          <td><?php echo $wo_admin->created ?></td>
          <td><?php echo $wo_admin->last_login ?></td>
          <td><?php echo $wo_admin->nama_akses ?></td>
        <?php endif ?>
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
</div>
</div>
<div class="row mt-2">
  <div class="col-md-4">
    <a href="#" class="btn btn-elegant btn-sm disabled ">Jumlah Data User : <?php echo $total_rows ?></a>
  </div>
  <div class="col-md-8 text-right">
    <?php echo $pagination ?>
  </div>
</div>
<!--
<div class="form-group">
  <label for="varchar">Password Lama <?php echo form_error('password') ?></label>
  <input type="text" class="form-control" name="password" id="Masukan password" placeholder="Masukan Password" value="<?php echo $password; ?>" />
</div> -->
<!--Modal: Login with Avatar Form-->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
  <!--Content-->
  <div class="modal-content">
    <!--Header-->
    <div class="modal-header">
      <img src="<?php echo base_url('img/logo_favicon_big_1.png') ?>" alt="avatar" class="rounded-circle img-responsive">
    </div>
    <!--Body-->
    <div class="modal-body text-center mb-1">
      <h5 class="mt-1 mb-2">Masukan Password Admin</h5>
      <div class="md-form ml-0 mr-0">
        <form action="" method="post" autocomplete="off">
          <input type="hidden" name="idUpdate" id="idUpdate" class="form-control form-control-sm ml-1" value="">
          <input name="password" type="password" id="passAdmin" minlength="1" maxlength="9" required class="form-control form-control-sm ml-0 validate"> <!--  -->
          <label for="passAdmin" class="ml-0">Enter password</label>
          
        </div>
        <button type="submit" id="klikPassword" href="" class="btn btn-cyan mt-1">Login <i class="fas fa-sign-in-alt ml-1"></i></button>
        <div class="text-center mt-4">
        </form>
      </div>
    </div>
  </div>
  <!--/.Content-->
</div>
</div>
<!--Modal: Login with Avatar Form-->
<!--
<div class="text-center">
  <a href="" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#modalLoginAvatar">Launch
  Modal Login with Avatar</a>
</div> -->