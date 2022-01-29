<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    private $dados = [];
    public  function index()
    {
        $this->dados['tipo'] = "home";
        $this->dados['title_area'] = "Seja Bem Vindo a sua área de Gestão";
        //return view('site/page/home', ['title' => 'index'], $this->dados);
        return view('backoffice/page/admin', ['title' => 'index'], $this->dados);
    }

    public  function gestaoUtilizador(){

        $this->dados['tipo'] = "user";
        $this->dados['title_area'] = "Gestao de Utilizador";
        return view('backoffice/page/gest-utilizador', ['title' => 'gestao utilizador'], $this->dados );
    }

    public  function gestaoOficina()
    {

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

    public  function add_view($tipo){

        $this->dados['tipo'] = $tipo;
        $this->dados['title_area'] = "Gestao de Perfil";

        return view('backoffice/page/add', ['title' => 'add'], $this->dados);
    }
}
