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

}
