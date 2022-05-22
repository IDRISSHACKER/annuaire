<?php
class HomeController extends Controller{
    public static function homePage(){
        self::removeArticle();
        return self::setview("home");
    }

    public static function removeArticle(){
        if(!empty($_GET["remove"])){
            $article = $_GET["remove"];
            Article::removeArticle($article);
            header("location: index.php");
        }
    }

}



