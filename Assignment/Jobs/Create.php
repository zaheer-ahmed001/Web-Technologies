<?php require_once '../Templates/Header.php'; ?>

<?php
require_once '../Public/Jobs.php';
$j = new Jobs();

if (isset($_POST['submit'])) {
    // job_id is alphanumeric (SA_MAN...), keep as string
    $jid = trim($_POST['job_id']);
    $jn = trim($_POST['job_title']);
    $min = (int)$_POST['min_salary'];
    $max = (int)$_POST['max_salary'];

    $result = $j->create($jid, $jn, $min, $max);
    if ($result) {
        header('location:../Views/Job.php');
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
                    <label class="form-label">Job ID</label>
                    <input type="text" class="form-control" name="job_id" required placeholder="Enter Job ID (e.g. SA_MAN)" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Job Title</label>
                    <input type="text" class="form-control" name="job_title" required placeholder="Enter Job Title" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Minimum Salary</label>
                    <input type="number" class="form-control" name="min_salary" required placeholder="Enter Minimum Salary" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Maximum Salary</label>
                    <input type="number" class="form-control" name="max_salary" required placeholder="Enter Maximum Salary" />
                </div>

                <div>
                    <input type="submit" name="submit" value="Add Job" class="btn btn-success text-center text-light">
                </div>

            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<?php require_once '../Templates/Footer.php'; ?>
