<?php require_once '../Templates/Header.php'; ?>

<?php
require_once '../Public/Departments.php';
require_once '../Public/Locations.php';
require_once '../Public/Employees.php';

$d = new Departments();
$loc = new Locations();
$emp = new Employees();

if (isset($_POST['submit'])) {
    $di = (int)$_POST['department_id'];
    $dn = trim($_POST['department_name']);
    // manager may be empty string -> NULL
    $mid = isset($_POST['manager_id']) && $_POST['manager_id'] !== '' ? (int)$_POST['manager_id'] : NULL;
    $lid = (int)$_POST['location_id'];

    $result = $d->create($di, $dn, $mid, $lid);
    if ($result) {
        header('location:../Views/Department.php');
        exit;
    } else {
        echo '<p class="container bg-danger text-center text-light">Failed to Store</p>';
    }
}
?>

<div class="container-fluid my-3">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <form action="" method="post">

                <div class="mb-3">
                    <label class="form-label">Department ID</label>
                    <input type="number" class="form-control" name="department_id" required placeholder="Enter Department ID" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Department Name</label>
                    <input type="text" class="form-control" name="department_name" required placeholder="Enter Department Name" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Manager</label>
                    <select class="form-select" name="manager_id">
                        <option value="" selected>-- None --</option>
                        <?php
                        // Employees->read should return employee_id, first_name, last_name
                        $ers = $emp->read();
                        while ($r = $ers->fetch_assoc()) {
                            echo '<option value="'.$r['employee_id'].'">'.$r['employee_id'].' - '.$r['first_name'].' '.$r['last_name'].'</option>';
                        }
                        ?>
                    </select>
                    <div class="form-text">Leave as "-- None --" to insert NULL</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <select class="form-select" name="location_id" required>
                        <option value="" selected disabled>Select a location</option>
                        <?php
                        $rs = $loc->read();
                        while ($r = $rs->fetch_assoc()) {
                            echo '<option value="'.$r['location_id'].'">'.$r['location_id'].' - '.$r['city'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <input type="submit" name="submit" value="Add Department" class="btn btn-success text-center text-light">
                </div>

            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<?php require_once '../Templates/Footer.php'; ?>
