<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Concelho;

class Distrito extends Model
{
    use HasFactory;

    public function concelhos()
    {
        return $this->hasMany(Concelho::class, 'cod_distrito')->orderBy('nome_concelho', 'ASC');
    }
}
