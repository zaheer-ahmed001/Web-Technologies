<?php
require_once '../Config/Database.php';

class Employees extends Database
{
    public function read()
    {
        $sql = "SELECT * FROM employees";
        return $this->con->query($sql);
    }

    public function create($employee_id, $first_name, $last_name, $job_id, $manager_id, $department_id, $location_id, $country_id, $salary, $commission_pct)
    {
        $sql = "INSERT INTO employees (employee_id, first_name, last_name, job_id, manager_id, department_id, location_id, country_id, salary, commission_pct)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('isssiiisdd', $employee_id, $first_name, $last_name, $job_id, $manager_id, $department_id, $location_id, $country_id, $salary, $commission_pct);
        return $stmt->execute();
    }
}
?>
