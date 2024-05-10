<?php

namespace App\Milay\Controller;

use App\Milay\Config\View;
use App\Milay\Model\Order;
use App\Milay\Utils\Messages;
use App\Milay\Utils\Middleware;
use App\Milay\Utils\RequestMaker;
use Symfony\Component\HttpFoundation\Request;

class OrderController
{
    private $request;
    public function __construct()
    {
        $req = new RequestMaker();
        $this->request = $req->post();
        Middleware::apply(["auth"]);
    }
    public function index()
    {
        $command = Order::with('user')->with('article')->where("status","1")->get();
        return View::render("admin/pages/commande/index",["command"=>$command]);
    }

    public function show($id)
    {
        $command = Order::find($id);
        return View::render("admin/pages/commande/show",["command"=>$command]);
    }

    public function store()
    {
        $data = [
            "user_id" => $this->request["user_id"],
            "article_id" => $this->request["article_id"],
            "quantity"=>$this->request["quantiti"],
            "price_unit"=>$this->request["price"],
            "total_price"=>fn()=>($this->request["quantiti"] * $this->request["price"])
        ];

        $res = Order::create($data);
        if($res){
            Messages::setSuccess("success","Votre commande est passé !");
        }else{
            Messages::setError("error","Une erreur s'est produit");
        }

        return View::back();

    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete();

        return View::back();
    }
}