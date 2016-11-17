<?php

use Phalcon\Mvc\View;

class UsergroupController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->group = Usergroup::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Usergroup/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
        $this->view->group = Usergroup::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Usergroup/list");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function inputAction()
    {
        $this->view->disable();
        $data = [
            'usergroup'   => $this->request->getPost('usergroup'),
            'description' => $this->request->getPost('description')
        ];

        $group = new Usergroup();
        $group->assign($data);
        if ($group->save()) {
            $notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di simpan ke database',
                'type'    => 'success',
                'link'    => 'Usergroup',
                'storage' => 'page_usergroup'
            ];
        } else {
            $messages = $group->getMessages();
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
        $data = $this->request->getPost();

        $group = Usergroup::findFirst($id);
        $group->assign($data);
        if ($group->save()) {
            $notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di simpan ke database',
                'type'    => 'success',
                'link'    => 'Usergroup',
                'storage' => 'page_usergroup',
                'close'   => '1'
            ];
        } else {
            $messages = $group->getMessages();
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
            $title  = 'Usergroup Active';
            $type   = 'success';
            $icon   = 'fa fa-check';
            $label  = 'Active';
            $status = 'N';
            $class  = 'green';
        } else {
            $title  = 'Usergroup Not Active';
            $type   = 'error';
            $icon   = 'fa fa-remove';
            $label  = 'Not Active';
            $status = 'Y';
            $class  = 'red';
        }
        
        $group = Usergroup::findFirst($id);
        $group->active = $this->request->getPost('active');
        if ($group->save()) {
            $notify = [
                'title'   => $title,
                'text'    => 'Usergroup berhasil di '.$label.' kan',
                'type'    => $type,
                'icon'    => $icon,
                'class'   => $class,
                'status'  => $status,
                'label'   => $label,
                'link'    => 'Usergroup',
                'storage' => 'page_usergroup'
            ];
        } else {
            $messages = $group->getMessages();
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

        $group = Usergroup::findFirst($id);
        $group->deleted = 'Y';
        if ($group->save()) {
            $notify = [
                'title'   => 'Data Terhapus',
                'text'    => 'Data berhasil di hapus',
                'type'    => 'success',
                'icon'    => 'fa fa-trash',
                'id'      => $id,
                'link'    => 'Usergroup',
                'storage' => 'page_usergroup'
            ];
        } else {
            $messages = $group->getMessages();
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
        $group = Usergroup::findFirst($id);
        return json_encode($group);
    }

}

