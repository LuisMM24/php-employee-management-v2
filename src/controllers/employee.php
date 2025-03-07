<?php
class Employee extends Controller
{
    public $response;
    public function __construct()
    {
        parent::__construct();
        $this->session->checkSessionDashboard();
        //check is session is timed out
        if ($this->session->isSessionExpired()) {
            $this->view->location("login/timeOut");
        }
    }
    public function render()
    {
        //load all employees (dashboard)
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
                if ($this->response == true) {
                    $this->setResponse("success");
                    $this->response = json_encode($this->response);
                    echo $this->response;
                }
            }
        }
    }
    public function deleteEmployee($param = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
            if ($param !== null) {
                $id = $param[0];
                $this->response = $this->model->delete($id);
                if ($this->response == true) {
                    $this->setResponse("success");
                    $this->employee = json_encode($this->response);
                    echo $this->response;
                }
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
    public function consult($params = null)
    {

        if ($params !== null) {
            $id = $params[0];
            $this->view->employee = $this->model->getById($id);
            if (!empty($this->view->employee)) {
                $this->view->render("employee/index");
            } else {
                $this->view->render("error/index");
            }
        } else {
            $this->view->render("error/index");
        }
    }
    public function newEmployee()
    {
        $this->view->render("employee/index");
    }
    public function createEmployee()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $this->employee = $_POST;
            $this->view->render("employee/index");
            $this->setResponse("success");
            $this->model->add($this->employee);
        }
    }
}
