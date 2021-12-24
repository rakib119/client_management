<?php
require_once "inc/functions.inc.php";
if (isset($_POST['submit_permission'])) {
    $permission = '';
    $flag = 0;
    // pr($_POST);
    if (!$_POST['role_id']) {
        $_SESSION['error'] = "Please choose a role";
        header('location: permissions.php');
        $flag = 1;
    }else{
          $role_id = get_safe_value($_POST['role_id']);
        }
    if (!empty($_POST["permi"])) {
        foreach ($_POST["permi"] as $permi) {
            $permission .= $permi . ',';
        }
         $permission = substr($permission, 0, -1);
    } else {
        $flag = 1;
        $_SESSION['error'] = "Please select at least one";
         header('location: permissions.php');
    }
    
    if ($flag != 1) {
        $field_name = "permission = '$permission' ";
        $insert_status = update("permissions", $field_name,"role_id='".$role_id."'");
        if ($insert_status) {
            $_SESSION['success'] = "permission set Successfully";
            header('location: permissions.php');
        }
    } else {
        $_SESSION['error'] = "Somthing wrrong";
        header('location: permissions.php');
    }
}
