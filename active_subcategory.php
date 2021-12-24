<?php 
require_once 'inc/functions.inc.php';

if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";
    $value="status =1 ";
    $update=update('sub_categories',$value,$condition);
    if ($update) {
    	$_SESSION['success'] ="Sub Category Active Success";
        header("location: service-subcategories.php");
    }else{
    	$_SESSION['error'] ="sub category Active Faield";
        header("location: service-subcategories.php");
    }
    }  
?>