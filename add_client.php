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
                                     <h4>Add New Client</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                             <li class="breadcrumb-item"><a href="all_client.php">Clients</a></li>
                                             <li class="breadcrumb-item"><a href="all_client.php">All Clients</a></li>
                                             <li class="breadcrumb-item active">Add Client</li>
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
                                                    <a href="all_client.php" class="btn btn-success float-right"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                                                </div>
                                            </div>
            
                                            <form id="form_id" action="add_client_action.php" method="POST" enctype="multipart/form-data">
                                             
                                                         <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-firstname-input">Full Name <span>*</span></label>
                                                                        <input type="text" class="form-control name" name="name" id="progress-basicpill-firstname-input" autocomplete="off">
                                                                        <span id="successchecknamesms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextnamesms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongchecknamesms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextnamesms" class="wrrongtext hide">please enter valid name</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-email-input">Designation</label>
                                                                        <input type="text" name="designation" class="form-control designation" id="progress-basicpill-email-input" autocomplete="off">
                                                                        <span id="successcheckdesignationsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextdesignationsms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckdesignationsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextdesignationsms" class="wrrongtext hide">please enter valid designation</p>
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Mobile <span>*</span></label>
                                                                        <input type="text" name="mobile" class="form-control mobile" id="progress-basicpill-phoneno-input" autocomplete="off">
                                                                        <span id="successcheckmobilesms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextmobilesms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckmobilesms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextmobilesms" class="wrrongtext hide">please enter valid mobile number</p>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-lastname-input">Email <span>*</span></label>
                                                                        <input type="email" name="email" class="form-control email" id="progress-basicpill-lastname-input" autocomplete="off">
                                                                        <span id="successcheckemailsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextemailsms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckemailsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextemailsms" class="wrrongtext hide">give only gmail,yahoo,outlook mail</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Password <span>*</span></label>
                                                                        <input type="password" name="pass" class="form-control pass" id="progress-basicpill-phoneno-input" autocomplete="off">
                                                                        <span id="successcheckpasssms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextpasssms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckpasssms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextpasssms" class="wrrongtext hide">password will be 8 charecters</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-email-input">Confrim Password <span>*</span></label>
                                                                        <input type="password" name="cpass" class="form-control cpass" id="progress-basicpill-email-input" autocomplete="off">
                                                                        <span id="successcheckcpasssms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextcpasssms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckcpasssms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextcpasssms" class="wrrongtext hide">password didn't matched</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Company Name</label>
                                                                        <input type="text" name="cname" class="form-control cname" id="progress-basicpill-phoneno-input" autocomplete="off">
                                                                        <span id="successcheckcnamesms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextcnamesms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckcnamesms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextcnamesms" class="wrrongtext hide">please enter valid company name</p>
                                                                    </div>
                                                                </div>
                                                               <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Company Contact</label>
                                                                        <input type="text" name="cmobile" class="form-control cmobile" id="progress-basicpill-phoneno-input" autocomplete="off">
                                                                        <span id="successcheckcmobilesms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextcmobilesms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckcmobilesms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextcmobilesms" class="wrrongtext hide">please enter valid contact number</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                 <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-email-input">Company Email</label>
                                                                        <input type="email" name="cemail" class="form-control cemail" id="progress-basicpill-email-input" autocomplete="off">
                                                                        <span id="successcheckcemailsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextcemailsms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckcemailsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextcemailsms" class="wrrongtext hide">please enter valid email</p>
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
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-address-input">Address</label>
                                                                        <textarea id="progress-basicpill-address-input" name="caddress" class="form-control caddress" rows="3"></textarea>
                                                                        <span id="successcheckcaddresssms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextcaddresssms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckcaddresssms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextcaddresssms" class="wrrongtext hide">please enter valid address</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                             <div class="row">
                                                               <div class="col-lg-6 col-lx-6 col-md-6">
                                                                    <div class="mb-3">
                                                                        <input type="submit" name="add_client" id="submitbtn" value="Submit" class="btn btn-success" />
                                                                    </div>
                                                                </div>
                                                               <div class="col-lg-6 col-lx-6 col-md-6">
                                                                    <div class="mb-3 float-end"> 
                                                                        <input type="reset" name="reset" id="resetbtn" value="Reset" class="btn btn-success" />
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