<?php
require_once "inc/header.inc.php";
$id =get_safe_value($_GET['id']);
$conditions = "WHERE test.id = $id AND selling_price !='' ";
$purchase_info =mysqli_fetch_assoc(selectjoin("test","*", $conditions));
if (!empty($purchase_info)){
    
$campaign_id = $purchase_info['campaign_id'];
$campaign_result =select("campaigns","*", "id='$campaign_id'");
if (mysqli_num_rows($campaign_result)){
    $campaign_info=mysqli_fetch_assoc($campaign_result);
if ($campaign_info['percentage'] == "on") {
    $campaign_amount = $campaign_info['offer_amount'] . "%";
} else {
    $campaign_amount = "৳ " . $campaign_info['offer_amount'];
}
}
$service=mysqli_fetch_assoc(select("services","*","id=".$purchase_info['service_id']));
?>
<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Purchase Details</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Service</a></li>
                                <li class="breadcrumb-item"><a href="purchase.php">Purchase</a></li>
                                <li class="breadcrumb-item active">Purchase Details</li>
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
                                                               <a target="_blank" href="assets/images/upload/service/<?= $service['image'] ?>"><img src="assets/images/upload/service/<?= $service['image'] ?>" alt="Image" class="img-fluid mx-auto d-block"></a> 
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
                                                <p class="text-muted mb-2">
                                                <div class="pdp-product-price"><span class="h3 text-primary">৳ <?= $purchase_info['selling_price'] ?></span>
                                                <?php 
                                                if (!empty($campaign_amount)) {
                                                    ?>
                                                    <div> <del> ৳ <?= $purchase_info['service_amount'] ?></del> <span class="pdp-product-price__discount">-<?= $campaign_amount ?></span></div>
                                                    <?php
                                                }
                                                ?>
                                                </div>
                                                </p>
                                                <?php
                                                $selectclient=mysqli_fetch_assoc(select("clients","*","id=".$purchase_info['client_id']));
                                                $selectcat=mysqli_fetch_assoc(select("categories","*","id=".$purchase_info['cat_id']));
                                                $selectsubcat=mysqli_fetch_assoc(select("sub_categories","*","id=".$purchase_info['sub_cat_id']));
                                                $selectusers=mysqli_fetch_assoc(select("users","*","id=".$purchase_info['created_by']));
                                                $selectupdate=mysqli_fetch_assoc(select("users","*","id=".$purchase_info['updated_by']));
                                                if (!empty($campaign_amount)) { 
                                                    ?>
                                                <p class="text-muted mb-2">Campaign Name: <a href="campaign_details.php?id=<?=$campaign_info['id']?>"><?=$campaign_info['name']?></a> </p>
                                                <?php 
                                                 }
                                                 ?>
                                                 <?php 
                                                 if(!empty($selectclient)){
                                                    ?>
                                                    <p class="text-muted mb-2">Client id: <?= $selectclient['clientid'] ?></p>
                                                    <p class="text-muted mb-2">Client Name: <?= $selectclient['name'] ?></p>
                                                    <p class="text-muted mb-2">Mobile: <?= $selectclient['mobail'] ?></p>
                                                    <?php
                                                 }else{
                                                     ?>
                                                     <p class="text-muted mb-2"></p>
                                                     <p class="text-muted mb-2"></p>
                                                     <?php
                                                 }
                                                 ?>
                                                <p class="text-muted mb-2">Service Amount: <?= $purchase_info['service_amount'] ?></p>
                                                <p class="text-muted mb-2">Discount Amount: <?= $purchase_info['discount_amount'] ?></p>
                                                <p class="text-muted mb-2">Total Price: <?= $purchase_info['selling_price'] ?></p>
                                                <p class="text-muted mb-2">Created Date: <?= $purchase_info['created_at'] ?></p>
                                                <p class="text-muted mb-2">Created By: <?=$selectusers['name'] ?></p>
                                                 <?php 
                                                if (!empty($selectupdate['name'])) {
                                                    echo '<p class="text-muted mb-2">Updated Date: '.$purchase_info['updated_at'].'</p>';
                                                    echo '<p class="text-muted mb-2">Updated By: '.$selectupdate['name'].'</p>';
                                                }
                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a class="btn btn-primary waves-effect waves-light mt-2" href="purchase.php" style="font-size:14px;font-weigth:bold;">
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
</div>
<?php
}
 require_once "inc/footer.inc.php" ;
 ?>