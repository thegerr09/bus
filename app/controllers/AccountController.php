<?php

use Phalcon\Mvc\View;
use Phalcon\Security;

class AccountController extends \Phalcon\Mvc\Controller
{

    public function LoginAction()
    {
        $this->view->pick("account/Login");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function cekAction()
    {
        if ($this->request->isPost()) {
            $username = $this->request->getPost('username');
            $user     = Users::findFirst("username = '$username' AND deleted = 'N'");
            if ($user) {
                $this->security->hash(rand());
                $token  = '<input type="hidden" name="'.$this->security->getTokenKey().'" value="'.$this->security->getToken().'"/>';
                $token .= '<input type="hidden" name="username" value="'.$user->username.'">';
                $data = [
                    'status'   => 'berhasil',
                    'foto'     => $user->image,
                    'username' => $user->username,
                    'token'    => $token,
                    'password' => $this->security->hash($username)
                ];
            } else {
                $data['status'] = "gagal";
            }
            return json_encode($data);
        }
    }

    public function LoginProsesAction()
    {
        if ($this->request->isPost()) {
            if ($this->security->checkToken()) {
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                $user     = Users::findFirst("username = '$username'");
                if ($this->security->checkHash($password, $user->password)) {
                    $_SESSION['acl']      = AclAction::aclList($username);
                    $_SESSION['username'] = $user->username;
                    $_SESSION['image']    = $user->image;
                    
                    $data['status'] = 'login';
                } else {
                    $this->security->hash(rand());
                    $token = '<input type="hidden" name="'.$this->security->getTokenKey().'" value="'.$this->security->getToken().'"/>';
                    $data['status'] = 'login_wrong';
                    $data['token']  = $token;
                }
            }else{
                $this->security->hash(rand());
                $token = '<input type="hidden" name="'.$this->security->getTokenKey().'" value="'.$this->security->getToken().'"/>';
                $data['status'] = 'login_wrong';
                $data['token']  = $token;
            }
        }else{
            $this->security->hash(rand());
            $token = '<input type="hidden" name="'.$this->security->getTokenKey().'" value="'.$this->security->getToken().'"/>';
            $data['status'] = 'login_wrong';
            $data['token']  = $token;
        }

        return json_encode($data);
        die();

    }

    public function logoutAction(){
        session_destroy();
        return $this->response->redirect('account/Login');
    }

}

