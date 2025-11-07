<?php
require_once '../Config/Database.php';

class JobHistory extends Database
{
    public function read()
    {
        $sql = "SELECT * FROM job_history";
        return $this->con->query($sql);
    }

    public function create($employee_id, $start_date, $end_date, $job_id, $department_id)
    {
        $sql = "INSERT INTO job_history (employee_id, start_date, end_date, job_id, department_id)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('isssi', $employee_id, $start_date, $end_date, $job_id, $department_id);
        return $stmt->execute();
    }
}
?>
