<?php

use PHPUnit\Framework\TestCase;
use App\Milay\Controller\AuthController;
use App\Milay\Model\User;
use App\Milay\Utils\SessionMaker;
use App\Milay\Utils\View;

class AuthControllerTest extends TestCase
{
    public function testPostLogin()
    {
        // Créer une instance du AuthController
        $controller = new AuthController();

        // Simuler une requête POST avec les données d'authentification
        $_POST['email'] = 'tahiri.fetra@gmail.com';
        $_POST['password'] = 'fetra';

        // Appeler la méthode postLogin() du contrôleur
        $controller->postLogin();

        // Vérifier le comportement attendu après l'appel à postLogin()
        // Vérifiez que l'utilisateur est correctement connecté en session
        $this->assertTrue(SessionMaker::get('isLogged'));
        $this->assertEquals('tahiri.fetra@gmail.com', SessionMaker::get('user_email'));

        // Nettoyer les données POST après le test
        unset($_POST['email']);
        unset($_POST['password']);
    }
}