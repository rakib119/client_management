<?php
session_start();
date_default_timezone_set("asia/dhaka");

function file_upload_path()
{
    define('UPLOAD_PATH', "assets\images\upload");
    return UPLOAD_PATH;
}
function delete_file_path()
{
    define('DELETE_FILE_PATH', dirname(__DIR__) . "\assets\images\upload");
    return DELETE_FILE_PATH;
}
// echo delete_file_path();
// echo file_upload_path();

function db_conn()
{
    $db = mysqli_connect("localhost", "bgdbilli_client", "bgdclient", "bgdbilli_client");
    return $db;
}
function pr($str)
{
    echo "<pre>";
    print_r($str);
    echo "</pre>";
}
function get_safe_value($str)
{
    if ($str != '') {
        $str = trim($str);
        $str = htmlspecialchars($str);
        return mysqli_real_escape_string(db_conn(), $str);
    }
}
function name_format($str)
{
    if ($str != '') {
        $str = get_safe_value($str);
        $str = strtolower($str);
        $str = ucwords($str);
        return mysqli_real_escape_string(db_conn(), $str);
    }
}
function email_format($str)
{
    if ($str != '') {
        $str = get_safe_value($str);
        $str = strtolower($str);
        return mysqli_real_escape_string(db_conn(), $str);
    }
}
function message_format($str)
{
    if ($str != '') {
        $str = get_safe_value($str);
        $str = ucfirst($str);
        return mysqli_real_escape_string(db_conn(), $str);
    }
}
// phone number Validation
function valid_phone_number($str)
{
    if ($str != '') {
        $str = get_safe_value($str);
        $numaric = is_numeric($str);
        $len = strlen($str);
        $pos_0 = strpos($str, "0");
        $pos_1 = strpos($str, "1");
        $pos_2_3 = strpos($str, "3");
        $pos_2_4 = strpos($str, "4");
        $pos_2_5 = strpos($str, "5");
        $pos_2_6 = strpos($str, "6");
        $pos_2_7 = strpos($str, "7");
        $pos_2_8 = strpos($str, "8");
        $pos_2_9 = strpos($str, "9");
        if ($numaric == true && $len == 11 && $pos_0 == 0 && $pos_1 == 1) {
            if (
                $pos_2_3 == 2 || $pos_2_4 == 2 || $pos_2_5 == 2 || $pos_2_6 == 2 ||
                $pos_2_7 == 2 || $pos_2_8 == 2 || $pos_2_9 == 2
            ) {
                return mysqli_real_escape_string(db_conn(), $str);
            } else {
                $str = "";
                return mysqli_real_escape_string(db_conn(), $str);
            }
        } else {
            $str = "";
            return mysqli_real_escape_string(db_conn(), $str);
        }
    }
}
//password formate
function password_format($str)
{
    if ($str != "") {
        $str = get_safe_value($str);
        $str = sha1($str);
        $str = md5($str);
        return mysqli_real_escape_string(db_conn(), $str);
    }
}

// insert
function insert($table_name, $field_names, $values)
{
    $insert = "INSERT INTO $table_name ($field_names) VALUES($values)";
    //  die();
    $result = mysqli_query(db_conn(), $insert);
    return $result;
}
// Select
function select($table_name, $field_names, $conditions = "", $join = "")
{
    $new_conditions = $conditions;
    if ($conditions) {
        $new_conditions =  "WHERE $conditions ";
    }
      $select = "SELECT $field_names FROM $table_name $join $new_conditions";
        // die();
    $result = mysqli_query(db_conn(), $select);
    return $result;
}

// Select with sum table data
function sumdata($table_name, $field_names, $as, $conditions = "")
{
     $select = "SELECT SUM($field_names) AS $as FROM $table_name $conditions";
    // die();
    $result = mysqli_query(db_conn(), $select);
    return $result;
}
// Select with count table data
function countdata($table_name, $field_names, $as, $conditions = "")
{
    $select = "SELECT COUNT($field_names) AS $as FROM $table_name $conditions";
    // die();
    $result = mysqli_query(db_conn(), $select);
    return $result;
}
// Select with join table
function selectjoin($table_name, $field_names, $conditions = "")
{
    $select = "SELECT $field_names FROM $table_name $conditions";
    // die();
    $result = mysqli_query(db_conn(), $select);
    return $result;
}
// update 
function update($table_name, $values, $conditions)
{
     $update = "UPDATE $table_name SET $values WHERE $conditions";
    // die();
    $result = mysqli_query(db_conn(), $update);
    return $result;
}
// delete 
function delete($table_name, $conditions)
{
    $delete = "DELETE FROM $table_name WHERE $conditions";
    // die();
    $result = mysqli_query(db_conn(), $delete);
    return $result;
}
// update status
function update_status($table_name, $id)
{
    $fetch_status = mysqli_fetch_assoc(select($table_name, '*', "id=$id"));
    echo  $old_status = $fetch_status['status'];
    if ($old_status == 1) {
        $update_status = 0;
    } else {
        $update_status = 1;
    }
    $update_status_querry = update($table_name, "status=$update_status", "id=$id");
    return $update_status_querry;
}
//file extension
function extension($file_name)
{
    $after_explode = explode(".", $file_name);
    $extension = end($after_explode);
    return $extension;
}
// genarate unique file name 
function generate_file_name($file_name)
{
    $extension = extension($file_name);
    $new_file_name = date("Y-m-d_H-i-s") . rand(111111111, 9999999999) . "." . $extension;
    return $new_file_name;
}
