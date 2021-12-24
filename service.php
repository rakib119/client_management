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
                            <h4>services</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Services</a></li>
                                <li class="breadcrumb-item active">All Service</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-end d-none d-sm-block">
                            <a href="add-service.php" class="btn btn-success">Add Service</a>
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
                            <div class="card-body data-table-overflow">
                                <h4 class="header-title">service List</h4>
                                <table id="datatable" class=" table table-bordered dt-responsive nowrap mt-3" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Service Name</th>
                                            <th>Subcategory Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $serial = 0;
                                        foreach (select('services ORDER BY created_at DESC', '*') as $service) :
                                            $subcategory = mysqli_fetch_assoc(select('sub_categories', '*', "id =" . $service['subcategories_id']));
                                            $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $service['created_by']))['name'];
                                            $updated_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $service['updated_by']))['name'];
                                        ?>
                                            <tr>
                                                <td><?= ++$serial ?></td>
                                                <td><?= $service['service_name'] ?></td>
                                                <td><?= $subcategory['subcategory_name'] ?></td>
                                                <td> <img width="50" height="50" src="assets\images\upload\service\<?= $service['image'] ?>" alt="<?= $service['service_name'] ?>"> </td>
                                                <td><?= $service['service_amount'] ?></td>
                                                <td><?php
                                                if($service['status'] == 1){
                                                    echo 'Active';
                                                }else{
                                                    echo 'Deactive';
                                                } 
                                                ?></td>
                                                <td>
                                                    <div class="btn-group mt-1 me-1">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action &nbsp; <i class="fa fa-ellipsis-v"></i></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item delete_data" value="service-action.php?id=<?= $service['id'] ?>&task=delete">Delete</button>
                                                            <a class="dropdown-item" href="edit_service.php?id=<?= $service['id'] ?>&task=update">Edit</a>
                                                            <a class="dropdown-item" href="service_details.php?id=<?= $service['id'] ?>">Details</a>
                                                            <a class="dropdown-item" href="purchase_now.php?id=<?= $service['id'] ?>&task=purchase">Purchase</a>
                                                             <?php 
                                                        if ($service['status'] == 1) {
                                                       ?>
                                                       <a class="dropdown-item" href="deactive_service.php?id_no=<?=$service['id'];?>">Deactive</a>
                                                       <?php
                                                        }else{
                                                            ?>
                                                        <a class="dropdown-item" href="active_service.php?id_no=<?=$service['id'];?>">Active</a>
                                                        <?php
                                                        }
                                                        ?>
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
            url: "service-action.php",
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