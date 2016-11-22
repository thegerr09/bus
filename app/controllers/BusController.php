<?php

use Phalcon\Mvc\View;

class BusController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->bus = Bus::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Bus/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

