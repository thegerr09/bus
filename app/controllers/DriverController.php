<?php

use Phalcon\Mvc\View;

class DriverController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->driver = Driver::find([
    		"conditions" => "deleted = 'N'",
    		"order"		 => "id DESC"
    	]);
        $this->view->pick("Driver/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }
    public function listAction()
    {
    	$this->view->driver = Driver::find([
    		"conditions" => "deleted = 'N'",
    		"order"		 => "id DESC"
    	]);
        $this->view->pick("Driver/list");
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
                    $file->moveTo($baseLocation . '/driver/' . $file_name);
                } else {
                    $file_name = 'users.png';
                }
            }
        }

        $array = [
        	'nama'		 => $this->request->getPost('nama'),
        	'alamat'	 => $this->request->getPost('alamat'),
        	'telpon'	 => $this->request->getPost('telpon'),
        	'keterangan' => $this->request->getPost('keterangan'),
        	'image'		 => $file_name
        ];

        $driver = new Driver();
        $driver->assign($array);

        if ($driver->save()) {
            $notify = [
                'title' => 'Success',
                'text'  => 'Data berhasil di simpan ke database',
                'type'  => 'success',
            ];
        } else {
            $messages = $user->getMessages();
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

        if ($this->request->hasFiles() == true) {
            $baseLocation = MOVE_PHOTO;
            foreach ($this->request->getUploadedFiles() as $file) {
                if ($file->getSize() > 0) {
                    $file_name = md5(uniqid(rand(), true)).'.'.$file->getExtension();
                    $file->moveTo($baseLocation . '/driver/' . $file_name);
                } else {
                    $file_name = $this->request->getPost('remove_image');
                }
            }
        }

        $array = [
            'nama'       => $this->request->getPost('nama'),
            'alamat'     => $this->request->getPost('alamat'),
            'telpon'     => $this->request->getPost('telpon'),
            'keterangan' => $this->request->getPost('keterangan'),
            'image'      => $file_name
        ];

        $driver = Driver::findFirst($id);
        $driver->assign($array);

        if ($driver->save()) {
            $notify = [
                'title' => 'Success',
                'text'  => 'Data berhasil di simpan ke database',
                'type'  => 'success',
                'close'  => 1
            ];
        } else {
            $messages = $user->getMessages();
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

        $driver = Driver::findFirst($id);
        $driver->deleted = 'Y';
        if ($driver->save()) {
            $notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di hapus',
                'type'    => 'success',
                'id'      => $id
            ];
        } else {
            $messages = $driver->getMessages();
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
            $title  = 'Driver Active';
            $type   = 'success';
            $icon   = 'fa fa-check';
            $label  = 'Active';
            $status = 'N';
            $class  = 'green';
        } else {
            $title  = 'Driver Not Active';
            $type   = 'error';
            $icon   = 'fa fa-remove';
            $label  = 'Not Active';
            $status = 'Y';
            $class  = 'red';
        }
        
        $driver = Driver::findFirst($id);
        $driver->active = $this->request->getPost('active');
        if ($driver->save()) {
            $notify = [
                'title'   => $title,
                'text'    => 'Usergroup berhasil di '.$label,
                'type'    => $type,
                'icon'    => $icon,
                'class'   => $class,
                'status'  => $status,
                'label'   => $label,
                'link'    => 'Usergroup',
                'storage' => 'page_usergroup'
            ];
        } else {
            $messages = $driver->getMessages();
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
        $driver = Driver::findFirst($id);
        return json_encode($driver);
    }
}

