<?php
require_once "inc/header.inc.php";
?>
<?php if (!isset($_SESSION['is_client'])) { ?>
<div class="main-content">
    <div class="page-content">
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title text-white">
                            <h4 style="color: rgb(76, 69, 69);">Dashboard</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="container-fluid">
                <div class="page-content-wrapper">
                    <div class="row">
                        <div class="col-xl-8 hide">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4 float-sm-start">Quick Transiction Summary</h4>
                                    <div class="float-sm-end">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Day</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Week</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Month</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#">Year</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row align-items-center">
                                        <div class="col-xl-9">
                                            <div>
                                                <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-9">
                                            <div class="dash-info-widget mt-4 mt-lg-0 py-4 px-3 rounded">
                                                <div class="media dash-main-border pb-2 mt-2">
                                                    <div class="avatar-sm mb-3 mt-2">
                                                        <span class="avatar-title rounded-circle bg-white shadow">
                                                            <i class="mdi mdi-account-outline text-success font-size-18"></i>
                                                        </span>
                                                    </div>
                                                    <div class="media-body ps-3">
                                                        <?php
                                                        $countuser = countdata("clients", "*", "total_client", "");
                                                        $value = mysqli_fetch_assoc($countuser);
                                                        ?>
                                                        <h4 class="font-size-20"><?= $value['total_client'] ?></h4>
                                                        <p class="text-muted">Total User <a href="all_client.php" class="text-primary">View <i class="mdi mdi-arrow-right"></i></a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="media mt-4 dash-main-border pb-2">
                                                    <div class="avatar-sm mb-3 mt-2">
                                                        <span class="avatar-title rounded-circle bg-white shadow">
                                                            <i class="mdi mdi-credit-card-outline text-primary font-size-18"></i>
                                                        </span>
                                                    </div>
                                                    <div class="media-body ps-3">
                                                        <?php
                                                        $countdeposit = countdata("test", "*", "total_deposit", "");
                                                        $value1 = mysqli_fetch_assoc($countdeposit);
                                                        ?>
                                                        <h4 class="font-size-20"><?= $value1['total_deposit'] ?></h4>
                                                        <p class="text-muted">Total Deposit <a href="balance_deposit.php" class="text-primary">View <i class="mdi mdi-arrow-right"></i></a></p>
                                                    </div>
                                                </div>
                                                <div class="media mt-4">
                                                    <div class="avatar-sm mb-2 mt-2">
                                                        <span class="avatar-title rounded-circle bg-white shadow">
                                                            <i class="mdi mdi-cart-outline text-primary font-size-18"></i>
                                                        </span>
                                                    </div>
                                                    <div class="media-body ps-3">
                                                        <?php
                                                        $countpurchase = countdata("test", "*", "total_purchase", "");
                                                        $value2 = mysqli_fetch_assoc($countpurchase);
                                                        ?>
                                                        <h4 class="font-size-20"><?= $value2['total_purchase'] ?></h4>
                                                        <p class="text-muted mb-0">Total Puechase <a href="purchase.php" class="text-primary">View <i class="mdi mdi-arrow-right"></i></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-4 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <p class="font-size-16">Total Clients</p>
                                                <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary">
                                                        <i class="fas fa-users text-primary font-size-20"></i>
                                                    </span>
                                                </div>
                                                <?php
                                                $countuser = countdata("clients", "*", "total_user", "");
                                                $value = mysqli_fetch_assoc($countuser);
                                                ?>
                                                <h5 class="font-size-22"><?= $value['total_user'] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <p class="font-size-16">Total Services</p>
                                                <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary">
                                                        <i class="far fa-futbol text-primary font-size-20"></i>
                                                    </span>
                                                </div>
                                                <?php
                                                $countservices = countdata("services", "*", "total_services", "");
                                                $valueservices = mysqli_fetch_assoc($countservices);
                                                ?>
                                                <h5 class="font-size-22"><?= $valueservices['total_services'] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <p class="font-size-16">Total Campaign</p>
                                                <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary">
                                                        <i class="fas fa-rocket text-primary font-size-20"></i>
                                                    </span>
                                                </div>
                                                <?php
                                                $countcampaign = countdata("campaigns", "*", "total_campaign", "Where status= 1 ");
                                                $valuecampaign = mysqli_fetch_assoc($countcampaign);
                                                ?>
                                                <h5 class="font-size-22"><?= $valuecampaign['total_campaign'] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4 float-sm-start">Quick Transiction Summary</h4>
                                        <div class="float-sm-end">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item nav-itembtn">
                                                    <a class="nav-link active" id="selectDay">Day</a>
                                                </li>
                                                <li class="nav-item nav-itembtn">
                                                    <a class="nav-link" id="selectWeek">Week</a>
                                                </li>
                                                <li class="nav-item nav-itembtn">
                                                    <a class="nav-link" id="selectMonth">Month</a>
                                                </li>
                                                <li class="nav-item nav-itembtn">
                                                    <a class="nav-link" id="selectYear">Year</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row align-items-center">
                                            <div class="col-xl-12">
                                                <div class="dash-info-widget mt-4 mt-lg-0 py-4 px-3 rounded">
                                                    <div class="media mt-4 dash-main-border pb-2">
                                                        <div class="avatar-sm mb-3 mt-2">
                                                            <span class="avatar-title rounded-circle bg-white shadow">
                                                                <i class="mdi mdi-credit-card-outline text-primary font-size-18"></i>
                                                            </span>
                                                        </div>
                                                        <div class="media-body ps-3">
                                                            <h4 class="font-size-20" id="totalDeposit"></h4>
                                                            <p class="text-muted">Total Deposit <button id="viewdeposit" value="viewdeposit.php?name=deposit&&task=day" class="text-primary viewbtn">View <i class="mdi mdi-arrow-right"></i></button></p>
                                                        </div>
                                                    </div>
                                                    <div class="media mt-4">
                                                        <div class="avatar-sm mb-2 mt-2">
                                                            <span class="avatar-title rounded-circle bg-white shadow">
                                                                <i class="mdi mdi-cart-outline text-primary font-size-18"></i>
                                                            </span>
                                                        </div>
                                                        <div class="media-body ps-3">
                                                            <h4 class="font-size-20" id="totalPurchase"></h4>
                                                            <p class="text-muted mb-0">Total Purchase <button id="viewpurchase" value="viewpurchase.php?name=purchase&&task=day" class="text-primary viewbtn">View <i class="mdi mdi-arrow-right"></i></button></p>
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
            </div>
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Last 10 Deposit</h4>
                        <div class="table-responsive">
                            <?php
                            $condition = "deposit_amount!='' ORDER BY test.id DESC LIMIT 10";
                            $getdepositdata = select("test", "*", $condition);
                            ?>
                            <table class="table table-centered table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Client Name</th>
                                        <th>Mobile</th>
                                        <th>Deposit Amount</th>
                                        <th>Campaign Amount</th>
                                        <th>Total Amount</th>
                                        <th>Created at</th>
                                        <th>Created By</th>
                                    </tr>
                                </thead>
                                <tbody class="tableData">
                                    <?php
                                    foreach ($getdepositdata as $singlerow) {
                                    ?>
                                        <tr>
                                            <?php
                                            $condition2 = "id = " . $singlerow['client_id'];
                                            $select = select("clients", "*", $condition2);
                                            foreach ($select as  $clientsjoin) {
                                            ?>
                                                <td><?= $clientsjoin['name'] ?></td>
                                                <td><?= $clientsjoin['mobail'] ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td><?= $singlerow['deposit_amount'] ?></td>
                                            <td><?= $singlerow['campaign_amount'] ?></td>
                                            <td><?= $singlerow['total_amount'] ?></td>
                                            <td><?= $singlerow['created_at'] ?></td>
                                            <?php
                                            $condition3 = "id = " . $singlerow['created_by'];
                                            $select2 = select("users", "*", $condition3);
                                            foreach ($select2 as  $usersjoin) {
                                            ?>
                                                <td><?= $usersjoin['name'] ?></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-2">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Last 10 Purchase</h4>
                        <div class="table-responsive">
                            <?php
                            $condition1 = "selling_price!='' ORDER BY test.id DESC LIMIT 10";
                            $getpurchasedata = select("test", "*", $condition1);
                            ?>
                            <table class="table table-centered table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Client Name</th>
                                        <th>Mobile</th>
                                        <th>Price</th>
                                        <th>Discount Amount</th>
                                        <th>Total Price</th>
                                        <th>Created at</th>
                                        <th>Created by</th>
                                    </tr>
                                </thead>
                                <tbody class="tableData">
                                    <?php
                                    foreach ($getpurchasedata as $singlerow1) {
                                    ?>
                                        <tr>
                                            <?php
                                            $con = "id = " . $singlerow1['client_id'];
                                            $selectdata = select("clients", "*", $con);
                                            foreach ($selectdata as  $clientpurchase) {
                                            ?>
                                                <td><?= $clientpurchase['name'] ?></td>
                                                <td><?= $clientpurchase['mobail'] ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td><?= $singlerow1['service_amount'] ?></td>
                                            <td><?= $singlerow1['discount_amount'] ?></td>
                                            <td><?= $singlerow1['selling_price'] ?></td>
                                            <td><?= $singlerow1['created_at'] ?></td>
                                            <?php

                                            $condition3 =  "id = " . $singlerow1['created_by'];
                                            if ($singlerow1['role'] == 1) {
                                                $select2 = select("users", "*", $condition3);
                                            } else {
                                                $select2 = select("clients", "*", $condition3);
                                            }

                                            foreach ($select2 as  $usersjoin) {
                                            ?>
                                                <td><?= $usersjoin['name'] ?></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php } else { ?>
<div class="row">
<div class="col-xl-12 col-md-12">
 <div class="page-title-box" style="margin-top: 72px; padding: 14px 24px 52px 24px;">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title text-white">
                            <h4 style="margin-left:20px;">Balance</h4>
                            <?php
                            $selectclient=mysqli_fetch_assoc(select('clients','*','id='.$_SESSION['LOGIN_ID']));

                            ?>
                            <h4 style="margin-left:20px;"><?=$selectclient['balance']?> Tk</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-xl-12">
                
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center">Transaction History</h3>
                                <div class="table-responsive mt-4">
                                    <?php
                                    $conditions = " test.client_id= $login_id ORDER BY id ";
                                    $join = "LEFT JOIN payment_methods ON test.deposit_method = payment_methods.payment_id";
                                    $getpurchasedata = select("test", "test.*,payment_methods.name", $conditions, $join);
                                    ?>
                                    <table id="datatable" class="table table-centered table-nowrap mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>SN</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Method</th>
                                                <th>Status</th>
                                                <th>Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tableData">
                                            <?php
                                            $i = 1;
                                            $balance = 0;
                                            foreach ($getpurchasedata as $singlerow1) {
                                            ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $singlerow1['created_at'] ?></td>
                                                    <td><?= ($singlerow1['total_amount']) ? $singlerow1['total_amount'] : $singlerow1['selling_price'] ?></td>
                                                    <td><?= ($singlerow1['total_amount']) ? "Deposite" : "Purchase" ?></td>
                                                    <td><?= ($singlerow1['name']) ? $singlerow1['name'] : "N/A" ?></td>
                                                    <td>
                                                        <?php 
                                                        if($singlerow1['status'] == 1){
                                                            echo 'completed';
                                                        }else if($singlerow1['status'] == 0){
                                                            echo 'Pending';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?=
                                                        $balance = $balance + $singlerow1['total_amount'] - $singlerow1['selling_price'];
                                                        ?>

                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Campaign</h3>
                                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <?php
                                        $status = "active";
                                        $resultcampaign = select("campaigns", "*", "image!='' AND status = 1");
                                        foreach ($resultcampaign as $singlecampaign) {
                                        ?>
                                            <div class="carousel-item <?= $status ?>">
                                                <img src="assets/images/upload/campaign/<?= $singlecampaign['image'] ?>" class="card-img-top">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <a type="button" href="campain_details.php?id=<?= $singlecampaign['id'] ?>" class="btn btn-primary dbtnin">Details</a>
                                                </div>
                                            </div>

                                        <?php
                                            $status = "";
                                        }
                                        ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="container-fluid mb-2" id="service">
                <div class="card">
                    <h3 class="text-center py-3">All Service</h3>
                    <div class="card-body" style="background-color: #eee;">

                        <div class="row">
                            <?php
                            $limit1 = 10;
                            if (isset($_GET['page'])) {
                                $page1 = get_safe_value($_GET['page']);
                            } else {
                                $page1 = 1;
                            }
                            $offset1 = ($page1 - 1) * $limit1;
                            $conditionforservice = "WHERE status=1 LIMIT {$offset1},{$limit1} ";
                            foreach (selectjoin('services', '*', $conditionforservice) as $service) {
                            ?>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="product-img">
                                                <img src="assets\images\upload\service\<?= $service['image'] ?>" alt="<?= $service['service_name'] ?>" class="img-fluid-custom mx-auto d-block">
                                            </div>
                                            <div class="text-center mt-3">
                                                <a href="service_details.php?id=<?= $service['id'] ?>" class="text-dark">
                                                    <h5 class="font-size-18"><?= $service['service_name'] ?></h5>
                                                </a>
                                                <h4 class="mt-3 mb-0"><?= "৳ " . $service['service_amount'] ?> </h4>
                                                <div class="mt-3">
                                                    <a href="buy_now.php?id=<?= $service['id'] ?>&task=purchase" class="btn btn-primary waves-effect waves-light mt-2">
                                                        <i class="mdi mdi-cart me-2"></i> Buy Now
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php    } ?>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 d-flex justify-content-center">
                                <nav aria-label="...">
                                    <?php
                                    $getservicerow = select("services", "*", 'status=1');
                                    if (mysqli_num_rows($getservicerow) > 0) {
                                        $total_recourd1 = mysqli_num_rows($getservicerow);
                                        $total_page1 = ceil($total_recourd1 / $limit1);
                                        echo  '<ul class="pagination">';
                                        if ($page1 > 1) {
                                            $disable = "";
                                        } else {
                                            $disable = "disabled";
                                        }
                                        echo '<li class="page-item ' . $disable . '">
                                               <a class="page-link" href="index.php?page=' . ($page1 - 1) . '">Previous</a>
                                              </li>';
                                        for ($i = 1; $i <= $total_page1; $i++) {
                                            if ($i == $page1) {
                                                $active = 'active';
                                            } else {
                                                $active = '';
                                            }
                                            echo '<li class="page-item ' . $active . ' "><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                                        }
                                        if ($total_page1 > $page1) {
                                            $disablenext = "";
                                        } else {
                                            $disablenext = "disabled";
                                        }
                                        echo '<li class="page-item ' . $disablenext . '">
                                                <a class="page-link" href="index.php?page=' . ($page1 + 1) . '">Next</a>
                                                </li>';
                                        echo  '</ul>';
                                    }
                                    ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
         </div>
             
         </div>

    <?php
    } 
    require_once "inc/footer.inc.php";
    ?>
    
  