<?php

use Phalcon\Mvc\View;

class SettingController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->setting = Setting::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Setting/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
    	$this->view->setting = Setting::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("Setting/list");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function inputAction()
    {
    	$this->view->disable();
 
    	$setting = new Setting();
    	$setting->assign($this->request->getPost());

    	if ($setting->save()) {
            $notify = [
                'title' => 'Success',
                'text'  => 'Data berhasil di simpan ke database',
                'type'  => 'success',
            ];
        } else {
            $messages = $setting->getMessages();
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
 
    	$setting = Setting::findFirst($id);
    	$setting->assign($this->request->getPost());

    	if ($setting->save()) {
            $notify = [
                'title' => 'Success',
                'text'  => 'Data berhasil di simpan ke database',
                'type'  => 'success',
                'close'  => 1
            ];
        } else {
            $messages = $setting->getMessages();
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
 		$id      = $this->request->getPost('id');
    	$setting = Setting::findFirst($id);
    	$setting->deleted = 'Y';

    	if ($setting->save()) {
            $notify = [
                'title' => 'Success',
                'text'  => 'Data berhasil di simpan ke database',
                'type'  => 'success',
                'icon'	=> 'fa fa-trash',
                'id'	=> $id
            ];
        } else {
            $messages = $setting->getMessages();
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
        
        $setting = Setting::findFirst($id);
        $setting->active = $this->request->getPost('active');
        if ($setting->save()) {
            $notify = [
                'title'   => $title,
                'text'    => 'Setting berhasil di '.$label,
                'type'    => $type,
                'icon'    => $icon,
                'class'   => $class,
                'status'  => $status,
                'label'   => $label,
                'link'    => 'Setting',
                'storage' => 'page_setting'
            ];
        } else {
            $messages = $setting->getMessages();
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
