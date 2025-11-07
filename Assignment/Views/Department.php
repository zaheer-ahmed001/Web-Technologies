<?php require_once '../Templates/Header.php'; ?>

<div class="container my-3">
    <div class="table-responsive">
        <table class="table table-primary">
            <a href="../Departments/Create.php" class="btn btn-success m-3">Add Department</a>
            <thead>
                <tr>
                    <th scope="col">Department ID</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Manager ID</th>
                    <th scope="col">Location ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../Public/Departments.php';
                $dep = new Departments();
                $result = $dep->read();
                while ($row = $result->fetch_assoc()) {
                    echo '
                        <tr>
                            <td>'.$row['department_id'].'</td>
                            <td>'.$row['department_name'].'</td>
                            <td>'.$row['manager_id'].'</td>
                            <td>'.$row['location_id'].'</td>
                        </tr>
                    ';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../Templates/Footer.php'; ?>
