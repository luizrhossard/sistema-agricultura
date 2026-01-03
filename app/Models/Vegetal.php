<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegetal extends Model
{
    use HasFactory;
    protected $table = 'vegetais';

    // Quais colunas podem ser preenchidas
    protected $fillable = [
    'nome',
    'categoria',
    'imagem', // <--- Adicione aqui
    'clima',
    'tempo_plantio_dias',
    'profundidade_plantio_cm',
    'distancia_entre_plantas_cm',
    'umidade_solo_percentual',
    'descricao'
    ];



    // Casts automáticos
    protected $casts = [
        'tempo_plantio_dias' => 'integer',
        'profundidade_plantio_cm' => 'float',
        'distancia_entre_plantas_cm' => 'float',
        'umidade_solo_percentual' => 'float',
    ];

    public function usersQueFavoritaram()
    {
        return $this->belongsToMany(User::class, 'favoritos');
    }
}
