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
        echo '<pre>'.print_r($this->request->getPost(),1).'</pre>';
    }

}

