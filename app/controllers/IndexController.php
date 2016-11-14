<?php

use Phalcon\Mvc\View;
use Phalcon\Security;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function NotFoundAction()
    {
        $this->view->pick("errors/errors404");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

