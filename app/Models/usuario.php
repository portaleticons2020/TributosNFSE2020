<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
   public $timestamp = false;
   protected $table    = 'usuarios';
   protected $fillable = ['id',
                          'nome', 
                          'cpf', 
                          'email', 
                          'login', 
                          'senha', 
                          'nivel,', 
                          'idinstituicao'];
   protected $hidden   = ['senha'];

   public function instituicao(){
        return $this->belongTo('usuario'::class, 'idinstituicao');
           
   }
   

      
  
}
