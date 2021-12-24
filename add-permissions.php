<?php
require_once "inc/header.inc.php"; ?>
<div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Role & Permission</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Users & permisions</a></li>
                                <li class="breadcrumb-item active">Role and Permissions</li>
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
                                                    <a href="permissions.php" class="btn btn-success float-right"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                                                </div>
                                            </div>
                                    <form action="permission-action.php" method="post">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="col-sm-2 col-form-label">Role</label>
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
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5 class="font-size-14 mb-4">Permissions</h5>
                                                                <div class="row">

                                                                    <?php
                                                                    $i = 0;
                                                                    foreach (explode(',', mysqli_fetch_assoc(select('permissions', 'permission', 'id=1'))['permission']) as $permission) : ?>
                                                                        <div class="form-check mb-3 col-md-3">
                                                                            <input class="form-check-input" id="formCheck<?= ++$i ?>" type="checkbox" value="<?= $permission ?>" name="permi[]">
                                                                            <label class="form-check-label" for="formCheck<?= $i ?>">
                                                                                <?= $permission ?>
                                                                            </label>
                                                                        </div>

                                                                    <?php endforeach; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 mt-3">
                                                <div class="mb-3">
                                                    <button type="submit" name="submit_permission" value="Add New Client" class="btn btn-success">Submit </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php require_once "inc/footer.inc.php" ?>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

    function get_permission(id) {
        $.ajax({
            url: "user-action.php",
            type: "POST",
            data: {
                get_permission: "",
                role_id: id
            },
            success: function(data) {
                alert(data);
            }
        });

    }
</script>