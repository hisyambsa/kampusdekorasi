<?php
/*
<!-- .................................. -->
<!-- ...........COPYRIGHT ............. -->
<!-- Authors : Hisyam Husein .......... -->
<!-- Email : hisyam.husein@gmail.com .. -->
<!-- About : hisyam.ismul.com ......... -->
<!-- Instagram : @hisyambsa............ -->
<!-- .................................. -->
*/
?>
<h2 style="margin-top:0px"><?php echo $button ?> User </h2>
<form action="<?php echo $action; ?>" method="post" autocomplete="off">
  <div class="form-group">
    <label for="varchar">Username <?php echo form_error('username') ?></label>
    <input type="text" class="form-control" name="username" id="Masukan username" placeholder="Masukan Username" value="<?php echo $username; ?>" />
  </div>
  <div class="form-group">
    <label for="varchar">Nama <?php echo form_error('nama') ?></label>
    <input type="text" class="form-control" name="nama" id="Masukan nama" placeholder="Masukan Nama" value="<?php echo $nama; ?>" />
  </div>
  <div class="form-group">
    <label for="varchar">Password Lama <?php echo form_error('password') ?></label>
    <input type="text" class="form-control" name="password" id="Masukan password" placeholder="Masukan Password" value="<?php echo $password; ?>" />
  </div>
  <div class="form-group">
    <label for="varchar">Password Baru<?php echo form_error('password_baru') ?></label>
    <input type="text" class="form-control" name="password_baru" id="Masukan password_baru" placeholder="Password Baru" value="<?php echo $password_baru; ?>" />
  </div>
  <div class="form-group">
    <!--     <label for="int">Id Akses <?php echo form_error('id_akses') ?></label>
      <input type="text" class="form-control" name="id_akses" id="Masukan id_akses" placeholder="Id Akses" value="<?php echo $id_akses; ?>" /> -->
      <!-- <label for="int">id Akses <?php echo form_error('id_akses') ?></label> -->
      <!-- <input type="text" class="form-control" name="id_akses" id="id_akses" placeholder="Id Akses" value="<?php echo $id_akses; ?>" /> -->
      <label for="id_akses">Nama Akses <?php echo form_error('id_akses') ?></label>
      <select name="id_akses" id="id_akses" class="browser-default custom-select">
        <option value="">Pilih Nama Akses</option>
        <?php foreach ($data_akses_data as $akses) { ?>
          <option
          <?php if (isset($dataAksesId)): ?>
            <?php if ($akses->id_akses==$dataAksesId): ?>
              selected
            <?php endif ?>
          <?php endif ?>
          value="<?php echo $akses->id_akses ?>"><?php echo $akses->nama_akses ?></option>
        <?php } ?>
      </select>
    </div>
    <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>" />
    <button type="submit" class="btn btn-primary btn-rounded"><?php echo $button ?></button>
    <a href="<?php echo site_url('wo_admin') ?>" class="btn btn-danger btn-rounded">Batal</a>
  </form>