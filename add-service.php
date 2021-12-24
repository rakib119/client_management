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
                            <h4>Add Service</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Service</a></li>
                                <li class="breadcrumb-item"><a href="service.php">All Service</a></li>
                                <li class="breadcrumb-item active">Add Service</li>
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
                                                    <a href="service.php" class="btn btn-success float-right"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                                                </div>
                                            </div>
                                <form id="add_service" method="POST" action="service-action.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="col-sm-2 col-form-label">Category <span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-control selectcat" name="categories" id="categories_id" aria-label="Default select example" onchange="categoriesid(this.value)">
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
                                                    <span id="successcheckselectcatsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                    <p id="successtextselectcatsms" class="successtext hide">Looks good!</p>
                                                    <span id="wrrongcheckselectcatsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                    <p id="wrrongtextselectcatsms" class="wrrongtext hide">please select category name</p>

                                                    <?php if (isset($_SESSION['categories_error'])) : ?>
                                                        <small class="text-danger"><?= $_SESSION['categories_error'] ?></small>
                                                    <?php
                                                        unset($_SESSION['categories_error']);
                                                    endif
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="col-sm-3 col-form-label">Sub Category<span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <select class="form-control selectdata selectsubcat" name="subcategories_id" id="subcategories_id" aria-label="Default select example">
                                                        <option value="">No Data Found</option>
                                                    </select>
                                                    <span id="successcheckselectsubcatsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                    <p id="successtextselectsubcatsms" class="successtext hide">Looks good!</p>
                                                    <span id="wrrongcheckselectsubcatsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                    <p id="wrrongtextselectsubcatsms" class="wrrongtext hide">please select sub category name</p>
                                                    <?php if (isset($_SESSION['subcategories_id_error'])) : ?>
                                                        <small class="text-danger"><?= $_SESSION['subcategories_id_error'] ?></small>
                                                    <?php
                                                        unset($_SESSION['subcategories_id_error']);
                                                    endif
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Service Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control service_name servicename" value="<?= isset($_SESSION["old_service_name"]) ? $_SESSION["old_service_name"] : ""; ?>" name="service_name" id="progress-basicpill-phoneno-input">
                                                <span id="successcheckservicenamesms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                <p id="successtextservicenamesms" class="successtext hide">Looks good!</p>
                                                <span id="wrrongcheckservicenamesms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                <p id="wrrongtextservicenamesms" class="wrrongtext hide">please enter service name</p>
                                                <?php if (isset($_SESSION['service_name_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['service_name_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['service_name_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Service Price <span>*</span></label>
                                                <input type="text" class="form-control service_amount" value="<?= isset($_SESSION["old_service_amount"]) ? $_SESSION["old_service_amount"] : ""; ?>" name="service_amount" id="progress-basicpill-phoneno-input">
                                                <span id="successcheckservice_amount" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                <p id="successtextservice_amount" class="successtext hide">Looks good!</p>
                                                <span id="wrrongcheckservice_amount" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                <p id="wrrongtextservice_amount" class="wrrongtext hide">please enter service price</p>
                                                <?php if (isset($_SESSION['service_amount_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['service_amount_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['service_amount_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row hide">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Price Categories <span>*</span></label>
                                                <input type="text" class="form-control price_categories" value="<?= isset($_SESSION["old_price_categories"]) ? $_SESSION["old_price_categories"] : ""; ?>" name="price_categories" id="progress-basicpill-phoneno-input">
                                                <?php if (isset($_SESSION['price_categories_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['price_categories_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['price_categories_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Price Unit <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control price_unit" value="<?= isset($_SESSION["old_price_unit"]) ? $_SESSION["old_price_unit"] : ""; ?>" name="price_unit" id="progress-basicpill-phoneno-input">
                                                <?php if (isset($_SESSION['price_unit_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['price_unit_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['price_unit_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 hide">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Price Unit Amount <span>*</span></label>
                                                <input type="text" class="form-control price_unit_amount" value="<?= isset($_SESSION["old_price_unit_amount"]) ? $_SESSION["old_price_unit_amount"] : ""; ?>" name="price_unit_amount" id="progress-basicpill-phoneno-input">
                                                <?php if (isset($_SESSION['price_unit_amount_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['price_unit_amount_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['price_unit_amount_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Service Image<span>*</span></label>
                                                <input type="file" class="form-control serviceimg" name="image" id="progress-basicpill-phoneno-input">
                                                <span id="successcheckserviceimg" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                <p id="successtextserviceimg" class="successtext hide">Looks good!</p>
                                                <span id="wrrongcheckserviceimg" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                <p id="wrrongtextserviceimg" class="wrrongtext hide">please select a image</p>

                                                <?php if (isset($_SESSION['image_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['image_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['image_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-12">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Details <span>*</span></label>
                                                <textarea name="service_details" class="form-control servicedetails" id="" cols="30" rows="4"></textarea>
                                                <span id="successcheckservicedetails" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                <p id="successtextservicedetails" class="successtext hide">Looks good!</p>
                                                <span id="wrrongcheckservicedetails" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                <p id="wrrongtextservicedetails" class="wrrongtext hide">please enter service details</p>
                                                <?php if (isset($_SESSION['service_details_error'])) : ?>
                                                    <small class="text-danger"><?= $_SESSION['service_details_error'] ?></small>
                                                <?php
                                                    unset($_SESSION['service_details_error']);
                                                endif
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12 mt-3">
                                            <div class="mb-3">
                                                <button type="submit" name="submit_service" value="add service" class="btn btn-success">Submit</button>
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
                unset($_SESSION['old_category_id']);
                unset($_SESSION['old_email']);
                unset($_SESSION['old_service_name']);
                unset($_SESSION['old_role_id']);
                unset($_SESSION['old_gender']);
                unset($_SESSION['name_error']);
                unset($_SESSION['email_error']);
                unset($_SESSION['service_name_error']);
                unset($_SESSION['role_id_error']);
                unset($_SESSION['password_error']);
                unset($_SESSION['confirm_password_error']);
                unset($_SESSION['match_error']);
                unset($_SESSION['gender_error']);
                require_once "inc/footer.inc.php";
                ?>
                <script type="text/javascript">
                    function categoriesid(id) {
                        $.ajax({
                            url: "get_sub_cat.php",
                            type: "POST",
                            data: {
                                categories_id: id
                            },
                            success: function(data) {
                                $("#subcategories_id").html(data);
                            }
                        });

                    }
                </script>

                <?php

                // session_unset();
                ?>