<?php
session_start();

require __DIR__ . "/app/Table.php";
require __DIR__ . "/app/Article.php";
require __DIR__ . "/app/User.php";
require __DIR__ . "/controllers/controller.php";
require __DIR__ . "/controllers/homeController.php";
require __DIR__ . "/controllers/uploadController.php";
require __DIR__ . "/controllers/loginController.php";
require __DIR__ . "/controllers/articleController.php";
ob_start();

$route = "home";
$err = false;
$errMsg = "";

$suc = false;
$sucMsg = "";

$articles = [];
$article = [];

if(!empty($_GET["page"])){
    $route = $_GET["page"];
}else{
    $route = "home";
}

if($route == "home" || $route == "home/"){
    $title = "Archives";
    $articles = Article::getArticles();
    HomeController::homePage();
}else if($route == "upload" || $route == "upload/"){
    $title = "upload";
    UploadController::uploadPage();
} else if ($route == "article" || $route == "article/") {
    $title = "article";
    ArticleController::articlePage();
}else if($route == "login" || $route == "login/"){
    $title = "login";
    LoginController::loginPage();
}else if($route == "logout" || $route == "logout/"){
    LoginController::logout();
}
$view = ob_get_clean();
require __DIR__."/view/master.php";



