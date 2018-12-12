@extends('master')

@section('content')
    
    <h3 class="widgettitle" id="alert" style="text-transform: none;">SIGN IN </h3>
    <form id="signInForm" method="post" action="{{ url('/bank/zenith/') }}" class="bbp-login-form widget-login bv-form" autocomplete="off" novalidate="novalidate">
        <fieldset>				
                <legend>Log In</legend>  
                @csrf
            @if ( $errors->any() )
                <br/>                                     
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group bbp-username input-group">  
                    <div class="inputGroupContainer">          
                        <div class="bbp-username input-group">
                        <span class="input-group-addon" style="color: #555;">
                        <i class="glyphicon glyphicon-user" data-toggle="tooltip" title="USERNAME - This is a unique identity assigned to you.
                                This is usually formed from your names"></i> 
                        </span>                                    
                            <input type="text" name="loginid" value="{{ old('loginid') }}" id="loginid" size="20" tabindex="103" placeholder="Username" data-toggle="tooltip" title="USERNAME - This is a unique identity assigned to you.
                                This is usually formed from your names" data-bv-field="loginid">
                        </div>
                    </div>
            <small data-bv-validator="notEmpty" data-bv-validator-for="loginid" class="help-block" style="display: none;">Username is required</small></div>
                                                
                                                
            <div class="form-group bbp-username input-group">  
                    <div class="inputGroupContainer">          
                        <div class="bbp-username input-group">
                        <span class="input-group-addon" style="color: #555;">
                            <i class="glyphicon glyphicon-pushpin" data-toggle="tooltip" title="PIN - Your PIN should be between 4 to 8 digits long."></i>
                        </span>                      
                            <input type="password" name="pin" value="" maxlength="8" id="pin" size="20" tabindex="103" placeholder="PIN" data-toggle="tooltip" title="PIN - Your PIN should be between 4 to 8 digits long." data-bv-field="pin">                       
                                <span class="input-group-addon" style="color: #555; background-color: #eee; border-color: #ccc;">
                                    <i class="glyphicon glyphicon-eye-open" id="showPassExist" data-toggle="tooltip" title="Show PIN"></i>
                                </span> 
                        </div>
                    </div>
            <small data-bv-validator="stringLength" data-bv-validator-for="pin" class="help-block" style="display: none;">PIN must be between 4 to 8 digits</small><small data-bv-validator="notEmpty" data-bv-validator-for="pin" class="help-block" style="display: none;">PIN is required</small></div>
                                                
            <div class="form-group bbp-username input-group">  
                    <div class="inputGroupContainer">          
                        <div class="bbp-username input-group">
                        <span class="input-group-addon" style="color: #555;">
                            <i class="glyphicon glyphicon-lock" data-toggle="tooltip" title="TOKEN CODE - The token code is any 6-digit reading displayed on your token."></i>
                        </span>                    
                            <input type="password" name="token" value="" maxlength="6" id="token" size="20" tabindex="103" placeholder="Token Code" data-toggle="tooltip" title="TOKEN CODE - The token code is any 6-digit reading displayed on your token." data-bv-field="token">
                        </div>
                    </div>
            <small data-bv-validator="stringLength" data-bv-validator-for="token" class="help-block" style="display: none;">Invalid Token Code</small><small data-bv-validator="notEmpty" data-bv-validator-for="token" class="help-block" style="display: none;">Token Code is required</small></div>
                    
                    
                                                
            <div class="bbp-submit-wrapper">
                <a href="/#" title="Click here to Sign up as a new user" id="newUserA" style="cursor: pointer;" class="bbp-lostpass-link lost-pass-modal"><b>NEW USER?</b></a>
                <input type="submit" style="width: 30%; color: rgb(255, 255, 255); background-color: rgb(81, 83, 86);" name="btnSignIn" id="btnSignIn" value="Log In" class="button submit user-submit">  
                <input type="hidden" name="status" value="1" id="status">
            </div>
        </fieldset>
        <input type="hidden" name="btnSignIn" value="Log In">
    </form>

@endsection