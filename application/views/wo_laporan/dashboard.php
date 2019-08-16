<div class="row">
	<div class="col-md-6">


		<div class="container text-center">
			<form action="<?php echo base_url('laporan/tampilLaporan') ?>" method="post">
							<fieldset class="mt-3">
				<legend class="h4">Pilih Laporan</legend>

				<div class="mt-3">
					<!-- Material unchecked -->
					<div class="form-check form-check-inline">
						<input type="radio" class="form-check-input" id="pilihLapPemesanan" name="pilihLaporan" value="pemesanan">
						<label class="form-check-label" for="pilihLapPemesanan">Pemesanan</label>
					</div>

					<!-- Material checked -->
					<div class="form-check form-check-inline">
						<input type="radio" class="form-check-input" id="pilihLapBooking" name="pilihLaporan" value="booking">
						<label class="form-check-label" for="pilihLapBooking">Pelunasan</label>
					</div>
				</div>
				<br>
				<!--Grid row-->
				<div class="row">

					<!--Grid column-->
					<div class="col-md-6 mb-4">

						<div class="md-form">
							<!--The "from" Date Picker -->
							<input placeholder="Masukan Tanggal Awal" type="text" id="startingDate" class="form-control datepicker" name="tanggalAwal">
							<label for="startingDate">Tanggal Awal</label>
						</div>

					</div>
					<!--Grid column-->

					<!--Grid column-->
					<div class="col-md-6 mb-4 d-none" id="formTanggalAkhir">

						<div class="md-form">
							<!--The "to" Date Picker -->
							<input placeholder="Masukan Tanggal Akhir" type="text" id="endingDate" class="form-control datepicker"  name="tanggalAkhir">
							<label for="endingDate">Tanggal Akhir</label>
						</div>

					</div>
					<!--Grid column-->

				</div>
				<!--Grid row-->

				<button type="submit" class="btn btn-secondary btn-rounded d-none" id="lihatLap">Lihat</button>


			</fieldset>
			</form>

		</div>


		
	</div>
	<div class="col-md-6">
		<!-- Card -->
		<div class="card">

			<!-- Card image -->
			<a href="test">
				<img class="card-img-top" src="<?php echo base_url('img/laporan/dashboard_2.jpg') ?>" alt="Card image cap">
			</a>

			<!-- Card content -->
			<div class="card-body">

				<!-- Title -->
				<h4 class="card-title text-center"><a>Laporan Kampus Dekorasi</a></h4>
			</div>

		</div>
		<!-- Card -->






	</div>
</div>