<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instituicao extends Model
{
  protected $table = 'instituicoes';
  protected $fillable = ['instituicao','cnpj','endereco','numero','bairro','cep','fone','responsavel','liberada'];
  protected $timestamp = false;

   public function usuario(){
        return $this->belongsTo(usuario::class, 'idinstituicao','id');
   }
 
   
}
