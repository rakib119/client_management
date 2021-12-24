<?php 
require_once 'inc/functions.inc.php';

if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition="id = $getid ";

    $selectforunlink=select("campaigns","*",$condition);
    $singlevalue=mysqli_fetch_assoc($selectforunlink);
    if (!empty($singlevalue['image'])) {
       $path="assets/images/upload/campaign/".$singlevalue['image'];
       unlink($path);
    }
    $deletedata=delete('campaigns',$condition);
    if ($deletedata) {
         $_SESSION['success'] ="Campaign Delete Success";
         header("location: campaign.php");
    }else{
    	$_SESSION['error'] ="Campaign Delete Faield";
        header("location: campaign.php");
    }
    }  
?>