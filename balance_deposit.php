<?php 
require_once 'inc/header.inc.php';
?>
   <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                         <div class="row align-items-center">
                             <div class="col-sm-6">
                                 <div class="page-title">
                                     <h4>Balance Daposit</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                             <li class="breadcrumb-item"><a href="all_client.php">Clients</a></li>
                                             <li class="breadcrumb-item active">Balance Daposit</li>
                                         </ol>
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                <div class="float-end d-none d-sm-block">
                                    <a href="add_deposit.php" class="btn btn-success">Add Deposit</a>
                                </div>
                             </div>
                         </div>
                        </div>
                     </div>
                     <!-- end page title -->    
                    <div class="container-fluid">
                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12 overflow">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                            $results=select('test','*',"total_amount !='' ORDER BY created_at DESC");   
                                            if (mysqli_num_rows($results) > 0) {

                                            ?>
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>Sl No.</th>
                                                    <th>Client Name</th>
                                                    <th>Mobile</th>
                                                    <th>Deposit Amount</th>
                                                    <th>Created At</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $i=1;
                                                    foreach($results as $rowfordata ){
                                                    ?>
                                                <tr>
                                                <td><?=$i++ ?></td>
                                                    <?php
                                                    $selectclient=select("clients","name,mobail","id=". $rowfordata['client_id']);
                                                    if (mysqli_num_rows($selectclient) > 0 ) {
                                                    foreach($selectclient as $clientdata){
                                                        ?>
                                                        <td><?=$clientdata['name'];?></td>
                                                        <td><?=$clientdata['mobail'];?></td>
                                                        <?php
                                                    }
                                                }else{
                                                        ?>
                                                        <td></td>
                                                        <td></td>
                                                        <?php
                                                    }
                                                    ?>
                                                    <td><?=$rowfordata['total_amount'];?></td>
                                                    <td><?=$rowfordata['created_at'];?></td>
                                                    <td>
                                                <div class="btn-group mt-1 me-1">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action &nbsp; <i class="fa fa-ellipsis-v"></i></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="edit_deposit.php?id_no=<?=$rowfordata['id'];?>">Edit</a>
                                                        <!--<button class="dropdown-item delete_data" value="delete_deposit.php?id_no=<?=$rowfordata['id'];?>&&task=delete">Delete</button>-->
                                                        <a class="dropdown-item" href="deposit_details.php?id_no=<?=$rowfordata['id'];?>">Details</a>
                                                    </div>
                                                </div>
                                            </td>
                                                </tr>
                                                <?php
                                            }
                                                ?>
                                                </tbody>
                                            </table>
                                            <?php 
                                             }else{
                                                 echo '<h3 class="text-center">Recourd Not Found</h3>';
                                             }
                                            ?>
            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->


            
                       
        
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

              
              

    <?php 
     unset($_SESSION['old_deposit_amount']);
     unset($_SESSION['old_campaign_id']);
     unset($_SESSION['old_transaction_date']);
     unset($_SESSION['old_name']);
     unset($_SESSION['old_deposit_method']);
     unset($_SESSION['old_transaction_id']);
     unset($_SESSION['old_client_id']);
    require_once 'inc/footer.inc.php';
    ?>
        <script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>