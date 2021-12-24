<?php
require_once "inc/header.inc.php"; ?>
<div class="main-content">
    <div class="page-content">
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Role & Permission</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Users & Permissions</a></li>
                                <li class="breadcrumb-item active">Role and Permissions</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Permissions List</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap text-center  mt-3" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $serial = 0;
                                    foreach (select('permissions', '*', 'role_id!=1 ') as $permissions) :
                                        $role_id = $permissions['role_id'];
                                        $roles = mysqli_fetch_assoc(select('roles', 'role', "role_id='$role_id'"));
                                    ?>
                                        <tr class="text-center">
                                            <td><?= ++$serial ?></td>
                                            <td><?= ucfirst($roles['role'])  ?></td>
                                            <td><?= $permissions['permission'] ?></td>
                                            <td>
                                                <div class="btn-group mt-1 me-1">
                                                    <a href="edit-permissions.php?role_id=<?= $role_id ?>" class="btn btn-success">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
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