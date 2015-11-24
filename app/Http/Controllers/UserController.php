<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthenticateController;

class UserController extends Controller
{

    public function home(){

        if (Auth::check()) {
            $user = Auth::user();
            return $user->id;
        }else{
            return 'Not logged in';
        }

    }

    public function LoginFailDetected(){
        return 'Invalid login credentials supplied';
    }

    public function RegistrationFailDetected(){

        if(isset($errors)){
            return json_decode($errors);
        }
    }

    public function login(AuthenticateController $authenticateController,Request $request){

        $result = $authenticateController->authenticate($request);
        $result =   json_decode($result->getContent());
        $result =   (array) $result;

        if(array_key_exists('token',$result)){
            $final  =   response()->json(['message' => 'success', 'data' => $result ]);
            return $final;
        }else{
            $final  =   response()->json(['message' => 'failure', 'data' => $result ]);
            return $final;
        }
    }
}
