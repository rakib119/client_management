<?php
require_once "inc/header.inc.php";
if ((!isset($_GET['id'])) || (!isset($_GET['task']))) { ?>
    <script>
        window.location.href = "index.php";
    </script>
<?php
}
$id = $_GET['id'];
$res = mysqli_fetch_assoc(select('users', '*', "id=$id and role_id!=1"));
?>
<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-title">
                            <h4>Edit Users</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="users.php">All Users</a></li>
                                <li class="breadcrumb-item active">Edit Users</li>
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
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                                                    <a href="users.php" class="btn btn-success float-right"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                                                </div>
                                            </div>
                                <form method="post" action="user-action.php">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="hidden" name='id' value="<?= $id ?>">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-firstname-input">Full Name<span>*</span></label>
                                                <input type="text" class="form-control name" name="name" value="<?= $res['name'] ?>" id="progress-basicpill-firstname-input">
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
                                                <label class="form-label" for="progress-basicpill-lastname-input">Email<span>*</span></label>
                                                <input type="email" class="form-control email" value="<?= $res['email']; ?>" name="email" id="progress-basicpill-lastname-input">
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
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Mobile<span>*</span></label>
                                                <input type="text" class="form-control mobile" value="<?= $res['mobile']; ?>" name="mobile" id="progress-basicpill-phoneno-input">
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
                                                <label class="col-sm-2 col-form-label">Role<span>*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" name="role_id" aria-label="Default select example">
                                                        <option value="">Choose A Role</option>
                                                        <?php
                                                        $roles = select('roles', "*", "role!='admin'");
                                                        foreach ($roles as $role) :
                                                        ?>
                                                            <option <?= $res['role_id'] == $role['id'] ? "selected" : ""; ?> value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
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
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12 mt-3">
                                            <div class="mb-3">
                                                <button type="submit" name="update_user" value="Add New Client" class="btn btn-success">Update </button>
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
                unset($_SESSION['name_error']);
                unset($_SESSION['email_error']);
                unset($_SESSION['mobile_error']);
                unset($_SESSION['role_id_error']);
                unset($_SESSION['password_error']);
                require_once "inc/footer.inc.php";
                ?>