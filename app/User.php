<?php
class User extends Table
{

    public static function setUser($nom, $email, $password)
    {
        self::prepare("INSERT INTO users(nom, email, password) VALUES(?, ?)", [$nom, $email, $password]);
    }

    public static function getUsers()
    {
        $users = self::query("SELECT * FROM users");
        return $users;
    }

    public static function logIn($email, $password){
        $user = self::bdd()->prepare("SELECT * FROM users WHERE email = ?");
        $user->execute([$email]);
        $user = $user->fetchAll();
        if(count($user) > 0){
            if(password_verify($password, $user[0]["password"])){
                $_SESSION["id"] = $user[0];
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}
