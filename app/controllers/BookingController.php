<?php

use Phalcon\Mvc\View;

class BookingController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("Booking/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function dataAction($id)
    {
    	if ((int) $id === 1) {
    		$driver = Driver::find(["conditions" => "active = 'Y' AND deleted = 'N'"]);
    		$result = '<option value="">Pilih Driver</option>';
    		foreach ($driver as $key => $value) {
    			if ($value->id == $this->request->getPost('selected')) {
    				$result .= '<option value="' . $value->id . '" selected>' . $value->nama . '</option>';
    			} else {
    				$result .= '<option value="' . $value->id . '">' . $value->nama . '</option>';
    			}
    		}
    	} else if ((int) $id === 2) {
    		$driver = CoDriver::find(["conditions" => "active = 'Y' AND deleted = 'N'"]);
    		$result = '<option value="">Pilih Co. Driver</option>';
    		foreach ($driver as $key => $value) {
    			if ($value->id == $this->request->getPost('selected')) {
    				$result .= '<option value="' . $value->id . '" selected>' . $value->nama . '</option>';
    			} else {
    				$result .= '<option value="' . $value->id . '">' . $value->nama . '</option>';
    			}
    		}
    	} else if ((int) $id === 3) {
    		$ukuran = $this->request->getPost('ukuran');
    		$driver = Bus::find(["conditions" => "ukuran = '$ukuran' AND active = 'Y' AND deleted = 'N'"]);
    		$result = '<option value="">Pilih Bus</option>';
    		foreach ($driver as $key => $value) {
    			if ($value->status == '1') { $class = 'class="bg-warning" disabled'; }
    			if ($value->kondisi == 'Y') { $class = 'class="bg-danger" disabled'; }

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
    	}
    	return $result;
    }

}

