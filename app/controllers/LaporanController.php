<?php

use Phalcon\Mvc\View;

class LaporanController extends \Phalcon\Mvc\Controller
{

    public function BukuBesarAction()
    {
        $this->view->pick("Laporan/BukuBesar");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function CetakBukuBesarAction()
    {
    	$post = $this->request->getPost();
        $date = explode(' - ', $post['tanggal']);
        $this->view->bukuBesar   = TutupBuku::find(["conditions" => "tanggal BETWEEN :start_date: AND :end_date:",
    			"bind" => [
    				"start_date" => $date[0],
    				"end_date"   => $date[1]
    			]]);
        $this->view->jurnalChild = JurnalChild::find(["conditions" => "account = '$post[account]' AND tanggal BETWEEN :start_date: AND :end_date:",
    			"bind" => [
    				"start_date" => $date[0],
    				"end_date"   => $date[1]
    			]]);
        $this->view->pick("Laporan/CetakBukuBesar");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function LabaRugiAction()
    {
        $this->view->pick("Laporan/LabaRugi");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

