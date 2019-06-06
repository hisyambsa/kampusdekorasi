
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
<h2 style="margin-top:0px">Lihat Wo_include</h2>
        <table class="table">
	    <tr><td>Nama Include</td><td><?php echo $nama_include; ?></td></tr>
	    <tr><td>Harga Include</td><td><?php echo $harga_include; ?></td></tr>
	    <tr><td>Satuan Include</td><td><?php echo $satuan_include; ?></td></tr>
	    <tr><td>Foto Include</td><td><a href="<?php echo base_url('uploads/include/'.$foto_include) ?>" target="_blank"><img class="zoom" height="30" width="30" src="<?php echo base_url('uploads/include/'.$foto_include) ?>" alt="<?php echo $foto_include ?>"></a></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wo_include') ?>" class="btn btn-danger btn-rounded">Kembali</a></td></tr>
	</table>