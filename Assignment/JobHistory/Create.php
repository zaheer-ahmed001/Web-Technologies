<?php require_once '../Templates/Header.php'; ?>

<?php
require_once '../Public/JobHistory.php';
require_once '../Public/Employees.php';
require_once '../Public/Jobs.php';
require_once '../Public/Departments.php';

$jhistory = new JobHistory();
$emp = new Employees();
$job = new Jobs();
$dep = new Departments();

if (isset($_POST['submit'])) {
    $eid = (int)$_POST['employee_id'];
    $sd = $_POST['start_date'];
    $ed = $_POST['end_date'];
    $jid = trim($_POST['job_id']);
    $did = (int)$_POST['department_id'];

    $result = $jhistory->create($eid, $sd, $ed, $jid, $did);
    if ($result) {
        header('location:../Views/JobHistory.php');
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
                    <label class="form-label">Employee</label>
                    <select class="form-select" name="employee_id" required>
                        <option value="" selected disabled>Select Employee</option>
                        <?php
                        $res = $emp->read();
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['employee_id']}'>{$row['employee_id']} - {$row['first_name']} {$row['last_name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-control" name="start_date" required />
                </div>

                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" class="form-control" name="end_date" required />
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
                    <label class="form-label">Department</label>
                    <select class="form-select" name="department_id" required>
                        <option value="" selected disabled>Select Department</option>
                        <?php
                        $res = $dep->read();
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['department_id']}'>{$row['department_id']} - {$row['department_name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <input type="submit" name="submit" value="Add Job History" class="btn btn-success text-center text-light">
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<?php require_once '../Templates/Footer.php'; ?>
