<?php
require_once "inc/header.inc.php";
if (!isset($_GET['role_id'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
<div class="main-content">
    <div class="page-content">
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-xl-12 col-md-12 col-lg-12">
                        <div class="page-title">
                            <h4>Edit Permission</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Users & Permissions</a></li>
                                <li class="breadcrumb-item"><a href="permissions.php">Role and Permissions </a></li>
                                <li class="breadcrumb-item active">Edit Permissions</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid lessmt-5">
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
                                <form action="edit_permission_action.php" method="post">
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
                                                                $role_id =get_safe_value($_GET['role_id']);
                                                                $old_permission =mysqli_fetch_assoc(select("permissions", "*", "role_id='$role_id'"));
                                                                $devided=explode(',', $old_permission['permission']);
                                                                // pr($devided);
                                                                // pr($array);
                                                                $getall= mysqli_fetch_assoc(select('permissions', 'permission', 'id=1'));
                                                                $devided2=explode(',', $getall['permission']);
                                                                foreach ($devided2 as  $value2) {

                                                                    if (in_array($value2 , $devided) === false) {
                                                                        $check="";
                                                                    }else{
                                                                        $check="checked";
                                                                    }
                                                                ?>
                                                                    <div class="form-check mb-3 col-md-3">
                                                                        <input class="form-check-input" id="formCheck<?= ++$i ?>" type="checkbox" value="<?=$value2?>" name="permi[]" <?=$check?>>
                                                                        <label class="form-check-label" for="formCheck<?= $i ?>">
                                                                            <?= $value2?>
                                                                        </label>
                                                                    </div>

                                                                <?php 
                                                                }
                                                                ?>
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
                                                <input type="hidden" name="role_id" value="<?=$role_id?>">
                                                <button type="submit" name="submit_permission"  class="btn btn-success">Submit </button>
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