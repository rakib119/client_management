<?php
require_once "inc/header.inc.php";
?>
<div class="main-content">

    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-title">
                            <h4>Add Purchase</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="purchase.php">Purchase</a></li>
                                <li class="breadcrumb-item active">Add Purchase</li>
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
                                <form id="purchase" method="POST" action="purchase-action.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="col-sm-2 col-form-label">Category <span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-select deposit_method selectdata categories" name="cat_id" id="categories_id" aria-label="Default select example" onchange="categoriesid(this.value)">
                                                        <option value="">Choose A Category</option>
                                                        <?php
                                                        $result = select("categories", "*", "status=1");
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                                <option value="<?= $row['id']; ?>"><?= $row['category_name']; ?></option>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "<option>No Data Found</option>";
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
                                                <div class="col-sm-12">
                                                    <select class="form-select selectdata1 subcategories" name="sub_cat_id" id="subcategories_id" aria-label="Default select example" onchange="subcategoriesid(this.value)">
                                                        <option value="">No Data Found</option>
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
                                                        <option value="">No Data Found</option>
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
                                                <label class="form-label">Service Amount <span class="text-danger">*</span></label>
                                                <input readonly="readonly" type="text" class="form-control" name="service_amount" id="main_price">
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
                                                <label class="col-sm-2 col-form-label">Client id <span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="selectdata3 form-select cliente_name" name="client_id" aria-label="Default select example">
                                                        <?php
                                                        $selectclient = select('clients', '*', 'status=1');
                                                        if ($selectclient) {
                                                            echo '<option value="">---Select Client---</option>';
                                                            foreach ($selectclient as $clients) {
                                                                if ($_SESSION['old_client_id'] == $clients['id']) {
                                                                    $select = "selected";
                                                                } else {
                                                                    $select = "";
                                                                }
                                                        ?>
                                                                <option <?= $select ?> value="<?= $clients['id'] ?>"><?= $clients['name'] . " " . $clients['clientid'] ?></option>
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
                                                    $selectmethod = select('campaigns', '*', 'status=1 and campain_category=1');
                                                    if ($selectmethod) {
                                                        echo '<option value="">---Choice once---</option>';
                                                        foreach ($selectmethod as $singledata) {
                                                            if ($_SESSION['old_campaign_id'] == $singledata['id']) {
                                                                $select = "selected";
                                                            } else {
                                                                $select = "";
                                                            }
                                                    ?>
                                                            <option <?= $select ?> value="<?= $singledata['id'] ?>"><?= $singledata['name'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <span id="successcheckcampaign_msg" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                <p id="successtextcampaign_msg" class="successtext hide">Looks good!</p>
                                                <span id="wrrongcheckcampaign_msg" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                <p id="wrrongtextcampaign_msg" class="wrrongtext hide">please select a campaign</p>
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
                                                <input type="text" class="form-control final_price" name="selling_price" value="" id="discount_price" readonly="readonly">
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
                                        <button type="submit" name="submit_service" id="purchaseSubmit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="reg_wrrongsms"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            require_once "inc/footer.inc.php";
            ?>
