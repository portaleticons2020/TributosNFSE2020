<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
   protected $table    = 'usuarios';
   protected $fillable = ['nome', 'cpf', 'email', 'login', 'senha', 'nivel,', 'idinstituicao'];
   protected $hidden   = ['senha'];
   
   public $timestamps = false;
      
   public function index($id)
   {
      $users = usuario::where('id', $id)->first();

      if ($users) {
         $_SESSION['inst_id']       = $users->id;
         $_SESSION['inst_nome']     = $users->nome;

         return view('usuario/index_usuario')->with('itens', $users);
      }
   }
   
   public function instituicao()
   {
      return $this->BelongsTo(instituicao::class, 'idinstituicao', 'id');
   }
}
