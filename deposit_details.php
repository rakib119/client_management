<?php
require_once "inc/header.inc.php";
$id =get_safe_value($_GET['id_no']);
$conditions = " WHERE test.id = $id ";
$deposit_info =mysqli_fetch_assoc(selectjoin("test","*", $conditions));
if (!empty($deposit_info)){
$campaign_id = $deposit_info['campaign_id'];
$campaign_result =(select("campaigns","*", "id='$campaign_id'"));
if (mysqli_num_rows($campaign_result)){
    $campaign_info=mysqli_fetch_assoc($campaign_result);
if ($campaign_info['percentage'] == "on") {
    $campaign_amount = $campaign_info['offer_amount'] . "%";
} else {
    $campaign_amount = "৳ " . $campaign_info['offer_amount'];
}
}

?>
<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Deposit Details</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Clients</a></li>
                                <li class="breadcrumb-item"><a href="balance_deposit.php">Balance Deposit</a></li>
                                <li class="breadcrumb-item active">Deposit Details</li>
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
                                                               <a target="_blank" href="assets\images\upload\deposit_voucher\<?= $deposit_info['deposit_voucher'] ?>"><img src="assets\images\upload\deposit_voucher\<?= $deposit_info['deposit_voucher'] ?>" alt="Image" class="img-fluid mx-auto d-block"></a> 
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
                                                <div class="pdp-product-price"><span class="h3 text-primary">৳ <?= $deposit_info['total_amount'] ?></span>
                                                <?php 
                                                if (!empty($campaign_amount)) {
                                                    ?>
                                                    <div> <del> ৳ <?= $deposit_info['deposit_amount'] ?></del> <span class="pdp-product-price__discount">+<?= $campaign_amount ?></span></div>
                                                    <?php
                                                }
                                                ?>
                                                </div>
                                                </p>
                                                <?php
                                                $selectclient=mysqli_fetch_assoc(select("clients","*","id=".$deposit_info['client_id']));
                                                $selectmethod=mysqli_fetch_assoc(select("payment_methods","*","payment_id=".$deposit_info['deposit_method']));
                                                $selectusers=mysqli_fetch_assoc(select("users","*","id=".$deposit_info['created_by']));
                                                $selectupdate=mysqli_fetch_assoc(select("users","*","id=".$deposit_info['updated_by']));
                                                if (!empty($campaign_amount)) { 
                                                    ?>
                                                <p class="text-muted mb-2">Campaign Name: <a href="campaign_details.php?id=<?=$campaign_info['id']?>"><?=$campaign_info['name']?></a> </p>
                                                <?php 
                                                 }
                                                 ?>
                                                <p class="text-muted mb-2">Client id: <?= $selectclient['clientid'] ?></p>
                                                <p class="text-muted mb-2">Client Name: <?= $selectclient['name'] ?></p>
                                                <p class="text-muted mb-2">Deposit Method: <?= $selectmethod['name'] ?></p>
                                                <p class="text-muted mb-2">deposit_amount: <?= $deposit_info['deposit_amount'] ?></p>
                                                <p class="text-muted mb-2">Campaign Amount: <?= $deposit_info['campaign_amount'] ?></p>
                                                <p class="text-muted mb-2">Total Balance: <?= $deposit_info['total_amount'] ?></p>
                                                <p class="text-muted mb-2">Created Date: <?= $deposit_info['created_at'] ?></p>
                                                <p class="text-muted mb-2">Created By: <?=$selectusers['name'] ?></p>
                                                 <?php 
                                                if (!empty($selectupdate['name'])) {
                                                    echo '<p class="text-muted mb-2">Updated Date: '.$deposit_info['updated_at'].'</p>';
                                                    echo '<p class="text-muted mb-2">Updated By: '.$selectupdate['name'].'</p>';
                                                }
                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a class="btn btn-primary waves-effect waves-light mt-2" href="balance_deposit.php" style="font-size:14px;font-weigth:bold;">
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