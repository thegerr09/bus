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
        $this->view->date = $date[0] . ' s/d ' . $date[1];
        $this->view->account = $post['nomor_account'] . ' / ' . $post['label_account'];
        $this->view->pick("Laporan/CetakBukuBesar");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function LabaRugiAction()
    {
        $this->view->pick("Laporan/LabaRugi");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function CetakLabaRugiAction()
    {
        $post = $this->request->getPost();
        $date = explode(' - ', $post['tanggal']);

        // proses
        $header = Header::find(["conditions" => "group_header = 'pendapatan' OR group_header = 'pengeluaran'"]);
        $total_pendapatan = 0;
        $total_pengeluaran = 0;
        foreach ($header as $key_h => $value_h) {
            $pendapatan = 0;
            $pengeluaran = 0;
            $account = Account::find(["conditions" => "id_header = '$value_h->id'"]);
            foreach ($account as $key_a => $value_a) {
                $jurnalChild = JurnalChild::find(["conditions" => "account = '$value_a->id'"]);
                foreach ($jurnalChild as $key_j => $value_j) {
                    $pendapatan  = $pendapatan + $value_j->kredit;
                    $pengeluaran = $pengeluaran + $value_j->debet;
                }
            }
            echo $pendapatan;
            $total_pendapatan = $total_pendapatan + $pendapatan;
            $total_pengeluaran = $total_pengeluaran + $pengeluaran;
        }

        $this->view->pendapatan = $total_pendapatan;
        $this->view->pengeluaran = $total_pengeluaran;
        $this->view->date = $date[0] . ' s/d ' . $date[1];
        $this->view->kantor = $post['kantor'];
        $this->view->pick("Laporan/CetakLabaRugi");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function NeracaAction()
    {
        $this->view->pick("Laporan/Neraca");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function CetakNeracaAction()
    {
        $this->view->pick("Laporan/Neraca");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

