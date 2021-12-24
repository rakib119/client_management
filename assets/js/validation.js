$(document).ready(function() {
    //register form code start
    var add_checkcharacter = false;
    var add_checkemail = false;
    var add_checkcemail = false;
    var add_checkmobile = false;
    var add_checkpass = false;
    var add_checkcpass = false;
    var add_checkempty = false;
    var add_checkdate = false;
    var add_checkimage = false;
    var add_checknumber = false;
    var add_checkselect = false;
    var add_checknumberlatter = false;
 
    function checkpass(smsclass,getpass) {
        var pass = $(getpass).val().length;
        if (pass < 8 && pass !== '') {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getpass).css("border", "2px solid #F36E6E");
            add_checkpass = true;
        } else {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getpass).css("border", "2px solid #23C58F");
        }
    }

    function checkcpass(smsclass,getpass,getcpass) {
        var pass = $(getpass).val();
        var cpass = $(getcpass).val();
        if (pass !== cpass) {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getcpass).css("border", "2px solid #F36E6E");
            add_checkcpass = true;
        } else if (cpass == '') {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getcpass).css("border", "2px solid #F36E6E");
            add_checkcpass = true;
        } else {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(".cpass").css("border", "2px solid #23C58F");
        }
    }


    function checkcharacter(smsclass,getcharacter) {
        var pattern = /^[a-z\s]+$/i;
        var character = $(getcharacter).val();
        if (pattern.test(String(character).toLowerCase())) {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getcharacter).css("border", "2px solid #23C58F");
        }else if(character == ''){
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $(getcharacter).css("border", "1px solid #CED4DA");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getcharacter).css("border", "2px solid #F36E6E");
            add_checkcharacter = true;
        }
    }
    
    function checknumberletter(smsclass,getvalue) {
        var pattern = /^[0-9a-zA-Z]+$/i;
        var email = $(getvalue).val();

        if (pattern.test(String(email).toLowerCase())) {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getvalue).css("border", "2px solid #23C58F");
        }else if(email == ''){
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $(getvalue).css("border", "1px solid #CED4DA");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getvalue).css("border", "2px solid #F36E6E");
            add_checknumberlatter = true;
        }
    }

    function checkcemail(smsclass,getemail) {
        var pattern = /^[a-z0-9](\.?[a-z0-9]){1,}@[0-9a-zA-Z]+\.(com|ai|is|xyz|art|me|io|health|live|net|shop|info|agency|edu.bd|bd.com|online|tv|fun|org)$/i;
        var email = $(getemail).val();

        if (pattern.test(String(email).toLowerCase())) {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getemail).css("border", "2px solid #23C58F");
        }else if(email == ''){
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $(getemail).css("border", "1px solid #CED4DA");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getemail).css("border", "2px solid #F36E6E");
            add_checkemail = true;
        }
    }

    function checkmobile(smsclass,getmobail) {
        var mobile = $(getmobail).val();
        var filter = /^\d*(?:\.\d{1,2})?$/;

        if (filter.test(mobile)) {
            if (mobile.length == 11) {
                $("#wrrongcheck"+smsclass).hide();
                $("#wrrongtext"+smsclass).hide();
                $("#successcheck"+smsclass).show();
                $("#successtext"+smsclass).show();
                $(getmobail).css("border", "2px solid #23C58F");
            }else if(mobile == ''){
                $("#wrrongcheck"+smsclass).hide();
                $("#wrrongtext"+smsclass).hide();
                $("#successcheck"+smsclass).hide();
                $("#successtext"+smsclass).hide();
                $(getmobail).css("border", "1px solid #CED4DA");
            } else {
                $("#successcheck"+smsclass).hide();
                $("#successtext"+smsclass).hide();
                $("#wrrongcheck"+smsclass).show();
                $("#wrrongtext"+smsclass).html("Please give 11 digit");
                $("#wrrongtext"+smsclass).show();
                $(getmobail).css("border", "2px solid #F36E6E");
                add_checkmobile = true;
            }
        }else if(mobile == ''){
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).hide();
            $("#successtext"+ smsclass).hide();
            $(getmobail).css("border", "1px solid #CED4DA");
        }else {
            $("#successcheck" + smsclass).hide();
            $("#successtext" + smsclass).hide();
            $("#wrrongcheck" + smsclass).show();
            $("#wrrongtext" + smsclass).show();
            $(getmobail).css("border", "2px solid #F36E6E");
            add_checkmobile = true;
        }

    }

    function checkempty(smsclass,getempty) {
        var value = $(getempty).val();
        if (value !== '' && value !== ' ') {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getempty).css("border", "2px solid #23C58F");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $(getempty).css("border", "2px solid #CED4DA");
        }
    }

    function checkdate(smsclass ,getdate) {
    var date = $(getdate).val();
        if (date !== '') {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getdate).css("border", "2px solid #23C58F");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getdate).css("border", "2px solid #F36E6E");
            add_checkdate = true;
        }
    }

    function checkselect(smsclass,getselect) {
        var deposit_method = $(getselect).val();
        if (deposit_method !== '' ) {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getselect).css("border", "2px solid #23C58F");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getselect).css("border", "2px solid #F36E6E");
            add_checkselect = true;
        }
    }
    function  checkimage(smsclass,getimage) {
        var image = $(getimage).val();
        if (image !== '') {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getimage).css("border", "2px solid #23C58F");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getimage).css("border", "2px solid #F36E6E");
            add_checkimage = true;
        }
    }
     function  checknumber(smsclass,getnumber) {
           var pattern=/^\d*[.]?\d*$/;
        var number = $(getnumber).val();
        if (pattern.test(String(number).toLowerCase()) && number !== '') {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getnumber).css("border", "2px solid #23C58F");
        }else if(number == ''){
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $(getnumber).css("border", "1px solid #CED4DA");
        }else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getnumber).css("border", "2px solid #F36E6E");
            add_checknumber = true;
        }
    }
    //start not requerd field validation functions
    
    
