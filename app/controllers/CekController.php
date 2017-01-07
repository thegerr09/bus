<?php

use Phalcon\Mvc\View;

class CekController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->disable();
        $dateBooking = BookingHelp::grafikOrder();

        return '<pre>'.print_r($dateBooking,1).'</pre>';;
    }

}

