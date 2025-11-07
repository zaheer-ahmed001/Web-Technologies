<?php 
require_once '../Config/Database.php';

class Jobs extends Database
{
    // Read all jobs
    public function read()
    {
        return $this->con->query("SELECT * FROM jobs");
    }

    // Create a new job
    public function create($job_id, $job_title, $min_salary, $max_salary)
    {
        $sql = "INSERT INTO jobs (job_id, job_title, min_salary, max_salary) VALUES (?,?,?,?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('ssii', $job_id, $job_title, $min_salary, $max_salary);
        return $stmt->execute();
    }
}
?>
