
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
<h2 style="margin-top:0px"><?php echo $button ?> Wo_include </h2>
        <form action="<?php echo $action; ?>" method="post">
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
	    <div class="form-group">
            <label for="varchar">Foto Include <?php echo form_error('foto_include') ?></label>
            <input type="text" class="form-control" name="foto_include" id="Masukan foto_include" placeholder="Foto Include" value="<?php echo $foto_include; ?>" />
        </div>
	    <input type="hidden" name="id_include" value="<?php echo $id_include; ?>" /> 
	    <button type="submit" class="btn btn-primary btn-rounded"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('wo_include') ?>" class="btn btn-danger btn-rounded">Batal</a>
	</form>