
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
<h2 style="margin-top:0px"><?php echo $button ?> Wo_pemesanan </h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id User Pemesanan <?php echo form_error('id_user_pemesanan') ?></label>
            <input type="text" class="form-control" name="id_user_pemesanan" id="Masukan id_user_pemesanan" placeholder="Id User Pemesanan" value="<?php echo $id_user_pemesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Package Pemesanan <?php echo form_error('id_package_pemesanan') ?></label>
            <input type="text" class="form-control" name="id_package_pemesanan" id="Masukan id_package_pemesanan" placeholder="Id Package Pemesanan" value="<?php echo $id_package_pemesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Detail Include Pemesanan <?php echo form_error('id_detail_include_pemesanan') ?></label>
            <input type="text" class="form-control" name="id_detail_include_pemesanan" id="Masukan id_detail_include_pemesanan" placeholder="Id Detail Include Pemesanan" value="<?php echo $id_detail_include_pemesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Pemesanan <?php echo form_error('tanggal_pemesanan') ?></label>
            <input type="text" class="form-control" name="tanggal_pemesanan" id="Masukan tanggal_pemesanan" placeholder="Tanggal Pemesanan" value="<?php echo $tanggal_pemesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Booking <?php echo form_error('tanggal_booking') ?></label>
            <input type="text" class="form-control" name="tanggal_booking" id="Masukan tanggal_booking" placeholder="Tanggal Booking" value="<?php echo $tanggal_booking; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Total Uang Masuk <?php echo form_error('total_uang_masuk') ?></label>
            <input type="text" class="form-control" name="total_uang_masuk" id="Masukan total_uang_masuk" placeholder="Total Uang Masuk" value="<?php echo $total_uang_masuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Total Uang Bayar <?php echo form_error('total_uang_bayar') ?></label>
            <input type="text" class="form-control" name="total_uang_bayar" id="Masukan total_uang_bayar" placeholder="Total Uang Bayar" value="<?php echo $total_uang_bayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto Bukti <?php echo form_error('foto_bukti') ?></label>
            <input type="text" class="form-control" name="foto_bukti" id="Masukan foto_bukti" placeholder="Foto Bukti" value="<?php echo $foto_bukti; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="Masukan status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id_pemesanan" value="<?php echo $id_pemesanan; ?>" /> 
	    <button type="submit" class="btn btn-primary btn-rounded"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('wo_pemesanan') ?>" class="btn btn-danger btn-rounded">Batal</a>
	</form>