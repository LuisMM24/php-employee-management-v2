<?php

class Dashboard extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function showEmployees()
    {
        $this->view->employees = $this->model->get();
        $this->view->render("dashboard/index");
    }
}
