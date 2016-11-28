<?php
/**
* Class Helpers
*/
class Helpers
{


	public function number($number)
	{
		return number_format($number, 0, '.', '.');
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
        for ($i = 0; $i < 5; $i++) {
            $kode .= $char[rand(0, $lengthChar - 1)];
        }
        return $kode;
	}

}