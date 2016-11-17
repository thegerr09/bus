<?php

use Phalcon\Mvc\View;

class DashboardController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {	
        $this->view->pick("index/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

