<?php

class Router
{
    public $controller;
    public function __construct()
    {
        $url = isset($_GET["url"]) ? $_GET["url"] : null;
        $url = rtrim($url, "/");
        $url = explode("/", $url);
        if (empty($url[0])) {
            $fileController = CONTROLLERS . "loginController.php";
            require_once($fileController);
            $controller = new Login();
            $controller->render("login/index");
            return false;
        }
    }
}
