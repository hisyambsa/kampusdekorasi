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
<h2 style="margin-top:0px">Lihat User</h2>
<table class="table">
	<tr><td>Username</td><td><?php echo $username; ?></td></tr>
	<tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	<tr><td>Password</td><td><?php echo $password; ?></td></tr>
	<tr><td>Created</td><td><?php echo $created; ?></td></tr>
	<tr><td>Last Login</td><td><?php echo $last_login; ?></td></tr>
	<tr><td>Id Akses</td><td><?php echo $nama_akses; ?></td></tr>
	<tr><td></td><td><a href="<?php echo site_url('wo_admin') ?>" class="btn btn-danger btn-rounded">Kembali</a></td></tr>
</table>