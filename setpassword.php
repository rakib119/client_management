<?php
require_once "inc/functions.inc.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>set new password | BGD Billing </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
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
    <style>
        .hide{
            display: none;
        }
    </style>
</head>

<body class="authentication-bg bg-primary">
    <?php 
if (isset($_GET['vkey']) && isset($_GET['email'])) {
   $vkey=get_safe_value($_GET['vkey']);
   $email=get_safe_value($_GET['email']);
   $condition="vkey='$vkey' AND email='$email' ";
   $check=select("users","*",$condition);
   if (mysqli_num_rows($check) > 0) {
       $fetch=mysqli_fetch_assoc($check);
       $vkey2=$fetch['vkey'];
   }else{
    $check=select("clients","*",$condition);
    if (mysqli_num_rows($check) > 0) {
        $fetch=mysqli_fetch_assoc($check);
        $vkey2=$fetch['vkey'];
    }
   }

   if ($vkey == $vkey2) {
?>
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
                                        <h5 class="text-primary  my-2">Set  New Password</h5>
                                    </div>
                                    <form class="form-horizontal" action="setpassword_action.php" method="post">
                                       <input type="hidden" name="vkey" value="<?=$vkey?>">
                                       <input type="hidden" name="email" value="<?=$email?>">

                                         <div class="mb-3 ">
                                            <label for="email">New Password</label>
                                            <input autocomplete="off" type="password" class="form-control" id="password" name="newpass" placeholder="Enter Your New password ">
                                           
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="email">Confrim Password</label>
                                            <input autocomplete="off" type="password" class="form-control" id="cpassword" name="cpass" placeholder="Retype Your Password">
                                        </div>
                                        
                                        <div>
                                            <button class="btn btn-primary w-100 waves-effect waves-light" name="setpassbtn" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center text-white">
                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> Developed <i class="mdi mdi-heart text-danger"></i> by BGD Online LTD</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
   }
}
    ?>
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
<!-- error alert -->
<?php    
 if (isset($_SESSION['error'])) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: '<?= $_SESSION['error'] ?>'
        })
    </script>
<?php
    unset($_SESSION['error']);
endif;
?>
<!-- success alert -->
<?php if (isset($_SESSION['success'])) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '<?= $_SESSION['success'] ?>'
        })
    </script>
<?php
    unset($_SESSION['success']);
endif;

?>