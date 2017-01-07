<?php
/**
* Class Helpers
*/
class Helpers
{

	public static function dateChange($date)
	{
		return date("d F Y", strtotime($date));
	}

	public static function number($number)
	{
		if (!empty($number)) {
			return number_format($number, 0, '.', '.');
		} else {
			return 0;
		}
	}

	public static function randomNameImage()
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randstring = date('Y-m-d');
	    for ($i = 0; $i < 10; $i++) {
	        $randstring .= $characters[rand(0, strlen($characters))];
	    }
	    return $randstring;
	}

	public static function tagSetting($name, $lable, $selected)
	{
		$setting 	  = Setting::findFirst("name = '$name'");
		$settingArray = json_decode($setting->setting);
		$tag 		  = '<option value="">' . $lable . '</option>';
		foreach ($settingArray as $key => $value) {
			if ($key == $selected) {
				$tag .= '<option value="' . $key . '" selected>' . $value . '</option>';
			} else {
				$tag .= '<option value="' . $key . '">' . $value . '</option>';
			}
		}
		return $tag;
	}

	public static function setting($name)
	{
		$setting = Setting::findFirst("name = '$name'");
		$result = json_decode($setting->setting);
		return $result;
	}

	public static function area()
	{
		$setting = Setting::findFirst("name = 'area'");
		return (array) json_decode($setting->setting);
	}

	public static function areaJson()
	{
		$setting = Setting::findFirst("name = 'area'");
		return $setting->setting;
	}

	public static function kodeBooking()
	{
        $char       = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lengthChar = strlen($char);
        $kode 		= '';
        for ($i = 0; $i < 6; $i++) {
            $kode .= $char[rand(0, $lengthChar - 1)];
        }
        return $kode . date('dm');
	}

	public static function nomorPolisi($id)
	{
		$bus = Bus::findFirst($id);
		return $bus->nomor_polisi;
	}

    public static function viewGrafik($tgl, $id, $ukuran)
    {
    	$data = BookingHelp::grafikOrder();
    	$result = 'class="cursor" data-toggle="modal" data-target="#Booking" onclick="close_action('."'".$tgl."',"."'".$id."',"."'".$ukuran."'".')"';
		for ($i = 0; $i < count($data); $i++) { 
			for ($a = 0; $a < count($data[$i]); $a++) { 
				if ($data[$i][$a]['date'] == $tgl and $data[$i][$a]['bus'] == $id) {
					if ($data[$i][$a]['invoice'] == 'Y') {
						$result = 'align="center" class="bg-green"';
					} else if ($data[$i][$a]['batal'] == 'N' and $data[$i][$a]['success'] == 'N') {
						$result = 'align="center" class="bg-teal" data-toggle="modal" data-target="#ChechBooking" onclick="checkBooking('."'".$data[$i][$a]['tanggal_mulai']."'".', '."'".$data[$i][$a]['tanggal_kembali']."'".')"';
					} else if ($data[$i][$a]['batal'] == 'N' and $data[$i][$a]['success'] == 'Y') {
						$result = 'align="center" class="bg-blue" data-toggle="modal" data-target="#Booking" onclick="carback('."'".$data[$i][$a]['kode']."'".')"';
					}
					break;
				}
			}
		}
        return $result;
    }

    public static function viewGrafikName($tgl, $id)
    {
    	$data = BookingHelp::grafikOrder();
    	$result = '';
		for ($i = 0; $i < count($data); $i++) { 
			for ($a = 0; $a < count($data[$i]); $a++) { 
				if ($data[$i][$a]['date'] == $tgl and $data[$i][$a]['bus'] == $id and $data[$i][$a]['invoice'] == 'Y') {
					$result .= '<a data-toggle="modal" data-target="#Detail" onclick="detail('."'".$data[$i][$a]['kode']."'".')"';
					$result .= ' class="btn btn-warning btn-xs">';
					$result .= '<i class="fa fa-bars" data-toggle="tooltip" data-placement="top" title="Lihat Detail"></i></a><br> (s) ';
					$result .= '<span class="cursor">'.$data[$i][$a]['nama'].'</span>';
					break;
				} else if ($data[$i][$a]['date'] == $tgl and $data[$i][$a]['bus'] == $id and $data[$i][$a]['success'] == 'Y') {
					$result .= '<a href="GrafikOrder/printInvoice/'.$data[$i][$a]['kode'].'" target="_blank" class="btn btn-success btn-xs"';
					$result .= ' data-toggle="tooltip" data-placement="top" title="Print Invoice Pelunasan">';
					$result .= '<i class="fa fa-print"></i></a>&nbsp;';
					$result .= '<a href="GrafikOrder/printSpt/'.$data[$i][$a]['kode'].'" target="_blank" class="btn bg-teal btn-xs"';
					$result .= ' data-toggle="tooltip" data-placement="top" title="Print SPT dan Pengeluaran">';
					$result .= '<i class="fa fa-print"></i></a><br> (p) ';
					$result .= '<span class="cursor">'.$data[$i][$a]['nama'].'</span>';
					break;
				}else if ($data[$i][$a]['date'] == $tgl and $data[$i][$a]['bus'] == $id) {
					$result .= '<a href="GrafikOrder/printBooking/'.$data[$i][$a]['id'].'" target="_blank" class="btn btn-default btn-xs"';
					$result .= ' data-toggle="tooltip" data-placement="top" title="Print Nota Booking">';
					$result .= '<i class="fa fa-print"></i></a><br> (b) ';
					$result .= '<span class="cursor">'.$data[$i][$a]['nama'].'</span>';
					break;
				}
			}
		}
        return $result;
    }

   	public function tagHeader()
   	{
   		$header = Header::find(["conditions" => "deleted = 'N'"]);
		$tag 	= '<option value="">Pilih Header</option>';
   		foreach ($header as $key => $value) {
			$tag .= '<option value="' . $value->id . '">' . $value->header . '</option>';
   		}
        return $tag;
   	}

	public static function tagAccount($selected = null)
	{
   		$header = Account::find(["conditions" => "deleted = 'N'"]);
		$tag 	= '<option value="">Pilih account</option>';
   		foreach ($header as $key => $value) {
   			if ($selected == $value->id) {
				$tag .= '<option value="' . $value->id . '" selected>' . $value->account . '</option>';
   			}else{
				$tag .= '<option value="' . $value->id . '">' . $value->account . '</option>';
   			}
   		}
        return $tag;
	}

	public static function kodeJurnal()
	{
        $char       = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lengthChar = strlen($char);
        $kode 		= '';
        for ($i = 0; $i < 4; $i++) {
            $kode .= $char[rand(0, $lengthChar - 1)];
        }
        return $kode . date('dmy');
	}

	public static function tglPenting($tgl)
	{
		$begin = new DateTime( date('Y-m-d') );
		$end = new DateTime( $tgl );
		$end = $end->modify( '+1 day' ); 

		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval ,$end);

		$no = 0;
		foreach($daterange as $date){
		    $no = $no + 1;
		}

		if ($no <= 30 && $no > 1) {
			$result = 'bus2.jpg';
		} else if ($no === 1) {
			$result = 'bus3.jpg';
		} else if ($no === 0) {
			$result = 'bus4.jpg';
		} else {
			$result = 'bus.png';
		}

		return $result;
	}
}