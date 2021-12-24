<?php
require_once "inc/functions.inc.php";

$service_id = $_POST['service_id'];
$campaign_id = $_POST['campaign_id'];
$service_details = mysqli_fetch_assoc(select('services', '*', "id='$service_id'"));


if (!empty($campaign_id)) {
    $data = mysqli_fetch_assoc(select("campaigns", "*", "id='$campaign_id'"));
    $offer_amount = $data['offer_amount'];
    // print_r($data);
    // print_r($service_details);

    // die();
    if ($data['percentage'] == "on") {
        $discount_amount = ($offer_amount / 100) * $service_details['service_amount'];
    } elseif ($data['percentage'] == "") {
        $discount_amount = $offer_amount;
    }
   echo $total_amount = $service_details['service_amount'] - $discount_amount;
}
