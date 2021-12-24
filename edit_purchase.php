<?php
require_once "inc/header.inc.php";
// require_once "inc/functions.inc.php";
// select("sub_categories", "*", "categories_id= '2' and status=1");
// die();
if (isset($_GET['task']) && $_GET['task'] == "update") {
    $id = $_GET['id'];

    // $purchase_info = mysqli_fetch_assoc(mysqli_query(db_conn(), "SELECT test.*,categories.category_name,sub_categories.subcategory_name,services.service_name,clients.name From test,categories,sub_categories,services,clients WHERE test.id=$id AND categories.id=test.cat_id AND sub_categories.id=test.sub_cat_id AND services.id=test.service_id AND clients.id=test.client_id"));
    $tables_name = "test,categories,sub_categories,services,clients";
    $fields_name = "test.*,categories.category_name,sub_categories.subcategory_name,services.service_name,clients.name";
    $conditions = "test.id=$id AND categories.id=test.cat_id AND sub_categories.id=test.sub_cat_id AND services.id=test.service_id AND clients.id=test.client_id";
    $purchase_info = mysqli_fetch_assoc(select($tables_name, $fields_name, $conditions));

    $service_id = $purchase_info['service_id'];
    $cat_id = $purchase_info['cat_id'];
    $sub_cat_id = $purchase_info['sub_cat_id'];
    $client_id = $purchase_info['client_id'];
    $campaign_id = $purchase_info['campaign_id'];

    $service_name = $purchase_info['service_name'];
    $category_name = $purchase_info['category_name'];
    $subcategory_name = $purchase_info['subcategory_name'];
    $client_name = $purchase_info['name'];
    $campaign_name = mysqli_fetch_assoc(select("campaigns", "name", "id='$campaign_id'"))['name'];
    $service_amount = $purchase_info['service_amount'];
    $selling_price = $purchase_info['selling_price'];
    // pr($purchase_info);
    // die();
    // $old_cat_id = $old_services['categories_id'];
} else {
    header("location: service.php");
}
?>
<div class="main-content">
    <div class="page-content">
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Edit Purchase</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="purchase.php">Purchase</a></li>
                                <li class="breadcrumb-item active">Edit Purchase </li>
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
                                <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                                                    <a href="purchase.php" class="btn btn-success float-right"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                                                </div>
                                            </div>
                                
                                <form id="edit_purchase" method="POST" action="purchase-action.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <input type="hidden" value="<?= $id ?>" name="id">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="col-sm-2 col-form-label">Category <span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-select deposit_method selectdata categories" name="cat_id" id="categories_id" aria-label="Default select example" onchange="categoriesid(this.value)">
                                                        <option value="">--Choose Category--</option>
                                                        <?php
                                                        $result = select("categories", "*", "status=1");
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                if($cat_id == $row['id'] ){
                                                                   $select='selected'; 
                                                                }else{
                                                                    $select='';
                                                                }
                                                        ?>
                                                                <option <?=$select?> value="<?=($row['id'])?>" ><?= $row['category_name']; ?></option>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "<option value=''>No Data Found</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <span id="successcheckcat_msg" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                    <p id="successtextcat_msg" class="successtext hide">Looks good!</p>
                                                    <span id="wrrongcheckcat_msg" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                    <p id="wrrongtextcat_msg" class="wrrongtext hide">please select a category</p>

                                                    <?php if (isset($_SESSION['cat_id_error'])) : ?>
                                                        <small class="text-danger"><?= $_SESSION['cat_id_error'] ?></small>
                                                    <?php
                                                        unset($_SESSION['cat_id_error']);
                                                    endif
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="col-sm-3 col-form-label">Sub Category<span class="text-danger">*</span></label>
                                                <input type="hidden" id="old_sub_cat" value="<?= $sub_cat_id  ?>">
                                                <div class="col-sm-12">
                                                    <select class="form-select selectdata1 subcategories" name="sub_cat_id" id="subcategories_id" aria-label="Default select example" onchange="subcategoriesid(this.value)">
                                                        <option value="">--Choose Sub Category--</option>
                                                    </select>
                                                    <span id="successchecksub_cat_msg" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                    <p id="successtextsub_cat_msg" class="successtext hide">Looks good!</p>
                                                    <span id="wrrongchecksub_cat_msg" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                    <p id="wrrongtextsub_cat_msg" class="wrrongtext hide">please select Sub Category</p>

                                                    <?php if (isset($_SESSION['sub_cat_id_error'])) : ?>
                                                        <small class="text-danger"><?= $_SESSION['sub_cat_id_error'] ?></small>
                                                    <?php
                                                        unset($_SESSION['sub_cat_id_error']);
                                                    endif
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="col-sm-3 col-form-label">Service name<span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-select sub-category selectdata2 service_name" name="service_id" id="service_id" aria-label="Default select example" onchange="getServicePrice(this.value)">
                                                        <option value="<?= $service_id ?>"><?= $service_name ?></option>
                                                    </select>
                                                    <span id="successcheckservice_msg" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                    <p id="successtextservice_msg" class="successtext hide">Looks good!</p>
                                                    <span id="wrrongcheckservice_msg" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                    <p id="wrrongtextservice_msg" class="wrrongtext hide">please select a service</p>

                                                    <?php if (isset($_SESSION['service_id_error'])) : ?>
                                                        <small class="text-danger"><?= $_SESSION['service_id_error'] ?></small>
                                                    <?php
                                                        unset($_SESSION['service_id_error']);
                                                    endif
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <input type="hidden" value="<?= $service_id ?>" id="old_service_id">
                                                <label class="form-label">Service Amount <span class="text-danger">*</span></label>
                                                <input readonly="readonly" type="text" value="<?= $service_amount ?>" class="form-control" name="service_amount" id="main_price">
                                                <?php if (isset($_SESSION['service_amount_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['service_amount_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['service_amount_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="col-sm-2 col-form-label">Client id <span>*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="selectdata3 form-select cliente_name" name="client_id" aria-label="Default select example">
                                                        <option value=''>--Select Client--</option>
                                                        <?php
                                                        $selectclient = select('clients', '*', 'status=1');
                                                        if ($selectclient) {

                                                            foreach ($selectclient as $clients) {
                                                                $status = "";
                                                                if ($client_id == $clients['id']) {
                                                                    $status = "selected";
                                                                }
                                                        ?>
                                                                <option <?=$status?> value="<?=$clients['id']?>"><?=$clients['name'] . " " . $clients['mobail'] ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <span id="successcheckcliente_msg" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                    <p id="successtextcliente_msg" class="successtext hide">Looks good!</p>
                                                    <span id="wrrongcheckcliente_msg" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                    <p id="wrrongtextcliente_msg" class="wrrongtext hide">please select a Client</p>

                                                    <?php if (isset($_SESSION['client_id_error'])) : ?>
                                                        <small class="text-danger"><?= $_SESSION['client_id_error'] ?></small>
                                                    <?php
                                                        unset($_SESSION['client_id_error']);
                                                    endif
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-email-input">Campaign</label>
                                                <select name="campaign_id" class="selectdata2 form-control campaign" id="" onchange="calculate_discount(this.value)">
                                                    <?php
                                                    $selectmethod = select('campaigns', '*', 'status=1');
                                                    if ($selectmethod) {
                                                        echo '<option value="">---Choice once---</option>';
                                                        foreach ($selectmethod as $singledata) {
                                                            $status = "";
                                                            if ($campaign_id == $singledata['id']) {
                                                                $status = "selected";
                                                            }
                                                    ?>
                                                            <option <?= $status ?> value="<?= $singledata['id'] ?>"><?= $singledata['name'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <span id="successcheckcampaign_msg" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                <p id="successtextcampaign_msg" class="successtext hide">Looks good!</p>
                                                <span>
                                                    <?php
                                                    if (isset($_SESSION['campaign_id_error'])) {
                                                        echo $_SESSION['campaign_id_error'];
                                                        unset($_SESSION['campaign_id_error']);
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Discounted Price <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control final_price" name="selling_price" value="<?= $selling_price ?>" id="discount_price" readonly="readonly">
                                                <?php if (isset($_SESSION['final_price_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['final_price_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['final_price_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12 mt-3">
                                    <div class="mb-3 text-center">
                                        <button type="submit" name="edit_purchase" id="purchaseSubmit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reg_wrrongsms"></div>
                            </form>
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
    // old sub category 
    var cat_id = $('#categories_id').val();
    var sub_cat_id = $('#old_sub_cat').val();
    if (cat_id) {
        $.ajax({
            url: "get_sub_cat.php",
            type: "POST",
            data: {
                categories_id: cat_id,
                sub_cat_id: sub_cat_id
            },
            success: function(data) {
                $("#subcategories_id").html(data);
            }
        });
        // get Service name
        var old_service_id = $('#old_service_id').val();
        $.ajax({
            url: "get_service.php",
            type: "POST",
            data: {
                subcategories_id: sub_cat_id,
                old_service_id: old_service_id
            },
            success: function(data) {
                $("#service_id").html(data);
            }
        });
    };
</script>