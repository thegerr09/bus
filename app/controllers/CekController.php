<?php

use Phalcon\Mvc\View;

class CekController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$username = 'admin';

    	$this->view->disable();
    	$group = AclAction::group();
    	$user  = AclAction::user($username);

    	$group_sql = implode(' or ', $user['sql']);
    	$acl = AclAction::acl($group_sql, $username);
    	// echo json_encode($group);
    	echo '<pre>'.print_r($acl,1).'</pre>';
    }

}

