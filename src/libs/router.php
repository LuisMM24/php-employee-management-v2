<?php

class Router
{
    public $url;
    public function __construct()
    {
        $this->setUrl();
        //if url don't pass any parameters
        if (empty($this->url[0])) {
            $routeController = CONTROLLERS . "login.php";
            require_once($routeController);
            $controller = new Login();
            $controller->loadModel($this->url[0]);
            $controller->render("login/index");
            return false;
        }
        //save url controller passed in parameter 0
        $routeController = CONTROLLERS . $this->url[0] . ".php";
        if (file_exists($routeController)) {
            //load controller
            require_once $routeController;
            //instance of controller and load models
            $controller = new $this->url[0];
            $controller->loadModel($this->url[0]);
            //get size of url params
            $nparams = sizeof($this->url);

            if ($nparams > 1) {
                $method = $this->url[1];

                if (method_exists($controller, $method)) {
                    if ($nparams > 2) {
                        //no matter how many params are you passing, it will pass to the function too
                        $param = [];
                        for ($i = 2; $i < $nparams; $i++) {
                            array_push($param, $this->url[$i]);
                        }
                        //execute method with param
                        $controller->{$method}($param);
                    } else {
                        //Execute only method
                        $controller->{$method}();
                    }
                } else {
                    //fail to load method
                    $this->viewError();
                }
            } else {
                //render the controller view
                $controller->render();
            }
        } else {
            //failed to load view
            $this->viewError();
        }
    }
    public function viewError()
    {
        require_once(CONTROLLERS . "error.php");
        $this->error = new Err();
    }
    public function setUrl()
    {
        //transform url in parts.
        $this->url = isset($_GET["url"]) ? $_GET["url"] : null;
        $this->url = rtrim($this->url, "/");
        $this->url = explode("/", $this->url);
    }
}
