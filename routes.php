<?php 
$router->map('GET', '/', 'HomeController#index');

/**
 * Authentification
 */
$router->map('GET','/admin/auth/login','AuthController#login');
$router->map('POST','/postLogin','AuthController#postlogin');
$router->map('POST','/admin/auth/post-twofactor','AuthController#active');
$router->map('GET','/admin/auth/verification-code','AuthController#verify');


/**
 * Home page for client
 */
$router->map('GET', '/home', 'HomeController#home');
$router->map('POST', '/store', 'HomeController#store');

/**
 * Home page for admin
 */
$router->map('GET','/admin/home','AdminController#index');
$router->map('GET','/admin/home/profile','AdminController#show');
$router->map('GET','/logout','AdminController#logout');





/**
 * CRUD Article
 */
$router->map('GET','/admin/article/list','ArticleController#index');
$router->map('GET','/admin/article/store','ArticleController#store');
$router->map('GET','/admin/article/show/[i:id]','ArticleController#show');
$router->map('GET','/admin/article/edit/[i:id]','ArticleController#edit');
$router->map('GET','/admin/article/delete/[i:id]','ArticleController#delete');
$router->map('POST','/admin/post/article','ArticleController#post');
$router->map('POST','/admin/post/detail','ArticleController#detail');
$router->map('POST','/admin/post/update','ArticleController#update');
$router->map('GET','/article/image/delete/[i:id]','ArticleController#deleteImage');
$router->map('POST','/admin/article/edit/set','ArticleController#set');

/**
 * CRUD Categorie
 */

$router->map('GET','/admin/category/list','CategoryController#index');
$router->map('GET','/admin/category/create','CategoryController#store');
$router->map('GET','/admin/category/heart','CategoryController#heart');
$router->map('POST','/category/post','CategoryController#post');
$router->map('POST','/admin/category/update','CategoryController#update');
$router->map('GET','/admin/category/edit/[i:id]','CategoryController#edit');
$router->map('GET','/admin/category/delete/[i:id]','CategoryController#delete');

/**
 * Add image to associate an article
 */




 /**
  * Modification de profile
  */

  $router->map('POST','/profile/update','AdminController#update');

  /**
   * CRUD commande
   */

   
  $router->map('GET','/admin/commande','CommandeController#index');
  $router->map('GET','/admin/commande/detail','CommandeController#show');

  /**
   * User Admin
   */

$router->map('GET','/admin/utilisateur','AdminController#users');
$router->map('POST','/admin/utilisateur/add','AdminController#postRegister');
$router->map('GET','/admin/delete/user/[i:id]','AdminController#deleteuser');


/**
 * Notification admin/notification
 */

$router->map('GET','/admin/notification','ArticleController#listNotification');
$router->map('POST','/admin/post/notification','ArticleController#postNotification');

/**
 * Search
 */

$router->map('GET','/admin/search_result','ArticleController#result');
$router->map('POST','/admin/search','ArticleController#post_search');


/**
 * Message
 */

 $router->map('GET','/admin/message','MessageController#index');
 $router->map('POST','/admin/message/post','MessageController#post');
 $router->map('GET','/admin/[i:id]/message','MessageController#show');
?>