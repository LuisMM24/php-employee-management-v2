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

            if ($param !== null) {
                $id = $param[0];
                $this->employee = $this->model->getById($id);
            }


            if (!empty($this->employee)) {
                //object to array and json encode 
                $this->employee = json_encode((array)$this->employee);

                echo $this->employee;
            }
        }
    }
    public function updateEmployee($param = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == "PUT") {
            if ($param !== null) {
                $id = $param[0];
                $this->employee = json_decode(file_get_contents('php://input'), true);
                $this->response = $this->model->update($this->employee, $id);
                if ($this->response === true) {
                    echo "true";
                }
            }
        }
    }
}
