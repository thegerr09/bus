<?php

use Phalcon\Mvc\View;

class PelangganController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("Pelanggan/index");
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

}

