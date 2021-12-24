<?php
require_once "inc/functions.inc.php";
if (isset($_POST['categories_id'])) {
	$getcategories_id=$_POST['categories_id'];
	$sub_cat_id= "";
	if (isset($_POST['sub_cat_id'])) {
		$sub_cat_id=$_POST['sub_cat_id'];
	}
	

    $condition=" status= 1 AND categories_id = $getcategories_id ";
	$result=select("sub_categories","*",$condition);

	if (mysqli_num_rows($result) > 0) {
		echo "<option value=''>--Select one--</option>";
		while ($row=mysqli_fetch_assoc($result)){
			$subcategories_id=$row['id'];
			$subcategories_name=$row['subcategory_name'];
			$status="";
			if ($subcategories_id == $sub_cat_id) {
				$status = "selected";
			}
			echo "<option value='$subcategories_id' $status>$subcategories_name</option>";
		}
	}else{
		echo "<option>Data Not Found</option>";
	}
}