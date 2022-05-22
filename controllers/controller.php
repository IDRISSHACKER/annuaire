<?php

class Controller{

    public static function setView($view, $auth = false){
        require(dirname(__DIR__) . "/view/pages/" . $view . ".view.php");
    }
}