function checkcharacters(smsclass,getcharacter) {
        var pattern = /^[a-z\s]+$/i;
        var character = $(getcharacter).val();
        if (pattern.test(String(character).toLowerCase()) && character !== '') {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getcharacter).css("border", "2px solid #23C58F");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getcharacter).css("border", "2px solid #F36E6E");
            add_checkcharacter = true;
        }
    }
    function checknumberletters(smsclass,getvalue) {
        var pattern = /^[0-9a-zA-Z]+$/i;
        var email = $(getvalue).val();

        if (pattern.test(String(email).toLowerCase()) && email !== '') {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getvalue).css("border", "2px solid #23C58F");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getvalue).css("border", "2px solid #F36E6E");
            add_checknumberlatter = true;
        }
    }
    function checkemails(smsclass,getemail) {
        var pattern = /^[a-z0-9](\.?[a-z0-9]){1,}@(gmail|outlook|yahoo|hotmail)\.com$/i;
        var email = $(getemail).val();

        if (pattern.test(String(email).toLowerCase()) && email !== '') {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getemail).css("border", "2px solid #23C58F");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getemail).css("border", "2px solid #F36E6E");
            add_checkemail = true;
        }
    }

    function checkmobiles(smsclass,getmobail) {
        var mobile = $(getmobail).val();
        var filter = /^\d*(?:\.\d{1,2})?$/;

        if (filter.test(mobile)) {
            if (mobile.length == 11) {
                $("#wrrongcheck"+smsclass).hide();
                $("#wrrongtext"+smsclass).hide();
                $("#successcheck"+smsclass).show();
                $("#successtext"+smsclass).show();
                $(getmobail).css("border", "2px solid #23C58F");
            } else {
                $("#successcheck"+smsclass).hide();
                $("#successtext"+smsclass).hide();
                $("#wrrongcheck"+smsclass).show();
                $("#wrrongtext"+smsclass).html("Please give 11 digit");
                $("#wrrongtext"+smsclass).show();
                $(getmobail).css("border", "2px solid #F36E6E");
                add_checkmobile = true;
            }
        } else {
            $("#successcheck" +smsclass).hide();
            $("#successtext" +smsclass).hide();
            $("#wrrongcheck" +smsclass).show();
            $("#wrrongtext" +smsclass).show();
            $(getmobail).css("border", "2px solid #F36E6E");
            add_checkmobile = true;
        }

    }

    function checkemptys(smsclass,getempty) {
        var value = $(getempty).val();
        if (value !== '' && value !== ' ') {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getempty).css("border", "2px solid #23C58F");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getempty).css("border", "2px solid #F36E6E");
            add_checkempty = true;
        }
    }

        function checkdates(smsclass ,getdate) {
        var date = $(getdate).val();
        if (date !== '') {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getdate).css("border", "2px solid #23C58F");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getdate).css("border", "2px solid #F36E6E");
            add_checkdate = true;
        }
    }

    function checkselects(smsclass,getselect) {
        var deposit_method = $(getselect).val();
        if (deposit_method !== '' ) {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getselect).css("border", "2px solid #23C58F");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getselect).css("border", "2px solid #F36E6E");
            add_checkselect = true;
        }
    }
    function  checkimages(smsclass,getimage) {
        var image = $(getimage).val();
        if (image !== '') {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getimage).css("border", "2px solid #23C58F");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getimage).css("border", "2px solid #F36E6E");
            add_checkimage = true;
        }
    }
    function  checknumbers(smsclass,getnumber) {
           var pattern=/^\d*[.]?\d*$/;
        var number = $(getnumber).val();
        if (pattern.test(String(number).toLowerCase()) && number !='') {
            $("#wrrongcheck"+smsclass).hide();
            $("#wrrongtext"+smsclass).hide();
            $("#successcheck"+smsclass).show();
            $("#successtext"+smsclass).show();
            $(getnumber).css("border", "2px solid #23C58F");
        } else {
            $("#successcheck"+smsclass).hide();
            $("#successtext"+smsclass).hide();
            $("#wrrongcheck"+smsclass).show();
            $("#wrrongtext"+smsclass).show();
            $(getnumber).css("border", "2px solid #F36E6E");
            add_checknumber = true;
        }
    }
    
    //end not requerd field validation 

    $(".name").keyup(function() {
        checkcharacter("namesms",".name");
    });
  
    $(".email").keyup(function() {
        checkemail("emailsms",".email");
    });
    $(".mobile").keyup(function() {
        checkmobile("mobilesms",".mobile");
    });
    $(".designation").keyup(function() {
        checkcharacter("designationsms",".designation");
    });
    $(".pass").keyup(function() {
        checkpass("passsms",".pass");
    });
    $(".cpass").keyup(function() {
        checkcpass("cpasssms",".pass",".cpass");
    });
    $(".cname").keyup(function() {
        checkcharacter("cnamesms",".cname");
    });
    $(".cemail").keyup(function() {
        checkcemail("cemailsms",".cemail");
    });
    $(".cmobile").keyup(function() {
        checkmobile("cmobilesms",".cmobile");
    });
    $(".caddress").keyup(function() {
        checkempty("caddresssms",".caddress");
    });

    $("#form_id").submit(function() {

        add_checkemail = false;
         add_checkcharacter = false;
        add_checkmobile = false;
        add_checkpass = false;
        add_checkcpass = false;
            
            checkemails("emailsms",".email");
            checkcharacters("namesms",".name");
            checkmobiles("mobilesms",".mobile");
            checkpass("passsms",".pass");
        checkcpass("cpasssms",".pass",".cpass");
       
          if (add_checkcharacter === false &&  add_checkmobile === false && add_checkemail === false && add_checkpass === false && add_checkcpass === false ){

              return true;
            } 
            else {
              return false;
              }
    });

