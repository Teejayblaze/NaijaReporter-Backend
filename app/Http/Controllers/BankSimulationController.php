<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\BankCredential;
use Illuminate\Support\Facades\Input;
use App\BankAccountTransaction;
use App\BankAccount;
use Carbon\Carbon;

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


        // $recipient_bank_type = $request->recipient_bank_type;
        
        // $recipient_bank = $request->recipient_bank;
        $credit_acct = $request->account_num;

        $debit_amount = floatval(str_replace(',', '', $request->asst_amount));
        $extra_amount = $request->extra_amt ? floatval(str_replace(',', '', $request->extra_amt)) : 0;

        $debit_amount += $extra_amount;

        $asset_name = $request->asst_name;
        $description = $request->asst_description;
        
        $trnx_id = $request->trnx_id;
        $debit_acct_id = intval($request->bank_account_id);
        $local_account = null;

        $recipientBankAcct = BankAccount::where('account', $credit_acct)->first();
        if (!$recipientBankAcct) {
            return response()->json(['status' => false, 'errors' => 'Account number does not exist.', 'success' => null]);
        }


        $bankAccount = BankAccount::where('id', $debit_acct_id)->first();

        if ( $bankAccount ) {

            if ( $bankAccount->available_balance < $debit_amount ) 
                return response()->json(['status' => false, 'errors' => 'Apologies, You have insufficient fund for this payment.', 'success' => null]);
            
            $bankAccount->available_balance -= $debit_amount;
            $local_account = $bankAccount->account;
            $bankAccount->save();
            $recipientBankAcct->available_balance += $debit_amount;
            $recipientBankAcct->save();
        }

        $bankTrans = new BankAccountTransaction();
        // $bankTrans->recipient_bank_type = $recipient_bank_type;
        // $bankTrans->recipient_bank = $recipient_bank;
        $bnk_ref = 'Bnk/'. date('Y') . '/'. $this->generate_bank_reference(6);
        $bankTrans->reference = $bnk_ref;
        $bankTrans->recipient_account_num = $credit_acct;
        $bankTrans->account = $local_account;
        $bankTrans->amount = $debit_amount;
        $bankTrans->asset_name = $asset_name;
        $bankTrans->description = $description;
        $bankTrans->trnx_id = $trnx_id;
        $bankTrans->bank_acct_id = $debit_acct_id;

        if ( $bankTrans->save() ) {

            // NOTE: This approach is higly discourage, we should not hardcode the url here, but since its a simulation. Hurray :-)
            // Third Party URL simulation.. Production wise this is very bad. 
            $url = 'http://localhost:8000/api/v1/transaction';
            $method = 'POST';
            $data = [
                'Txn' => 'Credit',
                'Acct' => $this->mask_account($local_account),
                'Amt' => $debit_amount,
                'Desc' => $description,
                'TxnId' => $trnx_id,
                'BnkRef' => $bnk_ref,
                'Date' => Carbon::now(),
            ];

            $sendTPartyTransAwareness = $this->sendRequestNow($url, $method, $data);
            $tpresponse = json_decode($sendTPartyTransAwareness);

            if ( $tpresponse->status ) 
                return response()->json(['status' => true, 'errors' => null, 'success' => 'Congratulation! Your transfer is successful. ']);
        }
    }


    private function mask_account($account)
    {
        return substr($account, 0, 3) . '**' . substr($account, -3, 3);
    }


    private function generate_bank_reference(int $len = 10)
    {
        mt_srand((double)microtime()*10000);
        $charid = md5(uniqid(rand(), true));

        $c = unpack("C*",$charid);
        $c = implode("",$c);

        return substr($c,0,$len); // generate $len random unique number.
    }


    private function sendRequestNow(string $url, string $method = 'GET', $data = [])
    {
        $this->ch = curl_init($url);

        if ( $method === 'POST' ) {
            curl_setopt($this->ch, CURLOPT_POST, true);
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($data));
        } 
        
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);

        try {
            
            $result = curl_exec($this->ch);
            curl_close($this->ch);
            return $result;

        } catch( \Exception $ex ) {
            curl_close($this->ch);
            $err = curl_error($this->ch);
            return response()->json(['status' => false, 'errors' => $err->getMessage(), 'success' => null]);
        }
    }
}
