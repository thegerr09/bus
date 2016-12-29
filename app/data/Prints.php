<?php
/**
 * Prints
 */
class Prints
{

	public static function TujuanRegular($route_id, $lokasi_id)
	{
		$route = Route::findFirst($route_id);
		$lokasi = LocationAndTarif::findFirst($lokasi_id);

		return $route->asal . '/' . $route->tujuan . ' | ' . $lokasi->location;
	}

	public static function Bus($id)
	{
		$bus = Bus::findFirst($id);
		return $bus;
	}

	public static function BusCount($nama, $bus, $tgl)
	{
		$booking = Booking::find(["conditions" => "nama = '$nama' AND type_bus = '$bus' AND tanggal_mulai = '$tgl'"]);
		$no = 0;
		foreach ($booking as $key => $value) {
			$no++;
		}
		return $no;
	}

	public static function KodeBooking($nama, $tgl)
	{
		$booking = Booking::find(["conditions" => "nama = '$nama' AND tanggal_mulai = '$tgl'"]);
		$kode = '| ';
		foreach ($booking as $key => $value) {
			$kode .= $value->kode . ' | ';
		}
		return $kode;
	}

	public static function tanggakHari($tanggal)
	{
		$hari  = ['Sun' => 'Mingggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => 'Jum`at', 'Sat' => 'Sabtu'];
		$days  = date('D', strtotime($tanggal));
		$day   = date('d', strtotime($tanggal));
		$month = date('F', strtotime($tanggal));
		$years = date('Y', strtotime($tanggal));

		return $hari[$days] . ', ' . $day . ' ' . $month . ' ' . $years;
	}

	public static function Driver($id, $check)
	{
		if ($check === 'driver') {
			$driver = Driver::findFirst($id);
			$result = $driver->nama;
		} else if ($check === 'coDriver') {
			$co_driver = CoDriver::findFirst($id);
			$result = $co_driver->nama;
		} else {
			$result = '-';
		}
		return $result;
	}

	public static function Cost($id)
	{
		$cost = Cost::find(["conditions" => "kode = '$id'"]);
		return $cost;
	}

	public static function account($id)
	{
		$result = Account::findFirst($id);
		return $result;
	}

	public static function listAccount()
	{
		$result = Account::find(["conditions" => "deleted = 'N'"]);
		return json_encode($result);
	}
}