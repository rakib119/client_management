<?php
require_once "inc/functions.inc.php";
if (!isset($_SESSION["LOGIN"]) || !isset($_SESSION["LOGIN_ID"]) || !isset($_SESSION["USER_NAME"])) {
    header("location: login.php");
    die();
}

$login_id = $_SESSION['LOGIN_ID'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>BGD Billing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- plugin css -->
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar" style="background-color: #fff;">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.php" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-dark.png" alt="" height="70">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="70">
                            </span>
                        </a>
                        <a href="index.php" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-dark.png" alt="" height="70">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="70">
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <?php if (!isset($_SESSION['is_client'])) { ?>
                        <i class="mdi mdi-menu"></i>
                        <?php } ?>
                    </button>
                </div>
                <div class="d-flex">
                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-7.jpg" alt="Header Avatar"> -->
                            <span class="d-none d-xl-inline-block ms-1 "> <i class="mdi mdi-account h4 me-2"></i><?= ucwords($_SESSION['USER_NAME']) ?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <?php if (isset($_SESSION['is_client'])) { ?>
                                <a class="dropdown-item " href="profile.php?id=<?= $login_id ?>"><i class="mdi mdi-account font-size-16 align-middle me-1"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                            <?php } ?>
                            <a class="dropdown-item text-danger" href="logout.php"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== Left Sidebar Start ========== -->
        <?php if (!isset($_SESSION['is_client'])) : ?>
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li>
                            <a href="index.php" class="waves-effect">
                                <i class="dripicons-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-user-group"></i>
                                    <span>Users & Permission</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="users.php">All Users</a></li>
                                    <li><a href="permissions.php">Role & Permission</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-user"></i>
                                    <span>Clients</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="all_client.php">All Client</a></li>
                                    <li><a href="balance_deposit.php">Balance Deposit</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-stack"></i>
                                    <span>Services</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="service-categories.php">Categories</a></li>
                                    <li><a href="service-subcategories.php">Sub-categories</a></li>
                                    <li><a href="service.php">All Services</a></li>
                                    <li><a href="javascript: void(0);" class="has-arrow waves-effect">Purchase</a>
                                        <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="purchase.php">Purchase</a></li>
                                        <li><a href="pending_purchase.php">Pending Purchase</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="campaign.php" class=" waves-effect">
                                    <i class="dripicons-rocket"></i>
                                    <span>Campaign</span>
                                </a>
                            </li>
                            <li>
                                <a href="reports.php" class=" waves-effect">
                                    <i class="dripicons-print"></i>
                                    <span>Reports</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class=" waves-effect">
                                    <i class="dripicons-gear"></i>
                                    <span>Settings</span>
                                </a>
                            </li>
                        
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <?php endif ?>
        <!-- Left Sidebar End -->
       
