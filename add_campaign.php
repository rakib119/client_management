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
                                     <h4>Add New Campaign</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                             <li class="breadcrumb-item"><a href="campaign.php">Campaign</a></li>
                                             <li class="breadcrumb-item active">Add Campaign</li>
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
                                                    <a href="campaign.php" class="btn btn-success float-right"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                                                </div>
                                            </div>
                                            <form id="add_campaign" action="add_campaign_action.php" method="POST" enctype="multipart/form-data">
                                             
                                                         <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-firstname-input">Campaign Name <span>*</span></label>
                                                                        <input type="text" class="form-control campname" id="progress-basicpill-firstname-input" name="campaignName">
                                                                        <span id="successcheckcampnamesms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextcampnamesms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckcampnamesms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextcampnamesms" class="wrrongtext hide">please enter valid Campaign name</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Select Campaign Catagory <span>*</span></label>
                                                                        <select class="form-control deposit_method custom-select" name="campaignCatagorys" id="standard">
                                                                        <option value="">---Choice Once---</option>
                                                                           <?php
                                                                           $result=select('campaign_categorys',"*","status = 1");
                                                                           foreach($result as $singlerow2){
                                                                               ?>
                                                                            <option value="<?=$singlerow2['campaign_cat_id'];?>"><?=$singlerow2['category_name'];?></option>
                                                                            <?php
                                                                           }
                                                                           ?>
                                                                        </select>
                                                                        
                                                                        <span id="successcheckcatsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextcatsms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckcatsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextcatsms" class="wrrongtext hide">please select campaign catagory</p>
                                                                    </div>
                                                                </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">offer_amount <span>*</span></label>
                                                                        <input type="text" class="form-control number" id="progress-basicpill-phoneno-input" name="offerAmount">
                                                                        <span id="successchecknumbersms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextnumbersms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongchecknumbersms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextnumbersms" class="wrrongtext hide">please enter valid offer amount</p>
                                                                        
                                                                        <div class="amount_type">
                                                                        <p class="type_name">Percentage</p>
                                                                        <input name="checkbtn" type="checkbox" id="switch1" switch="none" checked />
                                                                        <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Start Date <span>*</span></label>
                                                                        <input type="date" class="form-control startdate" id="progress-basicpill-phoneno-input" name="startDate" value="<?=(isset($_SESSION['transaction_date']))?$_SESSION['transaction_date']:""?>">
                                                                        <p id="successtextstartsms" class="successtext hide">Looks good!</p>
                                                                        <p id="wrrongtextstartsms" class="wrrongtext hide">please enter campaign start date</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">End Date <span>*</span></label>
                                                                        <input type="date" class="form-control endDate" id="progress-basicpill-phoneno-input" name="endDate" value="<?=(isset($_SESSION['transaction_date']))?$_SESSION['transaction_date']:""?>">
                                                                        <p id="successtextendsms" class="successtext hide">Looks good!</p>
                                                                        <p id="wrrongtextendsms" class="wrrongtext hide">please enter campaign end date</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-email-input">Campaign image</label>
                                                                        <input type="file" name="offerImage" class="form-control imagecheck" value="<?=(isset($_SESSION['old_name']))?$_SESSION['old_name']:""?>">
                                                                        <p id="successtextimagesms" class="successtext hide">Looks good!</p>
                                                                        <p id="wrrongtextimagesms" class="wrrongtext hide">please upload campaign image</p>
                                                                        <p class="wrrongtext">
                                                                        <?php 
                                                                        if(isset($_SESSION['ext_error'])){
                                                                            echo $_SESSION['ext_error'];
                                                                            unset($_SESSION['ext_error']);
                                                                        }elseif (isset($_SESSION['size_error'])) {
                                                                            echo $_SESSION['size_error'];
                                                                            unset($_SESSION['size_error']);
                                                                        }
                                                                        ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3"> 
                                                                        <input type="submit" name="add_campaign" id="submitbtn" value="Add New Campaign" class="btn btn-success" />
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
    require_once 'inc/footer.inc.php';
    ?>