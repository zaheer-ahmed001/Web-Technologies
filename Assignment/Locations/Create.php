<?php require_once '../Templates/Header.php'; ?>

<?php
require_once '../Public/Locations.php';
require_once '../Public/Countries.php';

$loc = new Locations();
$c = new Countries();

if (isset($_POST['submit'])) {
    $li = (int)$_POST['location_id'];
    $st = trim($_POST['street_address']);
    $pc = trim($_POST['postal_code']);
    $ct = trim($_POST['city']);
    $sp = trim($_POST['state_province']);
    $cid = trim($_POST['country_id']); // string country code

    $result = $loc->create($li, $st, $pc, $ct, $sp, $cid);
    if ($result) {
        header('location:../Views/Location.php');
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
                    <label class="form-label">Location ID</label>
                    <input type="number" class="form-control" name="location_id" required placeholder="Enter ID" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Street Address</label>
                    <input type="text" class="form-control" name="street_address" required placeholder="Enter street address" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Postal Code</label>
                    <input type="text" class="form-control" name="postal_code" required placeholder="Enter postal code" />
                </div>

                <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" name="city" required placeholder="Enter city name" />
                </div>

                <div class="mb-3">
                    <label class="form-label">State Province</label>
                    <input type="text" class="form-control" name="state_province" placeholder="Enter state/province (optional)" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Country</label>
                    <select class="form-select form-select-lg" name="country_id" required>
                        <option value="" selected disabled>Select a country</option>
                        <?php
                        $res = $c->read();
                        while ($row = $res->fetch_assoc()) {
                            echo '<option value="'.$row['country_id'].'">'.$row['country_id'].' - '.$row['country_name'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <input type="submit" name="submit" value="Add Location" class="btn btn-success text-center text-light">
                </div>

            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<?php require_once '../Templates/Footer.php'; ?>
