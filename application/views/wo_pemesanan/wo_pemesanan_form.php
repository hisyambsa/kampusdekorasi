
<h2 style="margin-top:0px"><?php echo $button ?> Wo_pemesanan </h2>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="int">User Pemesanan <?php echo form_error('id_user_pemesanan') ?> </label>
                <!-- <input type="text" class="form-control" name="id_user_pemesanan" id="Masukan id_user_pemesanan" placeholder="Id User Pemesanan" value="<?php echo $id_user_pemesanan; ?>" /> -->
                <select 
                required class="browser-default custom-select" name="id_user_pemesanan" id="id_user_pemesanan">
                <option value="">Pilih User </option>
                <?php foreach ($wo_user_data as $data) { ?>
                    <option 
                    <?php if (isset($id_user_pemesanan)){ ?>
                        <?php if ($data->id_user==$id_user_pemesanan){ ?>
                        selected
                    <?php }
                } ?>
                value="<?php echo $data->id_user ?>"><?php echo $data->nama_user ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="int">Package Pemesanan <?php echo form_error('id_package_pemesanan') ?></label>
        <!-- <input type="text" class="form-control" name="id_package_pemesanan" id="Masukan id_package_pemesanan" placeholder="Id Package Pemesanan" value="<?php echo $id_package_pemesanan; ?>" /> -->
        <select 

        required class="browser-default custom-select" name="id_package_pemesanan" id="id_package_pemesanan">
        <option value="">Pilih Package</option>
        <?php foreach ($wo_package_data as $data) { ?>
          <option 
          <?php if (isset($id_package_pemesanan)){ ?>
            <?php if ($data->id_package==$id_package_pemesanan){ ?>
              selected
          <?php } 
      } ?>
      value="<?php echo $data->id_package ?>"><?php echo $data->nama_package ?></option>
  <?php } ?>
</select>
</div>
<!--   <div class="form-group">
    <label for="int">Id Detail Include Pemesanan <?php echo form_error('id_detail_include_pemesanan') ?></label>
    <input type="text" class="form-control" name="id_detail_include_pemesanan" id="Masukan id_detail_include_pemesanan" placeholder="Id Detail Include Pemesanan" value="<?php echo $id_detail_include_pemesanan; ?>" />
</div> -->
<div class="form-group">
    <label for="date">Tanggal Pemesanan <?php echo form_error('tanggal_pemesanan') ?></label>
    <input type="text" class="form-control
    <?php if ($button=='Ubah'): ?>
        datepicker
        <?php else: ?>
            datepickerNow
        <?php endif ?>
        " name="tanggal_pemesanan" id="Masukan tanggal_pemesanan" placeholder="Tanggal Pemesanan" value="<?php echo $tanggal_pemesanan; ?>" />
    </div>
    <div class="form-group">
        <label for="date">Tanggal Booking <?php echo form_error('tanggal_booking') ?></label>
        <input type="text" class="form-control datepickerBooking" name="tanggal_booking" id="Masukan tanggal_booking" placeholder="Tanggal Booking" value="<?php echo $tanggal_booking; ?>" />
    </div>
    <div class="form-group">
        <label for="double">Total Uang Masuk <?php echo form_error('total_uang_masuk') ?></label>
        <input type="text" class="form-control" name="total_uang_masuk" id="Masukan total_uang_masuk" placeholder="Total Uang Masuk" value="<?php echo $total_uang_masuk; ?>" />
    </div>
    <div class="form-group">
        <label for="double">Total Uang Bayar <?php echo form_error('total_uang_bayar') ?></label>
        <input type="text" class="form-control" name="total_uang_bayar" id="Masukan total_uang_bayar" placeholder="Total Uang Bayar" value="<?php echo $total_uang_bayar; ?>" />
    </div>
</div>
<div class="col-md">
<!--           <div class="form-group">
            <label for="varchar">Foto Bukti <?php echo form_error('foto_bukti') ?></label>
            <input type="text" class="form-control" name="foto_bukti" id="Masukan foto_bukti" placeholder="Foto Bukti" value="<?php echo $foto_bukti; ?>" />
        </div> -->
        <div class="form-group">
            <label for="varchar">Foto Bukti ( max: 2MB dan jpg/jpeg/png ) </label> <?php echo form_error('foto_bukti') ?>
            <div class="text-danger" for="varchar"><?php  if (isset($foto)) {
                echo $foto;
            } ?></div>
            <div id="image-preview">
                <div class="fileupload-wrapper">
                  <?php if ($button=='Ubah'): ?>
                    <input data-max-file-size="2M" type="file" name="foto_bukti" id="input-file-now" class="file-upload" data-default-file="<?php echo base_url('uploads/bukti/').$foto_bukti; ?>" />
                    <?php else: ?>
                      <input data-max-file-size="2M" type="file" name="foto_bukti" id="input-file-now" class="file-upload" data-default-file="<?php echo base_url('img/upload_foto.jpg'); ?>" />
                  <?php endif ?>
              </div>
          </div>
      </div>
      <div class="form-group">
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
      }
      ?> value="1">belum bayar</option>
      <option <?php if (isset($status)){ ?>
        <?php if ($status==2){ ?>
          selected
          <?php 
      }
  }
  ?>value="2">sudah bayar dp</option>
  <option <?php if (isset($status)){ ?>
    <?php if ($status==3){ ?>
      selected
      <?php 
  }
}
?> value="3">konfirmasi dp</option>
<option <?php if (isset($status)){ ?>
    <?php if ($status==4){ ?>
      selected
      <?php 
  }
}
?>value="4">sudah lunas</option>
</select>
</div>      
</div>
</div>

<input type="hidden" name="id_pemesanan" value="<?php echo $id_pemesanan; ?>" /> 
<button type="submit" class="btn btn-primary btn-rounded"><?php echo $button ?></button> 
<a href="<?php echo site_url('wo_pemesanan') ?>" class="btn btn-danger btn-rounded">Batal</a>
</form>