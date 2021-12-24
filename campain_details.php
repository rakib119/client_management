<?php
require_once "inc/header.inc.php";
$id = $_GET['id'];
$tables_name = "campaigns,campaign_categorys";
$fields_name = "campaigns.*,campaign_categorys.category_name";
$conditions = "campaigns.id=$id AND campaign_categorys.campaign_cat_id=campaigns.campain_category";
$campain_info = mysqli_fetch_assoc(select($tables_name, $fields_name, $conditions));
$created_by_id = $campain_info['created_by'];
$updated_by_id = $campain_info['updated_by'];
$created_by =  mysqli_fetch_assoc(select("users", "*", "id='$created_by_id'"))['name'];
if ($updated_by_id) {
    $updated_by =  mysqli_fetch_assoc(select("users", "*", "id='$updated_by_id'"))['name'];
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
                            <h4>Campaign Details</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="campaign.php">Campaign</a></li>
                                <li class="breadcrumb-item active">Campaign Details</li>
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
                                <?php if (mysqli_num_rows(select($tables_name, $fields_name, $conditions))) { ?>
                                    <div class="row">
                                        <div class="col-xl-5">
                                            <div class="product-detail">
                                                <div class="row">
                                                    <div class="col-md-8 col-9">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                                                <div class="product-img">
                                                                    <a href="assets\images\upload\campaign\<?= $campain_info['image'] ?>"><img src="assets\images\upload\campaign\<?= $campain_info['image'] ?>" alt="image" class="img-fluid mx-auto d-block"></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-7">
                                            <div class="mt-4 mt-xl-3">
                                                 <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                    <h5 class="mt-1 text-uppercase"> <a href=""><?= $campain_info['name']  ?></a></h5>
                                                    <small><?= $campain_info['category_name'] ?></small>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                                        <?php
                                                        if($campain_info['status'] == 1) {
                                                            echo '<a class="btn-sm btn-success float-end">Active</a>';
                                                        }else{
                                                            echo '<a class="btn-sm btn-danger float-end">Deactive</a>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <hr class="my-4">
                                                <div class="mt-4">
                                                    <p class="text-muted mb-2">
                                                    <div class="pdp-product-price"><span class="h3 text-primary"><?= (empty($campain_info['percentage'])) ? "৳" : "" ?> <?= $campain_info['offer_amount'] ?> <?= ($campain_info['percentage'] == "on") ? "%" : "" ?> </span> <span class="text-muted">OFF</span>
                                                    </div>
                                                    </p>
                                                    <p class="text-muted mb-2 ">Created By: <span class="text-uppercase"><?= $created_by ?> </span> </p>
                                                    <p class="text-muted mb-2 ">Created at: <span class="text-uppercase"><?= $campain_info['created_at'] ?> </span> </p>
                                                    <?php if ($updated_by_id) : ?>
                                                        <p class="text-muted mb-2">Updated By: <span class="text-uppercase"><?= $updated_by ?> </a></p>
                                                        <p class="text-muted mb-2 ">Updated at: <span class="text-uppercase"><?= $campain_info['updated_at'] ?> </span> </p>
                                                    <?php endif ?>
                                                    <p class="text-muted mb-2 ">Starting Date: <span class="text-uppercase"><?= $campain_info['starting_date'] ?> </span> </p>
                                                    <p class="text-muted mb-2 ">Ending Date: <span class="text-uppercase"><?= $campain_info['ending_date'] ?> </span> </p>
                                                </div>
                                            </div>
                                            <?php if (!isset($_SESSION['is_client'])) { ?>
                                            <div class="mt-4">
                                               <a class="btn btn-primary waves-effect waves-light mt-2" href="campaign.php" style="font-size:14px;font-weigth:bold;">
                                            <i class="fas fa-long-arrow-alt-left"></i>  Back
                                            </a>
                                            </div>
                                            <?php  }?>
                                        </div>
                                    </div>
                                <?php } else {
                                    echo "<h3 class='text-center'>Data not found</h3>";
                                } ?>
                                <!-- <div class="row">
                                    <table class="table mt-5">
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "inc/footer.inc.php" ?>