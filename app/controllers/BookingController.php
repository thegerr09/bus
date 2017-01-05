<?php

use Phalcon\Mvc\View;

class BookingController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->booking = Booking::find(["conditions" => "invoice = 'N' AND deleted = 'N'"]);
        $this->view->pick("Booking/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
        $this->view->booking = Booking::find(["conditions" => "invoice = 'N' AND deleted = 'N'"]);
        $this->view->pick("Booking/list");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function inputAction()
    {
        $this->view->disable();
        $post = $this->request->getPost();

        $post['kode'] = Helpers::kodeBooking();

        if ($post['paket'] === 'regular') {
            unset($post['route_jiarah']);
        } else if ($post['paket'] === 'jiarah') {
            unset($post['area'], $post['route'], $post['lokasi']);
        }

        $booking = new Booking();
        $booking->assign($post);
 
        if ($booking->save()) {
            $arrayPelanggan = [
                'nama' => $post['nama'],
                'telp' => $post['telpon'],
                'tipe_pelanggan' => $post['type_booking']
            ];
            BookingHelp::pelanggan($arrayPelanggan);
            if (isset($post['dp'])) {
                BookingHelp::jurnalBayarDp($post['dp'], $post['kode']);
            }
            $notify = [
                'title' => 'Success',
                'text'  => 'Data berhasil di simpan ke database',
                'type'  => 'success',
            ];
        } else {
            $messages = $booking->getMessages();
            $m = '';
            foreach ($messages as $message) {
                $m .= "$message <br/>";
            }
            $notify = [
                'title' => 'Errors',
                'text'  => $m,
                'type'  => 'error'
            ];
        }
        return json_encode($notify);
    }

    public function updateAction($id)
    {
        $this->view->disable();
        $post = $this->request->getPost();

        if ($post['paket'] === 'regular') {
            unset($post['route_jiarah']);
        } else if ($post['paket'] === 'jiarah') {
            unset($post['area'], $post['route'], $post['lokasi']);
        }

        $booking = Booking::findFirst($id);
        $kode = $booking->kode;
        $booking->assign($post);
        if ($booking->save()) {
            if (isset($post['dp'])) {
                BookingHelp::jurnalBayarDpChange($post['dp'], $kode);
            }
            $notify = [
                'title' => 'Success',
                'text'  => 'Data berhasil di simpan ke database',
                'type'  => 'success',
                'close' => 1
            ];
        } else {
            $messages = $booking->getMessages();
            $m = '';
            foreach ($messages as $message) {
                $m .= "$message <br/>";
            }
            $notify = [
                'title' => 'Errors',
                'text'  => $m,
                'type'  => 'error'
            ];
        }
        return json_encode($notify);
    }

    public function nextAction($id)
    {
        $this->view->disable();
        $post = $this->request->getPost();

        if ($post['paket'] === 'regular') {
            unset($post['route_jiarah']);
        } else if ($post['paket'] === 'jiarah') {
            unset($post['area'], $post['route'], $post['lokasi']);
        }
        
        $post['success'] = 'Y';
        $booking = Booking::findFirst($id);
        $post['kode'] = $booking->kode;

        BookingHelp::biayaCost($post['kode'], $post['name_cost'], $post['satuan'], $post['persen'], $post['harga_satuan'], $post['jumlah']);
        BookingHelp::extraCharge($post['kode'], $post['name_charge'], $post['biaya_charge']);
        BookingHelp::jurnalBayarPelunasan($post['pelunasan'], $post['kode']);
        
        $booking->assign($post);
        if ($booking->save()) {
            $post['success'] = 'N';
            $invoice = new Invoice();
            $invoice->assign($post);
            if ($invoice->save()) {
                $notify = [
                    'title' => 'Success',
                    'text'  => 'Data berhasil di simpan ke database',
                    'type'  => 'success',
                    'close' => 1
                ];
            } else {
                $messages = $invoice->getMessages();
                $m = '';
                foreach ($messages as $message) {
                    $m .= "$message <br/>";
                }
                $notify = [
                    'title' => 'Errors',
                    'text'  => $m,
                    'type'  => 'error'
                ];
            }
        } else {
            $messages = $booking->getMessages();
            $m = '';
            foreach ($messages as $message) {
                $m .= "$message <br/>";
            }
            $notify = [
                'title' => 'Errors',
                'text'  => $m,
                'type'  => 'error'
            ];
        }
        return json_encode($notify);
    }

    public function cencleAction()
    {
        $this->view->disable();
        $id   = $this->request->getPost('id');
        $note = $this->request->getPost('note');

        $booking = Booking::findFirst($id);
        $kode = $booking->kode;
        $booking->note = $note;
        $booking->batal = 'Y';
        if ($booking->save()) {
            $notify = [
                'title' => 'Cencle ' . $kode,
                'text'  => 'kode ' . $kode . ' batal Booking',
                'type'  => 'error',
                'id' => $id
            ];
        } else {
            $messages = $booking->getMessages();
            $m = '';
            foreach ($messages as $message) {
                $m .= "$message <br/>";
            }
            $notify = [
                'title' => 'Errors',
                'text'  => $m,
                'type'  => 'error'
            ];
        }
        return json_encode($notify);
    }

    public function deleteAction()
    {
        $this->view->disable();
        $id = $this->request->getPost('id');

        $booking = Booking::findFirst($id);
        $kode = $booking->kode;
        $booking->deleted = 'Y';
        if ($booking->save()) {
            $notify = [
                'title' => 'Delete ' . $kode,
                'text'  => 'kode ' . $kode . ' batal Booking',
                'type'  => 'error',
                'id' => $id
            ];
        } else {
            $messages = $booking->getMessages();
            $m = '';
            foreach ($messages as $message) {
                $m .= "$message <br/>";
            }
            $notify = [
                'title' => 'Errors',
                'text'  => $m,
                'type'  => 'error'
            ];
        }
        return json_encode($notify);
    }

    public function detailAction($id)
    {
        $this->view->disable();
        $booking = Booking::findFirst($id);
        return json_encode($booking);
    }

    public function dataAction($id)
    {
        $this->view->disable();
    	if ((int) $id === 1) {
            $bentuk = $this->request->getPost('bentuk');
            if ($bentuk == '1') {
                $driver = Driver::findFirst($this->request->getPost('selected'));
                return $driver->nama;
            }
    		$driver = Driver::find(["conditions" => "active = 'Y' AND deleted = 'N'"]);
    		$result = '<option value="">Pilih Driver</option>';
            foreach ($driver as $key => $value) {
                $class = '';
                // if ($value->status == '1') { $class = 'class="bg-teal"'; } elseif ($value->status == '2') { $class = 'class="bg-yellow"'; } else { $class = ''; }

                if ($value->id == $this->request->getPost('selected')) {
                    $result .= '<option value="' . $value->id . '" '.$class.' selected>' . $value->nama . '</option>';
                } else {
                    $result .= '<option value="' . $value->id . '" '.$class.'>' . $value->nama . '</option>';
                }
            }
        } else if ((int) $id === 2) {
            $bentuk = $this->request->getPost('bentuk');
            if ($bentuk == '1') {
                $driver = CoDriver::findFirst($this->request->getPost('selected'));
                return $driver->nama;
            }
            $driver = CoDriver::find(["conditions" => "active = 'Y' AND deleted = 'N'"]);
            $result = '<option value="">Pilih Co. Driver</option>';
            foreach ($driver as $key => $value) {
                $class = '';
                // if ($value->status == '1') { $class = 'class="bg-teal"'; } elseif ($value->status == '2') { $class = 'class="bg-yellow"'; } else { $class = ''; }
                
    			if ($value->id == $this->request->getPost('selected')) {
    				$result .= '<option value="' . $value->id . '" '.$class.' selected>' . $value->nama . '</option>';
    			} else {
    				$result .= '<option value="' . $value->id . '" '.$class.'>' . $value->nama . '</option>';
    			}
    		}
    	} else if ((int) $id === 3) {
    		$ukuran = $this->request->getPost('ukuran');
    		$driver = Bus::find(["conditions" => "ukuran = '$ukuran' AND active = 'Y' AND deleted = 'N'"]);
    		$result = '<option value="">Pilih Bus</option>';
    		foreach ($driver as $key => $value) {
                if ($value->kondisi == 'Y') { $class = 'class="bg-red" disabled'; } else { $class = ''; }
                // if ($value->status == '1') { $class = 'class="bg-teal"'; } elseif ($value->status == '2') { $class = 'class="bg-yellow"'; } else { $class = ''; }

    			if ($value->id == $this->request->getPost('selected')) {
    				$result .= '<option value="'.$value->id . '" '.$class.' selected>'.strtoupper($value->ukuran).' | '.$value->nomor_polisi.'</option>';
    			} else {
    				$result .= '<option value="'.$value->id.'" '.$class.'>'.strtoupper($value->ukuran).' | '.$value->nomor_polisi.'</option>';
    			}
    		}
    	} else if ((int) $id === 4) {
    		$area = $this->request->getPost('area');
    		$driver = Route::find(["conditions" => "area = '$area' AND deleted = 'N'"]);
    		$result = '<option value="">Pilih Route</option>';
    		foreach ($driver as $key => $value) {
    			if ($value->id == $this->request->getPost('selected')) {
    				$result .= '<option value="' . $value->id . '" selected>' . $value->asal . ' | ' . $value->tujuan . '</option>';
    			} else {
    				$result .= '<option value="' . $value->id . '">' . $value->asal . ' | ' . $value->tujuan . '</option>';
    			}
    		}
    	} else if ((int) $id === 5) {
            $paket = $this->request->getPost('paket');

            if ($paket === 'regular') {
                $lokasi = $this->request->getPost('lokasi');
        		$driver = LocationAndTarif::find(["conditions" => "route_id = '$lokasi' AND deleted = 'N'"]);
        		$result = '<option value="">Pilih Lokasi</option>';
        		foreach ($driver as $key => $value) {
        			if ($value->id == $this->request->getPost('selected')) {
        				$result .= '<option value="' . $value->id . '" selected>' . $value->location . '</option>';
        			} else {
        				$result .= '<option value="' . $value->id . '">' . $value->location . '</option>';
        			}
        		}
            } else if ($paket === 'jiarah') {
                $driver = Jiarah::find(["conditions" => "deleted = 'N'"]);
                $result = '<option value="">Pilih Route Jiarah</option>';
                foreach ($driver as $key => $value) {
                    if ($value->id == $this->request->getPost('selected')) {
                        $result .= '<option value="' . $value->id . '" selected>' . $value->asal . '/' . $value->tujuan . '</option>';
                    } else {
                        $result .= '<option value="' . $value->id . '">' . $value->asal . '/' . $value->tujuan . '</option>';
                    }
                }
            }
        } else if ((int) $id === 6) {
            $value  = $this->request->getPost('id');
            $key    = $this->request->getPost('key');
            $paket  = $this->request->getPost('paket');

            if ($paket === 'regular') {
                $harga  = LocationAndTarif::findFirst($value);
        	    $result = $harga->$key;
            } else if ($paket === 'jiarah') {
                $harga  = Jiarah::findFirst($value);
                $result = $harga->harga;
            }
            
        }
    	return $result;
    }

}

