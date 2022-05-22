<?php
class Article extends Table{

    public static function setArticle($titre, $apercu, $contenu, $en_ligne, $publier_par){
        self::prepare("INSERT INTO articles(titre, apercu, matricule, en_ligne, publier_par) VALUES(?, ?, ?, ?, ?)", [$titre, $apercu, $contenu, $en_ligne, $publier_par]);
        return true;
    }

    public static function getArticles(){
        $articles = self::query("SELECT * FROM articles ORDER BY id DESC");
        return $articles;
    }

    public static function getArticle($article_id){
        $article = self::query("SELECT * FROM articles WHERE id = $article_id");
        return $article;
    }

    public static function updateArticle($id, $titre, $apercu, $contenu, $en_ligne){
        self::prepare("UPDATE articles SET titre = ?, apercu = ?, matricule = ?, en_ligne = ? WHERE id = $id", [$id, $titre, $apercu, $contenu, $en_ligne]);
    }

    public static function removeArticle($id){
        self::prepare("DELETE FROM articles WHERE id = ?", [$id]);
    }

} 

