<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Automovel;

class Marca extends Model
{
    /*Nome da tabela*/
    protected $table = "marcas";

    /*Chave primária*/
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome','imagem'
    ];

    /*Atributos de tempo*/
	protected $date = ['created_at','update_at'];

    /*Função que representa o relacionamento de um para muitos*/
    public function automovel_marca(){
        return $this->hasMany(Automovel::class);
    }
}
