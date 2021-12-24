<?php 
require_once 'inc/functions.inc.php';
if (isset($_POST['reportType'])) {
    $reporttype=get_safe_value($_POST['reportType']) ;
    $clientid=get_safe_value($_POST['clientid']) ;
    $getformdate=get_safe_value($_POST['sartDate']) ;
    $gettodate=get_safe_value($_POST['endDate']) ;
    $formdate=$getformdate." 00:00:00";
    $todate=$gettodate." 23:59:59";

    if ($reporttype == "client_list") {
        ?>
        <?php 
        $selectservices=selectjoin("clients","*","");
       if (mysqli_num_rows($selectservices) > 0) {

        echo  $html='<thead>
        <tr style="color:black;">    <th>SL.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Created</th>
                <th>Created By</th>
            </tr>
            </thead>
            <tbody>';
                $i=0;
                foreach ($selectservices as  $selectservice) {
                    $i++;
                    $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $selectservice['created_by']))['name'];
                    echo $html2="<tr style='color:black;'>
                    <td>".$i."</td>
                    <td>".$selectservice['name']."</td>
                    <td>".$selectservice['email']."</td>
                    <td>".$selectservice['mobail']."</td>
                     <td>".$selectservice['company_address']."</td>
                    <td>".$selectservice['created_at']."</td>
                    <td>".$created_by."</td>
                </tr>";
                } 
         
        }else{
        echo '<tr>
        <td colspan="7" style="text-align:center;">Record Not found</td>
        </tr>'; 
        }
    
    }elseif ($reporttype == "service_list") {
        $selectservices=selectjoin("services","*","");
        if (mysqli_num_rows($selectservices) > 0) { 

           echo  $html='<thead>
            <tr>
                    <th>SL.No</th>
                    <th>Service Name</th>
                    <th>Service Amount</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Created</th>
                    <th>Created By</th>
                </tr>
                </thead>
                <tbody>';
                    $i=0;
                    foreach ($selectservices as  $selectservice) {
                        $i++;
                        $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $selectservice['created_by']))['name'];
                        $category_name = mysqli_fetch_assoc(select('categories', 'category_name', "id =" . $selectservice['categories_id']))['category_name'];
                        $subcategory_name = mysqli_fetch_assoc(select('sub_categories', 'subcategory_name', "id =" . $selectservice['subcategories_id']))['subcategory_name'];
                        echo $html2="<tr>
                        <td>".$i."</td>
                        <td>".$selectservice['service_name']."</td>
                        <td>".$selectservice['service_amount']."</td>
                        <td>".$category_name."</td>
                        <td>".$subcategory_name."</td>
                        <td>".$selectservice['created_at']."</td>
                        <td>".$created_by."</td>
                    </tr>";
                    } 
        }else{
            echo '<tr>
            <td colspan="7" style="text-align:center;">Record Not found</td>
        </tr>'; 
        }  
    
      
    }elseif ($reporttype == "purchase") {
        if (empty($clientid)) {
            echo '<tr>
        <td colspan="9" style="text-align:center; color:red;">client id is empty</td>
        </tr>';
        }else if(empty($getformdate)){
            echo '<tr>
        <td colspan="9" style="text-align:center; color:red;">From date is empty</td>
        </tr>';
    }else if(empty($gettodate)){
        echo '<tr>
    <td colspan="9" style="text-align:center; color:red;">To Date is empty</td>
    </tr>';
}else{
     //purchase code start
            $conditionclient="WHERE test.client_id=$clientid AND selling_price !='' AND test.created_at BETWEEN '$formdate' AND '$todate' ";
            $selectservices=selectjoin("test","*",$conditionclient);
            if (mysqli_num_rows($selectservices) > 0) { 
               echo  $html='<thead>
                <tr>
                        <th>SL.No</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Service Name</th>
                        <th>Service Amount</th>
                        <th>Discount</th>
                        <th>Total Price</th>
                        <th>Created</th>
                        <th>Created By</th>
                    </tr>
                    </thead>
                    <tbody>';
                        $i=0;
                        foreach ($selectservices as  $selectservice) {
                            $i++;
                            $service=mysqli_fetch_assoc(select("services","*","id=". $selectservice['service_id']));
                             $clientdata=mysqli_fetch_assoc(select("clients","name,mobail","id=". $selectservice['client_id']));
                             $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $selectservice['created_by']))['name'];
                        echo $html2="<tr>
                            <td>".$i."</td>  
                            <td>".$clientdata['name']."</td>
                            <td>".$clientdata['mobail']."</td> 
                            <td>".$service['service_name']."</td>
                            <td>".$selectservice['service_amount']."</td>
                            <td>".$selectservice['discount_amount']."</td>
                            <td>".$selectservice['selling_price']."</td>
                            <td>".$selectservice['created_at']."</td>
                            <td>".$created_by."</td>
                        </tr>";
                        }
                        $totalpurchase=sumdata("test","selling_price","total_purchase",$conditionclient);
                        // echo $html3="<tr>
                        //     <td>ami</td>  
                        //     <td></td>
                        //     <td></td> 
                        //     <td></td>
                        //     <td></td>
                        //     <td></td>
                        //     <td>".$totalpurchase['total_purchase']."</td>
                        //     <td></td>
                        //     <td></td>
                        // </tr>";
                        echo "okay";
                        
            }else{
                echo '<tr>
                <td colspan="7" style="text-align:center;">Record Not found</td>
            </tr>'; 
            }
            //purchase code end
        }
    }elseif ($reporttype == "deposit") {
        if (empty($clientid)) {
            echo '<tr>
        <td colspan="8" style="text-align:center;">client id is empty</td>
        </tr>';
        }else if(empty($getformdate)){
            echo '<tr>
        <td colspan="8" style="text-align:center; color:red;">From date is empty</td>
        </tr>';
    }else if(empty($gettodate)){
        echo '<tr>
    <td colspan="8" style="text-align:center; color:red;">To Date is empty</td>
    </tr>';
}else{
            
        //deposit code start
        $conditionclient="WHERE test.client_id= $clientid AND test.total_amount !='' AND test.created_at BETWEEN '$formdate' AND '$todate'";
     $selectservices=selectjoin("test","*",$conditionclient);
    if (mysqli_num_rows($selectservices) > 0) { 
   echo  $html='<thead>

    <tr>
            <th>SL.No</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Method</th>
            <th>Deposit Amount</th>
            <th>Campaign Amount</th>
            <th>Total amount</th>
            <th>Created</th>
            <th>Created By</th>
        </tr>
        </thead>
        <tbody>';
            $i=0;
            foreach ($selectservices as  $selectservice) {
                $i++;
                $method=mysqli_fetch_assoc(select("payment_methods","*","payment_id=". $selectservice['deposit_method']));
                $clientdata=mysqli_fetch_assoc(select("clients","name,mobail","id=". $selectservice['client_id']));
                $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $selectservice['created_by']))['name'];
                echo $html2="<tr>
                <td>".$i."</td>
                <td>".$clientdata['name']."</td>
                <td>".$clientdata['mobail']."</td>
                <td>".$method['name']."</td>
                <td>".$selectservice['deposit_amount']."</td>
                <td>".$selectservice['campaign_amount']."</td>
                <td>".$selectservice['total_amount']."</td>
                <td>".$selectservice['created_at']."</td>
                <td>".$created_by."</td>
            </tr>";
            } 
    }else{
    echo '<tr>
    <td colspan="8" style="text-align:center;">Record Not found</td>
</tr>'; 
}
        
    //deposit code end

        }
}elseif ($reporttype == "purchasedeposit") {
        if (empty($clientid)) {
            echo '<tr>
        <td colspan="9" style="text-align:center;">client id is empty</td>
        </tr>';
        }else if(empty($getformdate)){
            echo '<tr>
        <td colspan="9" style="text-align:center; color:red;">From date is empty</td>
        </tr>';
    }else if(empty($gettodate)){
        echo '<tr>
    <td colspan="9" style="text-align:center; color:red;">To Date is empty</td>
    </tr>';
}else{
           
//purchasedeposit code start

$conditionclient="LEFT JOIN clients ON test.client_id = clients.id LEFT JOIN services ON test.service_id = services.id  WHERE test.client_id=$clientid AND test.selling_price !='' AND test.created_at BETWEEN '$formdate' AND '$todate' ";
$selectservices=selectjoin("test","*",$conditionclient);
if (mysqli_num_rows($selectservices) > 0) { 

    echo $heading='<thead>
    <tr>
        <td colspan="9"><h4>Purchase information</h4></td>
    </tr>';
   echo  $html='
    <tr>
    <th>SL.No</th>
    <th>Name</th>
    <th>Mobile</th>
    <th>Service Name</th>
    <th>Service Amount</th>
    <th>Discount</th>
    <th>Total Price</th>
    <th>Created</th>
    <th>Created By</th>
        </tr>
        </thead>
        <tbody>';
            $i=0;
            foreach ($selectservices as  $selectservice) {
                $i++;
                $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $selectservice['created_by']))['name'];
                echo $html2="<tr>
                        <td>".$i."</td>
                        <td>".$selectservice['name']."</td>
                        <td>".$selectservice['mobail']."</td>
                        <td>".$selectservice['service_name']."</td>
                        <td>".$selectservice['service_amount']."</td>
                        <td>".$selectservice['discount_amount']."</td>
                        <td>".$selectservice['selling_price']."</td>
                        <td>".$selectservice['created_at']."</td>
                        <td>".$created_by."</td>
            </tr>";
            } 
}else{
    echo '<tr>
    <td colspan="9" style="text-align:center;">Record Not found</td>
</tr>'; 
}
    