//edit client information
$("#edit_client").submit(function() {

            add_checkcharacter = false;
            add_checkmobile = false;
            
            checkcharacters("namesms",".name");
            checkmobiles("mobilesms",".mobile");
       
          if (add_checkcharacter === false &&  add_checkmobile === false ){

              return true;
            } 
            else {
              return false;
              }
         });
         //edit client info client side

$("#edit_client_info").submit(function() {

            add_checkcharacter = false;
            add_checkmobile = false;
            
            checkcharacters("namesms",".name");
            checkmobiles("mobilesms",".mobile");
       
          if (add_checkcharacter === false &&  add_checkmobile === false ){

              return true;
            } 
            else {
              return false;
              }

         });

//add deposits 
$(".clientid").change(function(){
    checkselect("clientsms",".clientid");
})
$(".transactionid").keyup(function(){
    checknumberletter("txsms",".transactionid");
})
$(".campaignid").change(function(){
    checkselect("campaignsms",".campaignid");
})
$(".damount").keyup(function(){
    checknumber("damount",".damount");
})
$(".tx_date").change(function(){
    checkdate("txdatesms",".tx_date");
})
$(".imagecheck").change(function(){
    checkimage("imagesms",".imagecheck");
})
$(".deposit_method").change(function(){
    checkselect("depositsms",".deposit_method");
})


