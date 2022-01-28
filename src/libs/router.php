<?php

class Router
{
    public $url;
    public function __construct()
    {
        $this->setUrl();
        //if url don't pass any parameters
        if (empty($this->url[0])) { //TODO o sesion no iniciada o controller == login
            $fileController = CONTROLLERS . "login.php";
            require_once($fileController);
            $controller = new Login();
            $controller->loadModel($this->url[0]);
            $controller->render("login/index");
            return false;
        }
        //save url controller passed in parameter 0
        $fileController = CONTROLLERS . $this->url[0] . ".php";
        if (file_exists($fileController)) {
            //load controller
            require_once $fileController;
            //instance of controller and load models
            $controller = new $this->url[0];
            $controller->loadModel($this->url[0]);
            //get size of url params
            $nparams = sizeof($this->url);

            if ($nparams > 1) {
                $method = $this->url[1];
                if (function_exists($controller->$method())) {

                    if ($nparams > 2) {
                        //no matter how many params are you passing, it will pass to the function too
                        $param = [];
                        for ($i = 2; $i < $nparam; $i++) {
                            array_push($param, $this->url[$i]);
                        }
                        $controller->{$method}($param);
                    } else {
                        $controller->{$method}();
                    }
                } else {
                }
            }
        }
    }
    public function setUrl()
    {
        $this->url = isset($_GET["url"]) ? $_GET["url"] : null;
        $this->url = rtrim($this->url, "/");
        $this->url = explode("/", $this->url);
    }
}
