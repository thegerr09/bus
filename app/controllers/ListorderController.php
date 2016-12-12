<?php

use Phalcon\Mvc\View;

class ListorderController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->order = Invoice::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("ListOrder/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function listAction()
    {
        $this->view->order = Invoice::find(["conditions" => "deleted = 'N'"]);
        $this->view->pick("ListOrder/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function inputAction()
    {
        $this->view->disable();
        $post = $this->request->getPost();

        $post['kode'] = Helpers::kodeBooking();

        if ($post['paket'] === 'regular') {
            unset($post['route_jiarah']);
        } else if ($post['paket'] === 'jiarah') {
            unset($post['area'], $post['route'], $post['lokasi']);
        }

        $booking = new Invoice();
        $booking->assign($post);
 
        if ($booking->save()) {
            $post['success'] = 'Y';
            $post['invoice'] = 'Y';
            $invoice = new Booking();
            $invoice->assign($post);
            if ($invoice->save()) {
                $notify = [
                    'title' => 'Success',
                    'text'  => 'Data berhasil di simpan ke database',
                    'type'  => 'success',
                    'close' => 1
                ];
            } else {
                $messages = $invoice->getMessages();
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
            $messages = $booking->getMessages();
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

    public function detailAction($kode)
    {
        $this->view->disable();
        $invoice = Invoice::findFirst("kode = '$kode'");
        return json_encode($invoice);
    }

    public function carBackAction($id)
    {
        $this->view->disable();
        $post = $this->request->getPost();

        $invoice = Invoice::findFirst($id);

        BookingHelp::extraCharge($invoice->kode, $post['name_charge'], $post['biaya_charge']);

        $invoice->assign($post);
        if ($invoice->save()) {
            $booking = Booking::findFirst("kode = '$invoice->kode'");
            $booking->invoice = 'Y';
            if ($booking->save()) {
                $notify = [
                    'title' => 'Success',
                    'text'  => 'Data berhasil di simpan ke database',
                    'type'  => 'success',
                    'close' => 1
                ];
            } else {
                $messages = $booking->getMessages();
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
            $messages = $invoice->getMessages();
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

