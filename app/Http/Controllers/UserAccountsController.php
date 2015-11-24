<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserAccount;

class UserAccountsController extends Controller
{

    public function new_account_data($user_id,$transaction_type,$amount){

           if(empty($user_id)  ||  empty($transaction_type) ||  empty($amount)){
               return   'One of the required field is empty';
           }

           $user_account                    =       new UserAccount();
           $user_account->user_id           =       $user_id;
           $user_account->transaction_type  =       $transaction_type;
           $user_account->amount            =       $amount;

           if($user_account->save()){
               return true;
           }else{
               return false;
           }

    }

    public function payment_credited(AuthenticateController $authenticateController,Request $request){

        $user               =   $authenticateController->getAuthenticatedUser();

        $user               =   json_decode($user->getContent());

        $amount             =   $request->get('amount');

        $user_id            =   $user->user->id;

        $transaction_type   =   'Credit';

        $ok                 =   $this->new_account_data($user_id,$transaction_type,$amount);

        if($ok){
            return response()->json(['message'  => 'success']);
        }else{
            return response()->json(['message'  => 'failure']);
        }
    }

    public function show_balance(AuthenticateController $authenticateController){

        $user               =   $authenticateController->getAuthenticatedUser();

        $user               =   json_decode($user->getContent());

        $user_id            =   $user->user->id;

        $user_credits       =   \DB::select("SELECT SUM(amount) as total FROM  user_account WHERE user_id =  '$user_id' AND transaction_type='Credit' ");

        //To do
        //We will the user's orders and subtract his credits from the orders..

        if(is_array($user_credits)){

            return response()->json(['message'  => 'success']);
        }else{
            return response()->json(['message'  => 'failure']);
        }

    }
}
