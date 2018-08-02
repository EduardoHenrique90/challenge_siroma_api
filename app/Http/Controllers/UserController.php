<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Log;
use DB;


class UserController extends Controller
{

    protected $validator;
    public function __construct(ValidatorController $validator)
    {
        $this->validator = $validator;
    }

    public function getAll(){
        return User::all();
    }

    public function create(Request $request){
        // return $request;
        try{
            $usuario_existente = User::where('cpf', $request->input('cpf'))->get();
            if(sizeof($usuario_existente)){
                return '{"status":"erro","cod": "04" ,"tipo":"cadastro","mensagem":" O CPF informado já foi cadastrado."}';
            }

            if($request->input('cpf')){
                $cpf_valido = $this->validator->cpf($request->input('cpf'));
                if($cpf_valido == false){
                    return  '{"status":"erro","cod": "04" ,"tipo":"cadastro","mensagem":" O CPF informado nao e valido."}';
                }
            }
            Log::error($request);
            $request_all = $request->all();
            $request_all['password'] = bcrypt($request->input('password'));
            $user =  User::create($request_all);
            return $user;

        } catch(Exception $e) {
            return '{"status":"erro","cod": "06" ,"tipo":"usuario","mensagem":" Erro ao cadastrar usuário. Os campos de CPF e e-email devem ser únicos"}';
        } catch(\Illuminate\Database\QueryException $ex){
            Log::error($ex);
            return '{"status":"erro","cod": "07" ,"tipo":"usuario","mensagem":" Erro ao cadastrar usuário. Os campos de CPF e e-email devem ser únicos"}';

        }
    }

    public function update($id,Request $request){
        return User::where('id', $id)->update($request->all());
    }
    
    public function delete($id){
        return User::destroy($id);
    }
    
}