//purchase
$conditionclient="LEFT JOIN clients ON test.client_id = clients.id  WHERE test.client_id= $clientid AND test.created_at BETWEEN '$formdate' AND '$todate'";
$selectservices=selectjoin("test","*",$conditionclient);
if (mysqli_num_rows($selectservices) > 0) {
 echo $heading='<thead>
    <tr>
        <td colspan="8"><h4>Deposit information</h4></td>
    </tr>';
   echo  $html='
    <tr>
    <th>SL.No</th>
    <th>Name</th>
    <th>Mobile</th>
    <th>Deposit Amount</th>
    <th>Campaign Amount</th>
    <th>Total amount</th>
    <th>Created</th>
    <th>Created By</th>
        </tr>
        </thead>
        <tbody>';
            $i=0;
            foreach ($selectservices as  $selectservice) {
                $i++;
                $created_by = mysqli_fetch_assoc(select('users', 'name', "id =" . $selectservice['created_by']))['name'];
                echo $html2="<tr>
                <td>".$i."</td>
                <td>".$selectservice['name']."</td>
                <td>".$selectservice['mobail']."</td>
                <td>".$selectservice['deposit_amount']."</td>
                <td>".$selectservice['campaign_amount']."</td>
                <td>".$selectservice['total_amount']."</td>
                <td>".$selectservice['created_at']."</td>
                <td>".$created_by."</td>
            </tr>";
            } 
    }else{
    echo '<tr>
    <td colspan="8" style="text-align:center;">Record Not found</td>
    </tr>'; 
    }

        
    }
}
}



?>