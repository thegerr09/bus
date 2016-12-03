<?php

use Phalcon\Mvc\View;

class ListorderController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->order = Invoice::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("ListOrder/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

