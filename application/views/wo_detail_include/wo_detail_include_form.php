
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
<h2 style="margin-top:0px"><?php echo $button ?> Wo_detail_include </h2>
<form action="<?php echo $action; ?>" method="post">
   <div class="form-group">
    <label for="int">Bukti Detail Include Pemesanan *cek Pemesanan WO*<?php echo form_error('id_detail_include_pemesanan') ?></label>
    <!-- <input type="text" class="form-control" name="id_detail_include_pemesanan" id="Masukan id_detail_include_pemesanan" placeholder="Id Detail Include Pemesanan" value="<?php echo $id_detail_include_pemesanan; ?>" /> -->
    <select 
    required class="browser-default custom-select" name="id_detail_include_pemesanan" id="id_detail_include_pemesanan">
    <option value="">Pilih Pemesanan </option>
    <?php foreach ($wo_pemesanan_data as $data) { ?>
        <option 
        <?php if (isset($id_detail_include_pemesanan)){ ?>
            <?php if ($data->id_pemesanan==$id_detail_include_pemesanan){ ?>
                selected
            <?php }
        } ?>
        value="<?php echo $data->id_pemesanan ?>"><?php echo $data->foto_bukti ?></option>
    <?php } ?>
</select>
</div>
<div class="form-group">
    <label for="int">Id Detail Include<?php echo form_error('id_detail_include_include') ?></label>
    <!-- <input type="text" class="form-control" name="id_detail_include_include" id="Masukan id_detail_include_include" placeholder="Id Detail Include" value="<?php echo $id_detail_include_include; ?>" /> -->
    <select 
    required class="browser-default custom-select" name="id_detail_include_include" id="id_detail_include_include">
    <option value="">Pilih Pemesanan </option>
    <?php foreach ($wo_include_data as $data) { ?>
        <option 
        <?php if (isset($id_detail_include_include)){ ?>
            <?php if ($data->id_include==$id_detail_include_include){ ?>
                selected
            <?php }
        } ?>
        value="<?php echo $data->id_include ?>"><?php echo $data->nama_include ?></option>
    <?php } ?>
</select>

</div>
<div class="form-group">
    <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
    <input type="text" class="form-control" name="jumlah" id="Masukan jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
</div>
<div class="form-group">
    <label for="double">Harga Total <?php echo form_error('harga_total') ?></label>
    <input type="text" class="form-control" name="harga_total" id="Masukan harga_total" placeholder="Harga Total" value="<?php echo $harga_total; ?>" />
</div>
<input type="hidden" name="id_detail_include" value="<?php echo $id_detail_include; ?>" /> 
<button type="submit" class="btn btn-primary btn-rounded"><?php echo $button ?></button> 
<a href="<?php echo site_url('wo_detail_include') ?>" class="btn btn-danger btn-rounded">Batal</a>
</form>