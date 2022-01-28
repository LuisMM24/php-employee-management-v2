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
}
