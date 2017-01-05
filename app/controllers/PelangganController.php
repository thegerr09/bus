<?php

use Phalcon\Mvc\View;

class PelangganController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->pelanggan = Pelanggan::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Pelanggan/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
    	$this->view->pelanggan = Pelanggan::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Pelanggan/list");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function inputAction()
    {
    	$this->view->disable();
    	$post = $this->request->getPost();
    	
    	$pelanggan = new Pelanggan();
    	$pelanggan->assign($post);

    	if ($pelanggan->save()) {
    		$notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di simpan ke database',
                'type'    => 'success'
            ];
    	} else {
    		$messages = $pelanggan->getMessages();
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
    	
    	$pelanggan = Pelanggan::findFirst($id);
    	$pelanggan->assign($post);

    	if ($pelanggan->save()) {
    		$notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di simpan ke database',
                'type'    => 'success',
                'close'   => 1
            ];
    	} else {
    		$messages = $pelanggan->getMessages();
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

    public function deletedAction($id)
    {
    	$this->view->disable();
    	$pelanggan = Pelanggan::findFirst($id);
    	$pelanggan->deleted = 'Y';

    	if ($pelanggan->save()) {
    		$notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di hapus dari database',
                'type'    => 'success',
                'close'   => 1,
                'id'   	  => $id
            ];
    	} else {
    		$messages = $pelanggan->getMessages();
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
    	$pelanggan = Pelanggan::findFirst($id);
    	return json_encode($pelanggan);
    }

}