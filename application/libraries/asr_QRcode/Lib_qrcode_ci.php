<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lib_qrcode_ci
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        // Jika error
                    // require_once "application/libraries/asr_QRcode/phpqrcode/qrlib.php";

    }
    public function core($dataContent,$namaFolder,$namaFile,$badge,$ukuran = '300x300')
    {

       $namaFile = $namaFile;
// Text content of the QRCode
       $data = $dataContent;
// QRCode size
       $size = $ukuran;
// Path to image (web or local)
       $logo = base_url().'application/libraries/asr_QRcode/assets/images/'.$badge.'.png';




// Get QR Code image from Google Chart API
// http://code.google.com/apis/chart/infographics/docs/qr_codes.html
       $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));

// START TO DRAW THE IMAGE ON THE QR CODE
       $logo = imagecreatefromstring(file_get_contents($logo));
       $QR_width = imagesx($QR);
       $QR_height = imagesy($QR);

       $logo_width = imagesx($logo);
       $logo_height = imagesy($logo);

// Scale logo to fit in the QR Code
       $logo_qr_width = $QR_width/3;
       $scale = $logo_width/$logo_qr_width;
       $logo_qr_height = $logo_height/$scale;

       imagecopyresampled($QR, $logo, $QR_width/3, $QR_height/3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

// END OF DRAW

/**
 * As this example is a plain PHP example, return
 * an image response.
 *
 * Note: you can save the image if you want.
 */
// header('Content-type: image/png');
// imagepng($QR);
// imagedestroy($QR);

// If you decide to save the image somewhere remove the header and use instead :

$savePath = $namaFolder."/".$namaFile.".png";
imagepng($QR, $savePath);

return $savePath;

}


}

/* End of file _asr_QRCODE.php */
/* Location: ./application/libraries/_asr_QRCODE.php */


?>