$("#add_deposits").submit(function() {

             add_checkselect =false;
             add_checknumber = false;
             add_checknumberlatter = false;
            
             checkselect("clientsms",".clientid");
             checknumberletters("txsms",".transactionid"); 
             checknumbers("damount",".damount");
             checkselect("depositsms",".deposit_method");
             
       
           if (add_checkselect === false &&  add_checknumber === false &&  add_checknumberlatter === false){
               return true;
            } 
            else {
               return false;
              }

         });

//edit deposit
$("#edit_deposits").submit(function() {
         
           add_checkselect =false;
             add_checknumber = false;
             add_checknumberlatter = false;
            
             checkselect("clientsms",".clientid");
             checknumberletters("txsms",".transactionid"); 
             checknumbers("damount",".damount");
             checkselect("depositsms",".deposit_method");
             
       
           if (add_checkselect === false &&  add_checknumber === false &&  add_checknumberlatter === false){
               return true;
            } 
            else {
               return false;
              }

         });
//add_campaign
$(".campname").keyup(function(){
    checknumberletter("campnamesms",".campname");
});
$(".number").keyup(function(){
    checknumber("numbersms",".number");
});
$(".startdate").change(function(){
    checkdate("startsms",".startdate");
});
$(".endDate").change(function(){
    checkdate("endsms",".endDate");
})
$(".imagecheck").change(function(){
    checkimage('imagesms',".imagecheck");
})
$(".deposit_method").change(function(){
    checkselect("catsms",".deposit_method");
})




$("#add_campaign").submit(function() {

             add_checkempty = false ;
             add_checknumber = false;
             add_checkdate = false;
             add_checkselect = false;
             add_checknumberletter = false;

             checknumberletters("campnamesms",".campname");
             checknumbers("numbersms",".number");
             checkdate("startsms",".startdate");
             checkdate("endsms",".endDate");
             checkselect("catsms",".deposit_method");
             
       
           if (add_checknumberletter === false && add_checknumber === false && add_checkdate === false && add_checkselect === false ){
               return true;
            } 
            else {
              
               return false;
              }

         });
