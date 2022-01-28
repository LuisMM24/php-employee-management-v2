<?php
class Err extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //this changes to error view
        $this->view->text = "This view is not loaded in the database";
        $this->view->render("error/index");
    }
}
