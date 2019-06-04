
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
<h2 style="margin-top:0px">Lihat Wo_pemesanan</h2>
        <table class="table">
	    <tr><td>Id User Pemesanan</td><td><?php echo $id_user_pemesanan; ?></td></tr>
	    <tr><td>Id Package Pemesanan</td><td><?php echo $id_package_pemesanan; ?></td></tr>
	    <tr><td>Id Detail Include Pemesanan</td><td><?php echo $id_detail_include_pemesanan; ?></td></tr>
	    <tr><td>Tanggal Pemesanan</td><td><?php echo $tanggal_pemesanan; ?></td></tr>
	    <tr><td>Tanggal Booking</td><td><?php echo $tanggal_booking; ?></td></tr>
	    <tr><td>Total Uang Masuk</td><td><?php echo $total_uang_masuk; ?></td></tr>
	    <tr><td>Total Uang Bayar</td><td><?php echo $total_uang_bayar; ?></td></tr>
	    <tr><td>Foto Bukti</td><td><?php echo $foto_bukti; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wo_pemesanan') ?>" class="btn btn-danger btn-rounded">Kembali</a></td></tr>
	</table>