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
                            <h4>Add Deposits</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="all_client.php">Clients</a></li>
                                <li class="breadcrumb-item"><a href="balance_deposit.php">Deposits</a></li>
                                <li class="breadcrumb-item active">Add Deposit</li>
                            </ol>
                        </div>
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
                            <div class="card-body">
                                <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                                                    <a href="balance_deposit.php" class="btn btn-success float-right"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                                                </div>
                                            </div>
                                <form id="add_deposits" action="add_deposit_action.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-firstname-input">Client Id <span>*</span></label>
                                                <select name="clientId" class="selectdata form-control clientid" id="">
                                                    <<?php
                                                        $selectclient = select('clients', '*', 'status=1');
                                                        if ($selectclient) {
                                                            echo '<option value="">---Choice once---</option>';
                                                            foreach ($selectclient as $clients) {
                                                                if ($_SESSION['old_client_id'] == $clients['id']) {
                                                                    $select = "selected";
                                                                } else {
                                                                    $select = "";
                                                                }
                                                        ?> <option <?= $select ?> value="<?= $clients['id'] ?>"><?= $clients['name'] . " " . $clients['clientid'] ?></option>
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
                                                    if (isset($_SESSION['clientid_error'])) {
                                                        echo $_SESSION['clientid_error'];
                                                        unset($_SESSION['clientid_error']);
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-lastname-input">Transaction Id <span>*</span></label>
                                                <input type="text" class="form-control transactionid" id="progress-basicpill-lastname-input" name="transactionId" value="<?= (isset($_SESSION['old_transaction_id'])) ? $_SESSION['old_transaction_id'] : "" ?>">
                                                <span id="successchecktxsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                <p id="successtexttxsms" class="successtext hide">Looks good!</p>
                                                <span id="wrrongchecktxsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                <p id="wrrongtexttxsms" class="wrrongtext hide">please enter valid transaction id</p>
                                                <span>
                                                    <?php
                                                    if (isset($_SESSION['transaction_id'])) {
                                                        echo $_SESSION['transaction_id'];
                                                        unset($_SESSION['transaction_id']);
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Select Deposit Method <span>*</span></label>
                                                <select class="form-control deposit_method" name="depositMethod">
                                                    <?php
                                                    $selectmethod = select('payment_methods', '*', 'status=1');
                                                    if ($selectmethod) {
                                                        echo '<option value="">---Choice once---</option>';
                                                        foreach ($selectmethod as $singledata) {
                                                            if ($_SESSION['old_deposit_method'] == $singledata['payment_id']) {
                                                                $select = "selected";
                                                            } else {
                                                                $select = "";
                                                            }
                                                    ?>
                                                            <option <?= $select ?> value="<?= $singledata['payment_id'] ?>"><?= $singledata['name'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <span id="successcheckdepositsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                <p id="successtextdepositsms" class="successtext hide">Looks good!</p>
                                                <span id="wrrongcheckdepositsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                <p id="wrrongtextdepositsms" class="wrrongtext hide">please select deposit method</p>
                                                <span>
                                                    <?php
                                                    if (isset($_SESSION['method_error'])) {
                                                        echo $_SESSION['method_error'];
                                                        unset($_SESSION['method_error']);
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Deposit Amount <span>*</span></label>
                                                <input type="text" class="form-control damount"  name="depositAmount" value="<?= (isset($_SESSION['old_deposit_amount'])) ? $_SESSION['old_deposit_amount'] : "" ?>">
                                                <span id="successcheckdamount" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                <p id="successtextdamount" class="successtext hide">Looks good!</p>
                                                <span id="wrrongcheckdamount" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                <p id="wrrongtextdamount" class="wrrongtext hide">please enter deposit amount</p>
                                                <span>
                                                    <?php
                                                    if (isset($_SESSION['deposit_error'])) {
                                                        echo $_SESSION['deposit_error'];
                                                        unset($_SESSION['deposit_error']);
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-email-input">Deposit Voucher(image)</label>
                                                <input type="file" accept=".jpg,.png,.JPG,.PNG,JPEG,.jpeg" name="voucher" class="form-control imagecheck" value="<?= (isset($_SESSION['old_name'])) ? $_SESSION['old_name'] : "" ?>">
                                                <p id="successtextimagesms" class="successtext hide">Looks good!</p>
                                                <p id="wrrongtextimagesms" class="wrrongtext hide">please upload deposit image</p>
                                                <p class="wrrongtext">
                                                    <?php
                                                    if (isset($_SESSION['ext_error'])) {
                                                        echo $_SESSION['ext_error'];
                                                        unset($_SESSION['ext_error']);
                                                    } elseif (isset($_SESSION['size_error'])) {
                                                        echo $_SESSION['size_error'];
                                                        unset($_SESSION['size_error']);
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="progress-basicpill-phoneno-input">Deposit Date</label>
                                                <input type="date" class="form-control tx_date" id="progress-basicpill-phoneno-input" name="depositDate" value="<?= (isset($_SESSION['old_transaction_date'])) ? $_SESSION['old_transaction_date'] : "" ?>">
                                                <p id="successtexttxdatesms" class="successtext hide">Looks good!</p>
                                                <p id="wrrongtexttxdatesms" class="wrrongtext hide">Please select deposit date</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <?php
                                                    $selectmethod = select('campaigns', '*', 'campain_category=2 AND status=1');
                                                    if (mysqli_num_rows($selectmethod) > 0) {
                                                ?>
                                                <label class="form-label" for="progress-basicpill-email-input">Campaign Id</label>
                                                <select name="campaignId" class="selectdata2 form-control campaignid" id="">
                                                    <?php
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <input type="submit" name="add_deposit" id="submitbtn" value="Submit" class="btn btn-success" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reg_wrrongsms"></div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <!-- JQURY CDN -->

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