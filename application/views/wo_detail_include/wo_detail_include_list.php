        <div class="row">
            <div class="col-md-1 text-center mt-2">
                <button class="btn btn-flat btn-rounded hoverable btn-kembali"><h4><i class="fas fa-chevron-circle-left"></i></h4></button>
            </div>
            <div class="col-md-3 text-center mt-2">
                <?php echo anchor(site_url('wo_detail_include/create'),'Buat Wo_detail_include', 'class="btn btn-primary btn-rounded d-inline"'); ?>
                <br>
                <br>
            </div>
            <div class="col-md-4 text-center">
                <h2 style="margin-top:0px">Daftar Wo_detail_include
                </h2>

            </div>
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('wo_detail_include/index'); ?>" class="form-group" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control mt-2" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('wo_detail_include'); ?>" class="btn btn-amber">Ulangi</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-dark-green" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-hover text-nowrap table-sm text-center" style="margin-bottom: 10px">
            <tr>
                <th class="th-sm">No</th>
		<th class="th-sm">Nama Pemesanan</th>
		<th class="th-sm">Nama Include</th>
		<th class="th-sm">Jumlah</th>
		<th class="th-sm">Harga Total</th>
		<th class="th-sm">Aksi</th>
            </tr><?php
            foreach ($wo_detail_include_data as $wo_detail_include)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $wo_detail_include->foto_bukti ?></td>
			<td><?php echo $wo_detail_include->nama_include ?></td>
			<td><?php echo $wo_detail_include->jumlah ?></td>
			<td><?php echo $wo_detail_include->harga_total ?></td><td style="text-align:center" width="120px">
                    <a href="<?php echo base_url().'wo_detail_include/read/'.$wo_detail_include->id_detail_include ?>"  class="btn btn-sm btn-info" data-toggle="tooltip" title="Lihat">
                     <span class="fa fa-eye"></span>
                      <a onclick="redirectPesan('info','mohon tunggu...')" href="<?php echo base_url().'wo_detail_include/update/'.$wo_detail_include->id_detail_include ?>"  class="btn btn-sm btn-warning" data-toggle="tooltip" title="Ubah">
                        <span class="fa fa-edit"></span>
                        <a onclick="return confirmHapus('Hapus','anda yakin akan menghapus data?','<?php echo 'wo_detail_include/delete/'.$wo_detail_include->id_detail_include ?>')" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus">
                          <span class="fa fa-trash"></span>
                      </td>
		</tr>
            <?php
            }
             if ($start==0) {
                ?>
        <script>
          redirectPesan('error','Data tidak ditemukan');
        </script>   
            <?php } ?>
        </table>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <a href="#" class="btn btn-elegant btn-sm disabled ">Jumlah Data Wo_detail_include : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-8 text-right">
                <?php echo $pagination ?>
            </div>
        </div>