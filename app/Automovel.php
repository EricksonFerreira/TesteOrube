<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\Marca;
use App\TipoAutomovel;
use App\User;

class Automovel extends Model
{
    /*Nome da tabela*/
    protected $table = "automoveis";

    /*Chave primária*/
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome', 'modelo', 'placa',
        'ano_fabricacao', 'ano_modelo',
        'cor', 'portas', 'descricao',
        'valor', 'imagem'
    ];
    protected $guarded = [
        'marca_id','tipo_id'
    ];

    /*Função que representa o relacionamento de um para muitos*/
    public function tipo_automovel(){
        return $this->belongsTo(TipoAutomovel::class);
    }

    /*Função que representa o relacionamento de um para muitos*/
    public function marca_automovel(){
        return $this->belongsTo(Marca::class);
    }

    /*Função que representa o relacionamento de um para muitos*/
    public function user_automovel(){
    return $this->hasMany(User::class);
    }

}
