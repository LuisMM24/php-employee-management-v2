<?php

class Dashboard extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->session->checkSessionDashboard();
    }
    public function render()
    {
        $this->view->employees = $this->model->get();
        $this->view->render("dashboard/index");
    }
}
