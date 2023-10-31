<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Localidade;
use App\Models\Distrito;

class Concelho extends Model
{
    use HasFactory;

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

	public function localidades()
    {
        return $this->hasMany(Localidade::class, 'id_concelho')->orderBy('nome_localidade', 'ASC');
    }
}
