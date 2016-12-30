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
        // echo '<pre>'.print_r($post,1).'</pre>';
        // die();
        $this->view->bukuBesar   = TutupBuku::find(["conditions" => "tanggal LIKE '%$post[tanggal]%'"]);
        $this->view->jurnalChild = JurnalChild::find(["conditions" => "account = '$post[account]' AND tanggal LIKE '%$post[tanggal]%'"]);
        $this->view->pick("Laporan/CetakBukuBesar");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

