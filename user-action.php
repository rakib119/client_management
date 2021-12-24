<?php
require_once "inc/functions.inc.php";
if (isset($_POST['submit_users'])) {
    $flag = 0;
    //  name
    if (!$_POST['name']) {
        $_SESSION['name_error'] = "Please enter a user name";
        $flag = 1;
    } else {
        $name = get_safe_value($_POST['name']);
        $_SESSION['old_name'] = $name;
    }
    // email
    if (!$_POST['email']) {
        $_SESSION['email_error'] = "Please enter email";
        $flag = 1;
    } else {
        $email = get_safe_value($_POST['email']);
        $_SESSION['old_email'] = $email;
    }
    // mobile
    if (!$_POST['mobile']) {
        $_SESSION['mobile_error'] = "Please enter mobile";
        $flag = 1;
    } else {
        $mobile = get_safe_value($_POST['mobile']);
        $_SESSION['old_mobile'] = $mobile;
    }

    // role_id
    if (isset($_POST['role_id']) && !$_POST['role_id'] != "") {
        $_SESSION['role_id_error'] = "Please select a Role";
        $flag = 1;
    } else {
        $role_id = get_safe_value($_POST['role_id']);
        $_SESSION['old_role_id'] = $role_id;
    }
    // password
    if (!$_POST['password']) {
        $_SESSION['password_error'] = "Please Enter a Password";
        $flag = 1;
    }

    // confirm_password
    if (!$_POST['confirm_password']) {
        $_SESSION['confirm_password_error'] = "Please Enter Confirm Password";
        $flag = 1;
    }
    // password match
    if ($_POST['password'] != "" && $_POST['confirm_password'] != "") {
        if ($_POST['password'] != $_POST['confirm_password']) {
            $flag = 1;
            $_SESSION['match_error'] = "password and confirm password does not match ";
        }
    }
    // gender
    if (!isset($_POST['gender'])) {
        $_SESSION['gender_error'] = "Please select a gender";
        $flag = 1;
    } else {
        $gender = get_safe_value($_POST['gender']);
        $_SESSION['old_gender'] = $gender;
    }
    if ($flag == 0) {

        $name = name_format($_POST['name']);
        $email = email_format($_POST['email']);
        $mobile = valid_phone_number($_POST['mobile']);
        $role_id = get_safe_value($_POST['role_id']);
        $password = password_format($_POST['password']);
        $gender = get_safe_value($_POST['gender']);
        $created_at = date("Y-m-d H:i:s");
        $created_by = $_SESSION["LOGIN_ID"];
        unset($_SESSION['old_name']);
        unset($_SESSION['old_email']);
        unset($_SESSION['old_mobile']);
        unset($_SESSION['old_role_id']);
        unset($_SESSION['old_gender']);
        $column_name = "name,email,mobile,role_id,gender,password,created_at,created_by";
        $values = "'$name','$email','$mobile','$role_id','$gender','$password','$created_at','$created_by'";
        if (insert("users", $column_name, $values)) {
            $_SESSION['success'] = "User added successfully";
            header('location: users.php');
        }
    } else {
        header('location: add-users.php');
    }
}
// update information 
if (isset($_POST['update_user'])) {

    $id = $_POST['id'];
    $flag = 0;
    // intro
    if (!$_POST['name']) {
        $_SESSION['name_error'] = "Please enter name";
        $flag = 1;
    }
    //email
    if (!$_POST['email']) {
        $_SESSION['email_error'] = "Please enter email";
        $flag = 1;
    }
    //role_id
    if (!$_POST['role_id']) {
        $_SESSION['role_id_error'] = "Please enter role_id";
        $flag = 1;
    }
    if ($flag == 0) {
        $name = name_format($_POST['name']);
        $email = name_format($_POST['email']);
        $mobile = get_safe_value($_POST['mobile']);
        $role_id = get_safe_value($_POST['role_id']);
        $updated_at = date("Y-m-d H:i:s");
        $updated_by = $_SESSION["LOGIN_ID"];
        $values = "name = '$name',email = '$email',mobile = '$mobile',role_id = '$role_id',updated_at = '$updated_at',updated_by = '$updated_by'";
        $update = update("users", "$values", "id='$id'");
        if ($update) {
            $_SESSION['success'] = "Update successfully";
            header('location: users.php');
        } else {
            header("location: edit-user.php?id=$id&&task=update");
        }
    } else {
        header("location: edit-user.php?id=$id&&task=update");
    }
}
// Delete And Status update

if (isset($_GET['id']) && isset($_GET['task'])) {
    $id = $_GET["id"];
    $task = $_GET["task"];
    //delete specifique row
    if ($task == "delete") {
        $delete = delete("users", "id='$id'");
        if ($delete) {
            $_SESSION['success'] = "User Delete Successfully";
            header('location: users.php');
        }else{
             $_SESSION['error'] = "User Delete Faield";
            header('location: users.php');
        }
    }
}
?>
