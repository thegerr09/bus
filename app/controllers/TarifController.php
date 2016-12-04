<?php

use Phalcon\Mvc\View;

class TarifController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->tarif    = Tarif::find(["conditions"    => "deleted = 'N'"]);
        $this->view->route    = Route::find(["conditions"    => "deleted = 'N'"]);
        $this->view->jiarah   = Jiarah::find(["conditions"   => "deleted = 'N'"]);
        $this->view->overland = Overland::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Tarif/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function routeAction()
    {
    	$this->view->route = Route::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Tarif/listRoute");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function tarifAction()
    {
    	$this->view->tarif = Tarif::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Tarif/listTarif");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function overlandJiarahAction($check)
    {
        if ($check === 'overland') {
            $this->view->overland = Overland::find(["conditions" => "deleted = 'N'"]);
            $this->view->pick("Tarif/listOverland");
            $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
        } else {
            $this->view->jiarah = Jiarah::find(["conditions" => "deleted = 'N'"]);
            $this->view->pick("Tarif/listJiarah");
            $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
        }
        
    }

    public function inputRouteAction()
    {
        $this->view->disable();
        $data = $this->request->getPost();

        $route = new Route();
        $route->assign($data);
        if ($route->save()) {
            $notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di simpan ke database',
                'type'    => 'success'
            ];
        } else {
            $messages = $route->getMessages();
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

    public function InputOverlandJiarahAction($check)
    {
        $this->view->disable();
        $data = $this->request->getPost();

        if ($check === 'overland') {
            $overland = new Overland();
            $overland->assign($data);
            if ($overland->save()) {
                $notify = [
                    'title'   => 'Success',
                    'text'    => 'Data berhasil di simpan ke database',
                    'type'    => 'success',
                    'check'   => 'overland'
                ];
            } else {
                $messages = $overland->getMessages();
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
        } else if ($check === 'jiarah') {
            $jiarah = new Jiarah();
            $jiarah->assign($data);
            if ($jiarah->save()) {
                $notify = [
                    'title'   => 'Success',
                    'text'    => 'Data berhasil di simpan ke database',
                    'type'    => 'success',
                    'check'   => 'jiarah'
                ];
            } else {
                $messages = $jiarah->getMessages();
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
        }
        

        return json_encode($notify);
    }

    public function updateRouteAction($id)
    {
        $this->view->disable();
        $data = $this->request->getPost();

        $route = Route::findFirst($id);
        $route->assign($data);
        if ($route->save()) {
            $notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di simpan ke database',
                'type'    => 'success',
                'close'	  => 1
            ];
        } else {
            $messages = $route->getMessages();
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

    public function deleteRouteAction()
    {
        $this->view->disable();
        $id = $this->request->getPost('id');

        $route = Route::findFirst($id);
        $route->deleted = 'Y';
        if ($route->save()) {
            $notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di simpan ke database',
                'type'    => 'success',
                'id'	  => $id
            ];
        } else {
            $messages = $route->getMessages();
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

    public function inputTarifAction()
    {
        $this->view->disable();
        $data = $this->request->getPost();

        $route = new LocationAndTarif();
        $route->assign($data);
        if ($route->save()) {
            $notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di simpan ke database',
                'type'    => 'success'
            ];
        } else {
            $messages = $route->getMessages();
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

    public function updateTarifAction($id)
    {
        $this->view->disable();
        $data = $this->request->getPost();

        $route = LocationAndTarif::findFirst($id);
        $route->assign($data);
        if ($route->save()) {
            $notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di simpan ke database',
                'type'    => 'success'
            ];
        } else {
            $messages = $route->getMessages();
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

    public function deleteTarifAction()
    {
        $this->view->disable();
        $id = $this->request->getPost('id');

        $route = LocationAndTarif::findFirst($id);
        $route->deleted = 'Y';
        if ($route->save()) {
            $notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di simpan ke database',
                'type'    => 'success',
                'id'	  => $id
            ];
        } else {
            $messages = $route->getMessages();
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

    public function detailAction()
    {
        $this->view->disable();
        $type = $this->request->getPost('type');
        
        if ($type == 'route') {
            $id     = $this->request->getPost('id');
            $result = Route::findFirst($id);
        } else {
            $id     = $this->request->getPost('id');
            $result = LocationAndTarif::findFirst($id);
        }
        
        return json_encode($result);
    }

    public function routeListAction($area)
    {
        $this->view->disable();
        $route = Route::find(["conditions" => "area LIKE '%$area%' AND deleted = 'N'"]);
        $tag   = '<option value="">Pilih Route</option>';
        foreach ($route as $value) {
            $tag .= '<option value="' . $value->id . '">' . $value->asal . ' | ' . $value->tujuan . '</option>';
        }
        return $tag;
    }

}

