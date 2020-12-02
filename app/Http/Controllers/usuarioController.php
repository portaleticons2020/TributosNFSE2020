<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\instituicao;
use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class usuarioController extends Controller
{
    public function logarSistema(request $request, instituicao $instituicao)
    {

        $login = $request->login;
        $senha = $request->senha;
        $idinstituicao = $instituicao->id;

        //$usuario = $instituicao->usuario::where('login', $login)->where('senha', $senha)->where('idinstituicao', $idinstituicao)->first();
        // $usuario = instituicao::find($idinstituicao)->usuario->where('login', $login)->where('senha', $senha)->first();

        $usuario = usuario::where('login', $login)->where('senha', $senha)->first();
        $instituicao = instituicao::find($idinstituicao);

        //    dd($usuario);
        //    dd($empresa);

        if ($usuario) {
            @session_start();
            //dados do usuario
            $_SESSION['id_usuario']    = $usuario->id;
            $_SESSION['login_usuario'] = $usuario->login;
            $_SESSION['nome_usuario']  = $usuario->nome;
            $_SESSION['nivel_usuario'] = $usuario->nivel;
            $_SESSION['inst_id']       = $instituicao->id;
            $_SESSION['inst_nome']     = $instituicao->instituicao;

            if ($_SESSION['nivel_usuario'] == '1') {
                $_SESSION['nivel_usuario_desc'] = 'Adminstrador';
            } else if ($_SESSION['nivel_usuario'] == '2') {
                $_SESSION['nivel_usuario_desc'] = 'Usuário';
            }

            if ($_SESSION['nivel_usuario'] != '') {
                return view('dashboard')->with('usuarios', $usuario);
            }
        } else {
            echo "<script language='javascript'> window.alert('Dados Incorretos!') </script>";
            // return redirect()->route('telasenha',$idinstituicao);
        }
    }

    public function logout()
    {
        @session_start();
        @session_destroy();
        return view('index');
    }

    public function index()
    {
        $empresa = instituicao::orderby('id', 'desc')->paginate();
        return view('usuario.index_usuario')->with('instituicao', $empresa);
    }

    public function lista()
    {
        @session_start();
        $usuario = usuario::where('idinstituicao', @$_SESSION['inst_id'])->orderby('id', 'desc')->paginate();

        return view('usuario.index_usuario')->with('usuarios', $usuario);
    }

    public function edit(usuario $id)
    {
        return view('usuario.edit_usuario', ['item' => $id]);
    }


    public function editar(Request $request, usuario $item)
    {
        $data = array(
            'nome'          => $request->nome,
            'login'         => $request->login,
            'cpf'           => $request->cpf,
            'email'         => $request->email,
            'idinstituicao' => $request->codinstituicao,
            'nivel'         => $request->nivel,
            'bloqueado'     => 1
        );

        DB::table('usuarios')->where('id', $request->id)->update($data);


        @session_start();
        $usuario = usuario::where('idinstituicao', @$_SESSION['inst_id'])->paginate();
        return view('usuario.index_usuario')->with('usuarios', $usuario);

    }
    public function create()
    {
        return view('usuario.create_usuario');
    }
    public function insert(Request $request)
    {
        $tabela = new usuario();
        $tabela->login  = $request->login;
        $tabela->cpf    = $request->cpf;
        $tabela->nome   = $request->nome;
        $tabela->email  = $request->email;
        $tabela->senha  = '123456';
        $tabela->idinstituicao = $request->codinstituicao;
        $tabela->nivel         = $request->nivel;
        $tabela->bloqueado = 1;
        $tabela->save();

        @session_start();
        $usuario = usuario::where('idinstituicao', @$_SESSION['inst_id'])->paginate();
        return view('usuario.index_usuario')->with('usuarios', $usuario);
    }
    public function delete(Request $request){
        DB::delete('DELETE FROM usuarios WHERE id = ?', [$request->id]); 

        echo $request->id;
        
        @session_start();
        $usuario = usuario::where('idinstituicao', @$_SESSION['inst_id'])->paginate();
        return view('usuario.index_usuario')->with('usuarios', $usuario);
     }

     public function modal($id){
        @session_start();
        $item = usuario::where('idinstituicao', @$_SESSION['inst_id'])->paginate();
        return view('usuario.index_usuario', ['usuarios' => $item, 'id' => $id]);

     }
}
