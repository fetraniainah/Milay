<?php

namespace App\Milay\Controller;

use App\Milay\Config\View;
use App\Milay\Model\Message;
use App\Milay\Utils\Middleware;
use App\Milay\Utils\RequestMaker;
use Symfony\Component\HttpFoundation\Request;

class MessageController
{
    private $request;
    public function __construct()
    {
        $res = new RequestMaker();
        $this->request = $res->post();
        Middleware::apply(['admin']);
    }


    public function index()
    {
        $messages = Message::orderBy('id', 'desc')->get();
        return View::render('admin/pages/message/index',["messages"=>$messages]);
    }

    public function show($id)
    {
        $messages = Message::where('emetteur', $id)->orderBy('id', 'desc')->latest()->get();

        return View::render('admin/pages/message/show',["messages"=>$messages,"id"=>$id]);
    }

    public function post()
    {
        $messages = $this->request["message"];
        $id = 1;
        if(!empty($messages)){
            Message::create([
                    "emetteur"=>"1",
                    "recepteur"=>$this->request["recepteur"],
                    "message"=>$messages
                ]);
        }

        return View::back();
        
    }

    public function update(Request $request, $id)
    {
        // Your update method code here
    }

    public function delete($id)
    {
        // Your delete method code here
    }
}