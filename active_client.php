<?php 
require_once 'inc/functions.inc.php';

if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";
    $value="status =1 ";
    $update=update('clients',$value,$condition);
    if ($update) {
    	$_SESSION['success'] ="Client Active Success";
        header("location: all_client.php");
    }else{
    	$_SESSION['error'] ="Client Active Faield";
        header("location: all_client.php");
    }
    }  
?>