<?php
if (isset($_GET['id']) && isset($_GET['task']) && $_GET['task'] == 'purchase') {
    require_once "inc/header.inc.php";
    $service_id = $_GET['id'];
    $service = mysqli_fetch_assoc(select("services", "*", "id='$service_id'"));
    
    $catid =$service['categories_id'];
    $subcatid =$service['subcategories_id'];

?>
    <div class="main-content">
        <div class="page-content">
            <!-- start page title -->
            <div class="page-title-box">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <div class="page-title">
                                <h4>Purchase Service</h4>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Services</a></li>
                                    <li class="breadcrumb-item"><a href="service.php">All Services</a></li>
                                    <li class="breadcrumb-item active">Purchase Service</li>
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
                                    <form id="add_service" method="POST" action="purchase_now_action.php" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="col-sm-3 col-form-label">Service Name<span class="text-danger">*</span></label>
                                                    <div class="col-sm-12">
                                                        <input type="hidden" name="catid"  value="<?= $catid ?>">
                                                        <input type="hidden" name="subcatid"  value="<?= $subcatid ?>">
                                                        <input type="hidden" name="service_id" id="service_id" value="<?= $service_id ?>">
                                                        <input type="text" class="form-control imagecheck" value="<?= $service['service_name'] ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="progress-basicpill-phoneno-input">Service Amount <span class="text-danger">*</span></label>
                                                    <input readonly="readonly" type="text" class="form-control service_amount" value="<?= $service['service_amount'] ?>" name="service_amount" id="progress-basicpill-phoneno-input">
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
                                                    <label class="form-label" for="progress-basicpill-firstname-input">Client Id <span>*</span></label>
                                                    <select name="client_id" class=" selectdata form-control clientid" id="">
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
                                                    <span id="successcheckclientsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                    <p id="successtextclientsms" class="successtext hide">Looks good!</p>
                                                    <span id="wrrongcheckclientsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                    <p id="wrrongtextclientsms" class="wrrongtext hide">please select client id</p>
                                                    <span>
                                                        <?php
                                                        if (isset($_SESSION['client_id_error'])) {
                                                            echo $_SESSION['client_id_error'];
                                                            unset($_SESSION['client_id_error']);
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="progress-basicpill-email-input">Campaign Id</label>
                                                    <select name="campaign_id" class="selectdata2 form-control campaignid" id="" onchange="calculate_discount(this.value)">
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
                                                    <span id="successcheckcampaignsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                    <p id="successtextcampaignsms" class="successtext hide">Looks good!</p>
                                                    <span id="wrrongcheckcampaignsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                    <p id="wrrongtextcampaignsms" class="wrrongtext hide">please select valid campaign id</p>
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
                                                    <input type="text" class="form-control final_price" name="final_price" value="<?= $service['service_amount'] ?>" id="discount_price" readonly="readonly">
                                                    <?php if (isset($_SESSION['final_price_error'])) : ?>
                                                        <small class="text-danger"><?= $_SESSION['final_price_error'] ?></small>
                                                    <?php
                                                        unset($_SESSION['final_price_error']);
                                                    endif
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 mt-3">
                                                <div class="mb-3">
                                                    <button type="submit" name="purchase_service" class="btn btn-success">Submit</button>
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
                    <script type="text/javascript">
                        function calculate_discount(id) {
                            var service_id = $("#service_id").val()
                            $.ajax({
                                url: "discount_calculation.php",
                                type: "POST",
                                data: {
                                    campaign_id: id,
                                    service_id: service_id,
                                },
                                success: function(data) {
                                    $("#discount_price").val(data);
                                }
                            });
                        }
                    </script>

                <?php
            } else {
                ?>
                    <script>
                        window.location.href = "service.php";
                    </script>
                <?php } ?>