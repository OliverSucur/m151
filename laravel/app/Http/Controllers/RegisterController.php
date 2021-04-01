<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function openRegisterView(){
        return view('register');
    }

    public function register(Request $request){
        $email = $request->i_email;
        $password = $request->i_password;
        $confirmPassword = $request->i_confirmPassword;
        $firstname = $request->i_firstname;
        $lastname = $request->i_lastname;
        $street = $request->i_street;
        $zip = $request->i_zip;
        $city = $request->i_city;
        $phone = $request->i_phone;

        if($password === $confirmPassword){
            DB::insert('INSERT INTO users (email, password, first_name, last_name, street, zip, city, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
            [$email, password_hash($password, PASSWORD_DEFAULT), $firstname, $lastname, $street, $zip, $city, $phone]);
            echo 'Registrierung erfolgreich';
        }else{
            echo 'Registrierung fehlgeschlagen;';
        }
    }
}