//edit campaign
$("#edit_campaign").submit(function() {

             add_checknumberlatter = false ;
             add_checknumber = false;
             add_checkdate = false;
             add_checkselect = false;

             checknumberletters("campnamesms",".campname");
             checknumbers("numbersms",".number");
             checkdate("startsms",".startdate");
             checkdate("endsms",".endDate");
             checkselect("catsms",".deposit_method");
             
       
           if (add_checknumberlatter === false && add_checknumber === false && add_checkdate === false && add_number === false && add_checkselect === false ){
               return true;
            } 
            else {
              
               return false;
              }

            });

         $('.selectdata').select2();
         $('.selectdata1').select2();
         $('.selectdata2').select2();
         $('.selectdata3').select2();
         $('.selectdata4').select2();

    //dashboard
    
    $("#viewdeposit").click(function(){
        var link = $(this).val();
        window.location.href= link;
    })
    $("#viewpurchase").click(function(){
        var link = $(this).val();
        window.location.href= link;
    })
    
   
    function loadDepositData() {
        var getselect= "yes";
           $.ajax({
               url:"action_load_data.php",
               method:"POST",
               data: {deposit:getselect},
               cache: false,
               success: function(getdata){
                   $("#totalDeposit").html(getdata);
               }
                });
           }
        loadDepositData();

    function loadPurchaseData() {
            var getselect= "yes";
               $.ajax({
                   url:"action_load_data.php",
                   method:"POST",
                   data: {purchase:getselect},
                   cache: false,
                   success: function(getdata){
                       $("#totalPurchase").html(getdata);
                   }
                    });
               }
        loadPurchaseData();

$("#selectDay").click(function (){
    $("#selectYear").removeClass("active");
    $("#selectWeek").removeClass("active");
    $("#selectMonth").removeClass("active");
    $(this).addClass("active");
            function loadDepositDay() {
                $("#viewdeposit").val("viewdeposit.php?name=deposit&&task=day");
                var getselect= "yes";
                var day="yes";
                   $.ajax({
                       url:"action_load_data.php",
                       method:"POST",
                       data: {depositday:getselect,day:day},
                       cache: false,
                       success: function(getdata){
                        $("#totalDeposit").html(getdata);
                       }
                        });
                   }
            loadDepositDay();
        
      function loadPurchaseDay() {
          $("#viewpurchase").val("viewpurchase.php?name=purchase&&task=day");
                    var getselect="yes";
                    var day="yes";
                       $.ajax({
                           url:"action_load_data.php",
                           method:"POST",
                           data: {purchaseday:getselect,day:day},
                           cache: false,
                           success: function(getdata){
                            $(this).addClass("active");
                               $("#totalPurchase").html(getdata);
                           }
                            });
                       }
                    loadPurchaseDay();
});
        
$("#selectWeek").click(function (){
    $("#selectDay").removeClass("active");
    $("#selectMonth").removeClass("active");
    $("#selectYear").removeClass("active");
    $(this).addClass("active");
    function loadDepositWeek() {
        $("#viewdeposit").val("viewdeposit.php?name=deposit&&task=week");
        var getselect= "yes";
        var week="yes";
           $.ajax({
               url:"action_load_data.php",
               method:"POST",
               data: {depositweek:getselect,week:week},
               cache: false,
               success: function(getdata){
                $("#totalDeposit").html(getdata);
               }
                });
           }
    loadDepositWeek();

    function loadPurchaseWeek() {
        
         $("#viewpurchase").val("viewpurchase.php?name=purchase&&task=week");
            var getselect="yes";
            var week="yes";
               $.ajax({
                   url:"action_load_data.php",
                   method:"POST",
                   data: {purchaseweek:getselect,week:week},
                   cache: false,
                   success: function(getdata){
                       $("#totalPurchase").html(getdata);
                   }
                    });
               }
            loadPurchaseWeek();
});

