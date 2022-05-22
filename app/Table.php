<?php 
require dirname(__DIR__) . "/config/config.php";
require dirname(__DIR__) . "/models/articles.model.php";
require dirname(__DIR__) . "/models/users.model.php";
require dirname(__DIR__) . "/utils/short.php";

class Table{
    public static function bdd(){
        global $config;
        global $userTable;
        global $articlesTable;
        global $userFaker;
        global $emailFak;
        global $nomFak;
        global $pwdFak;

        $host = $config['db_host'];
        $dbname = $config['db_name'];
        $user = $config['db_user'];
        $password = $config['db_pass'];

        try{
            $PDO = new PDO("mysql:hostname=$host;dbname=$dbname", $user, $password);
            return $PDO;
        }catch(PDOException $e){
            $PDO = new PDO("mysql:host=$host", $user, $password);
            $PDO->query("CREATE DATABASE $dbname");
            $PDO = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $PDO->query($userTable);
            $PDO->query($articlesTable);
            $request = $PDO->prepare($userFaker);
            $request->execute([$nomFak, $emailFak, true, $pwdFak]);
            return $PDO;
        }

    }

    public static function query($req){
        $request = self::bdd()->query($req);
        //die(var_dump($request->fetchAll()));
        return $request->fetchAll();
    }

    public static function prepare($req, $params = []){
        $request = self::bdd()->prepare($req);
        $request->execute($params);
        return true;
    }
}

