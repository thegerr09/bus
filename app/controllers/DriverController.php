<?php

use Phalcon\Mvc\View;

class DriverController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("Driver/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

