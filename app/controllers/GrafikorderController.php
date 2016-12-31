<?php

use Phalcon\Mvc\View;

class GrafikorderController extends \Phalcon\Mvc\Controller
{

    /**
     * [indexAction description]
     * @return [type] [description]
     */
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
		
		$this->view->bus  = Bus::find(["conditions" => "active = 'Y' AND deleted = 'N'", "order" => "ukuran DESC"]);
        $this->view->pick("GrafikOrder/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    /**
     * [viewCostAction description]
     * @return [type] [description]
     */
    public function viewCostAction()
    {
    	$post = $this->request->getPost();
    	$cost = Cost::find(["conditions" => "kode = '" . $post['kode'] . "'"]);
    	$this->view->cost = $cost;
    	$this->view->check = isset($cost[0]->id);
		$this->view->total_cost = $post['cost'];
    	if ($post['cost'] === 'undefined') {
	    	$this->view->total_cost = '';
    	}
        $this->view->pick("GrafikOrder/costView");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function viewChargeAction()
    {
        $post = $this->request->getPost();
        $this->view->charge = Charge::find(["conditions" => "kode = '" . $post['kode'] . "'"]);
        $this->view->pick("GrafikOrder/chargeView");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    /**
     * [listAction description]
     * @return [type] [description]
     */
    public function listAction()
    {
    	if ($this->request->isPost()) {
    		$date  = explode('-', $this->request->getPost('filter'));
    		$bulan = $date[1];
    		$tahun = $date[0];
    	} else {
    		$bulan = date('m');
    		$tahun = date('Y');
    	}

        
        $list = [];
        $dayInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        for($d = 1; $d <= $dayInMonth; $d++)
        {
            $time = mktime(12, 0, 0, $bulan, $d, $tahun);
            if (date('m', $time) == $bulan)
                $list[] = date('d M Y', $time);
                $date2[] = date('Y-m-d', $time);
        }
		$this->view->listDate   = $list;
		$this->view->filterDate = $date2;
		$this->view->dayInMonth = $dayInMonth - 1;

		// $this->view->data = BookingHelp::grafikOrder();
		$this->view->bus  = Bus::find(["conditions" => "active = 'Y' AND deleted = 'N'", "order" => "ukuran DESC"]);
        $this->view->pick("GrafikOrder/list");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    /**
     * [printBookingAction description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function printBookingAction($id)
    {
        $this->view->booking = Booking::findFirst($id);
        $this->view->pick("GrafikOrder/suratbuktisewa");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    /**
     * [printInvoiceAction description]
     * @param  [type] $kode [description]
     * @return [type]       [description]
     */
    public function printInvoiceAction($kode)
    {
        $this->view->invoice = Invoice::findFirst(["conditions" => "kode = '$kode'"]);
        $this->view->pick("GrafikOrder/kwitansi");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    /**
     * [printSptAction description]
     * @param  [type] $kode [description]
     * @return [type]       [description]
     */
    public function printSptAction($kode)
    {
        $this->view->invoice = Invoice::findFirst(["conditions" => "kode = '$kode'"]);
        $this->view->pick("GrafikOrder/spt");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

