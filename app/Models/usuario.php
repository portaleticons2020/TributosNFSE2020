<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
   protected $table    = 'usuarios';
   protected $fillable = ['nome', 'cpf', 'email', 'login', 'senha', 'nivel,', 'idinstituicao'];
   protected $hidden   = ['senha'];
   
   public $timestamp = false;
   
   public function index($id)
   {
      $users = usuario::where('id', $id)->first();

      if ($users) {
         $_SESSION['inst_id']       = $users->id;
         $_SESSION['inst_nome']     = $users->nome;

         return view('usuario/index')->with('itens', $users);
      }
   }
   // public function lista()
   // {
   //    $usuario = Usuario::orderby('id', 'desc')->paginate();
   //    return view('usuario/index')->with('itens', $usuario);
   // }

   public function instituicao()
   {
      return $this->hasOne(instituicao::class,  'id', 'idinstituicao');
   }
}
