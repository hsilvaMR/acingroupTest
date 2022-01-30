<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilizador;

class Dashboard extends Controller
{
    private $dados = [];
    private $utilizador;
    private $automovel;
    private $manutencao;
    private $cliente;

    public  function index()
    {
        $this->dados['tipo'] = "home";
        $this->dados['title_area'] = "Seja Bem Vindo a sua área de Gestão";
        //return view('site/page/home', ['title' => 'index'], $this->dados);
        return view('backoffice/page/admin', ['title' => 'index'], $this->dados);
    }

    public  function gestaoUtilizador()
    {
        $this->utilizador = new Utilizador;
        $array = [];

        foreach ($this->utilizador::all() as $value) {

            $array[] = [
                'id' => $value->id,
                'nome' => $value->nome,
                'email' => $value->email,
                'tipo' => $value->tipo,
            ];
        }

        $this->dados['tipo'] = "user";
        $this->dados['title_area'] = "Gestao de Utilizador";
        $this->dados['array'] = $array;
        return view('backoffice/page/gest-utilizador', ['title' => 'gestao utilizador'], $this->dados);
    }

    public  function gestaoOficina()
    {

        $this->utilizador = new Utilizador;
        $this->dados['tipo'] = "oficina";
        $this->dados['title_area'] = "Gestao de Oficina";
        return view('backoffice/page/gest-oficina', ['title' => 'gestao oficina'], $this->dados);
    }

    public  function gestaoCliente()
    {
        $this->dados['tipo'] = "cliente";
        $this->dados['title_area'] = "Gestao de Cliente";
        return view('backoffice/page/gest-cliente', ['title' => 'gestao cliente'], $this->dados);
    }

    public  function gestaoPerfil()
    {
        $this->dados['tipo'] = "profile";
        $this->dados['title_area'] = "Gestao de Perfil";
        return view('backoffice/page/gest-profile', ['title' => 'gestao profile'], $this->dados);
    }

    public  function add_view($tipo)
    {

        switch ($tipo) {
            case 'user':
                $this->dados['tipo'] = "user";
                $this->dados['title_area'] = "Gestao de Perfil";
                $this->dados['nome'] = "Nome";
                $this->dados['tipoUser'] = "Tipo";
                $this->dados['pass'] = "Palavra-Passe";
                $this->dados['email'] = "Email";
                break;
            case 'oficina':
                $this->dados['tipo'] = $tipo;
                $this->dados['title_area'] = "Gestao de Perfil";
                /*$array[] = [
                    'nome' => "Nome",
                    'tipo' => "Tipo",
                    'pass' =>   "Palavra-Passe",
                    'email' => "Email"
                ];*/
                break;
            case 'profile':
                $this->dados['tipo'] = $tipo;
                $this->dados['title_area'] = "Gestao de Perfil";
                break;
            case 'cliente':
                $this->dados['tipo'] = $tipo;
                $this->dados['title_area'] = "Gestao de Perfil";
                break;
        }

        return view('backoffice/page/add', ['title' => 'add'], $this->dados);
    }


    public function add(Request $request)
    {

        $this->utilizador = new Utilizador;
        $nome = trim($request->fname);
        $senha = trim($request->fsenha);
        $tipo = trim($request->ftype);
        $email = trim($request->fmail);
        $response  = ['error' =>  'init', 'success' =>  'init'];

        $user = $this->utilizador->where('email', $email)->first();

        if (!empty($user)) {

            $response['error'] = "existe";
        } else {

            if (!empty($email)  && !empty($senha) && !empty($nome) && !empty($tipo)) {

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $checkInsert = $this->utilizador->insert(

                        [
                            'nome' =>   $nome,
                            'tipo' => $tipo,
                            'email' =>  $email,
                            'senha' => \Hash::make($senha)
                        ]
                    );

                    if ($checkInsert != null) {

                        $response['success'] = "success";
                    }
                } else {

                    $response['error'] = "invalidMail";
                }
            } else {

                $response['error'] = "empty";
            }
        }

        return json_encode($response, true);
    }


    public function editar_view($id)
    {

        $this->utilizador = new Utilizador;
        if (!empty($id)) {

            $user = $this->utilizador->where('id', $id)->first();
            $array = [];

            if (!empty($user)) {

                $array[] = [
                    'id' => $user->id,
                    'nome' => $user->nome,
                    'email' => $user->email,
                    'tipoEdit' => $user->tipo,
                    'palavraw'=> "jdjkdsdsj"
                ];


                $this->dados['nome'] = "Nome";
                $this->dados['tipoUser'] = "Tipo";
                $this->dados['pass'] = "Palavra-Passe";
                $this->dados['email'] = "Email";

                $this->dados['array'] = $array;
                $this->dados['tipo'] = "user";
                $this->dados['title_area'] = "Editar Uitlizadores";
                $this->dados['view'] = "edit";
                
            }
        }

        return view('backoffice/page/add', ['title' => 'editar'], $this->dados);
    }

    public function update(Request $request)
    {
    }
}
