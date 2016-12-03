<?php

use Phalcon\Mvc\View;

class BookingController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->booking = Booking::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Booking/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
        $this->view->booking = Booking::find(["conditions" => "deleted = 'N'"]);
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
            $notify = $post;
        } else if ($post['paket'] === 'jiarah') {
            unset($post['area'], $post['route'], $post['lokasi']);
            $notify = $post;
        }

        $booking = new Booking();
        $booking->assign($post);

        $bus      = BookingHelp::bus($post['bus']);
        $driver   = BookingHelp::driver($post['driver']);
        $coDriver = BookingHelp::coDriver($post['co_driver']);
 
        if ($booking->save()) {
            if ($bus == true and $driver == true and $coDriver == true) {
                $notify = [
                    'title' => 'Success',
                    'text'  => 'Data berhasil di simpan ke database',
                    'type'  => 'success',
                ];
            } else {
                $notify = [
                    'title' => 'gagal',
                    'text'  => 'Data error di simpan ke database',
                    'type'  => 'error',
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

    public function updateAction($id)
    {
        $this->view->disable();
        $post = $this->request->getPost();

        if ($post['paket'] === 'regular') {
            unset($post['route_jiarah']);
            $notify = $post;
        } else if ($post['paket'] === 'jiarah') {
            unset($post['area'], $post['route'], $post['lokasi']);
            $notify = $post;
        }

        $booking = Booking::findFirst($id);

        BookingHelp::change(0, $booking->bus, $booking->driver, $booking->co_driver);
        BookingHelp::change(1, $post['bus'], $post['driver'], $post['co_driver']);

        $booking->assign($post);
        if ($booking->save()) {
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
            $notify = $post;
        } else if ($post['paket'] === 'jiarah') {
            unset($post['area'], $post['route'], $post['lokasi']);
            $notify = $post;
        }

        $post['success'] = 'Y';
        $booking = Booking::findFirst($id);

        BookingHelp::change(0, $booking->bus, $booking->driver, $booking->co_driver);
        BookingHelp::change(2, $post['bus'], $post['driver'], $post['co_driver']);

        $booking->assign($post);
        if ($booking->save()) {
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

    public function cencleAction()
    {
        $this->view->disable();
        $id   = $this->request->getPost('id');
        $note = $this->request->getPost('note');

        $booking = Booking::findFirst($id);
        BookingHelp::change(0, $booking->bus, $booking->driver, $booking->co_driver);
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
        BookingHelp::change(0, $booking->bus, $booking->driver, $booking->co_driver);
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
    	if ((int) $id === 1) {
    		$driver = Driver::find(["conditions" => "active = 'Y' AND deleted = 'N'"]);
    		$result = '<option value="">Pilih Driver</option>';
    		foreach ($driver as $key => $value) {
                if ($value->status == '1') { $class = 'class="bg-teal"'; } elseif ($value->status == '2') { $class = 'class="bg-yellow"'; } else { $class = ''; }

    			if ($value->id == $this->request->getPost('selected')) {
    				$result .= '<option value="' . $value->id . '" '.$class.' selected>' . $value->nama . '</option>';
    			} else {
    				$result .= '<option value="' . $value->id . '" '.$class.'>' . $value->nama . '</option>';
    			}
    		}
    	} else if ((int) $id === 2) {
    		$driver = CoDriver::find(["conditions" => "active = 'Y' AND deleted = 'N'"]);
    		$result = '<option value="">Pilih Co. Driver</option>';
    		foreach ($driver as $key => $value) {
                if ($value->status == '1') { $class = 'class="bg-teal"'; } elseif ($value->status == '2') { $class = 'class="bg-yellow"'; } else { $class = ''; }
                
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
                if ($value->status == '1') { $class = 'class="bg-teal"'; } elseif ($value->status == '2') { $class = 'class="bg-yellow"'; } else { $class = ''; }

    			if ($value->id == $this->request->getPost('selected')) {
    				$result .= '<option value="'.$value->id . '" '.$class.' selected>'.$value->ukuran.' | '.$value->nomor_polisi.'</option>';
    			} else {
    				$result .= '<option value="'.$value->id.'" '.$class.'>'.$value->ukuran.' | '.$value->nomor_polisi.'</option>';
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
        } else if ((int) $id === 6) {
            $value  = $this->request->getPost('id');
            $key    = $this->request->getPost('key');
            $harga  = LocationAndTarif::findFirst($value);
    	    $result = $harga->$key;
        }
    	return $result;
    }

}

