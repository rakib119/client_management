<?php 
require_once 'inc/functions.inc.php';

if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";
    $value="status =0 ";
    $update=update('services',$value,$condition);
    if ($update) {
    	$_SESSION['success'] ="Service Deactive Success";
        header("location: service.php");
    }else{
    	$_SESSION['error'] ="Service Deactive Faield";
        header("location: service.php");
    }
    }  
?>