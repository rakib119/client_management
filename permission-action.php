<?php
require_once "inc/functions.inc.php";
if (isset($_POST['submit_permission'])) {
    $permission = '';
    $flag = 0;
    pr($_POST);
    if (!$_POST['role_id']) {
        $_SESSION['role_id_error'] = "Please choose a role";
        $flag = 1;
    } else {
        $role_id = $_POST['role_id'];
        $res = mysqli_num_rows(select('permissions', "*", "role_id='$role_id'"));
        if ($res > 0) {
            $flag = 1;
            $_SESSION['role_id_error'] = "Permissions already given";
        } else {
            $role_id = get_safe_value($_POST['role_id']);
        }
    }
    if (!empty($_POST["permi"])) {
        foreach ($_POST["permi"] as $permi) {
            $permission .= $permi . ', ';
        }
        $permission = substr($permission, 0, -2);
    } else {
        $_SESSION['permission_error'] = "Please select at least one";
    }
    if ($flag != 1) {
        $role = $_POST['role_id'];
        $field_name = "role_id,permission";
        $value = "'$role_id','$permission'";
        $insert_status = insert("permissions", $field_name, $value);
        if ($insert_status) {
            $_SESSION['success'] = "permission set Successfully";
            header('location: add-permissions.php');
        }
    } else {
        header('location: add-permissions.php');
    }
}

// $old_permission = select("permissions","")
if (isset($_POST['get_permission'])) {

    $role_id = $_POST['role_id'];
    $old_permission = explode(',', mysqli_fetch_all(select("permissions", "*", "role_id='$role_id'"))['permission']);
    $old_permission;
}
