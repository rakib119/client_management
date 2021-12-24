<?php
require_once "inc/header.inc.php";

?>
        <!-- start page title -->
        <div class="page-title-box" style="margin-top:72px;">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title" style="margin-left: 25px;">
                            <h4>Purchase</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                                <li class="breadcrumb-item active">Change Pasword</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card" style="margin:0px 20px 20px 20px;">
                            <div class="card-body">
                                <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                                                    <a href="profile.php" class="btn btn-success float-right"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                                                </div>
                                            </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <form class="form-horizontal mt-2 pt-2" action="change-password-submit.php" method="post">
                                             
                                            <div class="mb-3">
                                                <label>Old Password <span>*</span></label>
                                                <input type="old_password" class="form-control" name="old_password" placeholder="Enter Your old password">
                                               
                                            </div>
                                            <div class="mb-3">
                                                <label>New Password <span>*</span></label>
                                                <input type="password" class="form-control " name="new_password" placeholder="new  password">
                                               
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <button class="btn btn-primary waves-effect waves-light " name="change_password" type="submit">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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