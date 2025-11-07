<?php require_once '../Templates/Header.php'; ?>

<?php
require_once '../Public/Employees.php';
require_once '../Public/Jobs.php';
require_once '../Public/Departments.php';
require_once '../Public/Locations.php';
require_once '../Public/Countries.php';

$emp = new Employees();
$job = new Jobs();
$dept = new Departments();
$loc = new Locations();
$country = new Countries();

if (isset($_POST['submit'])) {
    $employee_id   = (int)$_POST['employee_id'];
    $first_name    = trim($_POST['first_name']);
    $last_name     = trim($_POST['last_name']);
    $job_id        = trim($_POST['job_id']);            // string like 'SA_MAN'
    $manager_id    = isset($_POST['manager_id']) && $_POST['manager_id'] !== '' ? (int)$_POST['manager_id'] : NULL;
    $department_id = (int)$_POST['department_id'];
    $location_id   = (int)$_POST['location_id'];
    $country_id    = trim($_POST['country_id']);       // country code
    $salary        = (float)$_POST['salary'];
    $commission_pct= $_POST['commission_pct'] !== '' ? (float)$_POST['commission_pct'] : NULL;

    $result = $emp->create($employee_id, $job_id, $manager_id, $department_id, $location_id, $country_id, $first_name, $last_name, $salary, $commission_pct);

    if ($result) {
        header('location:../Views/Employee.php');
        exit;
    } else {
        echo '<p class="container bg-danger text-center text-light">Failed to store</p>';
    }
}
?>

<div class="container-fluid my-3">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Employee ID</label>
                    <input type="number" class="form-control" name="employee_id" required placeholder="Enter ID" />
                </div>
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" required placeholder="Enter First Name" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" required placeholder="Enter Last Name" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Job</label>
                    <select class="form-select" name="job_id" required>
                        <option value="" selected disabled>Select Job</option>
                        <?php
                        $res = $job->read();
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['job_id']}'>{$row['job_id']} - {$row['job_title']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Manager</label>
                    <select class="form-select" name="manager_id">
                        <option value="" selected>-- None --</option>
                        <?php
                        $res = $emp->read();
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['employee_id']}'>{$row['employee_id']} - {$row['first_name']} {$row['last_name']}</option>";
                        }
                        ?>
                    </select>
                    <div class="form-text">Leave blank if no manager</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <select class="form-select" name="department_id" required>
                        <option value="" selected disabled>Select Department</option>
                        <?php
                        $res = $dept->read();
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['department_id']}'>{$row['department_id']} - {$row['department_name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <select class="form-select" name="location_id" required>
                        <option value="" selected disabled>Select Location</option>
                        <?php
                        $res = $loc->read();
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['location_id']}'>{$row['location_id']} - {$row['city']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Country</label>
                    <select class="form-select" name="country_id" required>
                        <option value="" selected disabled>Select Country</option>
                        <?php
                        $res = $country->read();
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['country_id']}'>{$row['country_id']} - {$row['country_name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Salary</label>
                    <input type="number" step="0.01" class="form-control" name="salary" required placeholder="Enter Salary" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Commission (%)</label>
                    <input type="number" step="0.01" class="form-control" name="commission_pct" placeholder="Optional - leave blank if none" />
                </div>

                <div>
                    <input type="submit" name="submit" value="Add Employee" class="btn btn-success text-center text-light">
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<?php require_once '../Templates/Footer.php'; ?>
