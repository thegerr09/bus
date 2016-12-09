<?php
/**
* Class Helpers
*/
class Helpers
{


	public function number($number)
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

    public static function viewGrafik($tgl, $id)
    {
    	$data = BookingHelp::grafikOrder();
    	$result = 'class="cursor" data-toggle="modal" data-target="#New"';
		for ($i = 0; $i < count($data); $i++) { 
			for ($a = 0; $a < count($data[$i]); $a++) { 
				if ($data[$i][$a]['date'] == $tgl and $data[$i][$a]['bus'] == $id) {
					if ($data[$i][$a]['batal'] == 'N' and $data[$i][$a]['success'] == 'N' and $data[$i][$a]['dp'] > 0) {
						$result = 'class="bg-blue cursor" data-toggle="modal" data-target="#Booking" onclick="next('.$data[$i][$a]['id'].')"';
					} else if ($data[$i][$a]['batal'] == 'N' and $data[$i][$a]['success'] == 'N') {
						$result = 'class="bg-teal cursor" data-toggle="modal" data-target="#Booking" onclick="next('.$data[$i][$a]['id'].')"';
					} else if ($data[$i][$a]['batal'] == 'N' and $data[$i][$a]['success'] == 'Y') {
						$result = 'class="bg-green cursor"';
					}
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

	public static function tagAccount()
	{
   		$header = Account::find(["conditions" => "deleted = 'N'"]);
		$tag 	= '<option value="">Pilih account</option>';
   		foreach ($header as $key => $value) {
			$tag .= '<option value="' . $value->id . '">' . $value->account . '</option>';
   		}
        return $tag;
	}

}