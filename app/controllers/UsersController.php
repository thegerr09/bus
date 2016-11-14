<?php

use Phalcon\Mvc\View;
use Phalcon\Http\Request\FileInterface;

class UsersController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("users/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
    	$this->view->users = Users::find("deleted = 'N'");
        $this->view->pick("users/list");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    // public function inputAction()
    // {
    //     $this->view->disable();

    //     $helpers = new Helpers();
        
    //     if ($this->request->hasFiles() == true) {
    //         $baseLocation = MOVE_PHOTO;


    //         // Print the real file names and sizes
    //         foreach ($this->request->getUploadedFiles() as $file) {

    //             //Move the file into the application
    //             $file->moveTo($baseLocation . $file->getName());
    //             echo Helpers::randomNameImage().'.'.$file->getExtension();
    //         }
    //     }

    //     // echo BASE_PATH; 
    //     echo '<pre>'.print_r($this->request->getPost(), 1).'</pre>';
    // }

}

