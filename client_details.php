<?php
require_once "inc/header.inc.php";
$id =get_safe_value($_GET['id_no']);
$conditions = " WHERE clients.id = $id ";
$client_info =mysqli_fetch_assoc(selectjoin("clients","*", $conditions));
if ($client_info) {
$selectusers=mysqli_fetch_assoc(select("users","*","id=".$client_info['created_by']));
$selectupdate=mysqli_fetch_assoc(select("users","*","id=".$client_info['updated_by']));
?>
<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Client Details</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="all_client.php">Clients</a></li>
                                <li class="breadcrumb-item"><a href="all_client.php">All clients</a></li>
                                <li class="breadcrumb-item active">Client Details</li>
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
                                                                <a target="_blank" href="assets\images\upload\<?= $client_info['client_img'] ?>"><img src="assets\images\upload\<?= $client_info['client_img'] ?>"  class="img-fluid mx-auto d-block"></a>  
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
                                                <p class="text-muted mb-2">Curent Balance: <?= $client_info['balance'] ?> TK</p>
                                                <p class="text-muted mb-2">Client id: <?= $client_info['clientid'] ?></p>
                                                <p class="text-muted mb-2">Name: <?= $client_info['name'] ?></p>
                                                <p class="text-muted mb-2">Mobile: <?= $client_info['mobail'] ?></p>
                                                <p class="text-muted mb-2">email: <?= $client_info['email'] ?></p>
                                                <p class="text-muted mb-2">Deposit Method: <?= $client_info['name'] ?></p>
                                                <p class="text-muted mb-2">Created Date: <?= $client_info['created_at'] ?></p>
                                                <p class="text-muted mb-2">Created By: <?=$selectusers['name'] ?></p>
                                                <?php 
                                                if (!empty($selectupdate['name'])) {
                                                    echo '<p class="text-muted mb-2">Updated Date: '.$client_info['updated_at'].'</p>';
                                                    echo '<p class="text-muted mb-2">Updated By: '.$selectupdate['name'].'</p>';
                                                }
                                                ?>
                                                <p class="text-muted mb-2">Address: <?= $client_info['company_address'] ?></p>
                                                
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a class="btn btn-primary waves-effect waves-light mt-2" href="all_client.php" style="font-size:14px;font-weigth:bold;">
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