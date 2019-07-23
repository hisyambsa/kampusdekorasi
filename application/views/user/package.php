<div class="container">
	<h1 class="text-center mt-3 alert alert-danger"><?php echo $judulPackage ?></h1>
	<div class="row">

		<?php 
		foreach ($wo_package_data as $wo_package)
		{
			++$start;
			?>
			<div class="col-md-4">
				<!-- Card -->
				<div class="card">
					<!-- Card image -->
					<img class="card-img-top" height="200" width="200" src="<?php echo base_url('uploads/package/'.$wo_package->foto_package) ?>" alt="<?php echo $wo_package->foto_package ?>">

					<!-- Card content -->
					<div class="card-body">

						<!-- Title -->
						<h4 class="card-title"><a><?php echo $wo_package->nama_package ?></a></h4>
						<!-- Text -->
						<p class="card-text"><?php echo $wo_package->detail_package ?></p>
						<!-- Button -->
						<p class="text-center"><?php echo 'Rp. '.number_format($wo_package->harga_package,0,',','.'); ?></p> 
						<button href="" data-idPackage="<?php echo $wo_package->id_package ?>" class="btn btn-primary btn-sm btn-rounded float-right" data-toggle="modal" data-target="#modalBooking" data-harga="<?php echo $wo_package->harga_package ?>">Booking</button> 

					</div>
				</div>
				<!-- Card -->
			</div>

			<?php
		}
		if ($start==0) {
			?>
			<script>
				redirectPesan('error','Datang Kembali Nanti');
			</script>

		<?php } ?>
	</div>
  <div class="row mt-2">
    <div class="col-md-4">
      <a href="#" class="btn btn-elegant btn-sm disabled ">Jumlah Package : <?php echo $total_rows ?></a>
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

