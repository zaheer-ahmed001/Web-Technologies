<?php 
    require_once '../Config/Database.php';

    class Departments extends Database
    {
        public function read()
        {
            // Fetch all departments
            return $this->con->query("SELECT * FROM departments");
        }

        public function create($dept_id, $dept_name, $manager_id, $location_id)
        {
            // Insert new department record
            $sql = "INSERT INTO departments(department_id, department_name, manager_id, location_id) VALUES (?, ?, ?, ?)";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param('ssii', $dept_id, $dept_name, $manager_id, $location_id);
            return $stmt->execute();
        }
    }
?>
