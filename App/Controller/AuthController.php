<?php

namespace App\Milay\Controller;

use App\Milay\Config\View;
use App\Milay\Model\User;
use App\Milay\Notify\PushNotification;
use App\Milay\Utils\Messages;
use App\Milay\Utils\Middleware;
use App\Milay\Utils\RequestMaker;
use App\Milay\Utils\SessionMaker;

class AuthController
{
    private $request;
    private $files;
    public function __construct()
    {
        $res = new RequestMaker();
        $this->request = $res->post();
        $this->files = $res->files();
        Middleware::apply(['guest']);
    }

    public function genererCode() {
        $code = "";
        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        for ($i = 0; $i < 8; $i++) {
            $code .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $code;
    }
   
   

    public function login(){
       return View::render('/admin/auth/login');
    }

    public function verify(){
        return View::render('/admin/code/verify');
    }

    public function active(){
       $code = $this->request["activate"];
       $verify = SessionMaker::get("loadcode");
       if($verify==$code){
        SessionMaker::set("isLogged",true);
        return View::redirect("/admin/home");
        }else{
            Messages::setError("code","Code d'activation incorrect");
            return View::back();
        }

    }

   
   
    public function postLogin(){
        $email = htmlspecialchars($this->request["email"]);
        $password = htmlspecialchars($this->request["password"]);

        $res = User::where("email",$email)->first();
        if($res){
            if(password_verify($password,$res["password"])){
                $mailsender = new PushNotification();
                $userEmail = $email;
                $verificationCode = $this->genererCode();
                $htmlContent = file_get_contents('views/push.php');
                $htmlContent = str_replace('{verification_code}', $verificationCode, $htmlContent);
                if ($mailsender->sendMail($userEmail, $htmlContent,true)) {
                    SessionMaker::set("user_id",$res["id"]);
                    SessionMaker::set("user_name",$res["username"]);
                    SessionMaker::set("user_email",$res["email"]);
                    SessionMaker::set("user_roles",$res["roles"]);
                    SessionMaker::set("loadcode",$verificationCode);
                }

                
                View::redirect("/admin/auth/verification-code");
            }else{
                Messages::setError("password","Mot de passe incorrecte");
                View::back();
            }
            }else{
                if(empty($email)){
                    Messages::setError("email","Veillez entrer une adresse email !");
                }

                if(empty($password)){
                    Messages::setError("password","Veillez entrer votre mot de passe !");
                }
                Messages::setError("email"," $email n'est pas autorisé pour se connecter !");
                View::back();
            }

        
    }

   
    
}