<?php
require_once '../Config/Database.php';

class Locations extends Database
{
    public function read()
    {
        $sql = "SELECT * FROM locations";
        return $this->con->query($sql);
    }

    public function create($location_id, $street_address, $postal_code, $city, $state_province, $country_id)
    {
        $sql = "INSERT INTO locations (location_id, street_address, postal_code, city, state_province, country_id)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('isssss', $location_id, $street_address, $postal_code, $city, $state_province, $country_id);
        return $stmt->execute();
    }
}
?>
