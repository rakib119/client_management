<?php
require_once "inc/functions.inc.php";
// insert
if (isset($_POST['submit_categories'])) {
    $flag = 0;
    //  category_name
    if (!$_POST['category_name']) {
        $_SESSION['category_name_error'] = "Please enter categories name";
        $flag = 1;
    } else {
        $category_name = get_safe_value($_POST['category_name']);
        $_SESSION['old_category_name'] = $category_name;
        
        $select=select("categories","*","category_name='".$category_name."'");
        if(mysqli_num_rows($select) > 0){
            $_SESSION['error'] = "This name already exsits";
            echo '<script>window.location.href="service-categories.php"</script>';
            $flag=1;
        }
    }
    if ($flag == 0) {
        $created_by = $_SESSION['LOGIN_ID'];
        $created_at = date('Y-m-d h:i:s');
        unset($_SESSION['old_category_name']);
        $field_name = "category_name,created_at,created_by";
        $values = "'$category_name','$created_at','$created_by'";
        if (insert("categories", $field_name, $values)) {
            $_SESSION['success'] = "Categories added successfully";
            header('location: service-categories.php');
        }
    } else {
        header('location: service-categories.php');
    }
}
// edit
if (isset($_POST['edit_categories'])) {
    $id = $_SESSION['edit_categories_id'];
    unset($_SESSION['edit_categories_id']);
    $flag = 0;
    // value
    if (!$_POST['category_name']) {
        $_SESSION['value_error'] = "Please enter value";
        $flag = 1;
    } else {
        $value = get_safe_value($_POST['category_name']);
        $select=select("categories","*","category_name='".$value."'");
        if(mysqli_num_rows($select) > 0){
            $_SESSION['error'] = "This name already exsits";
            echo '<script>window.location.href="service-categories.php"</script>';
            $flag=1;
        }
    }
    if ($flag == 0) {
        $updated_by = $_SESSION['LOGIN_ID'];
        $updated_at = date('Y-m-d h:i:s');
        $value = "category_name='$value',updated_by='$updated_by',updated_at='$updated_at'";
        $condition = "id='$id'";
        $update = update("categories", "$value", "$condition");
        if ($update) {
            $_SESSION['success'] = "Categories successfully updated";
            header('location: service-categories.php');
        } else {
            header("location: service-categories.php?id=$id&task=edit");
        }
    } else {
        header("location: service-categories.php?id=$id&task=edit");
    }
}
// Delete And Status update
if (isset($_GET['id']) && isset($_GET['task'])) {
    $id = $_GET["id"];
    $task = $_GET["task"];
    //delete specifique row
    if ($task == "delete") {
        $delete = delete("categories", "id='$id'");
        if ($delete) {
            $_SESSION['success'] = "Category deleted successfully";
            header('location: service-categories.php');
        }
    }
 
}
