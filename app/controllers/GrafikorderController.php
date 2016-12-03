<?php

use Phalcon\Mvc\View;

class GrafikorderController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$list = [];
    	$dayInMonth = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
		for($d = 1; $d <= $dayInMonth; $d++)
		{
		    $time = mktime(12, 0, 0, date('m'), $d, date('Y'));
		    if (date('m', $time) == date('m'))
		        $list[] = date('d M Y', $time);
		        $date[] = date('Y-m-d', $time);
		}
		$this->view->listDate   = $list;
		$this->view->filterDate = $date;
		$this->view->dayInMonth = $dayInMonth - 1;

		// $this->view->data = BookingHelp::grafikOrder();
		$this->view->bus  = Bus::find(["conditions" => "active = 'Y' AND deleted = 'N'", "order" => "ukuran DESC"]);
        $this->view->pick("GrafikOrder/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
    	$list = [];
    	$dayInMonth = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
		for($d = 1; $d <= $dayInMonth; $d++)
		{
		    $time = mktime(12, 0, 0, date('m'), $d, date('Y'));
		    if (date('m', $time) == date('m'))
		        $list[] = date('d F Y', $time);
		        $date[] = date('Y-m-d', $time);
		}
		$this->view->listDate   = $list;
		$this->view->filterDate = $date;
		$this->view->dayInMonth = $dayInMonth - 1;

		// $this->view->data = BookingHelp::grafikOrder();
		$this->view->bus  = Bus::find(["conditions" => "active = 'Y' AND deleted = 'N'", "order" => "ukuran DESC"]);
        $this->view->pick("GrafikOrder/list");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

