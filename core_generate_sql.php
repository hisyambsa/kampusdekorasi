<h1>Hisyam SQL</h1>
<br>
<?php for ($i=100; $i <=150; $i++) { 
	$sql = "INSERT INTO `ismul_user` (`id_user`, `username`, `nama`, `password`, `created`, `last_login`, `id_akses`) VALUES (NULL, '16180".$i."', '167C', 'user', CURRENT_TIMESTAMP, NULL, '3');";
	echo $sql."<br>";
} ?>