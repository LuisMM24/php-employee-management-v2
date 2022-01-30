<?php
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
}
