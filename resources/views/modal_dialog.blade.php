<!-- Feedback Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
                <!--Modal Header--> 
            <div class="modal-header noprint">
                <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="text-align: center; font-size: 18px;">
                    Asset Payment
                </h4>
            </div>
            
                <div id="alertus" class="noprint" style="width: 80%; text-align: center; margin-left: 50px; padding-top:5px; padding-bottom:5px; margin-top: 10px;"></div>
                <!--Modal Body--> 
            <div class="modal-body">                
                <form class="form-horizontal" role="form" id="feedbackForm">
                    
                    <div class="trnx noprint">
                        <h4>Account Detail</h4>
                        @if( !$show_menu_ )
                            <p><small>Account {{ session()->get('user')->account }}</small></p>
                            <h3>&#8358;{{ session()->get('user')->available_balance }}</h3>
                            <input type="hidden" name="bank_account_id" id="bank_account_id" value="{{ session()->get('user')->id }}">
                        @endif
                    </div>

                    <div class="trnx noprint">
                        <h4>Transaction Verification</h4>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control required" id="transaction_id" name="transaction_id" placeholder="Transaction ID" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="submit" id="validate" class="btn btn-danger btn-block" value="Validate">
                            </div>
                        </div>
                    </div>

                    <div class="trnx show_on_search_valid">
                        <h4>Asset Transaction Details</h4>

                        <div class="row" style="margin-top: 5px;">
                            <div class="col-sm-4" style="text-align: left;"><strong>Name:</strong></div>
                            <div class="col-sm-8" style="text-align: right;">
                              <p id="asset_name"></p>
                              <input type="hidden" class="form-control required" id="asst_name" name="asst_name">  
                            </div>
                        </div>

                        <div class="row" style="margin-top: 5px;">
                            <div class="col-sm-4" style="text-align: left;"><strong>Description:</strong></div>
                            <div class="col-sm-8" style="text-align: right;">
                                <p id="asset_desc"></p>  
                                <input type="hidden" class="form-control required" id="asst_description" name="asst_description"> 
                            </div>
                        </div>

                        <div class="row" style="margin-top: 5px;">
                            <div class="col-sm-4" style="text-align: left;"><strong>Transacion ID:</strong></div>
                            <div class="col-sm-8" style="text-align: right;">
                                <p id="trans_num"></p>  
                                <input type="hidden" class="form-control required" id="trnx_id" name="trnx_id">
                            </div>
                        </div>

                        <div class="row" style="margin-top: 5px;">
                            <div class="col-sm-5" style="text-align: left;"><strong>Beneficiary Account:</strong></div>
                            <div class="col-sm-7" style="text-align: right;">
                                <p id="beneficiary_acct"></p>  
                                <input type="hidden" name="beneficiary_account" id="beneficiary_account" value="" class="form-control required">
                            </div>
                        </div>

                        <div class="row adjust-margin" style="margin-top: 8px;">
                            <div class="col-sm-4" style="text-align: left;"><strong>Amount Due:</strong></div>
                            <div class="col-sm-8" style="text-align: right;">
                                <p style="border-top: 1px solid;border-bottom: 1px solid;float: right;padding: 5px 10px;" id="asset_amt"></p>  
                                <input type="hidden" class="form-control required" id="asst_amount" name="asst_amount">
                            </div>
                        </div>
                        

                        <div class="row noprint" style="margin-top: 8px;">
                            <div class="col-sm-12" style="text-align: right;">
                                <div class="button-group">
                                    <button class="btn btn-primary print"><i class="glyphicon glyphicon-print"></i> Print</button>
                                    <button class="btn btn-primary add_extra_amount"><i class="glyphicon glyphicon-plus"></i> Additional Amount</button>
                                </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="form-group noprint">
                            <div class="col-sm-10">
                                <input type="submit" id="btnSendMail" class="btn btn-danger btn-block" value="Make Payment">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Feedback Modal-->

{{-- <div class="trnx">
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
    <div class="form-group">
        <div class="col-sm-10">
            <input type="button" id="validate" class="btn btn-danger btn-block" value="Validate">
        </div>
    </div>
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
</div>  --}}