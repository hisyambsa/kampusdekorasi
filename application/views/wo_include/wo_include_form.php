
<h2 style="margin-top:0px"><?php echo $button ?> Master WO Include </h2>
<h4><?php echo validation_errors(); ?></h4>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="varchar">Nama Include <?php echo form_error('nama_include') ?></label>
                <input type="text" class="form-control" name="nama_include" id="Masukan nama_include" placeholder="Nama Include" value="<?php echo $nama_include; ?>" />
            </div>
            <div class="form-group">
                <label for="double">Harga Include <?php echo form_error('harga_include') ?></label>
                <input type="text" class="form-control" name="harga_include" id="Masukan harga_include" placeholder="Harga Include" value="<?php echo $harga_include; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Satuan Include <?php echo form_error('satuan_include') ?></label>
                <input type="text" class="form-control" name="satuan_include" id="Masukan satuan_include" placeholder="Satuan Include" value="<?php echo $satuan_include; ?>" />
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
              <label for="varchar">Foto Include ( max: 2MB dan jpg/jpeg/png ) </label><?php echo form_error('foto_include') ?>
              <div class="text-danger" for="varchar"><?php  if (isset($foto)) {
                echo $foto;
            } ?></div>
            <div id="image-preview">
                <div class="fileupload-wrapper">
                  <?php if ($button=='Ubah'): ?>
                    <input data-max-file-size="2M" type="file" name="foto_include" id="input-file-now" class="file-upload" data-default-file="<?php echo base_url('uploads/include/').$foto_include; ?>" />
                    <?php else: ?>
                      <input data-max-file-size="2M" type="file" name="foto_include" id="input-file-now" class="file-upload" data-default-file="<?php echo base_url('img/upload_foto.jpg'); ?>" />
                  <?php endif ?>
              </div>
          </div>
      </div>
  </div>
</div>

<input type="hidden" name="id_include" value="<?php echo $id_include; ?>" /> 
<button type="submit" class="btn btn-primary btn-rounded"><?php echo $button ?></button> 
<a href="<?php echo site_url('wo_include') ?>" class="btn btn-danger btn-rounded">Batal</a>
</form>