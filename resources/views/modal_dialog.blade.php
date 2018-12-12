<!-- Feedback Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
                <!--Modal Header--> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center; font-size: 18px;">
                    Transfer Money
                </h4>
            </div>
            
                <div id="alertus" style="width: 80%; text-align: center; margin-left: 50px; padding-top:5px; padding-bottom:5px; margin-top: 10px;"></div>
                <!--Modal Body--> 
            <div class="modal-body">                
                <form class="form-horizontal" role="form" id="feedbackForm">

                    <div class="trnx">
                        <h4>Transfer From:</h4>
                        @if( !$show_menu_ )
                            <p><small>Account {{ session()->get('user')->account }}</small></p>
                            <h3>&#8358;{{ session()->get('user')->available_balance }}</h3>
                            <input type="hidden" name="bank_account_id" id="bank_account_id" value="{{ session()->get('user')->id }}">
                        @endif
                    </div>

                    <div class="trnx">
                        <h4>Transfer To:</h4>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <select name="bank_type" id="bank_type"  required="required" class="form-control">
                                    <option value="1">Another Zenith Account</option>
                                    <option value="2">Commercial Bank</option>
                                    <option value="3">Microfinance Bank</option>
                                    <option value="4">Primary Mortgage Bank</option>
                                    <option value="5">Merchant Bank</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group hide_input">
                            <div class="col-sm-10">
                                <select name="bank" id="bank"  required="required" class="form-control">
                                    <option value="1">UBA</option>
                                    <option value="2">First Bank</option>
                                    <option value="3">GTBank</option>
                                    <option value="4">Stanbic IBTC Bank</option>
                                    <option value="5">Union Bank</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control required" id="beneficiary_account" name="beneficiary_account" placeholder="Beneficiary Account Number" required="required" maxlength="10">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <div class="col-sm-10">
                                <input type="button" id="validate" class="btn btn-danger btn-block" value="Validate">
                            </div>
                        </div> --}}
                    </div> 
                    
                    
                    <div class="trnx">
                        <h4>Transfer Details:</h4>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control required" id="amount" name="amount" placeholder="Amount" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control required" id="description" name="description" placeholder="Description" required="required">
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="submit" id="btnSendMail" class="btn btn-danger btn-block" value="Transfer Now">
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Feedback Modal-->