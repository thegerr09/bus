<?php

use Phalcon\Mvc\View;
use Phalcon\Security;
use Phalcon\Http\Request\FileInterface;

class UsersController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->users = Users::find(["conditions" => "deleted = 'N'"]);
        $this->view->group = Usergroup::find(["conditions" => "deleted = 'N' AND active = 'Y'"]);
        $this->view->pick("Users/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
        $this->view->users = Users::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Users/list");
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
                    $file->moveTo($baseLocation . '/users/' . $file_name);
                } else {
                    $file_name = 'users.png';
                }
                
            }
        }

        if (is_array($this->request->getPost('usergroup'))) {
            $usergroup = ','.implode(',', $this->request->getPost('usergroup')).',';
        } else {
            $usergroup = ','.$this->request->getPost('usergroup').',';
        }

        $array = [  
            'username'  => $this->request->getPost('username'),
            'password'  => $this->security->hash($this->request->getPost('password')),
            'usergroup' => $usergroup,
            'name'      => $this->request->getPost('name'),
            'address'   => $this->request->getPost('address'),
            'email'     => $this->request->getPost('email'),
            'facebook'  => $this->request->getPost('facebook'),
            'handphone' => $this->request->getPost('handphone'),
            'image'     => $file_name
        ];

        $user = new Users();
        $user->assign($array);
        if ($user->save()) {
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
                    $file->moveTo($baseLocation . '/users/' . $file_name);
                } else {
                    $file_name = $this->request->getPost('remove_image');
                }
                
            }
        }

        if (is_array($this->request->getPost('usergroup'))) {
            $usergroup = ','.implode(',', $this->request->getPost('usergroup')).',';
        } else {
            $usergroup = ','.$this->request->getPost('usergroup').',';
        }

        $array = [  
            'username'  => $this->request->getPost('username'),
            'password'  => $this->security->hash($this->request->getPost('password')),
            'usergroup' => $usergroup,
            'name'      => $this->request->getPost('name'),
            'address'   => $this->request->getPost('address'),
            'email'     => $this->request->getPost('email'),
            'facebook'  => $this->request->getPost('facebook'),
            'handphone' => $this->request->getPost('handphone'),
            'image'     => $file_name
        ];

        $user = Users::findFirst($id);
        $user->assign($array);
        if ($user->save()) {
            $notify = [
                'title' => 'Success',
                'text'  => 'Data berhasil di simpan ke database',
                'type'  => 'success',
                'close'  => '1',
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

        $users = Users::findFirst($id);
        $users->deleted = 'Y';
        if ($users->save()) {
            $notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di hapus',
                'type'    => 'success',
                'id'      => $id,
                'link'    => 'Users',
                'storage' => 'page_users'
            ];
        } else {
            $messages = $users->getMessages();
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
            $title  = 'Users Active';
            $type   = 'success';
            $icon   = 'fa fa-check';
            $label  = 'Active';
            $status = 'N';
            $class  = 'green';
        } else {
            $title  = 'Users Not Active';
            $type   = 'error';
            $icon   = 'fa fa-remove';
            $label  = 'Not Active';
            $status = 'Y';
            $class  = 'red';
        }
        
        $users = Users::findFirst($id);
        $users->active = $this->request->getPost('active');
        if ($users->save()) {
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
            $messages = $users->getMessages();
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
        $users = Users::findFirst($id);
        return json_encode($users);
    }

}