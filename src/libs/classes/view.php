<?php

class View
{
    public $alert = [];
    public function __construct()
    {
    }
    public function render($fileName)
    {
        require_once(VIEWS . $fileName . ".php");
    }
    public function setAlert($type, $msg)
    {
        $this->alert = ["type" => $type, "message" => $msg];
    }
    public function location($site)
    {
        header("location:" . BASE_URL . "$site");
    }
}
