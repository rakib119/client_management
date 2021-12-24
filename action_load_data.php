<?php 
require_once 'inc/functions.inc.php';
if (isset($_POST['deposit'])) {
    $condition="WHERE total_amount!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY created_at DESC";
    $countdeposit=sumdata("test","total_amount","total_deposit",$condition);
    if ($countdeposit) {
        $value1=mysqli_fetch_assoc($countdeposit);
        if ($value1['total_deposit'] == "") {
            echo "৳ ".'0';
        }else{
            echo "৳ ".$value1['total_deposit'];
        }
    } 
     
}
if (isset($_POST['purchase'])) {
    $condition="WHERE selling_price!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY created_at DESC";
    $countpurchase=sumdata("test","selling_price","total_purchase",$condition);
    if ($countpurchase) {
        $value2=mysqli_fetch_assoc($countpurchase);
        if ($value2['total_purchase'] == "") {
            echo "৳ ".'0';
        }else{
            echo "৳ ".$value2['total_purchase'];
        }
    }
}

if (isset($_POST['depositday']) && isset($_POST['day'])) {
    $condition="WHERE total_amount!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY created_at DESC";
    $countdeposit=sumdata("test","total_amount","daily_deposit",$condition);
    if ($countdeposit) {
        $value1=mysqli_fetch_assoc($countdeposit);
        if ($value1['daily_deposit'] == "") {
            echo "৳ ".'0';
        }else{
            echo "৳ ".$value1['daily_deposit'];
        }
    }
    
}
if (isset($_POST['depositweek']) && isset($_POST['week'])) {
    $condition="WHERE total_amount!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 WEEK) ORDER BY created_at DESC";
    $countdeposit=sumdata("test","total_amount","weekly_deposit",$condition);
    if ($countdeposit) {
        $value1=mysqli_fetch_assoc($countdeposit);
        if ($value1['weekly_deposit'] == "") {
            echo "৳ ".'0';
        }else{
            echo "৳ ".$value1['weekly_deposit'];
        }
    }
    
}
if (isset($_POST['depositmonth']) && isset($_POST['month'])) {
    $condition="WHERE total_amount!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY created_at DESC";
    $countdeposit=sumdata("test","total_amount","monthly_deposit",$condition);
    if ($countdeposit) {
        $value1=mysqli_fetch_assoc($countdeposit);
        if ($value1['monthly_deposit'] == "") {
            echo "৳ ".'0';
        }else{
            echo "৳ ".$value1['monthly_deposit'];
        }
    }
    
}
if (isset($_POST['deposityear']) && isset($_POST['year'])) {
    $condition="WHERE total_amount!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 YEAR) ORDER BY created_at DESC";
    $countdeposit=sumdata("test","total_amount","yearly_deposit",$condition);
    if ($countdeposit) {
        $value1=mysqli_fetch_assoc($countdeposit); 
        if ($value1['yearly_deposit'] == "") {
            echo "৳ ".'0';
        }else{
            echo "৳ ".$value1['yearly_deposit'];
        }
        
    }
    
}
if (isset($_POST['purchaseday']) && isset($_POST['day'])) {
    $condition="WHERE selling_price!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY created_at DESC";
    $countdeposit=sumdata("test","selling_price","daily_purchase",$condition);
    if (mysqli_num_rows($countdeposit) > 0) {
        $value1=mysqli_fetch_assoc($countdeposit);
        if ($value1['daily_purchase'] == "") {
            echo "৳ ".'0';
        }else{
            echo "৳ ".$value1['daily_purchase'];
        }

    }
    
}
if (isset($_POST['purchaseweek']) && isset($_POST['week'])) {
    $condition="WHERE selling_price!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 WEEK) ORDER BY created_at DESC";
    $countdeposit=sumdata("test","selling_price","weekly_purchase",$condition);
    if ($countdeposit) {
        $value1=mysqli_fetch_assoc($countdeposit);
        if ($value1['weekly_purchase'] == "") {
            echo "৳ ".'0';
        }else{
            echo "৳ ".$value1['weekly_purchase'];
        }
    }
}
if (isset($_POST['purchasemonth']) && isset($_POST['month'])) {
    $condition="WHERE selling_price!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY created_at DESC";
    $countdeposit=sumdata("test","selling_price","monthly_purchase",$condition);
    if ($countdeposit) {
        $value1=mysqli_fetch_assoc($countdeposit);
        if ($value1['monthly_purchase'] == "") {
            echo "৳ ".'0';
        }else{
            echo "৳ ".$value1['monthly_purchase'];
        }
        
    }
    
}
if (isset($_POST['purchaseyear']) && isset($_POST['year'])) {
    $condition="WHERE selling_price!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 YEAR) ORDER BY created_at DESC";
    $countdeposit=sumdata("test","selling_price","yearly_purchase",$condition);
    if ($countdeposit) {
        $value1=mysqli_fetch_assoc($countdeposit);
        if ($value1['yearly_purchase'] == "") {
            echo "৳ ".'0';
        }else{
            echo "৳ ".$value1['yearly_purchase'];
        }
    }
    
}

 ?>