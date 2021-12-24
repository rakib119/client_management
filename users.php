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
                            <h4>Users</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">All Users</a></li>
                                <li class="breadcrumb-item active">Users and Permissions</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-end d-none d-sm-block">
                            <a href="add-users.php" class="btn btn-success">Add Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">User List</h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap  mt-3" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $serial = 0;
                                        foreach (select('users', '*', 'role_id!=1 ') as $user) :
                                            $role_id = $user['role_id'];
                                            $roles = mysqli_fetch_assoc(select('roles', 'role', "role_id='$role_id'"));
                                        ?>
                                            <tr>
                                                <td><?= ++$serial ?></td>
                                                <td><?= $user['name'] ?></td>
                                                <td><?= $user['email'] ?></td>
                                                <td><?= ucfirst($roles['role'])  ?></td>
                                                <td>
                                                    <?php 
                                                    if( $user['status'] == 1){
                                                        echo 'Active';
                                                    }else{
                                                       echo 'Deactive'; 
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group mt-1 me-1">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action &nbsp; <i class="fa fa-ellipsis-v"></i></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="edit_user.php?id=<?= $user['id'] ?>&task=update">Edit</a>
                                                            <?php 
                                                    if( $user['status'] == 1){
                                                        ?>
                                                        <a class="dropdown-item" href="deactive_user.php?id_no=<?= $user['id']?>">Deactive</a>
                                                        <?php
                                                    }else{
                                                        ?>
                                                       <a class="dropdown-item" href="active_user.php?id_no=<?= $user['id']?>">Active</a>
                                                       <?php
                                                    }
                                                    ?>
                                                            
                                                            <button class="dropdown-item delete_data" value="user-action.php?id=<?= $user['id'] ?>&task=delete">Delete</button>
                                                        </div>
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