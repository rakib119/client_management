<?php 
require_once 'inc/functions.inc.php';
if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";

    $deletedata=delete('test',$condition);
    if ($deletedata) {
         $_SESSION['success'] ="Purchase Info Delete Success";
         header("location: purchase.php");
    }else{
    	$_SESSION['error'] ="Purchase Info Faield";
        header("location: purchase.php");
    }
    }  
?>