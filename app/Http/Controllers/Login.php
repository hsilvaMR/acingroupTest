<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Utilizador;

class Login extends Controller
{

    private $utilizador;
    private $dados = [];
    public  function login(Request $request)
    {

        $this->utilizador = new Utilizador;
        $response = "";
        $email = trim($request->fmail);
        $password = trim($request->fpassword);
        $remenber =  trim($request->check);
        if (!empty($email)  && !empty($password)) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $user = $this->utilizador->where('email', $email)->first();
                if (!empty($user->email) && !empty($user->senha)) {

                    if (Hash::check($password, $user->senha)) {

                        $response = "sucess";
                        if (!empty($remenber)) {

                            \Cookie::queue('mail', $email, 4320);
                            \Cookie::queue('pass', $password, 4320);
                        }
                    } else {

                        $response = "invalid";
                    }
                }
            } else {

                $response = "invalidMail";
            }
        } else {

            $response = "empty";
        }
        return $response;
    }

    public  function login_v2(Request $request)
    {

        $this->utilizador = new Utilizador;
        $response = "";
        $email = trim($request->fmail);
        $password = trim($request->fpassword);

        if (!empty($email) || !empty($password)) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $user = $this->utilizador->where('email', $email)->first();
                if (!empty($user->email)) {
                    
                    if (\Hash::check($password, $user->senha)) {
                   // if ($password==$user->senha) {

                        $response = "sucess";

                      Session::put('mail', $email);
                      Session::put('name', $user->nome);

                    } else {
                        $response = "invalidLogin";
                    } 
                }
                else{

                    $response = "invalidLogin";
                }
               
            } else {

                $response = "invalidMail";
            }
        } else {
            $response = "empty";
        }

        return $response;
    }

    public  function registar()
    {
    }

    public  function logout()
    {

        Session::forget("mail") ;
        Session::forget("name") ;

        return \Redirect::route("login-box");
    }

    /*public function remenber()
    {

        if (!empty(\Cookie::get('mail')) && !empty(\Cookie::get('pass'))) {

            $this->dados['mail'] = \Cookie::get('mail');
            $this->dados['password'] =  \Cookie::get('pass');
        }
    }*/
}
