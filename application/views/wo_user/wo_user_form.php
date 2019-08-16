
<h2 style="margin-top:0px"><?php echo $button ?> Account User </h2>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md">
      <div class="form-group">
        <label for="varchar">Nama User <?php echo form_error('nama_user') ?></label>
        <input type="text" class="form-control" name="nama_user" id="Masukan nama_user" placeholder="Nama User" value="<?php echo $nama_user; ?>" />
      </div>
      <div class="form-group">
        <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
        <input type="text" class="form-control" name="tempat_lahir" id="Masukan tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
      </div>
      <div class="form-group pt-1">
        <!-- <input type="text" readonly class="form-control ambilTanggal" name="tanggal_lahir" id="Masukan tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" /> -->
        <div class="md-form">
          <input placeholder="Pilih Tanggal Lahir" type="text" name="tanggal_lahir" id="date" class="form-control datepicker" data-value="<?php echo $tanggal_lahir ?>">
          <label for="date">Tanggal Lahir<?php echo form_error('tanggal_lahir') ?></label>
        </div>
      </div>
      <div class="form-group">
        <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
        <input type="text" class="form-control" name="alamat" id="Masukan alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
      </div>
      <div class="form-group">
        <label for="varchar">Hp <?php echo form_error('hp') ?></label>
        <input type="text" class="form-control" name="hp" id="Masukan hp" placeholder="Hp" value="<?php echo $hp; ?>" />
      </div>
    </div>
    <div class="col-md">
      <div class="form-group">
        <label for="varchar">Foto Identitas ( max: 2MB dan jpg/jpeg/png ) </label><?php echo form_error('foto_identitas') ?>
        <div class="text-danger" for="varchar"><?php  if (isset($foto)) {
          echo $foto;
        } ?></div>
        <div id="image-preview">
          <div class="fileupload-wrapper">
            <?php if ($button=='Ubah'): ?>
              <input data-max-file-size="2M" multiple type="file" name="foto_identitas" id="input-file-now" class="file-upload" data-default-file="<?php echo base_url('uploads/identitas/').$foto_identitas; ?>" />
              <?php else: ?>
                <input data-max-file-size="2M" multiple type="file" name="foto_identitas" id="input-file-now" class="file-upload" data-default-file="<?php echo base_url('img/upload_foto.jpg'); ?>" />
              <?php endif ?>

            </div>
          </div>
        </div>
        </div>
      </div>
      <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
      <button type="submit" class="btn btn-primary btn-rounded"><?php echo $button ?></button> 
      <a href="<?php echo site_url('wo_user') ?>" class="btn btn-danger btn-rounded">Batal</a>
    </form>