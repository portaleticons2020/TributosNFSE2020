<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contabancaria extends Model
{
    protected $table='contabancarias';
    protected $fillable=['codigobanco',
                         'agencia',
                         'digitoagencia',
                         'conta',
                         'digitoconta',
                         'descricaoconta',
                         'convenio',
                         'codigofebraban',
                         'ativa',
                         'idinstituicao'];
   protected $tempstam=false;
   
   
   public function instituicao(){
       return $this->hasOne(instituicao::class , 'id','idinstituicao');
   }

   public function financeiro(){
        return $this->morphToMany(financeiro::class, 'contabancaria','idconta');
   }
}
