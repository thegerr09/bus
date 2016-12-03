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

}