<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{

    public  function index()
    {
        //return view('site/page/home', ['title' => 'index'], $this->dados);
        return view('site/page/home', ['title' => 'index']);
    }
}
