<?php
class Employee extends Controller
{
  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $gender;
  public $city;
  public $streetAddress;
  public $state;
  public $age;
  public $postalCode;
  public $phoneNumber;

  public function __construct()
  {
  }

  public function addEmployee()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $newEmployeeData = trim(file_get_contents("php://input"));
      $newEmployee = json_decode($newEmployeeData, true);
      $employees = getEmployees();
      $id = getNextIdentifier($employees);
      $lastId = ["id" => $id, "streetAddress" => "", "phoneNumber" => "", "gender" => "", "lastName" => ""];
      $employee = array_merge($lastId, $newEmployee);
      addEmployee($employee);
      echo json_encode($employee);
    }
  }
  public function updateEmployee()
  {
    // UPDATE EMPLOYEE
    if ($_SERVER["REQUEST_METHOD"] == "PUT") {
      if (isset($_GET["update"])) {
        $updateEmployeeData = trim(file_get_contents("php://input"));
        $updatedEmployee = json_decode($updateEmployeeData, true);
        $employees = getEmployees();
        $employeeId = $_GET["id"];
        updateEmployee($updatedEmployee, $employeeId);
      }
    }
  }
  public function getEmployee()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
      $employeeId = $_GET["id"];
      $employee = getEmployee($employeeId);
      echo json_encode($employee);
    }
  }
  public function deleteEmployee()
  {
    if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
      $id = trim(file_get_contents("php://input"));
      deleteEmployee($id);
    }
  }
  // VIEW EMPLOYEE DETAILS in the Employee section
  public function detailsEmployee()
  {
    if (isset($_GET["v"])) {
      if ($_GET["v"] == "view") {
        $id = $_GET["id"];
        header("Location:../employee.php?v=view&id=$id");
      }
    }
  }
}
