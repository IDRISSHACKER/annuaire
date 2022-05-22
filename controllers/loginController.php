<?php
    class LoginController extends Controller
    {
        public static function loginPage()
        {
            if(isset($_POST["login"])){
                self::login($_POST["email"], $_POST["password"]);
            }
            if(!empty($_SESSION["id"])){
                header("location: index.php");
                if(!empty($_GET["redirect"])){
                    $redirect = $_GET["redirect"];
                    header("location: index.php?page=$redirect");
                }else{
                    header("location: index.php");
                }
            }else{
                return self::setview("login", true);
            }
        }

        public static function login($email, $password){
            global $err;
            global $errMsg;
            if(strlen($email) != 0 && strlen($password) != 0){
                if(User::logIn($email, $password)){
                   //header("location: index.php");
                }else{
                    $err = true;
                    $errMsg = "Email ou mot de passe incorect";
                }
            }else{
                $err = true;
                $errMsg = "Veillez remplir tout les champs";
            }
        }

        public static function logout(){
            session_destroy();
            header("location: index.php");
        }
    }
