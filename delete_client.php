<?php 
require_once 'inc/functions.inc.php';

if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";
    $deletedata=delete('clients',$condition);
    if ($deletedata) {
         $_SESSION['success'] ="Client Delete Success";
         header("location: all_client.php");
    }else{
    	$_SESSION['error'] ="Client Delete Faield";
        header("location: all_client.php");
    }
    }  
?>