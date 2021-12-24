<?php 
require_once 'inc/functions.inc.php';

if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";
    $value="status =1 ";
    $update=update('users',$value,$condition);
    if ($update) {
    	$_SESSION['success'] ="User Active Success";
        header("location: users.php");
    }else{
    	$_SESSION['error'] ="User Active Faield";
        header("location: users.php");
    }
    }  
?>