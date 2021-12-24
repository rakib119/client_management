<?php 
require_once 'inc/header.inc.php';
if (isset($_GET['id_no'])) {
    $getid= get_safe_value($_GET['id_no']); 
    $condition=" id= $getid ";
   	$getdata=select('campaigns','*',$condition);
    if ($getdata) {
    $singledata=mysqli_fetch_assoc($getdata);
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
                                     <h4>Edit Campaign</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                             <li class="breadcrumb-item"><a href="campaign.php">Campaign</a></li>
                                             <li class="breadcrumb-item active">Edit Campaign</li>
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
                                            <form id="add_campaign" action="edit_campaign_action.php"  enctype="multipart/form-data" method="POST">
                                             
                                                         <div class="row">
                                                            
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <input type="hidden" name="id" value="<?=$singledata['id']?>">
                                                                        <label class="form-label" for="progress-basicpill-firstname-input">Campaign Name <span>*</span></label>
                                                                        <input type="text" class="form-control name" id="progress-basicpill-firstname-input" name="campaignName" value="<?=$singledata['name'];?>">
                                                                        <span id="successcheckname" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextname" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckname" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextname" class="wrrongtext hide">please enter valid Campaign name</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Select Campaign Catagory <span>*</span></label>
                                                                        <select class="form-control deposit_method custom-select" name="campaignCatagorys" id="standard">
                                                                        <?php 
                                                                            $selectmethod=select('campaign_categorys','*','status= 1');
                                                                            if ($selectmethod) {
                                                                                foreach($selectmethod as $singledata1){
                                                                                    if ($singledata['campain_category'] == $singledata1['campaign_cat_id']) {
                                                                                        $select="selected";
                                                                                    }else{
                                                                                        $select="";
                                                                                    }
                                                                                ?>
                                                                                <option <?=$select;?> value="<?=$singledata1['campaign_cat_id']?>"><?=$singledata1['category_name']?></option>
                                                                                <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <script>
                                                                            $(document).ready(function(){
                                                                            $("#standard").customselect();
                                                                            });
                                                                        </script>
                                                                        <span id="successcheckdeposit_method" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextdeposit_method" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckdeposit_method" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextdeposit_method" class="wrrongtext hide">please select campaign catagory</p>
                                                                    </div>
                                                                </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">offer_amount <span>*</span></label>
                                                                        <input type="text" class="form-control number" id="progress-basicpill-phoneno-input" name="offerAmount" value="<?=$singledata['offer_amount'];?>">
                                                                        <span id="successchecknumber" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextnumber" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongchecknumber" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextnumber" class="wrrongtext hide">please enter valid offer amount</p>
                                                                        <div class="amount_type">
                                                                        <p class="type_name">Percentage</p>
                                                                        <input name="checkbtn" type="checkbox" id="switch1" switch="none" <?=($singledata['percentage']=='on')?'checked':''?> />
                                                                        <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Start Date <span>*</span></label>
                                                                        <input type="date" class="form-control tx_date" id="progress-basicpill-phoneno-input" name="startDate" value="<?=$singledata['starting_date'];?>">
                                                                        <span id="successchecktx_date" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtexttx_date" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongchecktx_date" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtexttx_date" class="wrrongtext hide">please enter campaign start date</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">End Date <span>*</span></label>
                                                                        <input type="date" class="form-control endDate" id="progress-basicpill-phoneno-input" name="endDate" value="<?=$singledata['ending_date'];?>">
                                                                        <span id="successcheckendDate" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextendDate" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckendDate" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextendDate" class="wrrongtext hide">please enter campaign end date</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-email-input">Campaign image</label>
                                                                        <input type="file" name="offerImage" class="form-control imagecheck">
                                                                        <img src="assets/images/upload/campaign/<?=$singledata['image'];?>" alt="campaign image" height="150px" width="150px">
                                                                        <span id="successimagecheck" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextimagecheck" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongimagecheck" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextimagecheck" class="wrrongtext hide">please upload campaign image</p>
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
                                                                        <input type="submit" name="add_campaign" id="submitbtn" value="Edit Campaign" class="btn btn-success" />
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
}
}     
    ?>