<?php
class ArticleController extends Controller
{
    public static function articlePage()
    {
        self::showArticle();
        return self::setview("article");
    }

    public static function showArticle(){
        global $article;
        if(!empty($_GET["article"])){
            $article_id = $_GET["article"];

            $article = Article::getArticle($article_id)[0];
        }
    }
}
