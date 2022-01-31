<?php
class EmployeeModel extends Model
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
        $employee = [];
        try {
            $query = $this->db->connect()->prepare(
                "SELECT * FROM employees WHERE id=:id"
            );
            $query->execute([
                ":id" => $id
            ]);
            while ($items = $query->fetch()) {
                $employee = [
                    "id" => $items["id"],
                    "first_name" => $items["first_name"],
                    "last_name" => $items["last_name"],
                    "email" => $items["email"],
                    "gender" => $items["gender"],
                    "city" => $items["city"],
                    "streetAddress" => $items["streetAddress"],
                    "state" => $items["state"],
                    "age" =>  $items["age"],
                    "postalCode" =>  $items["postalCode"],
                    "phoneNumber" =>  $items["phoneNumber"]
                ];
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
                "UPDATE employees SET 
                    first_name = :first_name,
                    last_name = :last_name,
                    gender = :gender,
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
                ":first_name" => $employee["first_name"],
                ":last_name" => $employee["last_name"],
                ":gender" => $employee["gender"],
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
    public function updateFromDash($employee, $id)
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
    public function delete($id)
    {
        try {
            $query = $this->db->connect()->prepare("DELETE FROM employees WHERE id = :id");
            $query->execute([":id" => $id]);
            return true;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function add($employee)
    {
        try {
            $query = $this->db->connect()->prepare(
                "INSERT INTO employees (first_name,last_name,email,age,streetAddress,city,gender,state,postalCode,phoneNumber) VALUES(
                     :first_name,
                     :last_name,
                     :email,
                     :age,
                     :streetAddress,
                     :city,
                     :gender,
                     :state,
                     :postalCode,
                     :phoneNumber
                     );"
            );
            $query->execute([
                ":first_name" => $employee["first_name"],
                ":last_name" => $employee["last_name"],
                ":email" => $employee["email"],
                ":age" => $employee["age"],
                ":streetAddress" => $employee["streetAddress"],
                ":city" => $employee["city"],
                ":gender" => $employee["gender"],
                ":state" => $employee["state"],
                ":postalCode" => $employee["postalCode"],
                ":phoneNumber" => $employee["phoneNumber"]
            ]);
            $id = $this->getLastInsert();
            return $id;
        } catch (PDOException $e) {
            return false;
        }
    }
    //this is used for display the id of last user, and all info,
    private function getLastInsert()
    {
        $query = $this->db->connect()->prepare(
            "SELECT id FROM employees  ORDER BY id DESC LIMIT 1;"
        );
        try {
            $query->execute();
            while ($item = $query->fetch()) {
                $id =  $item["id"];
            };
            return $id;
        } catch (PDOException $e) {
            return false;
        }
    }
}
