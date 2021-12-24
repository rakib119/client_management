<?php
require_once "inc/functions.inc.php";
if (isset($_POST['service_id'])) {
    $service_id = $_POST['service_id'];
    $condition = "id = $service_id";
    $result = mysqli_fetch_assoc(select("services", "*", $condition))['service_amount'];
    echo $result;
    // if (mysqli_num_rows($result) > 0) {
    //     echo "<option value=''>--Select Service--</option>";
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $service_id = $row['id'];
    //         $service_amount = $row['service_amount'];
    //         echo "<option value='$service_id'>$service_amount</option>";
    //     }
    // } else {
    //     echo "<option>Data Not Found</option>";
    // }
}
