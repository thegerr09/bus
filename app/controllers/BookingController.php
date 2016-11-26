<?php

use Phalcon\Mvc\View;

class BookingController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("Booking/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

