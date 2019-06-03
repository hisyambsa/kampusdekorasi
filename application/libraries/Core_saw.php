<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core_saw {

	// public $variable;

	public function __construct()
	{
		
	}

	public function konversi_array($konversi,$jumlah_kriteria,$attr)
	{
		$konversi_array = array('');
		for ($i=1; $i <= $jumlah_kriteria ; $i++) {
			$attribute = $attr.$i;
			array_push($konversi_array, $attribute);
		}
		$tampung_konversi = array();
		for ($i=1; $i <= $jumlah_kriteria ; $i++) {
			$bantu_objek =  $konversi_array[$i];
			$bantu_konversi = $konversi->$bantu_objek;
			array_push($tampung_konversi, $bantu_konversi);
		}
		return $tampung_konversi;
	}

	public function cari_max($inputan,$pembanding,$jumlah_kriteria)
	{
		$hasilMax = array();
		for ($i=1; $i <= $jumlah_kriteria; $i++) {
			$max =  max($inputan['nilai_'.$i],$pembanding[$i-1]);
			array_push($hasilMax, $max);
		}
		return $hasilMax;
	}
	public function normalisasi($normalisasi,$jumlah_kriteria,$max)
	{
		$hasilNormalisasi = array();
		for ($i=0; $i < $jumlah_kriteria; $i++) {
			array_push($hasilNormalisasi, $normalisasi[$i] / $max[$i]); 
		}
		return $hasilNormalisasi;		
	}
	public function preverensi($inputan,$bobot,$jumlah_kriteria)
	{
		$tampung_bobot = array();
		foreach ($bobot as $key) {
			array_push($tampung_bobot, $key/100);
		}
		$bantuPreverensi = array();
		for ($i=0; $i < $jumlah_kriteria; $i++) { 
			array_push($bantuPreverensi, $inputan[$i] * $tampung_bobot[$i]);
		}

		$hasilPreverensi = 0;
		foreach ($bantuPreverensi as $key) {
			$hasilPreverensi = $hasilPreverensi + $key;
		}
		return $hasilPreverensi;
	}
}

/* End of file SAW_model.php */
/* Location: ./application/models/SAW_model.php */