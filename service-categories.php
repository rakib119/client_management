<?php
require_once "inc/header.inc.php";
$categories_name = '';
if (isset($_GET['task']) && $_GET['task'] == "edit") {
    $id = $_SESSION["edit_categories_id"]  = $_GET['id'];
    $categories = mysqli_fetch_assoc(select("categories", "*", "id='$id'"));
    $categories_name = $categories['category_name'];
} else {
    unset($_SESSION["edit_categories_id"]);
}
?>
<div class="main-content">
    <div class="page-content">
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Services</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Services</a></li>
                                <li class="breadcrumb-item active">Add Categories And Category List</li>
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
                                <h4 class="header-title">Categories</h4>
                                <div class=" mt-3">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="col-sm-2 col-form-label">Categories</label>
                                            <div class="col-sm-12">
                                                <form method="post" action="service-category-action.php">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="progress-basicpill-firstname-input">Category Name</label>
                                                                <input type="text" class="form-control name" name="category_name" value="<?php
                                                                if(isset($_SESSION["old_category_name"])){
                                                                    echo $_SESSION["old_category_name"];
                                                                    unset($_SESSION['old_category_name']);
                                                                }else if(isset($categories_name)){
                                                                    echo $categories_name;
                                                                }
                                                                ?>" id="progress-basicpill-firstname-input">
                                                                
                                                                <?php 
                                                                if (isset($_SESSION['category_name_error'])) { ?>
                                                                    <small class="text-danger"><?= $_SESSION['category_name_error'] ?></small>
                                                                <?php
                                                                    unset($_SESSION['category_name_error']);
                                                                }
                                                                if (isset($_SESSION['exist_error'])) { ?>
                                                                    <small class="text-danger"><?= $_SESSION['exist_error'] ?></small>
                                                                <?php
                                                                    unset($_SESSION['exist_error']);
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-12 mt-3">
                                                            <div class="mb-3">
                                                                <button type="submit" name="<?= isset($_SESSION["edit_categories_id"]) ? "edit_categories" : "submit_categories" ?>" name="submit_categories" class="btn btn-success"><?= isset($_SESSION["edit_categories_id"]) ? "Update" : "Submit" ?> </button>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">User List</h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap text-center  mt-3" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sl no.</th>
                                            <th>Category Name</th>
                                            <th>Created By</th>
                                            <th>Updated By</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $serial = 0;
                                        foreach (select('categories', '*') as $category) :
                                            $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $category['created_by']))['name'];
                                            $updated_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $category['updated_by']))['name'];
                                        ?>
                                            <tr class="text-center">
                                                <td><?= ++$serial ?></td>
                                                <td><?= $category['category_name'] ?></td>
                                                <td><?= $created_by ?></td>
                                                <td><?= ($updated_by) ? $updated_by : "N/A" ?></td>
                                                 <td> 
                                            <?php 
                                                    if ($category['status'] == 1) {
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
                                                            <button class="dropdown-item delete_data" value="service-category-action.php?id=<?= $category['id'] ?>&task=delete">Delete</button>
                                                            <a class="dropdown-item" href="service-categories.php?id=<?= $category['id'] ?>&task=edit">Edit</a>
                                                        <?php 
                                                        if ($category['status'] == 1) {
                                                       ?>
                                                       <a class="dropdown-item" href="deactive_category.php?id_no=<?=$category['id'];?>">Deactive</a>
                                                       <?php
                                                        }else{
                                                            ?>
                                                        <a class="dropdown-item" href="active_category.php?id_no=<?=$category['id'];?>">Active</a>
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


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

</div>
<?php require_once "inc/footer.inc.php" ?>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>