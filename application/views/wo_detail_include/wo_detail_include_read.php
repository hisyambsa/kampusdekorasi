
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
<h2 style="margin-top:0px">Lihat Wo_detail_include</h2>
        <table class="table">
	    <tr><td>Nama Detail Pemesanan</td><td><?php echo $foto_bukti; ?></td></tr>
	    <tr><td>Nama Detail Include</td><td><?php echo $nama_include; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Harga Total</td><td><?php echo $harga_total; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wo_detail_include') ?>" class="btn btn-danger btn-rounded">Kembali</a></td></tr>
	</table>