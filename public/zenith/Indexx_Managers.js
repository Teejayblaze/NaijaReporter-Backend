 $(document).ready(function() {       
     
     //Testing for browser compactability
     var nVer = navigator.appVersion;
     var nAgt = navigator.userAgent;
     var browserName = navigator.appName;
     var fullVersion = ''+parseFloat(navigator.appVerison);
     var nameOffset, verOffset, ix;
     
     //In Opera, the true version is afetr "Opera" or after "Version" 
     if((verOffset=nAgt.indexOf("Opera"))!=-1){
         browserName = "Opera";
         fullVerison = nAgt.substring(verOffset+6);
         if((verOffset=nAgt.indexOf("Version"))!=-1)
             fullVersion =nAgt.substring(verOffset+8);
     }
     //In MSIE, the true version is after "MSIE" in userAgent
     else if((verOffset=nAgt.indexOf("MSIE"))!=-1){
         browserName = "Microsoft Internet Explorer";
         fullVersion = nAgt.substring(verOffset+5);
     }
     // In Chrome, the true version is after "Chrome" 
     else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
      browserName = "Chrome";
      fullVersion = nAgt.substring(verOffset+7);
     }
        // In Safari, the true version is after "Safari" or after "Version" 
     else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
      browserName = "Safari";
      fullVersion = nAgt.substring(verOffset+7);
      if ((verOffset=nAgt.indexOf("Version"))!=-1) 
        fullVersion = nAgt.substring(verOffset+8);
     }
    // In Firefox, the true version is after "Firefox" 
    else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
     browserName = "Firefox";
     fullVersion = nAgt.substring(verOffset+8);
    }
    // In most other browsers, "name/version" is at the end of userAgent 
    else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
              (verOffset=nAgt.lastIndexOf('/')) ) 
    {
     browserName = nAgt.substring(nameOffset,verOffset);
     fullVersion = nAgt.substring(verOffset+1);
     if (browserName.toLowerCase()==browserName.toUpperCase()) {
      browserName = navigator.appName;
     }
    }
    // trim the fullVersion string at semicolon/space if present
    if ((ix=fullVersion.indexOf(";"))!=-1)
       fullVersion=fullVersion.substring(0,ix);
    if ((ix=fullVersion.indexOf(" "))!=-1)
       fullVersion=fullVersion.substring(0,ix);

    majorVersion = parseInt(''+fullVersion,10);
    if (isNaN(majorVersion)) {
     fullVersion  = ''+parseFloat(navigator.appVersion); 
     majorVersion = parseInt(navigator.appVersion,10);
    }  
     
     
     if(browserName == "Chrome" && majorVersion <= 43 || browserName == "Microsoft Internet Explorer" && majorVersion <= 9 )
	// if(browserName == "Chrome" && majorVersion <= 43 || browserName == "Microsoft Internet Explorer" && majorVersion <= 9 || browserName == "Firefox" && majorVersion <= 45)
     {
       window.location.href = "https://auth.zenithbank.com/internetbanking/compatibility.jsp";
       //window.location.href = "https://authdemo.zenithbank.com/internetbanking-demo/compatibility.jsp";
       //window.location.href = "http://localhost:8080/CorporateIbank/compatibility.jsp";
     } 
     //End Testing for browser compatability
     
     
    //Detect if browser is Desktop or Mobile     
     var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };
        
        if(!isMobile.any())
        {            
            var ga = document.createElement("script");
            ga.type = 'text/javascript';			
			ga.src = 'https://s.acquire.io/a-dfdde/init.js?full';
            //ga.src = 'https://mylivechat.com/chatinline.aspx?hccid=67765497';
            document.body.appendChild(ga);
        }
       //End to Detect if browser is Desktop or Mobile 
       
       
 
     //Existing User
    $('#btnSignIn').prop('disabled', true)
    $('#btnSignIn').css({'background-color':'#515356'}); 
      
      //New User
    $('#btnNewUser').prop('disabled', true)
    $('#btnNewUser').css({'background-color':'#515356'}); 
      
   //New User validation
   $("#loginidNew, #newPin, #confirmPin, #tokenCode").keyup(function(){  
   
      if(($("#loginidNew").val().length<=0) || ($("#newPin").val().length<=0) || ($("#confirmPin").val().length<=0) || ($("#tokenCode").val().length<=0) )
      {
          $('#btnNewUser').prop('disabled', true).css({'background-color':'#ccc'});  
      }
      else
      {       
          $('#btnNewUser').prop('disabled',false)
          $('#btnNewUser').css({'background-color':'#e54e53'});          
      } 
      
   })
     
     //Show password and set time out
     var showPassTime = 1000;
     $('#showPassExist').click(function(){
          $("#pin").prop('type','text');
          setTimeout(function(){
              
             $("#pin").prop('type','password'); 
          },showPassTime )  
      })
      
     $('#showPassExist2').click(function(){
          $("#newPin").prop('type','text');
          setTimeout(function(){
              
             $("#newPin").prop('type','password'); 
          },showPassTime )  
      })
      
     $('#showPassExist3').click(function(){
          $("#confirmPin").prop('type','text');
          setTimeout(function(){
              
             $("#confirmPin").prop('type','password'); 
          },showPassTime )  
      });

     //disallow special characters    
     $('#pin,#token,#newPin,#confirmPin,#tokenCode').keypress(function(e) {     
        var a = [];
        var k = e.which;

        var keycode = e.keyCode || e.which;
        if(keycode === 8){return; }
        if(keycode === 9){return; }

        for (i = 48; i < 58; i++)
            a.push(i);

        if (!($.inArray(k,a)>=0))
            e.preventDefault();    

    });    
    
   //function not to allow for sequential numbers
   function invalidPin(pin)
   {       
        var inValidNumbers = ['0000','1111','2222','3333','4444','5555','6666','7777','8888','9999','1234','4321']; 
        if(inValidNumbers.indexOf(pin) === -1)   //returns the index of the selected element
        {           
            return true;
        }             
            return false;
   } 
       
       
  //Existing Users Validation   
  $('#signInForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            //required: 'fa fa-asterisk',
            //valid: 'glyphicon glyphicon-ok',
//            invalid: 'glyphicon glyphicon-remove',
//            validating: 'glyphicon glyphicon-refresh'
            invalid: 'fa fa-times',
            validating: 'fa fa-reload'
        },
        fields: {
            	loginid: {
                validators: {  
                    notEmpty: {                          
                    message: 'Username is required'
                              }
                            }
                        },
            pin: {
                message: 'PIN is required',
                validators: {
                        stringLength: {
                        min: 4,
                        max: 8,
                        message: 'PIN must be between 4 to 8 digits'
                    },                   
                        notEmpty: {
                        message: 'PIN is required'
                    },

                }
            }, //end of pin
             token: {
                  message: 'Token Code is required',
                validators: {
                     stringLength: {
                        min: 6,
                        max: 6,
                        message: 'Invalid Token Code'
                    },
                    notEmpty: {
                        message: 'Token Code is required'
                    }
                }
            },
            
            
            }
        }); 
        
       //End of Validation for Existing Users
       //  .on('err.field.fv', function (e, data){
       //  data.fv.disableSubmitButtons(false);
       //  });

   //Existing User validation
   $("#loginid, #pin, #token").keyup(function(){             
   
      if(($("#loginid").val().length<=0) || ($("#pin").val().length<=0) || ($("#token").val().length<=0) )
      {
          $('#btnSignIn').prop('disabled', true).css({'background-color':'#ccc'});  
      }
      else
      {       
          $('#btnSignIn').prop('disabled',false)
          $('#btnSignIn').css({'background-color':'#e54e53'});
          
      }       
   })
   
         
              
   //New Users Validation   
  $('#newUser').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            //valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            	loginidNew: {
                validators: {                    
                    notEmpty: {                   
                    message: 'Invalid Username'
                              }
                            }
                        },
            newPin: {
                message: 'PIN is required',
                validators: {
                        stringLength: {
                        min: 4,
                        max: 4,
                        message: 'PIN must be 4 digits'
                    },
                        notEmpty: {
                        message: 'PIN is required'
                    },
                        callback:{
                            callback:function(value){                               
                                if(invalidPin(value))
                                {                                    
                                    return true;
                                }
                                else
                                {                                    
                                    return false;
                                }
                                   
                            },
                        message: 'Invalid PIN. Avoid using repeated or sequential numbers such as 1111 or 1234'                            
                    }
                }
            }, //end of new pin            
            confirmPin: {
                message: 'PIN is required',
                validators: {
//                     stringLength: {
//                        min: 4,
//                        max: 4,
//                        //message: 'PIN must be 4 digits'
//                    },
                    notEmpty: {
                        message: 'PIN is required'
                    },
                    identical: {
                        field: 'newPin',
                        message: ' <b>New PIN</b> and <b>Confirm PIN</b> do not match'
                    },
                   
                }

            },
             tokenCode: {
                 message: 'Token Code is required',
                validators: {
                     stringLength: {
                        min: 6,
                        max: 6,
                    },
                    notEmpty: {
                        message: 'Please supply a token code'
                    }
                }
            },
			
            
            }
        }); 
       //End of Validation for New Users
         
         
     //Redirecting to homepage after PIN is created by New Users 
