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
                            <h4>All Campaign</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Campaign</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-end d-none d-sm-block">
                            <a href="add_campaign.php" class="btn btn-success">Add Campaign</a>
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
                                $condition = "ORDER BY created_at DESC";
                                $results = selectjoin('campaigns', '*', $condition);
                                if (mysqli_num_rows($results) > 0) {

                                ?>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Campaign Name</th>
                                                <th>Campaign Category</th>
                                                <th>Offer</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            $i=1;
                                            foreach ($results as $rowfordata) {
                                                $campaign_category=mysqli_fetch_assoc(select("campaign_categorys","*","campaign_cat_id=".$rowfordata['campain_category']));
                                            ?>
                                                <tr>
                                                    <td><?=$i++?></td>
                                                    <td><?= $rowfordata['name']; ?></td>
                                                    <td><?= $campaign_category['category_name']; ?></td>
                                                    <td><?= $rowfordata['offer_amount']; ?>
                                                        <?php
                                                        if ($rowfordata['percentage'] == "on") {
                                                            echo "%";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $rowfordata['starting_date']; ?></td>
                                                    <td><?= $rowfordata['ending_date']; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($rowfordata['status'] == 1) {
                                                            echo 'Active';
                                                        } else {
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
                                                                <a class="dropdown-item" href="edit_campaign.php?id_no=<?= $rowfordata['id']; ?>">Edit</a>
                                                                <button class="dropdown-item delete_data" value="delete_campaign.php?id_no=<?= $rowfordata['id']; ?>">Delete</button>
                                                                <a href=""></a>
                                                                <?php
                                                                if ($rowfordata['status'] == 1) {
                                                                ?>
                                                                    <a class="dropdown-item" href="deactive_campaign.php?id_no=<?= $rowfordata['id']; ?>">Deactive</a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a class="dropdown-item" href="active_campaign.php?id_no=<?= $rowfordata['id']; ?>">Active</a>
                                                                <?php
                                                                }
                                                                ?>
                                                                <a class="dropdown-item" href="campain_details.php?id=<?= $rowfordata['id'] ?>">Details</a>
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
                                } else {
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
        require_once 'inc/footer.inc.php';
        ?>
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable();
            });
        </script>