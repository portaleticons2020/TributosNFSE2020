<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\instituicao;
use App\Models\usuario;
use Illuminate\Http\Request;




class usuarioController extends Controller
{
    public function create()
    {
        return view('Principal.index');
    }

    public function logarSistema(request $request, instituicao $instituicao)
    {

        $login = $request->login;
        $senha = $request->senha;
        $idinstituicao = $instituicao->id;

        $usuario = usuario::where('login', $login)->where('senha', $senha)->where('idinstituicao', $idinstituicao)->first();
        if ($usuario) {
            $empresa = $usuario->instituicao()->first();
            if ($empresa) {

                @session_start();
                //dados do usuario
                $_SESSION['id_usuario']    = $usuario->id;
                $_SESSION['login_usuario'] = $usuario->login;
                $_SESSION['nome_usuario']  = $usuario->nome;
                $_SESSION['nivel_usuario'] = $usuario->nivel;
                
                //dados da instituicao
                $_SESSION['inst_id']       = $empresa->id;
                $_SESSION['inst_nome']     = $empresa->instituicao;
                $_SESSION['inst_CNPJ']     = $empresa->cnpj;
                $_SESSION['inst_liberada'] = $empresa->liberada;


                if($_SESSION['nivel_usuario'] == '1'){
                    $_SESSION['nivel_usuario_desc'] = 'Adminstrador';
                } else if ($_SESSION['nivel_usuario'] == '2'){
                    $_SESSION['nivel_usuario_desc'] = 'Usuário';
                }

                if($_SESSION['nivel_usuario'] != ''){
                   return view('dashboard')->with('instituicao', $empresa);
                  }
                

                
            } else {
                echo "<script language='javascript'> window.alert('Dados Incorretos!') </script>";
                return view('index');
            }
        } else {
            // echo "<script language='javascript'> window.alert('Dados Incorretos!') </script>";
            return redirect()->route('telasenha', $instituicao);
            // return response()->make('senha ou dados invalidos');
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

    public function lista($id)
    {
        //$empresa = $usuario->instituicao()->first();
      
        $empresa = instituicao::where('id',$id)->first();
        $usuarios = $empresa->usuario()->get(); //Get() retorna a lista dos objets 
       //  dd($usuario);
        if ($empresa){
            return view('usuario.index_usuario', ['usuarios' => $usuarios]); //repassando a lista de usuário para blade
        }
        
               
       
    }
}
