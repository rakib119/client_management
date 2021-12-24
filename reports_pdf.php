<?php
require_once('vendor/autoload.php');
require_once('inc/functions.inc.php');

 $client_id = get_safe_value($_POST['id']);
if(!empty($client_id)){
  
$depositpath="assets/images/upload/deposit_balance/";
$condition2="LEFT JOIN payment_methods ON test.deposit_method = payment_methods.payment_id 
WHERE test.client_id = $client_id ";

$condition1="id=$client_id";
$selectclients=select("clients","*",$condition1);
foreach ($selectclients as  $user) ;

$name =$user['name'];
$email =$user['email'];
$mobail =$user['mobail'];
$company_address =$user['company_address'];

$html='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Report</title>
    <style>
        *{
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }
        ul li{
            list-style-type: none;
        }
        .clr::after{
            content: "";
            clear: both;
            display: block;
        }
        .total1{
            width: 33.32%;
            float: right !important;
        }
        .total{
            width: 23%;
            float: right !important;
        }
        .main_bg{
           background: #DEEFE5;
        }
        
    </style>
</head>
<body style="margin: 0 !important;padding: 0 !important;background-color: #eeeeee;">
    <div class="container" style="width: 95%;margin: 0 auto;">
        <div class="row header_bg header" style="background: #45AD55; display: flex;padding-bottom: 12px;padding: 10px;justify-content: space-between;">
            <div class="left" style="width: 50%;float:left;">
                <h4 style="font-size:20px;font-weight: 500;font-family: Arial, Helvetica, sans-serif;margin: 10px auto;">Summury Reports</h4>
                <table style="width: 80%;border-spacing: 0px;border:none !important;font-size:12px;">
                    <tr style="border: none !important;padding: 0px 2px !important;text-align: left;width: auto !important;">
                        <td>Name:</td> <td>'.$name.'</td>
                    </tr>
                    <tr style="border: none !important;padding: 0px 2px !important;text-align: left;width: auto !important;">
                    <td>Mobail:</td> <td>'.$mobail.'</td>
                    </tr>
                       <tr style="border: none !important;padding: 0px 2px !important;text-align: left;width: auto !important;">
                       <td>Email:</td> <td>'.$email.'</td>
                       </tr>
                       <tr style="border: none !important;padding: 0px 2px !important;text-align: left;width: auto !important;">
                       <td>Address:</td> <td>'.$company_address.'</td>
                       </tr>
                    </tr>
                </table>
            </div>
            <div class="right" style="width: 50%;float:left;">
                <div class="img" style="width: 220px;margin: auto auto;margin-top: auto;margin-top: 8px;border-radius: 10px;">
                <img src="assets/images/logo/logo2.png" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <h4 style="font-size:20px;font-weight: 500;font-family: Arial, Helvetica, sans-serif;margin: 10px auto;">Purchases Reports</h4>
            <table style="width: 100%;text-align: center;border-spacing: 0px;font-size:11px;border:1px solid black;border-bottom:none;">
                <tr>
                    <th style="border-bottom:1px solid #000;text-align: center; width:16.66%;">Service name</th>
                    <th style="border-bottom:1px solid #000;text-align: center; width:16.66%;">Price</th>
                    <th style="border-bottom:1px solid #000;text-align: center; width:16.66%;">date</th>
                    <th style="border-bottom:1px solid #000;text-align: center; width:16.66%;">Unit</th>
                    <th style="border-bottom:1px solid #000;text-align: center; width:16.66%;">Created</th>
                    <th style="border-bottom:1px solid #000;text-align: center; width:16.66%;">Total Price</th>
                </tr>';
                $selectdeposit=selectjoin("test","*",$condition2);
                     foreach ($selectdeposit as  $singledata) {
                         $html.='<tr>
                         <td style="border-bottom:1px solid #000;text-align: center; width:16.66%;">'.$singledata['name'].'</td>
                         <td style="border-bottom:1px solid #000;text-align: center; width:16.66%;">'.$singledata['deposit_amount'].'</td>
                         <td style="border-bottom:1px solid #000;text-align: center; width:16.66%;">'.$singledata['deposit_date'].'</td>
                         <td style="border-bottom:1px solid #000;text-align: center; width:16.66%;">'.$singledata['transaction_id'].'</td>
                         <td style="border-bottom:1px solid #000;text-align: center; width:16.66%;">'.$singledata['created_at'].'</td>
                         <td style="border-bottom:1px solid #000;text-align: center; width:16.66%;">'.$singledata['total_amount'].'</td>
                     </tr>';
                    } 
           $html.='
            </table>
            <div class="row p-0">
                <div class="col-lg-12 p-0">
                <div class="total1">
                <table style="width: 100%;text-align: center;border-spacing: 0px;font-size:13px;border:1px solid black;border-top:none;">
                    <tr>';
                    echo $sqlforsumdeposit="SELECT SUM(total_amount) AS totaldeposit FROM test WHERE client_id = $client_id  ";
                    $runforsumdeposit=mysqli_query(db_conn() ,$sqlforsumdeposit);
                    $rowforsumdeposit=mysqli_fetch_assoc($runforsumdeposit);
                        $html.='<td>total</td> <td>'.$rowforsumdeposit['totaldeposit'].'</td>
                    </tr>
                </table>
                </div>
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <div class="row">
            <h4 style="font-size:20px;
            font-weight: 500;
            font-family: Arial, Helvetica, sans-serif;
            margin: 10px auto;">Deposit Reports</h4>
            <table style="width: 100%;text-align: center;border-spacing: 0px;font-size:11px;border:1px solid black;border-bottom:none;">
                <tr style="border-bottom:1px solid #000;">
                    <th style="border-bottom:1px solid #000;text-align: center; width:12.5%;">Transaction Id</th>
                    <th style="border-bottom:1px solid #000;text-align: center; width:12.5%;">Deposit Method</th>
                    <th style="border-bottom:1px solid #000;text-align: center; width:12.5%;">Deposit Amount</th>
                    <th style="border-bottom:1px solid #000;text-align: center; width:12.5%;">Date</th>
                    <th style="border-bottom:1px solid #000;text-align: center; width:12.5%;">image</th>
                    <th style="border-bottom:1px solid #000;text-align: center; width:12.5%;">Campaign Amount</th>
                    <th style="border-bottom:1px solid #000;text-align: center; width:12.5%;">Created</th>
                    <th style="border-bottom:1px solid #000;text-align: center; width:12.5%;">Total</th>
                </tr>';
               $selectdeposit=selectjoin("test","*",$condition2);
                    foreach ($selectdeposit as  $singledata) {
                        $html.='<tr>
                        <td style="border-bottom:1px solid #000;text-align: center; width:12.5%;">'.$singledata['transaction_id'].'</td>
                        <td style="border-bottom:1px solid #000;text-align: center; width:12.5%;">'.$singledata['name'].'</td>
                        <td style="border-bottom:1px solid #000;text-align: center; width:12.5%;">'.$singledata['deposit_amount'].'</td>
                        <td style="border-bottom:1px solid #000;text-align: center; width:12.5%;">'.$singledata['deposit_date'].'</td>
                        <td style="border-bottom:1px solid #000;text-align: center; width:12.5%;"><a href="'.$depositpath.$singledata['image'].'"><img href="'.$depositpath.$singledata['image'].'" width="80px"></a></td>
                        <td style="border-bottom:1px solid #000;text-align: center; width:12.5%;">'.$singledata['campaign_amount'].'</td>
                        <td style="border-bottom:1px solid #000;text-align: center; width:12.5%;">'.$singledata['created_at'].'</td>
                        <td style="border-bottom:1px solid #000;text-align: center; width:12.5%;">'.$singledata['total_amount'].'</td>
                    </tr>';
                    } 
           $html.='
           </table>
            <div class="row" style="padding-bottom:10px;">
                <div class="col-lg-12 p-0">
                <div class="total">
                <table style="width: 100%;text-align: center;border-spacing: 0px;border:1px solid black;border-top:none;">
                    <tr>';
                    echo $sqlforsumdeposit="SELECT SUM(total_amount) AS totaldeposit FROM test WHERE client_id = $client_id  ";
                    $runforsumdeposit=mysqli_query(db_conn() ,$sqlforsumdeposit);
                    $rowforsumdeposit=mysqli_fetch_assoc($runforsumdeposit);
                        $html.='<td>total</td> <td>'.$rowforsumdeposit['totaldeposit'].'</td>
                    </tr>
                </table>
                </div>
                </div>
            </div>
        </div>
        <div class="clr"></div>
        <div class="row mt-3">
            <footer style="background:#45AD55;padding:8px;">
                <div class="left p-2">
                    <h5 style="margin-top: 0px;margin-left:35px;margin-bottom:0px;font-weight: 500;font-size: 15px;">BGD Online Limited</h5>
                    <ul>
                        <li style="font-size:12px;">Phone: +88 01943636143</li>
                        <li style="font-size:12px;">Landline: +88 02-8090528</li>
                        <li style="font-size:12px;">Email: info@bgdonline.net</li>
                        <li style="font-size:12px;">address: 820,Mamun Tower(8<sup>th</sup> floor),Shewrapara <br>
                        Mirpur,Dhaka-1216,Bangladesh
                    </li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = date("Y-m-d h:i:s")."BGD". '.pdf';
$mpdf->Output($file, 'I');


}else{
    echo '<script>
            alert("Please Select client");
            window.location.href="reports.php";
            </script>';
}
?>