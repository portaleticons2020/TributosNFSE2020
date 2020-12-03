<?php

namespace App\Http\Controllers;

use App\Models\instituicoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $instituicao = instituicoe::where('id',$id)->first();

        if ($instituicao){
            $_SESSION['inst_id']       = $instituicao->id;
            $_SESSION['inst_nome']     = $instituicao->instituicao;
            $_SESSION['inst_CNPJ']     = $instituicao->cnpj;
            $_SESSION['inst_liberada'] = $instituicao->liberada;

            return view('inicio/index')->with('instituicao', $instituicao);
        }    
    }

    public function paginalogon(instituicoe $instituicao){
       
               return view('/login/index_login')->with('instituicao', $instituicao);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
