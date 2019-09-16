<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tzsk\Payu\Facade\Payment;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $attributes = [
            'txnid' => strtoupper(str_random(8)), # Transaction ID.
            'amount' => $request->payu_amount, # Amount to be charged.
            'productinfo' => "Mail500mg App",
            'firstname' => \Auth::user()->name, # Payee Name.
            'email' => \Auth::user()->email, # Payee Email Address.
            'phone' => $request->payu_phone, # Payee Phone Number.
            'udf1' => $request->payu_lic_count, # Payee Phone Number.
        ];

        return Payment::make($attributes, function ($then) {
            $then->redirectTo('payment/status');
        });
    }    

    public function status(Request $request)
    {
        $payment = Payment::capture();
        // print_r($payment);
        // exit();
        if($payment->isCaptured()){
            $payCount = \DB::table('user_tnx')->where('tnx_n', '=',$payment->txnid )->count();
            if($payCount == 0){
                \DB::table('user_tnx')->insert(["tnx_n"=>$payment->txnid, 'user_id'=>\Auth::id(), 'tnx_date'=>date('Y-m-d H:i:s'), 'tnx_bank'=>$payment->issuing_bank, 'tnx_ammount'=>$payment->net_amount_debit, 'tnx_copy'=>'NA', 'tnx_exp'=>date('Y-m-d'), 'c_licence'=>$payment->get('udf1'), 'tnx_status'=>2]);
                return redirect('/home')->withSuccess('Payment Done.');
            }else{
                return redirect('/home')->withErrors('Oops Duplicate Transaction.');
            }
        }else{
            return redirect('/home')->withErrors('Oops Something Went Wrong.');
        }
        // $payment->isCaptured(); # Returns boolean - true / false
    }
}
