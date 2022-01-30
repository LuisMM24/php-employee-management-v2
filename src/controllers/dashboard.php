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

    public function getEmployee($param = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $param[0];
            $this->employee = $this->model->getById($id);
            var_dump($this->employee);
            if (!empty($this->employee)) {
                return $this->employee;
            }
        }
    }
}
