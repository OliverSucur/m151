<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        $users = \App\Models\User::all();
        foreach($users as $user){
            if($user->email == $request->i_email && password_verify($request->i_password, $user->password)){
                echo 'yes';
                break;
            }else{
                echo 'no';
            }
        }
    }
}
