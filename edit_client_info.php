<?php 
require_once 'inc/header.inc.php';
    $getid= $_SESSION['LOGIN_ID'];
    $condition=" id= $getid ";
   	$getdata=select('clients','*',$condition);
    if (mysqli_num_rows($getdata) > 0) {
    $singledata=mysqli_fetch_assoc($getdata);
?>
   <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                    <!-- start page title -->
                    <div class="page-title-box cpage">
                        <div class="container-fluid">
                         <div class="row align-items-center">
                             <div class="col-sm-6">
                                 <div class="page-title cpage-text">
                                     <h4>Edit Profile</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                             <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                                             <li class="breadcrumb-item active">Edit Profile</li>
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
                                    <div class="card ccard">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                                                    <a href="profile.php" class="btn btn-success float-right"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                                                </div>
                                            </div>
                                            <form id="edit_client_info" action="edit_client_info_action.php" method="POST" enctype="multipart/form-data">
                                                         <div class="row">
                                                             <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-firstname-input">Email</label>
                                                                        <input type="text" name="name" class="form-control" id="progress-basicpill-firstname-input" readonly value="<?=$singledata['email'];?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-firstname-input">Full Name <span>*</span></label>
                                                                        <input type="text" name="name" class="form-control name" id="progress-basicpill-firstname-input" value="<?=$singledata['name'];?>">
                                                                        <span id="successchecknamesms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextnamesms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongchecknamesms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextnamesms" class="wrrongtext hide">please void valid name</p>
                                                                    </div>
                                                                </div>
                                                            </div>
    
                                                            <div class="row">  
                                                            <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Mobile <span>*</span></label>
                                                                        <input type="text" class="form-control mobile" name="mobile" id="progress-basicpill-phoneno-input" value="<?=$singledata['mobail'];?>">
                                                                        <span id="successcheckmobilesms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextmobilesms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckmobilesms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextmobilesms" class="wrrongtext hide">please void valid mobile number</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-email-input">Designation</label>
                                                                        <input type="text" name="designation" class="form-control designation" id="progress-basicpill-email-input" value="<?=$singledata['designation'];?>">
                                                                        <span id="successcheckdesignationsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextdesignationsms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckdesignationsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextdesignationsms" class="wrrongtext hide">please void valid designation</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                 <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Company Name</label>
                                                                        <input type="text" name="cname" class="form-control cname" id="progress-basicpill-phoneno-input" value="<?=$singledata['company_name'];?>">
                                                                        <span id="successcheckcnamesms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextcnamesms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckcnamesms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextcnamesms" class="wrrongtext hide">please void valid company name</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-email-input">Company Email</label>
                                                                        <input type="email" name="cemail" class="form-control cemail" id="progress-basicpill-email-input" value="<?=$singledata['company_email'];?>">
                                                                        <span id="successcheckcemailsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextcemailsms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckcemailsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextcemailsms" class="wrrongtext hide">please void valid Email</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Company Contact</label>
                                                                        <input type="text" name="cmobile" class="form-control cmobile" id="progress-basicpill-phoneno-input" value="<?=$singledata['company_contact'];?>">
                                                                        <span id="successcheckcmobilesms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextcmobilesms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckcmobilesms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextcmobilesms" class="wrrongtext hide">please void valid contact number</p>

                                                                        <input type="hidden" id="getid" name="id" value="<?=$getid;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-address-input">Profile Image</label>
                                                                        <input type="file" name="image" accept=".jpg,.png,.jfif,.PNG,.JPG,.JPEG,.jpeg" class="form-control">
                                                                        <span id="successcheckcaddresssms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextcaddresssms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckcaddresssms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextcaddresssms" class="wrrongtext hide">please void valid address</p>
                                                                        <input type="hidden" name="old_img" value="<?=$singledata['client_img']?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-address-input">Address</label>
                                                                        <textarea id="progress-basicpill-address-input" name="caddress" class="form-control caddress" rows="3"><?=$singledata['name'];?></textarea>
                                                                        <span id="successcheckcaddresssms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextcaddresssms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckcaddresssms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextcaddresssms" class="wrrongtext hide">please void valid address</p>
                                                                    </div>
                                                                </div> 
                                                                <div class="col-lg-6 col-md-6">
                                                                    <a target="_blank" href="assets/images/upload/<?=$singledata['client_img']?>"><img src="assets/images/upload/<?=$singledata['client_img']?>" style="width:100px;height:80px;margin-top:10px;"></a>
                                                                </div>
                                                                </div>
                                                           
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <input type="submit" name="edit_client_info" id="submitbtn" value="Update" class="btn btn-success" />
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>            

    <?php 
    require_once 'inc/footer.inc.php';
	}
     ?>
