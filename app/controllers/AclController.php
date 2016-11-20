<?php

use Phalcon\Mvc\View;

class AclController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->acl = Acl::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Acl/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
        $this->view->acl = Acl::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Acl/list");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function accessAction()
    {
        $this->view->disable();
        if ($this->request->isPost()) {
            $post = $this->request->getPost();
            $acl  = Acl::findFirst($post['acl_id']);
            $acl_array = explode(',', $acl->usergroup);
            if (in_array($post['ug_id'], $acl_array)) {
                $array_search = array_search($post['ug_id'], $acl_array);
                unset($acl_array[$array_search]);
                $result = implode(',', $acl_array);
            } else {
                $result  = $acl->usergroup;
                $result .= $post['ug_id'].',';
            }
            $acl->usergroup = $result;
            if ($acl->save()) {
                $notify = [
                    'title' => 'Success',
                    'text'  => 'Data berhasil di simpan ke database',
                    'type'  => 'success',
                ];
            } else {
                $messages = $acl->getMessages();
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
        } else {
            $notify = [
                'title' => 'Errors',
                'text'  => 'data tidak terkirim',
                'type'  => 'error'
            ];
        }
        return json_encode($notify);
    }

    public function exceptAction()
    {
        $this->view->disable();
        if ($this->request->isPost()) {
            $post = $this->request->getPost();
            $acl  = Acl::findFirst($post['id']);

            $acl->except = $post['except'];
            if ($acl->save()) {
                $notify = [
                    'title' => 'Success',
                    'text'  => 'Data berhasil di simpan ke database',
                    'type'  => 'success',
                ];
            } else {
                $messages = $acl->getMessages();
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
        } else {
            $notify = [
                'title' => 'Errors',
                'text'  => 'data tidak terkirim',
                'type'  => 'error'
            ];
        }
        return json_encode($notify);
    }

    public function inputAction()
    {
        $this->view->disable();
        if ($this->request->isPost()) {
            $post = $this->request->getPost();
            $usergroup = implode(',', $post['usergroup']);
            $post['usergroup'] = ','.$usergroup.',';
            $post['action'] = $post['actions'];
            if (empty($post['except'])) {
                unset($post['actions']);
                unset($post['except']);
            } else {
                unset($post['actions']);
            }

            $acl = new Acl();
            $acl->assign($post);
            if ($acl->save()) {
                $notify = [
                    'title' => 'Success',
                    'text'  => 'Data berhasil di simpan ke database',
                    'type'  => 'success',
                ];
            } else {
                $messages = $acl->getMessages();
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
        } else {
            $notify = [
                'title' => 'Errors',
                'text'  => 'data tidak terkirim',
                'type'  => 'error'
            ];
        }
        return json_encode($notify);
    }

    public function detailAction($id)
    {
        $this->view->disable();
        $acl = Acl::find(["conditions" => "deleted = 'N'"]);
        return json_encode($acl);
    }

    public function updateAction()
    {
        $this->view->disable();
        if ($this->request->isPost()) {
            $post = $this->request->getPost();
            $acl  = Acl::findFirst($post['id']);
            
            $acl->controller = $post['controller'];
            $acl->action     = $post['actions'];
            if ($acl->save()) {
                $notify = [
                    'title' => 'Success',
                    'text'  => 'Data berhasil di simpan ke database',
                    'type'  => 'success',
                    'close' => 1
                ];
            } else {
                $messages = $acl->getMessages();
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
        } else {
            $notify = [
                'title' => 'Errors',
                'text'  => 'data tidak terkirim',
                'type'  => 'error'
            ];
        }
        return json_encode($notify);
    }

    public function deleteAction()
    {
        $this->view->disable();
        $id = $this->request->getPost('id');

        $acl = Acl::findFirst($id);
        $acl->deleted = 'Y';
        if ($acl->save()) {
            $notify = [
                'title'   => 'Success',
                'text'    => 'Data berhasil di hapus',
                'type'    => 'success',
                'id'      => $id
            ];
        } else {
            $messages = $acl->getMessages();
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
        
        $acl = Acl::findFirst($id);
        $acl->active = $this->request->getPost('active');
        if ($acl->save()) {
            $notify = [
                'title'   => $title,
                'text'    => 'Acl berhasil di '.$label,
                'type'    => $type,
                'icon'    => $icon,
                'class'   => $class,
                'status'  => $status,
                'label'   => $label
            ];
        } else {
            $messages = $acl->getMessages();
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