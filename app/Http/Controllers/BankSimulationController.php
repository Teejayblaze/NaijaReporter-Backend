<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\BankCredential;
use Illuminate\Support\Facades\Input;
use App\BankAccountTransaction;
use App\BankAccount;

class BankSimulationController extends Controller
{
    //

    public function bank_signin_form()
    {
        return view('zenith', ['show_menu_' => true]);
    }

    public function bank_signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'loginid' => 'bail|required',
            'pin' => 'bail|required|min:8',
            'token' => 'bail|required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = BankCredential::where(['loginid' => $request->loginid, 'pin' => $request->pin, 'token' => $request->token])->first();
        
        if ( $user ) {
        
           $user_account = BankAccount::where('id', $user->bank_account_id)->first(); 
           $user_account->available_balance = number_format($user_account->available_balance, 2, '.', ',');
           $user_account->account = $this->mask_account($user_account->account);
           $request->session()->put('user', $user_account); 
           return redirect()->route('dashboard');
        }
        else {
            return redirect()
                ->back()
                ->withErrors(['errors' => ['Sorry, The combination of the provided login credentials are invalid.']])
                ->withInput();
        }
    }


    public function bank_dashboard(Request $request)
    {
        $user_account = BankAccount::where('id', $request->session()->get('user')->id)->first(); 
        $user_account->available_balance = number_format($user_account->available_balance, 2, '.', ',');
        $user_account->account = $this->mask_account($user_account->account);
        $request->session()->put('user', $user_account); 

        return view('bank_dashboard', ['show_menu_' => false]);
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }


    public function transfer_money(Request $request)
    {


        $recipient_bank_type = $request->recipient_bank_type;
        $recipient_bank = $request->recipient_bank;
        $credit_acct = $request->account_num;
        $debit_amount = floatval(str_replace(',', '', $request->amount));
        $description = $request->description;
        $debit_acct_id = intval($request->bank_account_id);
        $local_account = null;

        $recipientBankAcct = BankAccount::where('account', $credit_acct)->first();
        if (!$recipientBankAcct) {
            return response()->json(['status' => false, 'errors' => 'Account number does not exist.', 'success' => null]);
        }


        $bankAccount = BankAccount::where('id', $debit_acct_id)->first();
        if ( $bankAccount ) {
            $bankAccount->available_balance -= $debit_amount;
            $local_account = $bankAccount->account;
            $bankAccount->save();
            $recipientBankAcct->available_balance += $debit_amount;
            $recipientBankAcct->save();
        }

        $bankTrans = new BankAccountTransaction();
        $bankTrans->recipient_bank_type = $recipient_bank_type;
        $bankTrans->recipient_bank = $recipient_bank;
        $bankTrans->recipient_account_num = $credit_acct;
        $bankTrans->account = $local_account;
        $bankTrans->amount = $debit_amount;
        $bankTrans->description = $description;
        $bankTrans->bank_acct_id = $debit_acct_id;

        if ( $bankTrans->save() ) {
            return response()->json(['status' => true, 'errors' => null, 'success' => 'Congratulation! Your transfer is successful. ']);
        }
    }


    private function mask_account($account)
    {
        return substr($account, 0, 3) . '**' . substr($account, -3, 3);
    }
}
