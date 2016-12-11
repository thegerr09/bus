<?php
/**
* class booking
*/
class BookingHelp
{
	
    public static function bus($id)
    {
        $bus = Bus::findFirst($id);
        $bus->status = 1;
        if ($bus->save()) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public static function driver($id)
    {
        $driver = Driver::findFirst($id);
        $driver->status = 1;
        if ($driver->save()) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public static function coDriver($id)
    {
        $coDriver = CoDriver::findFirst($id);
        $coDriver->status = 1;
        if ($coDriver->save()) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public static function change($check, $id_bus, $id_driver, $id_co_driver )
    {
        if (!empty($id_bus)) {
            $bus = Bus::findFirst($id_bus);
            $bus->status = $check;
            $bus->save();
        }

        if (!empty($id_driver)) {
            $driver   = Driver::findFirst($id_driver);
            $driver->status = $check;
            $driver->save();
        }

        if (!empty($id_co_driver)) {
            $coDriver = CoDriver::findFirst($id_co_driver);
            $coDriver->status = $check;
            $coDriver->save();
        }
    }

    public static function grafikOrder()
    {
        $booking = Booking::find([
            "columns" => "id, tanggal_mulai, tanggal_kembali, bus, success, dp, batal",
            "conditions" => "deleted = 'N'"
        ]);

        foreach ($booking as $key => $value) {
            $start    = new DateTime($value['tanggal_mulai']);
            $end      = new DateTime($value['tanggal_kembali']);
            $end->modify('+1 day');
            $end->format('Y-m-d');
            $interval = new DateInterval('P1D');
            $period   = new DatePeriod($start, $interval, $end);

            $data = [];
            foreach ($period as $day) {
                $data[] = [
                    'id'      => $value->id,
                    'bus'     => $value->bus,
                    'dp'      => $value->dp,
                    'batal'   => $value->batal,
                    'success' => $value->success,
                    'date'    => $day->format('Y-m-d')
                ]; 
            }
            $result[] = $data;
        }
        return $result;
    }

    public static function jurnalBayarDp($dp, $kode)
    {
        $parent = [
            'tanggal' => date('Y-m-d'),
            'kode_jurnal' => Helpers::kodeJurnal(),
            'keterangan' => 'DP BOOKING KODE ' . $kode . ' ' . date('d F Y'),
            'kantor' => 'GALATAMA 1',
            'total_debet' => $dp,
            'total_kredit' => $dp
        ];

        $jurnal = new Jurnal();
        $jurnal->assign($parent);

        if ($jurnal->save()) {
            $get_parent = $jurnal->findFirst(["conditions" => "kode_jurnal = '" . $parent['kode_jurnal'] . "'"]);
            $child_data = [
                'debet'   => [$dp, ''],
                'kredit'  => ['', $dp],
                'account' => [4, 1]
            ];

            for ($i=0; $i < 2 ; $i++) { 
                $child = [
                    'id_jurnal' => $get_parent->id,
                    'account' => $child_data['account'][$i],
                    'debet' => $child_data['debet'][$i],
                    'kredit' => $child_data['kredit'][$i]
                ];

                $jurnal_child = new JurnalChild();
                $jurnal_child->assign($child);
                if (!$jurnal_child->save()) {
                    $get_parent->delete();
                }
            }
        }
    }
    
}