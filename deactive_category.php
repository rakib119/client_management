<?php 
require_once 'inc/functions.inc.php';

if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";
    $value="status = 0 ";
    $update=update('categories',$value,$condition);
    if ($update) {
        $_SESSION['success'] ="Category Deactive Success";
        header("location: service-categories.php");
    }else{
        $_SESSION['error'] ="Category Deactive Faield";
        header("location: service-categories.php");
    }
    }  
?>