$("#selectMonth").click(function (){
    $("#selectDay").removeClass("active");
    $("#selectWeek").removeClass("active");
    $("#selectYear").removeClass("active");
    $(this).addClass("active");

    function loadDepositMonth() {
        $("#viewdeposit").val("viewdeposit.php?name=deposit&&task=month");
        var getselect= "yes";
        var month="yes";
           $.ajax({
               url:"action_load_data.php",
               method:"POST",
               data: {depositmonth:getselect,month:month},
               cache: false,
               success: function(getdata){
                $("#totalDeposit").html(getdata);
               }
                });
           }
           loadDepositMonth();

    function loadPurchaseMonth() {
         $("#viewpurchase").val("viewpurchase.php?name=purchase&&task=month");
            var getselect= "yes";
            var month="yes";
               $.ajax({
                   url:"action_load_data.php",
                   method:"POST",
                   data: {purchasemonth:getselect,month:month},
                   cache: false,
                   success: function(getdata){
                       $("#totalPurchase").html(getdata);
                   }
                    });
               }
               loadPurchaseMonth();
});
$("#selectYear").click(function (){
    $("#selectDay").removeClass("active");
    $("#selectWeek").removeClass("active");
    $("#selectMonth").removeClass("active");
    $(this).addClass("active");

    function loadDepositYear() {
        $("#viewdeposit").val("viewdeposit.php?name=deposit&&task=year");
        var getselect= "yes";
        var year="yes";
           $.ajax({
               url:"action_load_data.php",
               method:"POST",
               data: {deposityear:getselect,year:year},
               cache: false,
               success: function(getdata){
                $("#totalDeposit").html(getdata);
               }
                });
           }
           loadDepositYear();

    function loadPurchaseYear() {
         $("#viewpurchase").val("viewpurchase.php?name=purchase&&task=year");
            var getselect= "yes";
            var year="yes";
               $.ajax({
                   url:"action_load_data.php",
                   method:"POST",
                   data: {purchaseyear:getselect,year:year},
                   cache: false,
                   success: function(getdata){
                       $("#totalPurchase").html(getdata);
                   }
                    });
               }
               loadPurchaseYear();
});

//search report data 
$(".report_type").change(function(){
    checkselect("typesms",".report_type");
    var getreporttype=$(".report_type").val();
    if (getreporttype == "purchase" || getreporttype == "deposit" || getreporttype == "purchasedeposit") {
    $(".clientinput").show();
    $(".formdate").show();
    $(".todate").show();
    }else{
    $(".clientinput").hide();
    $(".formdate").hide();
    $(".todate").hide();
    }
})
$(".clientid").change(function(){
    checkselect("clientsms",".clientid");
})

$(".startdate").change(function(){
    checkdate("startsms",".startdate");
})
$(".enddate").change(function(){
    checkdate("endsms",".enddate");
})

$("#reportform").submit(function() {
            var reportType=$(".report_type").val();
            if (reportType == 'client_list') {
                $(".tbHeader").html("Client List");
            }else if (reportType == 'service_list') {
                $(".tbHeader").html("Service List");
            }else if (reportType == 'purchase') {
                $(".tbHeader").html("Purchase Information");
            }else if (reportType == 'deposit') {
                $(".tbHeader").html("Deposit Information");
            }else if (reportType == 'purchasedeposit') {
                $(".tbHeader").html("Purchase And Deposit Information");
            }
            var clientid=$(".clientid").val();
            var sartDate=$(".startdate").val();
            var endDate=$(".enddate").val();  
             
           if (add_checkdate === false ){
            $.ajax({
                url:"report_action.php",
                method:"POST",
                data: {reportType:reportType,
                    clientid:clientid,
                    sartDate:sartDate,
                    endDate:endDate,
                },
                cache: false,
                beforeSend: function(){
                  $("#search_data").val("Searching...");
                          },
                success: function(getdata){
                $(".clientTable").show(getdata);
                   $(".tableData").html(getdata);
                   $("#search_data").val("Search");
                    // $("#reportform").trigger("reset");
                }
                 });
               return true;
            } 
            else {
              
               return false;
              }

         });
 
//purchase Form

