<?php

namespace App\Http\Controllers;

use App\Models\instituicoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class instituicoeController extends controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $instituicao = instituicoe::where('id', $id)->first();

        if ($instituicao) {
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
        // $instituicao = instituicoe::orderby('id', 'desc')->paginate();
        $instituicao = instituicoe::first()->paginate();
        return view('instituicao/index_instituicao',$instituicao)->with('instituicoes', $instituicao);
    }

    public function paginalogon(instituicoe $instituicao)
    {
        return view('login/index_login')->with('instituicao', $instituicao);
    }

    public function create()
    {
        return view('instituicao.create_instituicao');
    }
    public function edit(instituicoe $id)
    {
        return view('instituicao.edit_instituicao', ['item' => $id]);
    }
    public function editar(Request $request, instituicoe $item)
    {
        $data = array(
            'cnpj'           => $request->cnpj,
            'instituicao'    => $request->nome,
            'endereco'       => $request->endereco,
            'numero'         => $request->numero,
            'bairro'         => $request->bairro,
            'cep'            => $request->cep,
            'fone'           => $request->telefone,
            'responsavel'    => $request->responsavel,
            'liberada'       => (!request()->has('liberada') == '1' ? '0' : '1')
        );

        DB::table('instituicoes')->where('id', $request->id)->update($data);


        @session_start();
        $instituicao = instituicoe::first()->paginate();
        return view('instituicao/index_instituicao',$instituicao)->with('instituicoes', $instituicao);

    }

    public function insert(Request $request)
    {
            DB::table('instituicoes')->insert([
                'id'             =>null,
                'cnpj'           =>$request->cnpj,
                'instituicao'    => $request->nome,
                'endereco'       => $request->endereco,
                'numero'         => $request->numero,
                'bairro'         => $request->bairro,
                'cep'            => $request->cep,
                'fone'           => $request->telefone,
                'responsavel'    => $request->responsavel,
                'liberada'       => (!request()->has('liberada') == '1' ? '0' : '1')
            ]);  
            @session_start();
            $instituicao = instituicoe::first()->paginate();
            return view('instituicao/index_instituicao',$instituicao)->with('instituicoes', $instituicao);
    }

    public function delete($id)
    {
        instituicoe::find($id)->delete();
        @session_start();
        $instituicao = instituicoe::first()->paginate();
        return view('instituicao/index_instituicao',$instituicao)->with('instituicoes', $instituicao);
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
