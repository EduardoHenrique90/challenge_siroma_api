<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Login;
use App\User;
use Response;
use App\Http\Requests;
use Log;

class LoginController extends Controller
{
    public function __construct(Login $login){
        $this->login = $login;
    }

    public function postLogin(Request $request){
        $input = $request->all();
        Log::error($input);
        $login = $input['cpf'];
        $password = $input['password'];
        if (Auth::attempt(['cpf' => $login, 'password' => $password])) {
            $user =  User::where('cpf',$login)->get();
            return $user[0];
        }else{
            return '{"status":"erro", "cod": "01" , "tipo": "autenticacao", "mensagem":"Usuário ou senha incorreto(s)."}';
        }
    }
}
