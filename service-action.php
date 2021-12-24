<?php
require_once "inc/functions.inc.php";
if (isset($_POST['submit_service'])) {
    $flag = 0;
    //  categories
    if (!$_POST['categories']) {
        $_SESSION['categories_error'] = "Please select a categories id";

        $flag = 1;
    } else {
        $categories = get_safe_value($_POST['categories']);
        $_SESSION['old_categories_id'] = $categories;
    }
    //  subcategories_id
    if (!$_POST['subcategories_id']) {
        $_SESSION['subcategories_id_error'] = "Please enter a user subcategories_id";
        $flag = 1;
    } else {
        $subcategories_id = get_safe_value($_POST['subcategories_id']);
        $_SESSION['old_subcategories_id'] = $subcategories_id;
    }
    // service name
    if (!$_POST['service_name']) {
        $_SESSION['service_name_error'] = "Please enter service name";
        $flag = 1;
    } else {
        $service_name = get_safe_value($_POST['service_name']);
        $_SESSION['old_service_name'] = $service_name;
    }
    // service_details
    if (!$_POST['service_details']) {
        $_SESSION['service_details_error'] = "Please enter service amount";
        $flag = 1;
    } else {
        $service_details = get_safe_value($_POST['service_details']);
    }
    // service_amount
    if (!$_POST['service_amount']) {
        $_SESSION['service_amount_error'] = "Please enter service amount";
        $flag = 1;
    } else {
        $service_amount = get_safe_value($_POST['service_amount']);
        $_SESSION['old_service_amount'] = $service_amount;
    }

    // price_categories
    if (isset($_POST['price_categories'])) {
        $price_categories = get_safe_value($_POST['price_categories']);
    } else {
        $price_categories = "";
    }
    // price_categories
    if (isset($_POST['price_unit '])) {
        $price_unit  = get_safe_value($_POST['price_unit ']);
    } else {
        $price_unit  = "";
    } // price_unit_amount
    if (isset($_POST['price_unit_amount'])) {
        $price_unit_amount = get_safe_value($_POST['price_unit_amount']);
    } else {
        $price_unit_amount = "";
    }
    // image
    if ($_FILES['image']['error'] > 0) {
        $_SESSION['image_error'] = "Please upload a image";
        $flag = 1;
    } else {
        $photo_name = $_FILES['image']['name'];
        $ext = strtolower(extension($photo_name));
        if ($ext != 'jpg') {
            $_SESSION['image_error'] = "Please upload jpg formate image";
            $flag = 1;
        }
    }
    $condition="subcategories_id = $subcategories_id AND categories_id = $categories AND service_name ='$service_name' ";
    $select=select("services","*",$condition);
        if(mysqli_num_rows($select) > 0){
            $_SESSION['error'] = "This name already exsits";
            echo '<script>window.location.href="service.php"</script>';
            $flag=1;
        }

    if ($flag == 0) {
        //file uploading
        $file_name = $_FILES['image']['name'];
        $new_file_name = generate_file_name($file_name);
        $temp_photo_path =  $_FILES['image']['tmp_name'];
        $new_photo_path = "assets/images/upload/service" . "/" . $new_file_name;
        move_uploaded_file($temp_photo_path, $new_photo_path);
        // unset session
        unset($_SESSION['old_categories_id']);
        unset($_SESSION['old_subcategories_id']);
        unset($_SESSION['old_service_amount']);
        $created_at = date("Y-m-d H:i:s");
        $created_by = $_SESSION["LOGIN_ID"];
        $image = $new_file_name;
        $column_name = "categories_id,subcategories_id,service_name,service_details,service_amount,price_categories,price_unit,price_unit_amount,image,created_at,created_by";
        $values = "'$categories','$subcategories_id','$service_name','$service_details','$service_amount','$price_categories','$price_unit','$price_unit_amount','$image','$created_at','$created_by'";
        if (insert("services", $column_name, $values)) {
            $_SESSION['success'] = "Services Updated successfully";
            header('location: service.php');
        }
    } else {
        header('location: add-service.php');
    }
}
// pr($_POST);
// pr($_FILES);
// die();