//     $(document).on('click','#linkd', function()
//     {   
//            $.ajax({
//                type: "POST",
//                url: "https://corpdemo.zenithbank.com/coporate-internetbanking-demo/ProcessLogin_CreatePin",                               
//                data: {mid: $(this).attr('data-loginId'), id: $(this).attr('data-accesscode') },
//                success: function(data) {                     
//                  //  $('#alert').css({'background-color':'#D1F9D7'},{'border-color':'#EBCCD1'}).html('<center style="color: #0CD10C; padding: 5px; "><i class="glyphicon glyphicon-ok" style="color: #006600">&nbsp;&nbsp;</i> Login Successful ' + data +'</center>');
//                   if(data.nextPage)
//                   {
//                       window.location = data.nextPage;                        
//                   }
//                                    
//                },
//                error: function() {
//                    $("#alert").show(); 
//                    $('#alert').css({'background-color':'#F2DEDE'},{'border-color':'#EBCCD1'}).html('<center style="color: #A94442; padding: 5px; "><i class="glyphicon glyphicon-warning-sign">&nbsp;&nbsp;</i>Create Pin Failed. Please call ZenithDirect on 234-1-2787000, 234-1-2927000 or send an email to zenithdirect@zenithbank.com for more information   </center>');
//                       
//                }
//            });        
//    });

    
     //Redirecting to homepage after PIN is created by New Users 
     $(document).on('click', '#linkd', function()
     {   
         var hidd_form = document.getElementById('hidd_form');         
         //hidd_form.action = 'https://corpdemo.zenithbank.com/coporate-internetbanking-demo/ProcessLogin_CreatePin'; 
         document.getElementById('hidd_form').action = 'https://icorporate.zenithbank.com/coporate-internetbanking/ProcessLogin_CreatePin.jsp';
         //document.getElementById('hidd_form').action = 'ProcessLogin_CreatePin.jsp';
         document.getElementById('hidd_form').method = 'post';    
         document.getElementById('hidd_form').submit();
         //$(hidd_form).trigger('submit');  
    });

         
         
    //New User Creating Pin and Loging In
    $('#newUserA').click(function (){        
            
            //clears value inside text input
            var loginId = $('#loginidNew').val('');
            var newPinn = $('#newPin').val('');
            var confirmPinn = $('#confirmPin').val('');
            var tokenCodee = $('#token').val('');
            //var tokenCodee = $('#tokenCode').val('');
        
         $('#signIn').hide();
         $('#forgotPin').hide();
         $('#newUser').show();
         
         $('#btnNewUser').click(function(e){
             e.preventDefault();
			 
             //paramaeters to be sent
            var loginid = $('#loginidNew').val();
            var newPin = $('#newPin').val();
            var confirmPin = $('#confirmPin').val();
            var tokenCode = $('#tokenCode').val();
            var status = $('#statusId').val();
            //var tokenStatus = $('#tokenStatus').val();  
            
            if($('#loginidNew').val().length <= 0)
            {
                 $('#alert2').show();
                 $('#alert2').css({'background-color':'#F2DEDE'},{'border-color':'#EBCCD1'}).html('<center style="color: #A94442; padding: 5px;"><i class="glyphicon glyphicon-warning-sign">&nbsp;&nbsp;</i>Username is required</span>');
                 return false;
            }
            else if($('#newPin').val().length <= 0)
            {
                 $('#alert2').show();
                 $('#alert2').css({'background-color':'#F2DEDE'},{'border-color':'#EBCCD1'}).html('<center style="color: #A94442; padding: 5px;"><i class="glyphicon glyphicon-warning-sign">&nbsp;&nbsp;</i>PIN is required</center>');
                  return false;
            }
            else if($('#confirmPin').val().length <= 0)
            {
                 $('#alert2').show();
                 $('#alert2').css({'background-color':'#F2DEDE'},{'border-color':'#EBCCD1'}).html('<center style="color: #A94442; padding: 5px; "><i class="glyphicon glyphicon-warning-sign">&nbsp;&nbsp;</i>Confirm PIN is required</center>');
                 return false;
            }            
            else if($('#tokenCode').val().length <= 0){
                 $('#alert2').show();
                 $('#alert2').css({'background-color':'#F2DEDE'},{'border-color':'#EBCCD1'}).html('<center style="color: #A94442; padding: 5px;"><i class="glyphicon glyphicon-warning-sign">&nbsp;&nbsp;</i>Token Code is required</center>');
                 return false;
            }            
            else
            {
                 $.ajax({                              
                               url: "VascoLogin",                                                         
                               type: "POST",
                               dataType: "json",
                               data: {
                                       loginid_PASS:loginid,
                                       newPin_PASS:newPin, 
                                       verifyPin_PASS:confirmPin, 
                                       tokencode_PASS:tokenCode,
                                       User_Status: status
                                      //tokenStatus_PASS:tokenStatus                               
                                },
                               success: function (data) 
                               {                                      
                                    var loginId = data.loginId;
                                    var accessCode = data.accesscode;                                       
                                    
                                    $('#hidd_user').val(loginId);
                                    $('#hidd_acc').val(accessCode);    
                                   
                                   if(data.errorMsg)
                                    {  
                                         $('#alert2').show();
                                         $('#alert2').css({'background-color':'#F2DEDE'},{'border-color':'#EBCCD1'}).html('<center style="color: #A94442;line-height:-3px !important; padding: 5px; "><i class="glyphicon glyphicon-warning-sign">&nbsp;&nbsp;</i>'+ data.errorMsg +'</center>');
                                         //retain values when loging in
                                         $('#loginidNew').val($('#loginidNew').val());
                                         $('#newPin').val("");
                                         $('#confirmPin').val("");
                                         $('#tokenCode').val("");  
                                         return false; 
                                    }                                   
                                    else
                                    {   
                                       $('#alert2').css({'background-color':'#D1F9D7'},{'border-color':'#EBCCD1'}).html('<center style="color: #515356; padding: 5px; "><i style="color: #515356; text-transform: capitalize; line-height:2px; ">&nbsp;&nbsp;</i>' + data.successMsg +' <br>  <u> <a href="javascript:void(0)" id="linkd" style="color: #515356" > Click Here To Continue </a> </u></center>');
                                       
                                        //retain values when loging in and make readonly
                                         $('#loginidNew').prop("readonly", true);
                                         $('#newPin').prop("readonly", true);
                                         $('#confirmPin').prop("readonly", true);
                                         $('#tokenCode').prop("readonly", true);
                                   } 
                                },
                                error: function(data) {                                   
                                    $('#alert2').show();
                                    if(!data.errorMsg){
                                     	data.errorMsg  = "Unexpected Error Processing Request!.";
                                     	
                                     }
                                    $('#alert2').css({'background-color':'#F2DEDE'},{'border-color':'#EBCCD1'}).html('<center style="color: #A94442; padding: 5px;"><i class="glyphicon glyphicon-warning-sign">&nbsp;&nbsp;</i>'+ data.errorMsg +'</center>');
                                                             
                                },
                                complete: function() 
                                { 
                                 
                                } 
                           }); 
                
            }            
            
            
         });
         
        
    });
    //End Existing User
    
       
      
    //Back to login
    $('#backToSignIn').on('click', function(){
         $('#newUser').hide();          
         //clears text input
        var loginidd = $('#loginid').val('');
        var pinn = $('#pin').val('');
        var tokencodee = $('#tokencode').val('');         
         $('#signIn').show();
    });
    //End Back to Login
    
    $additional = `
        <div class="row adjust-margin" style="margin-top: 0px;">
            <div class="col-sm-4" style="text-align: left;"><strong>Addition Amount:</strong></div>
            <div class="col-sm-8" style="text-align: right;">
                <div style="border-bottom: 1px solid;float: right;padding: 5px 10px;">
                    <span>&#8358;</span>
                    <span contenteditable="true" style="outline: none;min-width: 83px;display: inline-block" id="add_amt">0.00</span>
                    <input type="hidden" class="form-control required" id="extra_amt" name="extra_amt" value="0">
                </div>                                    
            </div>
        </div>
    `
    
    $('.add_extra_amount').on('click', function(evt){
        evt.preventDefault();
        $self = $(this);
        $($additional).insertBefore($self.closest('.row'));
        $self.attr('disabled', 'disabled');
        // alert('this should have one click event');
    });

    $('body').on('input', '#add_amt', function(){
        $('#extra_amt').val($(this).text());
    });

    $('.print').on('click', function(e){
        e.preventDefault();
        window.print();
    })

    $show_on_search_valid = $('.show_on_search_valid');
    $asset_name = $('#asset_name');
    $asst_name = $('#asst_name');

    $asset_desc = $('#asset_desc');
    $asst_description = $('#asst_description');

    $trans_num = $('#trans_num');
    $trnx_id = $('#trnx_id');

    $beneficiary_acct = $('#beneficiary_acct');
    $beneficiary_account = $('#beneficiary_account');

    $asset_amt = $('#asset_amt');
    $asst_amount = $('#asst_amount');

    $add_amt = $('#add_amt');
    $extra_amt = $('#extra_amt');

    $('#validate').on('click', function(e){
        e.preventDefault();
        $transid = $('#transaction_id').val();
        var self = $(this);
        if ($transid.trim()) {
            
            self.attr('disabled', 'disabled');

            $.get('http://localhost:8000/api/v1/transaction/'+$transid.trim(), function(res){
                console.log(res);
                if ( res.status ) {
                    
                    self.removeAttr('disabled');

                    $("#alertus").hide(); 

                    $asset_name.html(res.success.asset_name);
                    $asst_name.val(res.success.asset_name);

                    $asset_desc.html(res.success.asset_desc);
                    $asst_description.val(res.success.asset_desc);

                    $trans_num.html($transid);
                    $trnx_id.val($transid);

                    $beneficiary_acct.html(res.success.account_num);
                    $beneficiary_account.val(res.success.account_num);

                    $asset_amt.html('&#8358;'+ res.success.deposit_amt);
                    $asst_amount.val(res.success.deposit_amt);

                    $show_on_search_valid.css('display', 'block');
                }
                else {
                    self.removeAttr('disabled');
                    $("#alertus").show(); 
                    $show_on_search_valid.css('display', 'none');
                    $('#alertus')
                    .css({'background-color':'#F2DEDE'},{'border-color':'#EBCCD1'})
                    .html('<center style="color: #A94442; padding: 5px; "><i class="glyphicon glyphicon-warning-sign">&nbsp;&nbsp;</i>'+ res.error +' is required</center>');
                }
            });
        }
        else {
            self.removeAttr('disabled');
            $("#alertus").show(); 
            $show_on_search_valid.css('display', 'none');
            $('#alertus')
            .css({'background-color':'#F2DEDE'},{'border-color':'#EBCCD1'})
            .html('<center style="color: #A94442; padding: 5px; "><i class="glyphicon glyphicon-warning-sign">&nbsp;&nbsp;</i>Transaction ID is required</center>')
        }
    });
    
  //  $('#feedbackForm').validate();
    
    
    var accp = [2,3,4,5];
    $('#bank_type').change(function(e){
        var val = parseInt($(this).val().trim());
        var inp = $(this).closest('.form-group').next('.form-group');
        if ( accp.indexOf(val) != -1 ) inp.removeClass('hide_input');
        else inp.addClass('hide_input');
    });

    
    
    //Send Feedback Mail
    //Existing Loging In
   $('#btnSendMail').click(function(e){
        e.preventDefault();                
        
        $('.required').each(function(id, elm) {
            var el = $(elm);
            if (!el.val().trim()) {
                $("#alertus").show(); 
                $('#alertus').css({'background-color':'#F2DEDE'},{'border-color':'#EBCCD1'}).html('<center style="color: #A94442; padding: 5px; "><i class="glyphicon glyphicon-warning-sign">&nbsp;&nbsp;</i>'+ el.attr('placeholder') +' is required</center>');
                return false;
            }
        });

        var self = $(this);
        self.attr('disabled', 'disabled');

        // var recip_bank = '';
        // var recip_bank_type = $('#bank_type option:selected').text().trim();
        // var val_recp_bank_type = $('#bank_type option:selected').val().trim();

        // if ( accp.indexOf(val_recp_bank_type) != -1 ) recip_bank = $('#bank option:selected').text();

        var account_num = $('#beneficiary_account').val().trim();
        var asst_amount = $('#asst_amount').val().trim();
        var description = $('#asst_description').val().trim();
        var bank_account_id = $('#bank_account_id').val().trim();
        var asst_name = $('#asst_name').val().trim();
        var trnx_id = $('#trnx_id').val().trim();
        var extra_amt = $('#extra_amt').val();
                  
        $.ajax({                                    
            url: "/api/bank/transfer/money",                                 
            type: "POST", 
            data: {
                // "recipient_bank_type": recip_bank_type, 
                // "recipient_bank": recip_bank, 
                "account_num": account_num, 
                "asst_amount": asst_amount, 
                "asst_description": description,
                "bank_account_id": bank_account_id,
                "extra_amt": extra_amt,
                "asst_name": asst_name,
                "trnx_id": trnx_id,
            },
            success: function(data) 
            {   
                var resp = data;
                
                if(!resp.status) { 

                    $("#alertus").show(); 
                    $('#alertus')
                        .css({'background-color':'#F2DEDE'},{'border-color':'#EBCCD1'})
                        .html('<center style="color: #A94442; padding: 5px; "><i class="glyphicon glyphicon-warning-sign">&nbsp;&nbsp;</i>' + resp.errors +'</center>');                                 
                
                } else {      
                    $("#alertus").show(); 
                    $('#alertus')
                        .css({'background-color':'#0CD10C'},{'border-color':'#EBCCD1'})
                        .html('<center style="color: #fff; padding: 5px;">' + resp.success +'</center>');     

                    setTimeout(function(){
                        $('#myModal').modal('hide');
                        window.location.reload();                                                                             
                    },3000) 
                }     
                
                self.removeAttr('disabled');
            },
            complete: function(xhr) { 
                if (xhr.responseJSON.status) {
                    $('#beneficiary_account').val('');
                    $('#amount').val('');
                    $('#description').val('');
                    self.removeAttr('disabled');
                }   
            },
            error: function() {
                self.removeAttr('disabled');
            }                             
        }); 
                        

    });
         
         //disallow special characters    
            $('#phoneNumber').keypress(function(e) {     
               var a = [];
               var k = e.which;

               var keycode = e.keyCode || e.which;
               if(keycode === 8){return; }
               if(keycode === 9){return; }

               for (i = 48; i < 58; i++)
                   a.push(i);

               if (!($.inArray(k,a)>=0))
                   e.preventDefault();    

           });   
                
         
         
         //Email Validation
         function validateEmail(sEmail) {
                var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                if (filter.test(sEmail)) {
                    return true;
                }
                else {
                    return false;
                }
        }	
 
});