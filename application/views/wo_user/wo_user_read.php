
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
<h2 style="margin-top:0px">Lihat Wo_user</h2>
        <table class="table">
	    <tr><td>Nama User</td><td><?php echo $nama_user; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Hp</td><td><?php echo $hp; ?></td></tr>
	    <tr><td>Foto Ktp</td><td><?php echo $foto_ktp; ?></td></tr>
	    <tr><td>Foto Kk</td><td><?php echo $foto_kk; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wo_user') ?>" class="btn btn-danger btn-rounded">Kembali</a></td></tr>
	</table>