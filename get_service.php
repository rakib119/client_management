<?php
require_once "inc/functions.inc.php";
if (isset($_POST['subcategories_id'])) {
    $subcategories_id = $_POST['subcategories_id'];
    $condition = "status= 1 AND subcategories_id= $subcategories_id";
    $old_service_id = "";
    if (isset($_POST['old_service_id'])) {
        $old_service_id = $_POST['old_service_id'];
    }

    $result = select("services", "*", $condition);
    if (mysqli_num_rows($result) > 0) {
        echo "<option value=''>--Select Service--</option>";
        while ($row = mysqli_fetch_assoc($result)) {
            $service_id = $row['id'];
            $status = "";
            if ($service_id == $old_service_id) {
                $status = "selected";
            }
            $service_name = $row['service_name'];
            echo "<option value='$service_id' $status>$service_name</option>";
        }
    } else {
        echo "<option>Data Not Found</option>";
    }
}
