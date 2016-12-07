<?php

use Phalcon\Mvc\View;

class HeaderAccountController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->header  = Header::find(["conditions" => "deleted = 'N'"]);
    	$this->view->account = Account::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("HeaderAccount/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction($check)
    {
    	if ($check === 'header') {
	    	$this->view->header  = Header::find(["conditions" => "deleted = 'N'"]);
	        $this->view->pick("HeaderAccount/listHeader");
	        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    	} else if ($check === 'account') {
			$this->view->account = Account::find(["conditions" => "deleted = 'N'"]);
		    $this->view->pick("HeaderAccount/listAccount");
		    $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    	}	
    }

    public function inputAction($check)
    {
    	$this->view->disable();
    	$post = $this->request->getPost();
    	if ($check === 'header') {
    		$header = new Header();
    		$header->assign($post);
    		if ($header->save()) {
	            $notify = [
	                'title' => 'Success',
	                'text'  => 'Data berhasil di simpan ke database',
	                'type'  => 'success',
	                'check' => 'header'
	            ];
    		} else {
	            $messages = $header->getMessages();
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
    	} else if ($check === 'account') {
    		$account = new Account();
    		$account->assign($post);
    		if ($account->save()) {
	            $notify = [
	                'title' => 'Success',
	                'text'  => 'Data berhasil di simpan ke database',
	                'type'  => 'success',
	                'check' => 'account'
	            ];
    		} else {
	            $messages = $account->getMessages();
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
    	return json_encode($notify);
    }

    public function deleteAction($check)
    {
    	$this->view->disable();
    	$post = $this->request->getPost();
    	if ($check === 'header') {
    		$header = Header::findFirst($post['id']);
    		$header->deleted = 'Y';
    		if ($header->save()) {
	            $notify = [
	                'title' => 'Success',
	                'text'  => 'Data berhasil di simpan ke database',
	                'type'  => 'success',
	                'icon'  => 'fa fa-trash',
	                'id'    => $post['id'],
	                'check' => 'Header'
	            ];
    		} else {
	            $messages = $header->getMessages();
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
    	} else if ($check === 'account') {
    		$account = Account::findFirst($post['id']);
    		$account->deleted = 'Y';
    		if ($account->save()) {
	            $notify = [
	                'title' => 'Success',
	                'text'  => 'Data berhasil di simpan ke database',
	                'type'  => 'success',
	                'icon'  => 'fa fa-check-circle',
	                'id'    => $post['id'],
	                'check' => 'Account'
	            ];
    		} else {
	            $messages = $account->getMessages();
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
    	return json_encode($notify);
    }

    public function updateAction($check)
    {
    	$this->view->disable();
    	$post = $this->request->getPost();
    	if ($check === 'header') {
    		$header = Header::findFirst($post['id']);
    		$header->assign($post);
    		if ($header->save()) {
	            $notify = [
	                'title' => 'Success',
	                'text'  => 'Data berhasil di simpan ke database',
	                'type'  => 'success',
	                'icon'  => 'fa fa-trash',
	                'check' => 'header',
	                'close' => 'Header'
	            ];
    		} else {
	            $messages = $header->getMessages();
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
    	} else if ($check === 'account') {
    		$account = Account::findFirst($post['id']);
    		$account->assign($post);
    		if ($account->save()) {
	            $notify = [
	                'title' => 'Success',
	                'text'  => 'Data berhasil di simpan ke database',
	                'type'  => 'success',
	                'icon'  => 'fa fa-trash',
	                'check' => 'account',
	                'close' => 'Account'
	            ];
    		} else {
	            $messages = $account->getMessages();
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
    	return json_encode($notify);
    }

}

