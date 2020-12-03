<?php

namespace App\Http\Controllers\inicio;
use App\Http\Controllers\Controller;
use App\Models\instituicoe;

use Illuminate\Http\Request;

class inicioController extends Controller
{
    public function index(instituicoe $instituicao)
    {
       return view('/tributos/{id?}', 'landing')->with('instituicao',$instituicao);
    }
}
