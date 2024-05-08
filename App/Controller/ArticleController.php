<?php

namespace App\Milay\Controller;

use App\Milay\Config\View;
use App\Milay\Model\Article;
use App\Milay\Model\Category;
use App\Milay\Model\Images;
use App\Milay\Model\Notification;
use App\Milay\Model\User;
use App\Milay\Utils\Messages;
use App\Milay\Utils\Middleware;
use App\Milay\Utils\RequestMaker;
use App\Milay\Utils\SessionMaker;
use Exception;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArticleController
{
    private $request;
    private $files;
    private $getForm;
    private $dirs;
    public function __construct()
    {
        $res = new RequestMaker();
        $this->request = $res->post();
        $this->files = $res->files();
        $this->getForm = $res;
        Middleware::apply(['admin']);
    }
 

    public function index()
    {
        $article = Article::with('category')->get();
        return View::render('admin/pages/articles/list',["article"=>$article]);
    }

    public function post(){
        $request = $this->request;
        $data = [
            "user_id"=>SessionMaker::get("user_id"),
            "category_id"=>$request["category_id"],
            "name"=>htmlspecialchars($request["name"]),
            "price"=>$request["prix"],
            "stock"=>$request["stock"],
            "description"=>htmlspecialchars($request["description"])
        ];
        

        $validator = v::key('user_id', v::intVal()->notEmpty())
        ->key('category_id', v::intVal()->notEmpty())
        ->key('name', v::stringType()->notEmpty()->length(5, 255))
        ->key('price', v::floatVal()->notEmpty()->min(100)->max(100000000))
        ->key('stock', v::numericVal()->positive()->between(1, 255))
        ->key('description', v::stringType()->notEmpty()->length(50, null));
        try{
           $validator->assert($data);
           
           $res = Article::create($data);
           if($res){
            return View::redirect("/admin/article/show/$res->id");
           }else{
            return View::back();
           }
           
        }catch(NestedValidationException $e){
            $messages = $e->getMessages();
            foreach ($messages as $fieldName => $message) {
                Messages::setError($fieldName,$message);
            }
        }
        View::back();
    }

    public function show($id)
    {
        $article = Article::with('category')->find($id)->first();
        $images = Images::where("article_id",$id)->get();
        if($article){
            return View::render('admin/pages/articles/show',["article"=>$article,"images"=>$images]);
        }else{
            Messages::setError('error','Article introuvable');
            return View::back();
        }
    }

    public function store()
    {
        $categorie = Category::all();
        return View::render('admin/pages/articles/create',['categorie'=>$categorie]);
    }

    public function detail()
    {
        $id = $this->request["article_id"];
        $uploadDir = __DIR__.'/../../assets/uploads/';
        if(is_numeric($id) && $id !=0){
                if (!empty($_FILES['images']['name']) && is_array($_FILES['images']['name'])) {
                    $res = $this->getForm->uploadImages($_FILES['images'], $uploadDir, ['jpg', 'jpeg', 'png', 'svg']);
                    if($res["success"]==1){
                        foreach ($res["images"] as  $value) {
                             Images::create([
                                "article_id"=>$id,
                                "image_url"=>$value
                            ]);
                        }
                    }else{
                        Messages::setSuccess("error","Fichier non validé !");
                    }

                } else {
                    Messages::setError("error","Aucun fichier n'a été téléchargé ou format de fichier incorrect.");
                }
        } else{
         
            Messages::setSuccess("error","Il y a une erreur");
        }

       

        
        return View::back();
    }
    
    
    

    public function delete($id)
    {
       $article = Article::find($id)->first();
       $res = $article->delete();
       if($res){
        Messages::setSuccess("success","L'article $article->name a étè supprimée");
       }else{
        Messages::setSuccess("success","Il y a une erreur lors de suppression de l'article $article->name ");
       }
        return View::back();
    }

    public function edit($id)
    {
        return View::render('admin/pages/articles/edit',["id"=>$id]);
    }

    public function update(){
        $request = $this->request;
        $data = [
            "id"=>$request["article_id"],
            "user_id"=>SessionMaker::get("user_id"),
            "category_id"=>$request["category_id"],
            "name"=>htmlspecialchars($request["name"]),
            "status"=>$request["status"],
            "price"=>$request["prix"],
            "stock"=>$request["stock"],
            "description"=>htmlspecialchars($request["description"])
        ];
        

        $validator = v::key('user_id', v::intVal()->notEmpty())
        ->key('category_id', v::intVal()->notEmpty())
        ->key('name', v::stringType()->notEmpty()->length(5, 255))
        ->key('price', v::floatVal()->notEmpty()->min(100)->max(100000000))
        ->key('stock', v::numericVal()->positive()->between(1, 255))
        ->key('description', v::stringType()->notEmpty()->length(50, null));

        try{
            $validator->assert($data);
            
            $res = Article::with('category')->find($data["id"]);
            $res->name = $data["name"];
            $res->category_id = $data["category_id"];
            $res->price = $data["price"];
            $res->stock = $data["stock"];
            $res->description = $data["description"];
            $update = $res->save();
            
            if($update){
                Messages::setSuccess("message","Modification effectuée avec succès");
            }else{
                Messages::setSuccess("error","Il y aune erreur, réessayer");
            }
            return View::back();
            
         }catch(NestedValidationException $e){
             $messages = $e->getMessages();
             foreach ($messages as $fieldName => $message) {
                 Messages::setError($fieldName,$message);
             }
         }
         View::back();
         exit();
    }


    /**
     * @Image @param id
     */

     public function deleteImage($id){
        $image = Images::find($id);
        if($image){
            $image->delete();
            Messages::setSuccess("message","Image supprimé !");
        }else{
            Messages::setError("error","Une erreur s'est produit lors de la suppression !");
        }

        return View::back();

     }


     /**
      * @param id set active
      */
     public function set(){
        $request = $this->request;
        $article = Article::find($request["id"]);
       
        if($article){
            if(isset($request["status"])){
                $article->status =1;
                $article->update();
                Messages::setSuccess("message","L'article est desormais activé !");
            }else{
                $article->status =0;
                $article->update();
                Messages::setSuccess("message","L'article est desactivé !");

            }
        }

       return View::back();
       exit;

     }



     /**
      * Notification
      */


      public function listNotification(){
        $notification = Notification::all();
        return View::render('admin/pages/notification/index',["notification"=>$notification]);
      }


      public function result(){
        $search = SessionMaker::get("s");

        $user = User::where('username', 'like', '%' . $search . '%')
        ->orWhere('email', 'like', '%' . $search . '%')
        ->orWhere('description', 'like', '%' . $search . '%')
        ->get();

        $article = Article::where('name', 'like', '%' . $search . '%')
        ->orWhere('description', 'like', '%' . $search . '%')
        ->get();
        $categorie = Category::where("name",$search)->get();
        
        $result = array($user, $article,$categorie);

        return View::render('admin/pages/search/index',["res"=>$result]);
      }

      public function post_search(){
        $s = htmlspecialchars($this->request['s']);
        SessionMaker::set("s",$s);
        return View::redirect('/admin/search_result');
      }

}