<?php

use Phalcon\Mvc\View;

class JurnalController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->jurnal = Jurnal::find(["conditions" => "deleted = 'N' AND tanggal BETWEEN :start_date: AND :end_date:",
    			"bind" => [
    				"start_date" => date('Y-m-1'),
    				"end_date"   => date('Y-m-d')
    			]
        ]);
        $this->view->pick("Jurnal/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
        if ($this->request->isPost()) {
            $this->view->jurnal = Jurnal::find(["conditions" => "deleted = 'N' AND tanggal BETWEEN :start_date: AND :end_date:",
        			"bind" => [
        				"start_date" => $this->request->getPost('start'),
        				"end_date"   => $this->request->getPost('end')
        			]
            ]);
        } else {
            $this->view->jurnal = Jurnal::find(["conditions" => "deleted = 'N' AND tanggal BETWEEN :start_date: AND :end_date:",
        			"bind" => [
        				"start_date" => date('Y-m-1'),
        				"end_date"   => date('Y-m-d')
        			]
            ]);
        }
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
	                    'type'  => 'success'
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

    public function updateAction($id)
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
            'tanggal'      => $post['tanggal'],
            'keterangan'   => $post['keterangan'],
            'kantor'       => $post['kantor'],
            'total_debet'  => $post['total_debet'],
            'total_kredit' => $post['total_kredit']
        ];

        $jurnal = Jurnal::findFirst($id);
        $id_jurnal = $jurnal->id;
        $jurnal->assign($jurnal_parent);

        if ($jurnal->save()) {

            $removeChild = JurnalChild::find(["conditions" => "id_jurnal = '$id_jurnal'"]);
            $removeChild->delete();
            for ($i = 0; $i < count($post['debet']); $i++) {
                $jurnal_child = [
                    'id_jurnal' => $id_jurnal,
                    'account'   => $post['account'][$i],
                    'debet'     => $post['debet'][$i],
                    'kredit'    => $post['kredit'][$i]
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

    public function deletedAction($id)
    {
        $this->view->disable();

        $jurnal = Jurnal::findFirst($id);
        $jurnal->deleted = 'Y';
        if ($jurnal->save()) {
            $notify = [
                'title' => 'Success',
                'text'  => 'Data berhasil di hapus dari database',
                'type'  => 'success',
                'id'    => $id
            ];
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

    public function printOneAction($id)
    {
        $this->view->jurnal      = Jurnal::findFirst($id);
        $this->view->jurnalChild = JurnalChild::find();
        $this->view->pick("Jurnal/print");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function printAllAction($start, $end)
    {

        $this->view->jurnal = Jurnal::find(["conditions" => "deleted = 'N' AND tanggal BETWEEN :start_date: AND :end_date:",
                "bind" => [
                    "start_date" => $start,
                    "end_date"   => $end
                ]
        ]);
        $this->view->dt = [$start, $end];
        $this->view->pick("Jurnal/printAll");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function detailAction($check = null)
    {
        if ($check == 'child') {
            $id = $this->request->getPost('id');
            $result = JurnalChild::find(["conditions" => "id_jurnal = '$id'"]);
        } else {
            $id = $this->request->getPost('id');
            $result = Jurnal::findFirst($id);
        }
        return json_encode($result);
    }

    public function viewJurnalAction()
    {
        $id = $this->request->getPost('id');
        $this->view->check = $id;
        if ($id !== 'undefined') {
            $this->view->check = 'berisi';
            $this->view->child = JurnalChild::find(["conditions" => "id_jurnal = '$id'"]);
        }

        $this->view->pick("Jurnal/viewJurnal");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function tutupBukuAction()
    {
        $this->view->disable();
        $date = $this->request->getPost('tutup_bulan');
        $jurnal = Jurnal::find([
            "conditions" => "tanggal LIKE '%$date%' AND deleted = 'N'"
        ]);
        $removeTutupBuku = TutupBuku::find(["conditions" => "tanggal LIKE '%$date%'"]);
        $removeTutupBuku->delete();
        $nomor = 0;
        foreach ($jurnal as $key => $value) {
            $tutup_buku = new TutupBuku();
            $jurnal_parent = [
                'tanggal'      => $value->tanggal,
                'kode_jurnal'  => $value->kode_jurnal,
                'keterangan'   => $value->keterangan,
                'kantor'       => $value->kantor,
                'total_debet'  => $value->total_debet,
                'total_kredit' => $value->total_kredit
            ];

            $tutup_buku->assign($jurnal_parent);
            $tutup_buku->save();    
            $nomor++;
        }

        if (count($jurnal) == $nomor) {
            $notify = [
                'title' => 'Success',
                'text'  => 'Data berhasil di simpan ke database',
                'type'  => 'success',
                'close' => 1
            ];
            return json_encode($notify);
        }
    }

}
