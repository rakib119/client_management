<?php
require_once "inc/functions.inc.php";
// insert
if (isset($_POST['submit_subcategories'])) {
 
    $flag = 0;
  
    if (!$_POST['categories_id']) {
        $_SESSION['categories_id_error'] = "Please enter choose a categories_id";
        $flag = 1;
    }
    //  subcategory_name
    if (!$_POST['subcategory_name']) {
        $_SESSION['subcategory_name_error'] = "Please enter  subcategories name";
        $flag = 1;
    } else {
        $categories_id = $_POST['categories_id'];
        $subcategory_name = name_format($_POST['subcategory_name']);
        $_SESSION['old_subcategory_name'] = $subcategory_name;
        
        $select=select("sub_categories","*","subcategory_name='".$subcategory_name."' AND categories_id =".$categories_id);
        if(mysqli_num_rows($select) > 0){
            $_SESSION['error'] = "This name already exsits";
            echo '<script>window.location.href="service-subcategories.php"</script>';
            $flag=1;
        }
    }
    if ($flag == 0) {
        $created_by = $_SESSION['LOGIN_ID'];
        $created_at = date('Y-m-d h:i:s');
        unset($_SESSION['old_subcategory_name']);
        $field_name = "categories_id,subcategory_name,created_at,created_by";
        $values = "'$categories_id','$subcategory_name','$created_at','$created_by'";
        if (insert("sub_categories", $field_name, $values)) {
            $_SESSION['success'] = "Subcategories added successfully";
            header('location: service-subcategories.php');
        }
    } else {
        header('location: service-subcategories.php');
    }
}
// edit
// pr($_POST);
// die();
if (isset($_POST['edit_sub_categories'])) {
    $id = $_POST['id'];
    $flag = 0;
    // categories_id
    if (!$_POST['categories_id']) {
        $_SESSION['categories_id_error'] = "Please select a category";
        $flag = 1;
    } else {
        $categories_id = get_safe_value($_POST['categories_id']);
    }
    // subcategory_name
    if (!$_POST['subcategory_name']) {
        $_SESSION['value_error'] = "Please enter value";
        $flag = 1;
    } else {
        $subcategory_name = name_format($_POST['subcategory_name']);
        
        $select=select("sub_categories","*","subcategory_name='".$subcategory_name."' AND categories_id =".$categories_id);
        if(mysqli_num_rows($select) > 0){
            $_SESSION['error'] = "This name already exsits";
            echo '<script>window.location.href="service-subcategories.php"</script>';
            $flag=1;
        }
    }
    $id = $_POST['id'];
    $categories_id = $_POST['categories_id'];
    if ($flag == 0) {
        $updated_by = $_SESSION['LOGIN_ID'];
        $updated_at = date('Y-m-d h:i:s');
        $value = "categories_id='$categories_id',subcategory_name='$subcategory_name',updated_by='$updated_by',updated_at='$updated_at'";
        $condition = "id='$id'";
        $update = update("sub_categories", "$value", "$condition");
        if ($update) {
            $_SESSION['success'] = "sub Categories successfully updated";
            header('location: service-subcategories.php');
        } else {
            header("location: edit-service-subcategories.php?id=$id&task=edit");
        }
    } else {
        header("location: edit-service-subcategories.php?id=$id&task=edit");
    }
}
// Delete And Status update
if (isset($_GET['id']) && isset($_GET['task'])) {
    $id = $_GET["id"];
    $task = $_GET["task"];
    //delete specifique row
    if ($task == "delete") {
        $delete = delete("sub_categories", "id='$id'");
        if ($delete) {
            $_SESSION['success'] = "Data Deleted Successfully";
            header('location: service-subcategories.php');
        }
    }
 
}
