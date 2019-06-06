
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
        		    <tr><td>Status</td><td>
                    <?php if ($status==1) {
                        echo "belum bayar";
                    }else if ($status==2) {
                        echo "sudah bayar dp";
                    }else if ($status==3) {
                        echo "sudah konfirmasi dp";
                    }elseif ($status==4) {
                        echo "sudah bayar";
                    }else {echo "status tidak terdefinisi";}?>
        		    </td></tr>
	    <tr><td>Nama User Pemesanan</td><td><?php echo $nama_user; ?></td></tr>
	    <tr><td>Nama Package Pemesanan</td><td><?php echo $nama_package; ?></td></tr>
	    <!-- <tr><td>Id Detail Include Pemesanan</td><td><?php echo $id_detail_include_pemesanan; ?></td></tr> -->
	    <tr><td>Tanggal Pemesanan</td><td><?php echo $tanggal_pemesanan; ?></td></tr>
	    <tr><td>Tanggal Booking</td><td><?php echo $tanggal_booking; ?></td></tr>
	    <tr><td>Total Uang Masuk</td><td><?php echo $total_uang_masuk; ?></td></tr>
	    <tr><td>Total Uang Bayar</td><td><?php echo $total_uang_bayar; ?></td></tr>
	    <tr><td>Foto Bukti</td><td><a href="<?php echo base_url('uploads/bukti/'.$foto_bukti) ?>" target="_blank"><img class="zoom" height="30" width="30" src="<?php echo base_url('uploads/bukti/'.$foto_bukti) ?>" alt="<?php echo $foto_bukti ?>"></a></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wo_pemesanan') ?>" class="btn btn-danger btn-rounded">Kembali</a></td></tr>
	</table>