<?php

class Employee extends Controller
{
    public $response;
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
                $this->employee = json_encode($this->employee);

                echo $this->employee;
            }
        }
    }
    public function updateEmployee($param = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($param !== null) {
                $id = $param[0];
                $this->employee = $_POST;
                $this->response = $this->model->update($this->employee, $id);
                if ($this->response === true) {
                    $this->view->location("employee");
                }
            }
        }
    }
    public function updateEmployeeDash($param = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == "PUT") {
            if ($param !== null) {
                $id = $param[0];
                $this->employee = json_decode(file_get_contents('php://input'), true);
                $this->response = $this->model->updateFromDash($this->employee, $id);
                if ($this->response === true) {
                    echo "true";
                }
            }
        }
    }
    public function deleteEmployee($param = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            if ($param !== null) {
                $id = $param[0];
                $this->model->delete($id);
                var_dump($this->model->delete($id));
            }
        }
    }

    public function addEmployee()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->employee = json_decode(file_get_contents("php://input"), true);
            $this->request = $this->model->add($this->employee);
            if (isset($this->request)) {
                $this->setResponse("success");
                $this->response["id"] = $this->request;
                $this->response = json_encode($this->response);
                echo $this->response;
            }
        }
    }
    public function setResponse($status)
    {
        $this->response = ["status" => "$status"];
    }
    public function consultEmployee($params = null)
    {

        if ($params !== null) {
            $id = $params[0];
            $this->view->employee = $this->model->getById($id);
            $this->view->render("employee/index");
        } else {
            require_once(CONTROLLERS . "error.php");
            $this->error = new Err();
        }
    }
    public function newEmployee(){
        $this->view->render("employee/index");
    }
    public function createEmployee(){
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            $this->employee = $_POST;
            $this->view->render("employee/index");
            $this->setResponse("success");
            $this->model->add($this->employee);
        }
    }
}
