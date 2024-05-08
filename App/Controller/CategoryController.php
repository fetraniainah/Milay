<?php

namespace App\Milay\Controller;

use App\Milay\Config\View;
use App\Milay\Model\Category;
use App\Milay\Utils\Messages;
use App\Milay\Utils\Middleware;
use App\Milay\Utils\RequestMaker;
use Exception;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;
use Symfony\Component\HttpFoundation\Request;

class CategoryController
{
    private $request;
    private $files;
    public function __construct()
    {
        $res = new RequestMaker();
        $this->request = $res->post();
        $this->files = $res->files();
        Middleware::apply(['admin']);
    }

    public function index()
    {
        return View::render("admin/pages/category/list");
    }

    public function edit($id)
    {
        $res = Category::find($id)->first();
        return View::render('admin/pages/category/show',["category"=>$res]);
    }

    public function update(){
        $request = $this->request;
        $id = $request["id"];
        $res = Category::find($id);
        $res->name = htmlspecialchars($request["name"]);
        if(!empty($request["name"])){
            $result = $res->save();

            if($result){
                Messages::setSuccess("success","Modification effectué avec succès !");
            }else{
                Messages::setError("error","Une erreur s'est produit, veillez reésseyer !");
            }

        }else{
            Messages::setSuccess("error","Le categorie est requis !");
        }
        

        return View::back();

    }

    public function delete($id)
    {
        $res = Category::find($id);
        try{
            $res->delete();
        }catch(Exception $e){
            Messages::setError("error","Cette categories est associés a des articles");
        }
       
        return View::back();
    }

    public function store()
    {
       return View::render("admin/pages/category/create");
    }

    public function post()
    {
        $request = $this->request;
        $data = [
            "name"=>htmlspecialchars(strtolower($request['name']))
        ];
        $validator = v::key('name', v::stringType()->notEmpty()->length(3, 255));

        try{
            $validator->assert($data);
            $res= Category::where('name','LIKE',$data['name'])->get();
            if(count($res)==0){
                $insert= Category::create([
                'name'=>$data['name']
              ]);
              if($insert){
                Messages::setSuccess('success','Traitement réussie !');
              }

            }else{
                Messages::setError('name','Cette categorie existe déjà dans la liste');
            }
        }catch(NestedValidationException $e){
            $messages = $e->getMessages();
            foreach ($messages as $fieldName => $message) {
                Messages::setError($fieldName,$message);
            }
        }

        return View::back();
       
    }

    public function heart(){
        return View::render("admin/pages/category/h");
    }
}