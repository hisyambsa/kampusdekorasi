
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
<h2 style="margin-top:0px">Lihat Wo_package</h2>
        <table class="table">
	    <tr><td>Nama Package</td><td><?php echo $nama_package; ?></td></tr>
	    <tr><td>Detail Package</td><td><?php echo $detail_package; ?></td></tr>
	    <tr><td>Harga Package</td><td><?php echo $harga_package; ?></td></tr>
	    <tr><td>Foto Package</td><td><?php echo $foto_package; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wo_package') ?>" class="btn btn-danger btn-rounded">Kembali</a></td></tr>
	</table>