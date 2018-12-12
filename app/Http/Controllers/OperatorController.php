<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;
use Illuminate\Support\Facades\Validator;

class OperatorController extends Controller
{
    //

    public function create_operator_form()
    {
        return view('create_form');
    }

    public function create_operator(Request $request, Operator $operator)
    {
        $validator = Validator::make($request->all(), [
            'corporate_name' => 'bail|required',
            'rc_number' => 'bail|required',
            'email' => 'bail|required|email|unique:operators'
        ]);

        if ( $validator->fails() ) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $oaan_number = 'OAAN/OPR/' . date('Y') . '/' . $this->generate_unique_oaan_number();

        $operator->corporate_name = $request->corporate_name;
        $operator->rc_number = $request->rc_number;
        $operator->email = $request->email;
        $operator->oaan_number = $oaan_number;

        if ( $operator->save() ) {
            return redirect()->back()->with('success', 'Congratulation, Your account has been created successfully.');
        }
    }


    public function verify_operator($oaan_number = null)
    {
        $operator = Operator::where(['oaan_number' => str_replace('-', '/', $oaan_number)])->first();

        if ($operator) {
            return response()->json(['status' => true, 'errors' => null, 'success' => $operator]);
        } 
        else {
            return response()->json([
                'status' => false, 
                'errors' => 'Apologies, We are unable to find such operator with the provided OAAN Number [ '. $oaan_number .' ].', 
                'success' => null]);
        } 
    }

    private function generate_unique_oaan_number()
    {
        mt_srand((double)microtime()*10000);
        $charid = md5(uniqid(rand(), true));

        $c = unpack("C*",$charid);
        $c = implode("",$c);

        return substr($c,0,5); // generate 10 random unique number.
    }
}
