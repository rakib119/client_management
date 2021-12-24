<?php
require_once "inc/header.inc.php";
?>
<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-title">
                            <h4>Add USER </h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User & Permissions</a></li>
                                <li class="breadcrumb-item"><a href="users.php">All User</a></li>
                                <li class="breadcrumb-item active">Add Users</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="header-title h4">Add new Users</p>
                                    <p><a class="text-right  btn btn-success" href="users.php"><i class="fas fa-long-arrow-alt-left"></i> Back</a></p>
                                </div>
                                <form method="post" action="user-action.php">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-firstname-input">Full Name <span>*</span></label>
                                                <input type="text" class="form-control name" name="name" value="<?= isset($_SESSION["old_name"]) ? $_SESSION["old_name"] : ""; ?>" id="progress-basicpill-firstname-input">
                                                <?php if (isset($_SESSION['name_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['name_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['name_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-lastname-input">Email <span>*</span></label>
                                                <input type="email" class="form-control email" value="<?= isset($_SESSION["old_email"]) ? $_SESSION["old_email"] : ""; ?>" name="email" id="progress-basicpill-lastname-input">
                                                <?php if (isset($_SESSION['email_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['email_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['email_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Mobile <span>*</span></label>
                                                <input type="text" class="form-control mobile" value="<?= isset($_SESSION["old_mobile"]) ? $_SESSION["old_mobile"] : ""; ?>" name="mobile" id="progress-basicpill-phoneno-input">
                                                <?php if (isset($_SESSION['mobile_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['mobile_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['mobile_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="col-sm-2 col-form-label">Role <span>*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="role_id" aria-label="Default select example">
                                                        <option value="">Choose A Role</option>
                                                        <?php
                                                        $roles = select('roles', "*", "role!='admin'");
                                                        foreach ($roles as $role) :
                                                        ?>
                                                            <option <?= isset($_SESSION["old_role_id"]) && $_SESSION["old_role_id"] == $role['id'] ? "selected" : ""; ?> value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <?php if (isset($_SESSION['role_id_error'])) : ?>
                                                        <small class="text-danger"><?= $_SESSION['role_id_error'] ?></small>
                                                    <?php
                                                        unset($_SESSION['role_id_error']);
                                                    endif
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Password <span>*</span></label>
                                                <input type="password" name="password" class="form-control pass" id="progress-basicpill-phoneno-input">
                                                <?php if (isset($_SESSION['password_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['password_error'] ?></small>
                                                    <?php
                                                    unset($_SESSION['password_error']);
                                                endif
                                                    ?><?php if (isset($_SESSION['match_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['match_error'] ?></small>
                                                <?php
                                                            unset($_SESSION['match_error']);
                                                        endif
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-email-input">Confrim Password <span>*</span></label>
                                                <input type="password" name="confirm_password" class="form-control cpass" id="progress-basicpill-email-input">
                                                <?php if (isset($_SESSION['confirm_password_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['confirm_password_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['confirm_password_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row">
                                                <h5 class="font-size-14 mb-4">Gender <span>*</span></h5>
                                                <div class="col-lg-3">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" value="male" <?= isset($_SESSION["old_gender"]) && $_SESSION["old_gender"] == "male" ? "checked" : ""; ?> type="radio" name="gender" id="male">
                                                        <label class="form-check-label" for="male">
                                                            Male
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-check ">
                                                        <input class="form-check-input" value="female" <?= isset($_SESSION["old_gender"]) && $_SESSION["old_gender"] == "female" ? "checked" : ""; ?> type="radio" name="gender" id="female">
                                                        <label class="form-check-label" for="female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if (isset($_SESSION['gender_error'])) : ?>
                                                <small class="text-danger"><?= $_SESSION['gender_error'] ?></small>
                                            <?php
                                                unset($_SESSION['gender_error']);
                                            endif
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12 mt-3">
                                            <div class="mb-3">
                                                <button type="submit" name="submit_users" value="Add New Client" class="btn btn-success">Submit </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reg_wrrongsms"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                unset($_SESSION['old_name']);
                unset($_SESSION['old_email']);
                unset($_SESSION['old_mobile']);
                unset($_SESSION['old_role_id']);
                unset($_SESSION['old_gender']);
                unset($_SESSION['name_error']);
                unset($_SESSION['email_error']);
                unset($_SESSION['mobile_error']);
                unset($_SESSION['role_id_error']);
                unset($_SESSION['password_error']);
                unset($_SESSION['confirm_password_error']);
                unset($_SESSION['match_error']);
                unset($_SESSION['gender_error']);
                require_once "inc/footer.inc.php";
                ?>