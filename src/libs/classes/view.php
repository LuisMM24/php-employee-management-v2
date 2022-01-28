<?php

class View
{
    public function __construct()
    {
    }
    public function render($fileName)
    {
        require_once(VIEWS . $fileName . ".php");
    }
}
