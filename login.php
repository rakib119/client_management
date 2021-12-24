<?php
require_once('inc/functions.inc.php');
if (isset($_SESSION["LOGIN"])) {
    header("location: index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login page | BGD Billing </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- custom css -->
    <link href="assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">
                                    <div class="text-center">
                                        <a href="index.php">
                                            <img src="assets/images/logo-dark.png" height="70" alt="logo">
                                        </a>
                                        <h5 class="text-primary  my-2">Login</h5>
                                    </div>
                                    <?php if (isset($_SESSION['login_error'])) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <?= $_SESSION['login_error'] ?>
                                        </div>
                                    <?php
                                        unset($_SESSION['login_error']);
                                    endif;
                                    ?>
                                    <form class="form-horizontal mt-2 pt-2" action="login-submit.php" method="post">
                                        <div class="mb-3">
                                            <label for="email">Email:</label>
                                            <input autocomplete="off" type="email" class="form-control <?= (isset($_SESSION['email_error'])) ? "is_error" : "" ?>" id="email" name="email" placeholder="Enter email">
                                            <?php if (isset($_SESSION['email_error'])) :  ?>
                                                <small class="text-danger"><?= $_SESSION['email_error'] ?></small>
                                            <?php
                                                unset($_SESSION['email_error']);
                                            endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword">Password:</label>
                                            <input type="password" class="form-control <?= (isset($_SESSION['password_error'])) ? "is_error" : "" ?>" id="userpassword" name="password" placeholder="Enter password">
                                            <?php if (isset($_SESSION['password_error'])) :  ?>
                                                <small class="text-danger"><?= $_SESSION['password_error'] ?></small>
                                            <?php
                                                unset($_SESSION['password_error']);
                                            endif; ?>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary w-100 waves-effect waves-light" name="login_submit" type="submit">Log In</button>
                                        </div>
                                         <div class="mt-4 text-center">
                                            <a href="forgetpass.php" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--<div class="mt-4 text-center text-white">-->
                        <!--    <p>© <script>-->
                        <!--            document.write(new Date().getFullYear())-->
                        <!--        </script> Developed <i class="mdi mdi-heart text-danger"></i> by BGD Online LTD</p>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>