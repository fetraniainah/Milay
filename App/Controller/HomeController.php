<?php 

namespace App\Milay\Controller;

use App\Milay\Config\View;
use App\Milay\Model\Article;
use App\Milay\Model\Notification;
use App\Milay\Utils\Middleware;

class HomeController{
    public function __construct()
    {
        Middleware::apply(['admin']);
    }

    
    public function index(){
        return View::render("index");
    }

    public function home(){
       
        return View::render('/client/index');
    }

 
    public function show($id){
        $article = Article::find($id)->first();
        print_r($article);
    }

    public function store(){

        return View::redirect('/');
    }
}











?>