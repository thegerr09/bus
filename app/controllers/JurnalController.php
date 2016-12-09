<?php

use Phalcon\Mvc\View;

class JurnalController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("Jurnal/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function inputAction()
    {
    	$this->view->disable();
    	$post = $this->request->getPost();
    	return json_encode($post);
    }

}

