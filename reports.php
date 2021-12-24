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
                                     <h4>Select Date For Genarate Reports</h4>
                                         <ol class="breadcrumb m-0">
                                             <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                             <li class="breadcrumb-item"><a href="reports.php">Reports</a></li>
                                             <li class="breadcrumb-item active">Select Reports</li>
                                         </ol>
                                 </div>
                             </div>
                             <div class="col-sm-6">
                                <div class="float-end d-none d-sm-block">
                                </div>
                             </div>
                         </div>
                        </div>
                     </div>
                     <!-- end page title -->  
                    <div class="container-fluid">
                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12 overflow">
                                    <div class="card">
                                        <div class="card-body">
                                            <form id="reportform"  onsubmit="return false">
                                            <div class="row">
                                                        <div class="col-lg-6"> 
                                                        <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Select Report Type <span>*</span></label><br>
                                                                        <select name="clientId" class="selectdata form-control report_type" id="">
                                                                            <option value="" selected>--Choise once --</option>
                                                                            <option value="client_list">Client List</option>
                                                                            <option value="service_list">Service List</option>
                                                                            <option value="purchase">Purchase</option>
                                                                            <option value="deposit">Deposit</option>
                                                                            <!--<option value="purchasedeposit">Purchase And Deposit</option>-->
                                                                        </select>
                                                                        <span id="successchecktypesms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtexttypesms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongchecktypesms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtexttypesms" class="wrrongtext hide">please select report type</p>
                                                                    </div>
                                                        </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3 clientinput hide">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">Select Client <span>*</span></label><br>
                                                                        <select name="clientId" class="selectdata form-control clientid" style="width: 100%;padding:12px;">
                                                                            <?php 
                                                                            $selectclient=select('clients','*','status=1');
                                                                            if ($selectclient) {
                                                                                echo '<option value="">---Choice once---</option>';
                                                                                foreach($selectclient as $clients){
                                                                                ?>
                                                                                <option value="<?=$clients['id']?>"><?=$clients['name']." ".$clients['mobail']?></option>
                                                                                <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <span id="successcheckclientsms" class="successcheck hide"><i class="fas fa-check"></i></span>
                                                                        <p id="successtextclientsms" class="successtext hide">Looks good!</p>
                                                                        <span id="wrrongcheckclientsms" class="wrrongcheck hide"><i class="fas fa-exclamation-circle"></i></span>
                                                                        <p id="wrrongtextclientsms" class="wrrongtext hide">please select client </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                                <div class="mb-3 formdate hide">
                                                                        <input type="hidden" name="id" value="<?=$getid?>">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">From Date <span>*</span></label>
                                                                        <input type="date" class="form-control startdate " id="progress-basicpill-phoneno-input" name="startDate">
                                                                        <p id="successtextstartsms" class="successtext hide">Looks good!</p>
                                                                        <p id="wrrongtextstartsms" class="wrrongtext hide">please choice from  date</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3 todate hide">
                                                                        <label class="form-label" for="progress-basicpill-phoneno-input">To Date <span>*</span></label>
                                                                        <input type="date" class="form-control enddate" id="progress-basicpill-phoneno-input" name="endDate">
                                                                        <p id="successtextendsms" class="successtext hide">Looks good!</p>
                                                                        <p id="wrrongtextendsms" class="wrrongtext hide">please choice to date</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <input type="submit" id="search_data" name="search_data" value="Search" class="btn btn-success">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </form>
                                              
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->


            
                            <div class="row clientTable hide">
                                <div class="col-12 overflow">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="thhead d-flex justify-content-between">
                                            <h4 class="tbHeader">Client Information</h4>
                                            <h4>
                                                <a class="btn btn-primary" id="clientprint">Print</a>
                                                <a class="btn btn-primary" id="clientpdf">Genarate PDF</a>
                                            </h4>
                                            </div>
                                            <div id="editor">
                                            <!-- print header part start -->
                                            <div class="row header_bg header" style="background: #45AD55; color:black; display: flex;padding-bottom: 12px;padding: 10px;justify-content: space-between;">
            <div class="left" style="width: 50%;float:left;">
                <div class="left p-2">
                    <h5 style="color:black; margin-top: 0px;margin-left:32px;margin-bottom:0px;font-weight: 500;font-size: 16px;">BGD Online Limited</h5>
                    <ul>
                        <li style="font-size:12px; list-style:none;">Phone: +88 01943636143</li>
                        <li style="font-size:12px; list-style:none;">Landline: +88 02-8090528</li>
                        <li style="font-size:12px; list-style:none;">Email: info@bgdonline.net</li>
                        <li style="font-size:12px; list-style:none;">address: 820,Mamun Tower(8<sup>th</sup> floor),Shewrapara <br>
                        Mirpur,Dhaka-1216,Bangladesh
                    </li>
                    </ul>
                </div>
            </div>
            <div class="right" style="width: 50%;float:left;">
                <div class="img" style="width: 220px;margin: auto auto;margin-top: auto;margin-top: 8px;border-radius: 10px;">
                <img src="assets/images/logo/rlogo.png" alt="">
                </div>
            </div>
        </div>
                                            <!-- print header part end -->
                                            
                                        <table class="table table-bordered dt-responsive nowrap tableData" style="color:black; border-collapse: collapse; border-spacing: 0; width: 100%;">
                                       
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                                                                            
                           
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
<?php
require_once 'inc/footer.inc.php';
?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        $("body").on("click", "#clientpdf", function () {
            var date=new Date($.now());
            html2canvas($('#editor')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("reportbgdbilling"+date+".pdf");
                }
            });
        });
    </script>

<script src="divjs/divjs.js"></script>
<script>
  $('#clientprint').click(function(){
    $('#editor').printElement({
    });
  })
</script>
