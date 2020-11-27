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
   
  
   public function instituicao()
   {
      return $this->belongsTo(instituicao::class, 'idinstituicao','id');
     
      
   }
}
