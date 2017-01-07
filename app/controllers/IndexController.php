<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$this->view->bus = Bus::find(["conditions" => "deleted = 'N'"]);
    }

}

