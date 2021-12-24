<?php
require_once "inc/header.inc.php";
$id =get_safe_value($_GET['id']);
$conditions = " WHERE services.id = $id ";
$service_info =mysqli_fetch_assoc(selectjoin("services","*", $conditions));
if(!empty($service_info)){

?>
<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Service Details</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Service</a></li>
                                <li class="breadcrumb-item"><a href="service.php">All Service</a></li>
                                <li class="breadcrumb-item active">Service details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <div class="product-detail">
                                            <div class="row">
                                                <div class="col-md-8 col-9">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                                            <div class="product-img">
                                                               <a target="_blank" href="assets\images\upload\service\<?= $service_info['image'] ?>"><img src="assets\images\upload\service\<?= $service_info['image'] ?>" alt="Image" class="img-fluid mx-auto d-block"></a> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <div class="mt-4 mt-xl-3">
                                            <div class="mt-4">

                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <p class="text-muted mb-2">
                                                <div class="pdp-product-price"><span class="h3 text-primary">৳ <?= $service_info['service_amount'] ?></span>
                                                </div>
                                                </p>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                        <?php
                                                        if($service_info['status'] == 1) {
                                                            echo '<a class="btn-sm btn-success float-end">Active</a>';
                                                        }else{
                                                            echo '<a class="btn-sm btn-danger float-end">Deactive</a>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php
                                                $category=mysqli_fetch_assoc(select("categories","*","id=".$service_info['categories_id']));
                                                $sub_category=mysqli_fetch_assoc(select("sub_categories","*","id=".$service_info['subcategories_id']));
                                                $selectusers=mysqli_fetch_assoc(select("users","*","id=".$service_info['created_by']));
                                                $selectupdate=mysqli_fetch_assoc(select("users","*","id=".$service_info['updated_by']));
                                                ?>
                                                <p class="text-muted mb-2">Service Name: <?= $service_info['service_name'] ?></p>
                                                <p class="text-muted mb-2">Category: <?= $category['category_name'] ?></p>
                                                <p class="text-muted mb-2">Sub Category: <?= $sub_category['subcategory_name'] ?></p>
                                                <p class="text-muted mb-2">Service Price: <?= $service_info['service_amount'] ?></p>
                                                <p class="text-muted mb-2">Created At: <?= $service_info['created_at'] ?></p>
                                                <p class="text-muted mb-2">Created By: <?=$selectusers['name'] ?></p>
                                                 <?php 
                                                if (!empty($selectupdate['name'])) {
                                                    echo '<p class="text-muted mb-2">Updated Date: '.$service_info['updated_at'].'</p>';
                                                    echo '<p class="text-muted mb-2">Updated By: '.$selectupdate['name'].'</p>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                                    <div class="col-xl-12">
                                                    <p class="text-muted mb-2">Service Details:</p>
                                                    <textarea name="" id="" class="form-control"  cols="30" rows="6" readonly><?=$service_info['service_details'] ?></textarea>
                                                    </div>
                                                    <div class="mt-2">
                                            <a class="btn btn-primary waves-effect waves-light mt-2" href="service.php" style="font-size:14px;font-weigth:bold;">
                                            <i class="fas fa-long-arrow-alt-left"></i>  Back
                                            </a>
                                        </div>
                                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
}else {
?>
 <div class="container-fluid">
<div class="page-content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3>No Record found</h3>
                </div>
            </div>
        </div>
    </div>
</div> -->
<?php
}
 require_once "inc/footer.inc.php" ;
 ?>