<div class="container">	
	<h1 class="text-center mt-3 alert alert-danger"><?php echo $judulPackage ?></h1>


<div class="row">
    <div class="col-md-1 text-center mt-2">
        <!-- <a href="<?php echo base_url('admin') ?>"> -->
            <!-- <button class="btn btn-flat btn-rounded hoverable btn-kembali"><h4><i class="fas fa-chevron-circle-left"></i></h4></button> -->
        <!-- </a> -->
    </div>
    <div class="col-md-3 text-center mt-2">
        <!-- <?php echo anchor(site_url('wo_include/create'),'Buat Wo_include', 'class="btn btn-primary btn-rounded d-inline"'); ?> -->
        <br>
        <br>
    </div>
    <div class="col-md-4 text-center">
        <!-- <h2 style="margin-top:0px">Daftar Wo_include</h2> -->
    </div>
    <div class="col-md-4 text-right">
        <form action="<?php echo site_url('wo_include/index'); ?>" class="form-group" method="get">
            <div class="input-group">
                <input type="text" class="form-control mt-2" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php 
                    if ($q <> '')
                    {
                        ?>
                        <a href="<?php echo site_url('wo_include'); ?>" class="btn btn-amber">Ulangi</a>
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
            <th class="th-sm">Nama Include</th>
            <th class="th-sm">Harga Include</th>
            <th class="th-sm">Satuan Include</th>
            <th class="th-sm">Foto Include</th>
            <!-- <th class="th-sm">Aksi</th> -->
            </tr><?php
            foreach ($wo_include_data as $wo_include)
            {
                ?>
                <tr>
                 <td width="80px"><?php echo ++$start ?></td>
                 <td><?php echo $wo_include->nama_include ?></td>
                 <td><?php echo $wo_include->harga_include ?></td>
                 <td><?php echo $wo_include->satuan_include ?></td>
                 <!-- <td><?php echo $wo_include->foto_include ?></td> -->
                 <td> <a href="<?php echo base_url('uploads/package/'.$wo_include->foto_include) ?>" target="_blank"><img class="zoom" height="30" width="30" src="<?php echo base_url('uploads/include/'.$wo_include->foto_include) ?>" alt="<?php echo $wo_include->foto_include ?>"></a>
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
        <a href="#" class="btn btn-elegant btn-sm disabled ">Jumlah Include : <?php echo $total_rows ?></a>
    </div>
    <div class="col-md-8 text-right">
        <?php echo $pagination ?>
    </div>
</div>
</div>
<!--Footer Links-->
  <div class="container ">

    <!--First row-->
    <div class="row ">

      <!--First column-->
      <div class="col-md-12 my-4">
        <div class="container-fluid text-right">
          © 2019 Copyright: <a href="https://instagram.com/amailiacahya" target="_blank"> Skripsi Amailia Cahya Rudiana </a>
        </div>
      </div>
      <!--/First column-->
    </div>
    <!--/First row-->

  </div>
  <!--/Footer Links-->