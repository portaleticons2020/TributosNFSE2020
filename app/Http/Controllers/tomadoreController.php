<?php

namespace App\Http\Controllers;

use App\Http\Controllers\tomador;
use App\tomadores;
use Illuminate\Http\Request;

class tomadoreController extends Controller
{
    public function index()
    {
        @session_start();
        $tomador = tomadores::where('idinstituicao', @$_SESSION['inst_id'])->orderby('id', 'desc')->paginate();

        return view('tomador/index_tomador')->with('tomadores', $tomador);
    }

    public function create()
    {
       return view('tomador.create_tomador');
    }
}
