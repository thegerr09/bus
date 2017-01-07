<?php

use Phalcon\Mvc\View;

class NotifymailController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	require_once "Mail.php";
  //   	$config = [
		//     'driver'     => 'sendmail',
		//     'sendmail'   => '/usr/sbin/sendmail -bs',
		//     'from'       => [
		//         'email' => 'the.gum22@gmail.com',
		//         'name'  => 'SAIPUL HIDAYAT'
		//     ]
		// ];

		// $mailer = new \Phalcon\Ext\Mailer\Manager($config);

		// $message = $mailer->createMessage()
		//         ->to('the.gum09@gmail.com', 'OPTIONAL NAME')
		//         ->subject('Hello world!')
		//         ->content('Hello world!');

		// // Set the Cc addresses of this message.
		// $message->cc('example_cc@gmail.com');

		// // Set the Bcc addresses of this message.
		// $message->bcc('example_bcc@gmail.com');

		// // Send message
		// $message->send();

  //       // $this->view->pick("ListOrder/index");
  //       $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

}

