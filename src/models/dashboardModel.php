<?php
require_once(CONTROLLERS . "employee.php");
class DashboardModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get(): array
    {
        //Gets All employees
        try {
            $query = $this->db->connect()->query(
                "SELECT * FROM employees"
            );
            $employees = $query->fetchAll();
            return $employees;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function getById($id)
    {
        //Gets one employee by id
        $employee = new Employee;
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM employees WHERE id=:id"
            );
            $query->execute([
                ":id" => $id
            ]);
            while ($items = $query->fetch()) {
                $employee->id = $items["id"];
                $employee->first_name = $items["first_name"];
                $employee->last_name = $items["last_name"];
                $employee->email = $items["email"];
                $employee->gender = $items["gender"];
                $employee->city = $items["city"];
                $employee->streetAddress = $items["streetAddress"];
                $employee->state = $items["state"];
                $employee->age = $items["age"];
                $employee->postalCode = $items["postalCode"];
                $employee->phoneNumber = $items["phoneNumber"];
            }
            return $employee;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function update($employee, $id)
    {
        try {
            $query = $this->db->connect()->prepare(
                "UPDATE employees SET first_name = :first_name,
                     email=:email,
                     age=:age,
                     streetAddress=:streetAddress,
                     city=:city,
                     postalCode=:postalCode,
                     phoneNumber=:phoneNumber
                    WHERE id = :id"
            );
            $query->execute([
                ":id" => $id,
                ":first_name" => $employee["name"],
                ":email" => $employee["email"],
                ":age" => $employee["age"],
                ":streetAddress" => $employee["streetAddress"],
                ":city" => $employee["city"],
                ":postalCode" => $employee["postalCode"],
                ":phoneNumber" => $employee["phoneNumber"]
            ]);
            return true;
        } catch (PDOException $e) {
            return $e;
        }
    }
}