// update information 
if (isset($_POST['update_service'])) {

    $id = $_POST['id'];
    $flag = 0;
    if (!$_POST['categories']) {
        $_SESSION['categories_error'] = "Please select a categories id";
        $flag = 1;
    } else {
        $categories = get_safe_value($_POST['categories']);
    }
    //  subcategories_id
    if (!$_POST['subcategories_id']) {
        $_SESSION['subcategories_id_error'] = "Please enter a user subcategories_id";
        $flag = 1;
    } else {
        $subcategories_id = get_safe_value($_POST['subcategories_id']);
    }

    // service name
    if (!$_POST['service_name']) {
        $_SESSION['service_name_error'] = "Please enter service name";
        $flag = 1;
    } else {
        $service_name = get_safe_value($_POST['service_name']);
    }
    // service_details
    if (!$_POST['service_details']) {
        $_SESSION['service_details_error'] = "Please enter service amount";
        $flag = 1;
    } else {
        $service_details = get_safe_value($_POST['service_details']);
    }
    // service_amount
    if (!$_POST['service_amount']) {
        $_SESSION['service_amount_error'] = "Please enter service amount";
        $flag = 1;
    } else {
        $service_amount = get_safe_value($_POST['service_amount']);
    }
    // price_categories
    if (isset($_POST['price_categories'])) {
        $price_categories = get_safe_value($_POST['price_categories']);
    } else {
        $price_categories = "";
    }
    // price_categories
    if (isset($_POST['price_unit '])) {
        $price_unit  = get_safe_value($_POST['price_unit ']);
    } else {
        $price_unit  = "";
    } // price_unit_amount
    if (isset($_POST['price_unit_amount'])) {
        $price_unit_amount = get_safe_value($_POST['price_unit_amount']);
    } else {
        $price_unit_amount = "";
    }
    //image
    if ($_FILES['image']['name']) {
        $photo_name = $_FILES['image']['name'];
        $ext = strtolower(extension($photo_name));
        if ($ext != 'jpg') {
            $_SESSION['image_error'] = "Please upload jpg formate image";
            $flag = 1;
        }
    }
    
     $condition="subcategories_id = $subcategories_id AND categories_id = $categories AND service_name ='$service_name' ";
    $select=select("services","*",$condition);
        if(mysqli_num_rows($select) > 0){
            $_SESSION['error'] = "This name already exsits";
            echo '<script>window.location.href="service.php"</script>';
            $flag=1;
        }
    if ($flag == 0) {
        if ($_FILES['image']['name']) {
            $old_file_name = mysqli_fetch_assoc(select("services", "*", "id=$id"))["image"];
            // delete old file
            $path ="assets/images/upload/service/$old_file_name";
            unlink($path);
            //file uploading
            $file_name = $_FILES['image']['name'];
            $new_file_name = generate_file_name($file_name);
            $temp_photo_path =  $_FILES['image']['tmp_name'];
            $new_photo_path = "assets/images/upload/service" . "/" . $new_file_name;
            $upload = move_uploaded_file($temp_photo_path, $new_photo_path);
            $photoUpdate =  update('services', "image='$new_file_name'", "id=$id");
        }
        $updated_at = date("Y-m-d H:i:s");
        $updated_by = $_SESSION["LOGIN_ID"];
        $values = "categories_id='$categories',subcategories_id='$subcategories_id',service_name='$service_name',service_details='$service_details',service_amount='$service_amount',price_categories='$price_categories',price_unit='$price_unit',price_unit_amount='$price_unit_amount',updated_at='$updated_at',updated_by='$updated_by'";
        $update = update("services", "$values", "id='$id'");

        if ($update) {
            $_SESSION['success'] = "Update successfully";
            header('location: service.php');
        } else {
            header("location: edit_service.php?id=$id&task=update");
        }
    } else {
        header("location: edit_service.php?id=$id&task=update");
    }
}
// Delete And Status update
if (isset($_GET['id']) && isset($_GET['task'])) {
    $id = $_GET["id"];
    $task = $_GET["task"];
    //delete specifique row
    if ($task == "delete") {
        $old_file_name = mysqli_fetch_assoc(select("services", "*", "id=$id"))["image"];
        // delete old file
        $path = "assets/images/upload/service/$old_file_name";
        unlink($path);
        $delete = delete("services", "id='$id'");
        if ($delete) {
            $_SESSION['success'] = "Service deleted successfully";
            header('location: service.php');
        }
    }
}
