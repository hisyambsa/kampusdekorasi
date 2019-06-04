
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
<h2 style="margin-top:0px"><?php echo $button ?> Wo_user </h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama User <?php echo form_error('nama_user') ?></label>
            <input type="text" class="form-control" name="nama_user" id="Masukan nama_user" placeholder="Nama User" value="<?php echo $nama_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="Masukan tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="text" class="form-control" name="tanggal_lahir" id="Masukan tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="Masukan alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hp <?php echo form_error('hp') ?></label>
            <input type="text" class="form-control" name="hp" id="Masukan hp" placeholder="Hp" value="<?php echo $hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto Ktp <?php echo form_error('foto_ktp') ?></label>
            <input type="text" class="form-control" name="foto_ktp" id="Masukan foto_ktp" placeholder="Foto Ktp" value="<?php echo $foto_ktp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto Kk <?php echo form_error('foto_kk') ?></label>
            <input type="text" class="form-control" name="foto_kk" id="Masukan foto_kk" placeholder="Foto Kk" value="<?php echo $foto_kk; ?>" />
        </div>
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <button type="submit" class="btn btn-primary btn-rounded"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('wo_user') ?>" class="btn btn-danger btn-rounded">Batal</a>
	</form>