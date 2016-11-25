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

    public function updateAction($id)
    {
        $this->view->disable();
        $post = $this->request->getPost();

        if ($this->request->hasFiles() == true) {
            $baseLocation = MOVE_PHOTO;
            foreach ($this->request->getUploadedFiles() as $file) {
                if ($file->getSize() > 0) {
                    $file_name = md5(uniqid(rand(), true)).'.'.$file->getExtension();
                    $file->moveTo($baseLocation . '/bus/' . $file_name);
                } else {
                    $file_name = $post['remove_image'];
                }
                
            }
        }

        $post['image'] = $file_name;
        unset($post['remove_image']);
        
        $bus = Bus::findFirst($id);
        $bus->assign($post);

        if ($bus->save()) {
            $notify = [
                'title' => 'Success',
                'text'  => 'Data berhasil di simpan ke database',
                'type'  => 'success',
                'close'  => 1
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

    public function deleteAction()
    {
        $this->view->disable();
        $id = $this->request->getPost('id');

        $bus = Bus::findFirst($id);
        $bus->deleted = 'Y';
        if ($bus->save()) {
            $notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di hapus',
                'type'    => 'success',
                'id'      => $id
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

    public function statusAction()
    {
        $this->view->disable();
        $id = $this->request->getPost('id');
        if ($this->request->getPost('active') == 'Y') {
            $title  = 'Bus Active';
            $type   = 'success';
            $icon   = 'fa fa-check';
            $label  = 'Active';
            $status = 'N';
            $class  = 'green';
        } else {
            $title  = 'Bus Not Active';
            $type   = 'error';
            $icon   = 'fa fa-remove';
            $label  = 'Not Active';
            $status = 'Y';
            $class  = 'red';
        }
        
        $bus = Bus::findFirst($id);
        $bus->active = $this->request->getPost('active');
        if ($bus->save()) {
            $notify = [
                'title'   => $title,
                'text'    => 'Usergroup berhasil di '.$label,
                'type'    => $type,
                'icon'    => $icon,
                'class'   => $class,
                'status'  => $status,
                'label'   => $label
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

    public function kondisiAction()
    {
        $this->view->disable();
        $id = $this->request->getPost('id');
        if ($this->request->getPost('kondisi') == 'Y') {
            $title  = 'Kondisi Bus Rusak';
            $type   = 'error';
            $icon   = 'fa fa-remove';
            $label  = 'Kondisi Rusak';
            $status = 'Y';
            $class  = 'red';
        } else {
            $title  = 'Kondisi Bus Baik';
            $type   = 'success';
            $icon   = 'fa fa-check';
            $label  = 'Kondisi Baik';
            $status = 'N';
            $class  = 'green';
        }
        
        $bus = Bus::findFirst($id);
        $bus->kondisi = $this->request->getPost('kondisi');
        if ($bus->save()) {
            $notify = [
                'title'   => $title,
                'text'    => 'Kondisi Bus berhasil di ubah ke '.$label,
                'type'    => $type,
                'icon'    => $icon,
                'class'   => $class,
                'status'  => $status,
                'label'   => $label
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

    public function detailAction($id)
    {
        $this->view->disable();
        $bus = Bus::findFirst($id);
        return json_encode($bus);
    }

}

