
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
<h2 style="margin-top:0px"><?php echo $button ?> Wo_package </h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Package <?php echo form_error('nama_package') ?></label>
            <input type="text" class="form-control" name="nama_package" id="Masukan nama_package" placeholder="Nama Package" value="<?php echo $nama_package; ?>" />
        </div>
	    <div class="form-group">
            <label for="detail_package">Detail Package <?php echo form_error('detail_package') ?></label>
            <textarea class="form-control" rows="3" name="detail_package" id="detail_package" placeholder="Detail Package"><?php echo $detail_package; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="double">Harga Package <?php echo form_error('harga_package') ?></label>
            <input type="text" class="form-control" name="harga_package" id="Masukan harga_package" placeholder="Harga Package" value="<?php echo $harga_package; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto Package <?php echo form_error('foto_package') ?></label>
            <input type="text" class="form-control" name="foto_package" id="Masukan foto_package" placeholder="Foto Package" value="<?php echo $foto_package; ?>" />
        </div>
	    <input type="hidden" name="id_package" value="<?php echo $id_package; ?>" /> 
	    <button type="submit" class="btn btn-primary btn-rounded"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('wo_package') ?>" class="btn btn-danger btn-rounded">Batal</a>
	</form>