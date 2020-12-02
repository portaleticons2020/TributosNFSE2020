<?php

namespace App\Http\Controllers;

use App\Models\instituicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class instituicaoController extends controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $instituicao = instituicao::where('id',$id)->first();
       
        if ($instituicao){
            @session_start();
            $_SESSION['inst_id']       = $instituicao->id;
            $_SESSION['inst_nome']     = $instituicao->instituicao;
            $_SESSION['inst_CNPJ']     = $instituicao->cnpj;
            $_SESSION['inst_liberada'] = $instituicao->liberada;
           return view('inicio/index_abertura')->with('instituicao', $instituicao);
           
        }   
    }

    public function lista()
    {
        @session_start();
        $instituicao = instituicao::all();
        
        return view('instituicao/index_instituicao')->with('instituicoes', $instituicao);
    }

    public function paginalogon(instituicao $instituicao){
            return view('login/index_login')->with('instituicao', $instituicao);
    }

    public function create()
    {
        return view('instituicao.create_instituicao');
    }
    public function insert(Request $request)
    {
        $tabela = new instituicao();
        $tabela->cnpj           = $request->cnpj;
        $tabela->instituicao    = $request->instituicao;
        $tabela->endereco       = $request->endereco;
        $tabela->numero         = $request->numero;
        $tabela->bairro         = $request->bairro;
        $tabela->cep            = $request->cep;
        $tabela->fone           = $request->telefone;
        $tabela->responsavel    = $request->responsavel;
        $tabela->liberada       = $request->liberada;
        $tabela->save();

        @session_start();
        $instituicao = instituicao::all();
        return view('instituicao.index_instituicao')->with('instituicoes', $instituicao);
    }


    public function delete(Request $request){
        DB::delete('DELETE FROM instituicoes WHERE id = ?', [$request->id]); 

        echo $request->id;
        
        @session_start();
        $instituicao = instituicao::all();
        return view('usuario.index_usuario')->with('instituicoes', $instituicao);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