<div class="modal fade" id="modalBooking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Booking</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <form action="#" method="post" enctype="multipart/form-data" autocomplete="off" id="form_submit">
      <div class="row">
        <div class="col-md">
          <div class="form-group d-none">
            <label for="int">User Pemesanan <?php echo form_error('id_user_pemesanan') ?> </label>
            <!-- <input type="text" class="form-control" name="id_user_pemesanan" id="Masukan id_user_pemesanan" placeholder="Id User Pemesanan" value="<?php echo $id_user_pemesanan; ?>" /> -->
            <select 
            required class="browser-default custom-select"  name="id_user_pemesanan" id="id_user_pemesanan" data-id=>
            <option value="">Pilih User </option>
            <?php foreach ($wo_user_data as $data) { ?>
              <option 
              <?php if ($this->session->userdata('id_user')!==NULL){ ?>
                <?php if ($data->id_user==$this->session->userdata('id_user')){ ?>
                  selected
                <?php }
              } ?>
              value="<?php echo $data->id_user ?>"><?php echo $data->nama_user ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="int">Package Pemesanan <?php echo form_error('id_package_pemesanan') ?></label>
          <!-- <input type="text" class="form-control" name="id_package_pemesanan" id="Masukan id_package_pemesanan" placeholder="Id Package Pemesanan" value="<?php echo $id_package_pemesanan; ?>" /> -->
          <select 

          required class="browser-default custom-select" name="id_package_pemesanan" id="id_package_pemesanan">
          <option value="">Pilih Package</option>
          <?php foreach ($wo_package_data as $data) { ?>
            <option 
            <?php if (isset($id_package_pemesanan)){ ?>
              <?php if ($data->id_package==$id_package_pemesanan){ ?>
                selected
              <?php } 
            } ?>
            value="<?php echo $data->id_package ?>"><?php echo $data->nama_package ?></option>
          <?php } ?>
        </select>
      </div>
<!--   <div class="form-group">
    <label for="int">Id Detail Include Pemesanan <?php echo form_error('id_detail_include_pemesanan') ?></label>
    <input type="text" class="form-control" name="id_detail_include_pemesanan" id="Masukan id_detail_include_pemesanan" placeholder="Id Detail Include Pemesanan" value="<?php echo $id_detail_include_pemesanan; ?>" />
  </div> -->
  <div class="form-group d-none">
    <label for="date">Tanggal Pemesanan <?php echo form_error('tanggal_pemesanan') ?></label>
    <input type="text" class="form-control
    <?php if ($button=='Ubah'): ?>
      datepicker
      <?php else: ?>
        datepickerNow
      <?php endif ?>
      " name="tanggal_pemesanan" id="tanggal_pemesanan" placeholder="Tanggal Pemesanan" value="<?php echo $tanggal_pemesanan; ?>" />
    </div>
    <div class="form-group">
      <label for="date">Tanggal Booking <?php echo form_error('tanggal_booking') ?></label>
      <input type="text" required class="form-control datepickerBooking" name="tanggal_booking" id="tanggal_booking" placeholder="Tanggal Booking" value="<?php echo $tanggal_booking; ?>" />
    </div>
    <div class="form-group">
      <label for="double">Masukan Jumlah Transfer<?php echo form_error('total_uang_masuk') ?></label>
      <input type="number" required min="0" class="form-control" name="total_uang_masuk" id="Masukan total_uang_masuk" placeholder="Masukan Jumlah Transfer" value="<?php echo $total_uang_masuk; ?>" />
    </div>
    <div class="form-group d-none">
      <label for="double">Total Uang Bayar <?php echo form_error('total_uang_bayar') ?></label>
      <input type="hidden" class="form-control" name="total_uang_bayar" id="total_uang_bayar" placeholder="Total Uang Bayar" value="<?php echo $total_uang_bayar; ?>" />
    </div>
  </div>
  <div class="col-md">
<!--           <div class="form-group">
            <label for="varchar">Foto Bukti <?php echo form_error('foto_bukti') ?></label>
            <input type="text" class="form-control" name="foto_bukti" id="Masukan foto_bukti" placeholder="Foto Bukti" value="<?php echo $foto_bukti; ?>" />
          </div> -->
          <div class="form-group">
            <label for="varchar">Foto Bukti ( max: 2MB dan jpg/jpeg/png ) </label> <?php echo form_error('foto_bukti') ?>
            <div class="text-danger" for="varchar"><?php  if (isset($foto)) {
              echo $foto;
            } ?></div>
            <div id="image-preview">
              <div class="fileupload-wrapper">
                <?php if ($button=='Ubah'): ?>
                  <input data-max-file-size="2M" type="file" name="foto_bukti" id="input-file-now" class="file-upload" data-default-file="<?php echo base_url('uploads/bukti/').$foto_bukti; ?>" />
                  <?php else: ?>
                    <input data-max-file-size="2M" type="file" name="foto_bukti" id="input-file-now" class="file-upload" data-default-file="<?php echo base_url('img/upload_foto.jpg'); ?>" />
                  <?php endif ?>
                </div>
              </div>
            </div>
            <div class="form-group d-none">
              <label for="int">Status  <?php echo form_error('status') ?></label>
              <!-- <input type="text" class="form-control" name="status" id="Masukan status" placeholder="Status" value="<?php echo $status; ?>" /> -->
              <select 
              required class="browser-default custom-select" name="status" id="status">
              <option value="">Pilih Status</option>
              <option  <?php if (isset($status)){ ?>
                <?php if ($status==1){ ?>
                  selected
                  <?php 
                }
              }else{?>
                selected
              <?php }
              ?> value="1">Menunggu Konfirmasi</option>
              <option <?php if (isset($status)){ ?>
                <?php if ($status==2){ ?>
                  selected
                  <?php 
                }
              }
              ?>value="2">Menunggu Pelunasan</option>
              <option <?php if (isset($status)){ ?>
                <?php if ($status==3){ ?>
                  selected
                  <?php 
                }
              }
              ?> value="3">Menunggu Konfirmasi Pelunasan</option>
              <option <?php if (isset($status)){ ?>
                <?php if ($status==4){ ?>
                  selected
                  <?php 
                }
              }
              ?>value="4">Lunas dan Selesai</option>
            </select>
          </div>      
        </div>
      </div>

      <input type="hidden" name="id_pemesanan" value="<?php echo $id_pemesanan; ?>" /> 
      <button type="submit" id="submitPemesanan" class="btn btn-primary btn-rounded"><?php echo $button ?></button> 
      <a href="<?php echo site_url('beranda/packageGedung_Aula') ?>" class="btn btn-danger btn-rounded">Batal</a>
    </form> 

  </div>
  <div class="modal-footer d-flex justify-content-center">
    <button class="btn btn-default">Login</button>
  </div>
</div>
</div>
</div>

<!-- <div class="text-center">
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalBooking">Launch
    Modal Login Form</a>
  </div> -->

