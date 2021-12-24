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
                            <h4>Sub categorys</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Services</a></li>
                                <li class="breadcrumb-item active">Sub Categorys</li>
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
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div class="col-sm-12">
                                                <form method="post" id="add_subcat" action="service-sub-category-action.php">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="col-sm-2 col-form-label">Categories <span>*</span></label>
                                                                <select class="form-control selectcat" name="categories_id" >
                                                                    <option value="">Choose A categories</option>
                                                                    <?php
                                                                    $category = select('categories', "*", "status=1");
                                                                    foreach ($category as $categories) :
                                                                    ?>
                                                                        <option <?= isset($_SESSION["old_categories_id"]) && $_SESSION["old_categories_id"] == $categories['id'] ? "selected" : ""; ?> value="<?= $categories['id'] ?>"><?= $categories['category_name'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                                <span id="successcheckselectcatsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextselectcatsms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckselectcatsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextselectcatsms" class="wrrongtext hide">please select category name</p>
                                                                <?php if (isset($_SESSION['categories_id_error'])) : ?>
                                                                    <small class="text-danger"><?= $_SESSION['categories_id_error'] ?></small>
                                                                <?php
                                                                    unset($_SESSION['categories_id_error']);
                                                                endif
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="progress-basicpill-firstname-input">Sub Category Name <span>*</span></label>
                                                                <input type="text" class="form-control subcat" name="subcategory_name"  id="progress-basicpill-firstname-input">
                                                                <span id="successchecksubcatsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                <p id="successtextsubcatsms" class="successtext hide">Looks good!</p>
                                                                <span id="wrrongchecksubcatsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                <p id="wrrongtextsubcatsms" class="wrrongtext hide">please enter sub category name</p>
                                                                <?php if (isset($_SESSION['subcategory_name_error'])) : ?>
                                                                    <small class="text-danger"><?= $_SESSION['subcategory_name_error'] ?></small>
                                                                <?php
                                                                    unset($_SESSION['subcategory_name_error']);
                                                                endif
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-12 mt-3">
                                                            <div class="mb-3">
                                                                <button type="submit" name="submit_subcategories" name="submit_categories" class="btn btn-success">Submit </button>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">User List</h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap mt-3" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Subcategory name</th>
                                            <th>Category</th>
                                            <th>Created By</th>
                                            <th>Updated By</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $serial = 0;
                                        foreach (select('sub_categories ORDER BY created_at DESC', '*') as $subcategory) :
                                            
                                            $category = mysqli_fetch_assoc(select('categories', '*', "id =" .$subcategory['categories_id']));
                                            $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $subcategory['created_by']))['name'];
                                            $updated_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $subcategory['updated_by']))['name'];
                                        ?>
                                            <tr>
                                                <td><?= ++$serial ?></td>
                                                <td><?= $subcategory['subcategory_name'] ?></td>
                                                <td><?= $category['category_name'] ?></td>
                                                <td><?= $created_by ?></td>
                                                <td><?= ($updated_by) ? $updated_by : "N/A" ?></td>
                                                <td>
                                                    <?php 
                                                    if ($subcategory['status'] == 1) {
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
                                                            <button class="dropdown-item delete_data" value="service-sub-category-action.php?id=<?= $subcategory['id'] ?>&task=delete">Delete</button>
                                                            <a class="dropdown-item" href="edit-service-subcategories.php?id=<?= $subcategory['id'] ?>&task=edit">Edit</a>
                                                            <?php 
                                                        if ($subcategory['status'] == 1) {
                                                       ?>
                                                       <a class="dropdown-item" href="deactive_subcategory.php?id_no=<?=$subcategory['id'];?>">Deactive</a>
                                                       <?php
                                                        }else{
                                                            ?>
                                                        <a class="dropdown-item" href="active_subcategory.php?id_no=<?=$subcategory['id'];?>">Active</a>
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