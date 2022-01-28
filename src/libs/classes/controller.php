<?php

class Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($model)
    {
        $url = MODELS . $model . "Model.php";

        //if file exist, return model selected
        if (file_exists($url)) {
            require_once $url;

            $modelName = $model . "Model";

            $this->model = new $modelName;
        }
    }
}