$(".number").keyup(function(){
    checknumber("numbersms",".number");
})
$(".categories").change(function(){
    checkselect("cat_msg",".categories");
});
$(".subcategories").change(function(){
    checkselect("sub_cat_msg",".subcategories");
});
$(".service_name").change(function(){
    checkselect("service_msg",".service_name");
});
$(".cliente_name").change(function(){
    checkselect("cliente_msg",".cliente_name");
});



$("#purchase").submit(function() {
             add_checkselect = false;

             checkselect("cat_msg",".categories");
             checkselect("sub_cat_msg",".subcategories");
             checkselect("service_msg",".service_name");
             checkselect("cliente_msg",".cliente_name");
           if (add_checkselect === false ){
               return true;
            } 
            else {
               return false;
              }

         });
         $("#edit_purchase").submit(function() {
             add_checkselect = false;

             checkselect("cat_msg",".categories");
             checkselect("sub_cat_msg",".subcategories");
             checkselect("service_msg",".service_name");
             checkselect("cliente_msg",".cliente_name");
           if (add_checkselect === false ){
               return true;
            } 
            else {
               return false;
              }

         });
         
//add sub category
$(".selectcat").change(function(){
    checkselect("selectcatsms",".selectcat");
});
$(".subcat").keyup(function(){
    checkcharacter("subcatsms",".subcat");
});
$("#add_subcat").submit(function() {
                add_checkselect = false;
             add_checkcharacter = false;

             checkselects("selectcatsms",".selectcat");
             checkcharacters("subcatsms",".subcat");
           if (add_checkselect === false && add_checkcharacter === false ){
               return true;
            } 
            else{
               return false;
            }

         });
         $("#edit_subcat").submit(function() {
                add_checkselect = false;
             add_checkcharacter = false;

             checkselects("selectcatsms",".selectcat");
             checkcharacters("subcatsms",".subcat");
           if (add_checkselect === false && add_checkcharacter === false ){
               return true;
            } 
            else{
               return false;
            }

         });
//add service
$(".selectcat").change(function(){
    checkselect("selectcatsms",".selectcat");
});
$(".selectsubcat").change(function(){
    checkselect("selectsubcatsms",".selectsubcat");
});
$(".servicename").keyup(function(){
    checkempty("servicenamesms",".servicename");
});
$(".service_amount").keyup(function(){
    checknumber("service_amount",".service_amount");
});
$(".serviceimg").change(function(){
    checkimage("serviceimg",".serviceimg");
});
$(".servicedetails").keyup(function(){
    checkempty("servicedetails",".servicedetails");
});
$("#add_service").submit(function() {
                add_checkselect = false;
                add_checkimage = false;
                add_checkempty = false;
                add_checknumber = false;

             checkselect("selectcatsms",".selectcat");
             checkselect("selectsubcatsms",".selectsubcat");
             checkimage("serviceimg",".serviceimg");
             checkemptys("servicenamesms",".servicename");
             checknumbers("service_amount",".service_amount");
             checkemptys("servicedetails",".servicedetails");
           if (add_checkselect === false && add_checkimage === false  && add_checkempty === false  && add_checknumber === false){
               return true;
            } 
            else{
               return false;
            }

         });

$("#edit_service").submit(function() {
                add_checkselect = false;
                add_checkempty = false;
                add_checknumber = false;

             checkselect("selectcatsms",".selectcat");
             checkselect("selectsubcatsms",".selectsubcat");
             checkemptys("servicenamesms",".servicename");
             checknumbers("service_amount",".service_amount");
             checkemptys("servicedetails",".servicedetails");
           if (add_checkselect === false  && add_checkempty === false  && add_checknumber === false){
               return true;
            } 
            else{
               return false;
            }

         });




              
});

// function printData(id) {
//     var backup= document.body.innerHTML;
//     var printelement=document.getElementById(id).innerHTML;
//     document.body.innerHTML = printelement;
//     window.print();
//     document.body.innerHTML = backup;
    
// }
