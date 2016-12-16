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

		return 'Route ' . $route->asal . '/' . $route->tujuan . ' | lokasi ' . $lokasi->location;
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

}