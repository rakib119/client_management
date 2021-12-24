<?php
require_once "inc/header.inc.php";
$id = $_SESSION['LOGIN_ID'];
$sql = select("clients", "*", "id=$id and status=1");
$client_info = mysqli_fetch_assoc($sql);
$created_by_id = $client_info['created_by'];
$updated_by_id = $client_info['updated_by'];
$created_by =  mysqli_fetch_assoc(select("users", "*", "id='$created_by_id'"))['name'];
if ($updated_by_id) {
    $updated_by =  mysqli_fetch_assoc(select("users", "*", "id='$updated_by_id'"))['name'];
}

?>

        <!-- start page title -->
        <div class="page-title-box cpage" >
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title cpage-text">
                            <h4>Profile</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
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
                        <div class="card ccard">
                            <div class="card-body">
                                <?php if (mysqli_num_rows($sql)) { ?>
                                    <div class="row">
                                        <div class="col-xl-12">
                                                <div class="row">
                                                    <div class="col-6 col-xl-6 col-md-6">
                                                        <h5 class="mt-1 text-uppercase text-primary"> <?= $client_info['name'] ?></h5>
                                                    </div>
                                                    <div class="change_password col-6 col-xl-6 col-md-6 d-flex">
                                                        <a class="btn btn-primary " href="change_password.php" role="button">Change Password</a>
                                                        &nbsp;&nbsp;
                                                        <a class="btn btn-primary" href="edit_client_info.php" role="button">Edit Profile</a>
                                                    </div>
                                                </div>
                                                <hr class="my-4">
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="product-detail">
                                                <div class="row">
                                                    <div class="col-md-7 col-9">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                                                <div class="product-img">
                                                                    <a href="assets\images\upload\<?= $client_info['client_img'] ?>"><img src="assets\images\upload\<?= $client_info['client_img'] ?>" alt="image" class="img-fluid mx-auto d-block"></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                        <p class="text-muted mb-2 "><strong> Client Id: <span class="text-uppercase"><?= $client_info['clientid'] ?></span> </strong></p>
                                                        <p class="text-muted mb-2 ">Added By: <span class="text-uppercase"><?= $created_by ?> </span> </p>
                                                <p class="text-muted mb-2 ">Created at: <span class="text-uppercase"><?= $client_info['created_at'] ?> </span> </p>
                                                <p class="text-muted mb-2 ">Email: <span class="text-lowercase"><?= $client_info['email'] ?> </span> </p>
                                                <p class="text-muted mb-2 ">Mobile: <span class="text-uppercase"><?= $client_info['mobail'] ?> </span> </p>
                                                <p class="text-muted mb-2 ">Company Name: <span class="text-uppercase"><?= $client_info['company_name'] ?> </span> </p>
                                                <p class="text-muted mb-2 ">Company Email: <span class="text-lowercase"><?= $client_info['company_email'] ?> </span> </p>
                                                <p class="text-muted mb-2 ">Company Contact: <span class="text-uppercase"><?= $client_info['company_contact'] ?> </span> </p>
                                                <p class="text-muted mb-2 ">Company Address: <span class="text-uppercase"><?= $client_info['company_address'] ?> </span> </p>
                                                    </div>
                                                </div>
                                              
                                        </div>
                                        <div class="mt-4">
                                            <a href="index.php" class="btn btn-primary waves-effect waves-light mt-2 float-end">
                                                <i class="fas fa-long-arrow-alt-left"></i> Back
                                            </a>
                                        </div>
                                    </div>
                            </div>
                        <?php } else {
                                    echo "<h3 class='text-center'>Data not found</h3>";
                                } ?>
                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once "inc/footer.inc.php" ?>