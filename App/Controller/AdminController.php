<?php

namespace App\Milay\Controller;

use App\Milay\Config\View;
use App\Milay\Model\Message;
use App\Milay\Model\Notification;
use App\Milay\Model\User;
use App\Milay\Utils\Messages;
use App\Milay\Utils\Middleware;
use App\Milay\Utils\RequestMaker;
use App\Milay\Utils\SessionMaker;

class AdminController
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
        $notifications = Notification::orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
       
       return View::render('/admin/pages/home',["n"=>$notifications]);
    }

    public function show(){
        $profile = [
            "userId"=>SessionMaker::get("user_id"),
            "userEmail"=>SessionMaker::get("user_email"),
            "userName"=>SessionMaker::get("user_name"),
            "userRole"=>SessionMaker::get("user_roles"),
            "Logged"=>SessionMaker::get("isLogged")
        ];
        return View::render('/admin/pages/profile/profile',['user'=>$profile]);
    }

    public function update(){
        $request = $this->request;
        $password = htmlspecialchars($request["password"]);
        $password_verify = htmlspecialchars($request["password-verify"]);
        
        $id = SessionMaker::get("user_id");
        $user = User::find($id)->first();
        $current_password = $user->password;
        
        if(password_verify($password,$current_password)){
            if(!empty($password_verify)){

            }else{
                Messages::setError("new_pass","Veillez entrer le nouvelle mot de passe ");
            }

            
        }else{
            Messages::setError("verify","Mot de passe incorrecte");
        }

        
        
        return View::back();
    }


    public function userList(){
        return View::render('/client/page');
    }

    public function logout(){
        SessionMaker::destroy('/admin/auth/login');
    }


    public function postRegister(){
        $username = htmlspecialchars($this->request["username"]);
        $email = htmlspecialchars($this->request["email"]);
        $password = htmlspecialchars($this->request["password"]);

        if(!empty($username) && !empty($email) && !empty($password)){
            $res= User::create([
                "username"=>$username,
                "email"=>$email,
                "roles"=>"admin",
                "password"=>password_hash($password,PASSWORD_DEFAULT)
            ]);

            if($res){
                Notification::create([
                    "text"=>"$username a étè ajouté comme administrateur",
                ]);
                Messages::setSuccess("success","Utilisateur créé");
            }else{
                Messages::setSuccess("error","Il y a une erreur !");
            }
        }else{
            if(empty($username)){
                Messages::setError("username",'username est requise');
            }

            if(empty($email)){
                Messages::setError("email",'L\'email est requise');
            }

            if(empty($password)){
                Messages::setError("password",'Le mot de passe est requise');
            }
        }

        return View::back();

    }

    public function users(){
        $user = User::all();
        return View::render('/admin/pages/users/users',["user"=>$user]);
    }

    public function deleteuser($id){
        if(isset($id)){
            $user = User::find($id);
            $user->delete();
            Messages::setSuccess("success","L'utilisateur $user->username a étè supprimer");
        }else{
            Messages::setError("error","Aucun utilisateur avec l'id $id");
        }

        return View::back();

    }
}