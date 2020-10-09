<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Automovel;

class TipoAutomovel extends Model
{
    /*Nome da tabela*/
    protected $table = "tipo_automoveis";

    /*Chave primária*/
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nome'
    ];

    /*Função que representa o relacionamento de um para muitos*/
    public function automovel_tipo(){
        return $this->hasMany(respEncaminhar::class);
    }
}
