<?php
if (isset($_GET['name']) && isset($_GET['task'])) {
    require_once "inc/header.inc.php";
    $name=get_safe_value($_GET['name']);
    $task=get_safe_value($_GET['task']);
   ?>
   <div class="main-content">
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4><?=$task?> Purchase History</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">View Purchase</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6">
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
                                <table id="datatable" class=" table table-bordered dt-responsive nowrap mt-3" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Client Name</th>
                                            <th>Mobile</th>
                                            <th>Selling Price</th>
                                            <th>Created at</th>
                                            <th>Created by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if ($name == 'purchase' && $task == 'day') {
                                        $condition="selling_price!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY created_at DESC";
                                        $countdeposit=select("test","*",$condition);
                                        if (mysqli_num_rows($countdeposit) > 0) {
                                        
                                        $serial = 0;
                                        foreach ($countdeposit  as $purchase) :
                                            if($purchase['role']==1){
                                                $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $purchase['created_by']))['name'];
                                            }else{
                                                $created_by = mysqli_fetch_assoc(select('clients', 'name', "id =" . $purchase['created_by']))['name'];
                                            }
                                           
                                            $client_details = mysqli_fetch_assoc(select('clients', '*', "id =" . $purchase['client_id']));
                                        ?>
                                            <tr>
                                                <td><?= ++$serial ?></td>
                                                <?php 
                                                if (!empty($client_details)) {
                                                    ?>
                                                <td><?= $client_details['name'] ?></td>
                                                <td><?= $client_details['mobail'] ?></td>
                                                <?php
                                                }else {
                                                    ?>
                                                <td></td>
                                                <td></td>
                                                <?php
                                                }
                                                ?>
                                                
                                                <td> <?= $purchase['selling_price'] ?></td>
                                                <td><?= $purchase['created_at'] ?></td>
                                                <td><?= $created_by ?></td>
                                                <td>
                                                    <div class="btn-group mt-1 me-1">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action &nbsp; <i class="fa fa-ellipsis-v"></i></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="edit_purchase.php?id=<?= $purchase['id'] ?>&task=update">Edit</a>
                                                            <a class="dropdown-item" href="purchase_details.php?id=<?= $purchase['id'] ?>">Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        }
                                        }
                                         
                                        if ($name == 'purchase' && $task == 'week'){
                                        $condition="selling_price!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 WEEK) ORDER BY created_at DESC";
                                        $countdeposit=select("test","*",$condition);
                                        if (mysqli_num_rows($countdeposit) > 0) {
                                        
                                        $serial = 0;
                                        foreach ($countdeposit  as $purchase) :
                                            if($purchase['role']==1){
                                                $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $purchase['created_by']))['name'];
                                            }else{
                                                $created_by = mysqli_fetch_assoc(select('clients', 'name', "id =" . $purchase['created_by']))['name'];
                                            }
                                           
                                            $client_details = mysqli_fetch_assoc(select('clients', '*', "id =" . $purchase['client_id']));
                                        ?>
                                            <tr>
                                                <td><?= ++$serial ?></td>
                                                <?php 
                                                if (!empty($client_details)) {
                                                    ?>
                                                <td><?= $client_details['name'] ?></td>
                                                <td><?= $client_details['mobail'] ?></td>
                                                <?php
                                                }else {
                                                    ?>
                                                <td></td>
                                                <td></td>
                                                <?php
                                                }
                                                ?>
                                                
                                                <td> <?= $purchase['selling_price'] ?></td>
                                                <td><?= $purchase['created_at'] ?></td>
                                                <td><?= $created_by ?></td>
                                                <td>
                                                    <div class="btn-group mt-1 me-1">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action &nbsp; <i class="fa fa-ellipsis-v"></i></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="edit_purchase.php?id=<?= $purchase['id'] ?>&task=update">Edit</a>
                                                            <a class="dropdown-item" href="purchase_details.php?id=<?= $purchase['id'] ?>">Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        }
                                        }
                                        
                                        if ($name == 'purchase' && $task =='month') {
                                        $condition="selling_price!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY created_at DESC";
                                        $countdeposit=select("test","*",$condition);
                                        if (mysqli_num_rows($countdeposit) > 0) {
                                        
                                        $serial = 0;
                                        foreach ($countdeposit  as $purchase) :
                                            if($purchase['role']==1){
                                                $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $purchase['created_by']))['name'];
                                            }else{
                                                $created_by = mysqli_fetch_assoc(select('clients', 'name', "id =" . $purchase['created_by']))['name'];
                                            }
                                           
                                            $client_details = mysqli_fetch_assoc(select('clients', '*', "id =" . $purchase['client_id']));
                                        ?>
                                            <tr>
                                                <td><?= ++$serial ?></td>
                                                <?php 
                                                if (!empty($client_details)) {
                                                    ?>
                                                <td><?= $client_details['name'] ?></td>
                                                <td><?= $client_details['mobail'] ?></td>
                                                <?php
                                                }else {
                                                    ?>
                                                <td></td>
                                                <td></td>
                                                <?php
                                                }
                                                ?>
                                                
                                                <td> <?= $purchase['selling_price'] ?></td>
                                                <td><?= $purchase['created_at'] ?></td>
                                                <td><?= $created_by ?></td>
                                                <td>
                                                    <div class="btn-group mt-1 me-1">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action &nbsp; <i class="fa fa-ellipsis-v"></i></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="edit_purchase.php?id=<?= $purchase['id'] ?>&task=update">Edit</a>
                                                            <a class="dropdown-item" href="purchase_details.php?id=<?= $purchase['id'] ?>">Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        }
                                        }
                                        
                                        if ($name == 'purchase' && $task =='year') {
                                        $condition="selling_price!='' AND created_at > DATE_SUB(NOW(), INTERVAL 1 YEAR) ORDER BY created_at DESC";
                                        $countdeposit=select("test","*",$condition);
                                        if (mysqli_num_rows($countdeposit) > 0) {
                                        
                                        $serial = 0;
                                        foreach ($countdeposit  as $purchase) :
                                            if($purchase['role']==1){
                                                $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $purchase['created_by']))['name'];
                                            }else{
                                                $created_by = mysqli_fetch_assoc(select('clients', 'name', "id =" . $purchase['created_by']))['name'];
                                            }
                                           
                                            $client_details = mysqli_fetch_assoc(select('clients', '*', "id =" . $purchase['client_id']));
                                        ?>
                                            <tr>
                                                <td><?= ++$serial ?></td>
                                                <?php 
                                                if (!empty($client_details)) {
                                                    ?>
                                                <td><?= $client_details['name'] ?></td>
                                                <td><?= $client_details['mobail'] ?></td>
                                                <?php
                                                }else {
                                                    ?>
                                                <td></td>
                                                <td></td>
                                                <?php
                                                }
                                                ?>
                                                
                                                <td> <?= $purchase['selling_price'] ?></td>
                                                <td><?= $purchase['created_at'] ?></td>
                                                <td><?= $created_by ?></td>
                                                <td>
                                                    <div class="btn-group mt-1 me-1">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action &nbsp; <i class="fa fa-ellipsis-v"></i></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="edit_purchase.php?id=<?= $purchase['id'] ?>&task=update">Edit</a>
                                                            <a class="dropdown-item" href="purchase_details.php?id=<?= $purchase['id'] ?>">Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        }
                                        }
                                        ?>
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
   <?php
}
    
?>