
<!-- laporan tanggal awal dan tanggal akhir -->
<script>

</script>
<!-- akhir laporan tanggal awal dan tanggal akhir -->






<script>
	









	$('#startingDate,#endingDate, #pilihLapPemesanan, #pilihLapBooking' ).change(function() {

		let pilihLap = $("input[name='pilihLaporan']:checked").val();
		console.log(pilihLap);
		
		let from_input = $('#startingDate').pickadate(),
		tanggalAwal = from_input.pickadate('picker');
		let to_input = $('#endingDate').pickadate(),
		tanggalAkhir = to_input.pickadate('picker');


if (pilihLap == 'pemesanan') {
	if (tanggalAwal.get('value')) {
		$('#formTanggalAkhir').removeClass('d-none');

    // Get the elements
  let from_input = $('#startingDate').pickadate(),
    from_picker = from_input.pickadate('picker')
  let to_input = $('#endingDate').pickadate(),
    to_picker = to_input.pickadate('picker')

  // Check if there’s a “from” or “to” date to start with and if so, set their appropriate properties.
  if (from_picker.get('value')) {
    to_picker.set('min', from_picker.get('select'));
  }
  if (to_picker.get('value')) {
    from_picker.set('max', to_picker.get('select'));
  }

  // Apply event listeners in case of setting new “from” / “to” limits to have them update on the other end. If ‘clear’ button is pressed, reset the value.
  from_picker.on('set', function (event) {
    if (event.select) {
      to_picker.set('min', from_picker.get('select'));
    } else if ('clear' in event) {
      to_picker.set('min', false);
    }
  })
  to_picker.on('set', function (event) {
    if (event.select) {
      from_picker.set('max', to_picker.get('select'));
    } else if ('clear' in event) {
      from_picker.set('max', false);
    }
  })





	}else{
		$('#formTanggalAkhir').addClass('d-none');
	}
}else if (pilihLap=='booking') {
	if (tanggalAwal.get('value')) {
		$('#formTanggalAkhir').removeClass('d-none');

    // Get the elements
  let from_input = $('#startingDate').pickadate(),
    from_picker = from_input.pickadate('picker')
  let to_input = $('#endingDate').pickadate(),
    to_picker = to_input.pickadate('picker')

  // Check if there’s a “from” or “to” date to start with and if so, set their appropriate properties.
  if (from_picker.get('value')) {
    to_picker.set('min', from_picker.get('select'));
  }
  if (to_picker.get('value')) {
    from_picker.set('max', to_picker.get('select'));
  }

  // Apply event listeners in case of setting new “from” / “to” limits to have them update on the other end. If ‘clear’ button is pressed, reset the value.
  from_picker.on('set', function (event) {
    if (event.select) {
      to_picker.set('min', from_picker.get('select'));
      to_picker.set('max', false);
    } else if ('clear' in event) {
      to_picker.set('min', false);
    }
  })
  to_picker.on('set', function (event) {
    if (event.select) {
      from_picker.set('max', to_picker.get('select'));
    } else if ('clear' in event) {
      from_picker.set('max', false);
    }
  })





	}else{
		$('#formTanggalAkhir').addClass('d-none');
	}
}


		if (tanggalAwal.get('value') && tanggalAkhir.get('value') && pilihLap) {
			dataTanggalAwal = tanggalAwal.get('value');
			dataTanggalAkhir = tanggalAkhir.get('value');

			$('#lihatLap').removeClass('d-none')

		}else{
			$('#lihatLap').addClass('d-none');
		}
});



</script>

