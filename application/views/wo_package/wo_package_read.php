
<h2 style="margin-top:0px">Lihat Wo_package</h2>
<table class="table">
	<tr><td>Nama Package</td><td><?php echo $nama_package; ?></td></tr>
	<tr><td>Detail Package</td><td><?php echo $detail_package; ?></td></tr>
	<tr><td>Harga Package</td><td><?php echo $harga_package; ?></td></tr>
	<tr><td>Foto Package</td><td><a href="<?php echo base_url('uploads/package/'.$foto_package) ?>" target="_blank"><img class="zoom" height="30" width="30" src="<?php echo base_url('uploads/package/'.$foto_package) ?>" alt="<?php echo $foto_package ?>"></a></td>
	</tr>
	<tr><td></td><td><a href="<?php echo site_url('wo_package') ?>" class="btn btn-danger btn-rounded">Kembali</a></td></tr>
</table>