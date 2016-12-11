<?php

use Phalcon\Mvc\View;

class JurnalController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->jurnal = Jurnal::find();
        $this->view->pick("Jurnal/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
    	$this->view->jurnal = Jurnal::find();
        $this->view->pick("Jurnal/list");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function inputAction()
    {
    	$this->view->disable();
    	$post = $this->request->getPost();

    	if ($post['total_debet'] != $post['total_kredit']) {
	        $notify = [
	            'title' => 'Errors',
	            'text'  => 'Total debet dan kredit tidak seimbang periksa kembali',
	            'type'  => 'error'
	        ];
	        return json_encode($notify);
	        die();
    	}

    	$jurnal_parent = [
    		'tanggal' => $post['tanggal'],
    		'kode_jurnal' => $this->Helpers->kodeJurnal(),
    		'keterangan' => $post['keterangan'],
    		'kantor' => $post['kantor'],
    		'total_debet' => $post['total_debet'],
    		'total_kredit' => $post['total_kredit']
    	];

    	$jurnal = new Jurnal();
    	$jurnal->assign($jurnal_parent);

    	if ($jurnal->save()) {
    		$get_parent = $jurnal->findFirst(["conditions" => "kode_jurnal = '" . $jurnal_parent['kode_jurnal'] . "'"]);

    		for ($i = 0; $i < count($post['debet']); $i++) { 
	    		$jurnal_child = [
	    			'id_jurnal' => $get_parent->id,
	    			'account' => $post['account'][$i],
	    			'debet' => $post['debet'][$i],
	    			'kredit' => $post['kredit'][$i]
	    		];
	    		$child = new JurnalChild();
	    		$child->assign($jurnal_child);
	    		if ($child->save()) {
	                $notify = [
	                    'title' => 'Success',
	                    'text'  => 'Data berhasil di simpan ke database',
	                    'type'  => 'success',
	                    'close' => 1
	                ];
	    		} else {
	    			$get_parent->delete();
		            $messages = $child->getMessages();
		            $m = '';
		            foreach ($messages as $message) {
		                $m .= "$message <br/>";
		            }
		            $notify = [
		                'title' => 'Errors',
		                'text'  => $m,
		                'type'  => 'error'
		            ];
	    		}
    		}
    		
    	} else {
            $messages = $jurnal->getMessages();
            $m = '';
            foreach ($messages as $message) {
                $m .= "$message <br/>";
            }
            $notify = [
                'title' => 'Errors',
                'text'  => $m,
                'type'  => 'error'
            ];
    	}

    	return json_encode($notify);
    }

}

