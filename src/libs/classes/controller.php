<?php

class Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($model)
    {
        $url = MODELS . $model;
    }
}
