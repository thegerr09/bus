<?php
/**
* class booking
*/
class BookingHelp
{

    /**
     * [change description]
     * @param  [type] $check        [description]
     * @param  [type] $id_bus       [description]
     * @param  [type] $id_driver    [description]
     * @param  [type] $id_co_driver [description]
     * @return [type]               [description]
     */
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

    /**
     * [grafikOrder description]
     * @return [type] [description]
     */
    public static function grafikOrder()
    {
        $booking = Booking::find([
            "columns" => "id, nama, kode, tanggal_mulai, tanggal_kembali, bus, success, invoice, dp, batal",
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
                    'kode'    => $value->kode,
                    'nama'    => $value->nama,
                    'dp'      => $value->dp,
                    'batal'   => $value->batal,
                    'success' => $value->success,
                    'invoice' => $value->invoice,
                    'date'    => $day->format('Y-m-d')
                ]; 
            }
            $result[] = $data;
        }
        return $result;
    }

    /**
     * [jurnalBayarDp description]
     * @param  [type] $dp   [description]
     * @param  [type] $kode [description]
     * @return [type]       [description]
     */
    public static function jurnalBayarDp($dp, $kode)
    {
        $parent = [
            'tanggal' => date('Y-m-d'),
            'kode_jurnal' => Helpers::kodeJurnal(),
            'keterangan' => 'DP BOOKING KODE ' . $kode,
            'kantor' => 'GALATAMA 1',
            'total_debet' => $dp,
            'total_kredit' => $dp
        ];
        $remove = Jurnal::find(["conditions" => "keterangan = 'DP BOOKING KODE $kode'"]);
        $remove->delete();
        $jurnal = new Jurnal();
        $jurnal->assign($parent);

        if ($jurnal->save()) {
            $get_parent = $jurnal->findFirst(["conditions" => "kode_jurnal = '" . $parent['kode_jurnal'] . "'"]);
            $child_data = [
                'debet'   => [$dp, ''],
                'kredit'  => ['', $dp],
                'account' => [5, 1]
            ];

            for ($i=0; $i < 2 ; $i++) { 
                $child = [
                    'id_jurnal' => $get_parent->id,
                    'tanggal' => date('Y-m-d'),
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

    /**
     * [jurnalBayarDp description]
     * @param  [type] $dp   [description]
     * @param  [type] $kode [description]
     * @return [type]       [description]
     */
    public static function jurnalBayarDpChange($dp, $kode)
    {
        $parent = [
            'tanggal' => date('Y-m-d'),
            'kantor' => 'GALATAMA 1',
            'total_debet' => $dp,
            'total_kredit' => $dp
        ];
        $jurnal = Jurnal::findFirst(["conditions" => "keterangan = 'DP BOOKING KODE $kode'"]);
        $jurnal->assign($parent);

        if ($jurnal->save()) {
            $get_parent = Jurnal::findFirst(["conditions" => "keterangan = 'DP BOOKING KODE $kode'"]);
            $child_data = [
                'debet'   => [$dp, ''],
                'kredit'  => ['', $dp],
                'account' => [5, 1]
            ];

            $remove = JurnalChild::find(["conditions" => "id_jurnal = '$get_parent->id'"]);
            $remove->delete();

            for ($i=0; $i < 2 ; $i++) { 
                $child = [
                    'id_jurnal' => $get_parent->id,
                    'tanggal' => date('Y-m-d'),
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

    /**
     * [jurnalBayarPelunasan description]
     * @param  [type] $pelunasan [description]
     * @param  [type] $kode      [description]
     * @return [type]            [description]
     */
    public static function jurnalBayarPelunasan($pelunasan, $kode)
    {
        $parent = [
            'tanggal' => date('Y-m-d'),
            'kode_jurnal' => Helpers::kodeJurnal(),
            'keterangan' => 'PELUNASAN BOOKING KODE ' . $kode,
            'kantor' => 'GALATAMA 1',
            'total_debet' => $pelunasan,
            'total_kredit' => $pelunasan
        ];

        $jurnal = new Jurnal();
        $jurnal->assign($parent);

        if ($jurnal->save()) {
            $get_parent = $jurnal->findFirst(["conditions" => "kode_jurnal = '" . $parent['kode_jurnal'] . "'"]);
            $child_data = [
                'debet'   => [$pelunasan, ''],
                'kredit'  => ['', $pelunasan],
                'account' => [5, 2]
            ];

            for ($i=0; $i < 2 ; $i++) { 
                $child = [
                    'id_jurnal' => $get_parent->id,
                    'tanggal' => date('Y-m-d'),
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

    /**
     * [biayaCost description]
     * @param  [type] $kode   [description]
     * @param  [type] $cost   [description]
     * @param  [type] $satuan [description]
     * @param  [type] $harga  [description]
     * @param  [type] $jumlah [description]
     * @return [type]         [description]
     */
    public static function biayaCost($kode, $cost, $satuan, $persen, $harga, $jumlah)
    {
        $cost_delete = Cost::find("kode = '$kode'");
        $cost_delete->delete();
        for ($i = 0; $i < count($satuan); $i++) { 
            $cost_db = new Cost();
            $cost_db->kode = $kode;
            $cost_db->cost = $cost[$i];
            $cost_db->satuan = $satuan[$i];
            $cost_db->persen = $persen[$i];
            $cost_db->harga_satuan = $harga[$i];
            $cost_db->jumlah = $jumlah[$i];
            $cost_db->save();
        }
    }

    /**
     * [extraCharge description]
     * @param  [type] $kode   [description]
     * @param  [type] $charge [description]
     * @param  [type] $biaya  [description]
     * @return [type]         [description]
     */
    public static function extraCharge($kode, $charge, $biaya)
    {
        $charge_delete = Charge::find("kode = '$kode'");
        $charge_delete->delete();
        for ($i = 0; $i < count($charge); $i++) { 
            $charge_db = new Charge();
            $charge_db->kode = $kode;
            $charge_db->charge = $charge[$i];
            $charge_db->biaya = $biaya[$i];
            $charge_db->save();
        }
    }

    
}