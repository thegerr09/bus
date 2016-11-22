<?php

use Phalcon\Mvc\View;

class SettingController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("Setting/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}
