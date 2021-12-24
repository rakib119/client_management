<?php
require_once "inc/header.inc.php";
$sub_categories_name = '';
if (isset($_GET['task']) && $_GET['task'] == "edit") {
    $id = $_GET['id'];
    $old_sub_cat = mysqli_fetch_assoc(select("sub_categories", "*", "id='$id'"));
}
?>
<div class="main-content">
    <div class="page-content">
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>User & Permission</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add sub_categories And Category List</li>
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
                                <div class=" mt-3">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div class="col-sm-12">
                                                <div class="d-flex justify-content-between">
                                    <p class="header-title h4">Edit Sub Category</p>
                                    <p><a class="text-right  btn btn-success" href="service-subcategories.php"><i class="fas fa-long-arrow-alt-left"></i> Back</a></p>
                                </div>
                                                <form id="edit_subcat" method="post" action="service-sub-category-action.php">
                                                    <div class="row">
                                                        <input type="hidden" name="id" value="<?= $id ?>">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="col-sm-2 col-form-label">Category <span>*</span></label>
                                                                <select class="form-select selectcat" name="categories_id" aria-label="Default select example">
                                                                    <option value="">Choose A Category</option>
                                                                    <?php
                                                                    $categories = select('categories', "*", "status=1");
                                                                    foreach ($categories as $category) :
                                                                    ?>
                                                                        <option <?= isset($old_sub_cat) && $old_sub_cat['categories_id'] == $category['id'] ? "selected" : ""; ?> value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
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
                                                                <label class="form-label" for="progress-basicpill-firstname-input">Sub Category Name<span>*</span></label>
                                                                <input type="text" class="form-control subcat" value="<?= $old_sub_cat['subcategory_name'] ?>" name="subcategory_name" id="progress-basicpill-firstname-input">
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
                                                                <button type="submit" name="edit_sub_categories" name="edit_sub_categories" class="btn btn-success">update </button>
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
            </div>
        </div>
    </div>

</div>
<?php require_once "inc/footer.inc.php" ?>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>