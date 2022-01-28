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
        $employees = [];
        try {
            $query = $this->db->connect()->query(
                "SELECT * FROM employees"
            );
            while ($items = $query->fetch()) {
                $employees["id"] = $items["id"];
            }
        } catch (PDOException $e) {
            return [];
        }
    }
}
