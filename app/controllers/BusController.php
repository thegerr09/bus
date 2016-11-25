<?php

use Phalcon\Mvc\View;

class BusController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->bus = Bus::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Bus/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
    	$this->view->bus = Bus::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Bus/list");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function inputAction()
    {
        $this->view->disable();

        if ($this->request->hasFiles() == true) {
            $baseLocation = MOVE_PHOTO;
            foreach ($this->request->getUploadedFiles() as $file) {
                if ($file->getSize() > 0) {
                    $file_name = md5(uniqid(rand(), true)).'.'.$file->getExtension();
                    $file->moveTo($baseLocation . '/bus/' . $file_name);
                } else {
                    $file_name = 'bus.jpg';
                }
                
            }
        }

        $post          = $this->request->getPost();
        $post['image'] = $file_name;
        unset($post['remove_image']);
        
        $bus = new Bus();
        $bus->assign($post);

        if ($bus->save()) {
            $notify = [
                'title' => 'Success',
                'text'  => 'Data berhasil di simpan ke database',
                'type'  => 'success',
            ];
        } else {
            $messages = $bus->getMessages();
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

