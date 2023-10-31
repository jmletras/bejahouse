<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Imovel;

class CodigoPostal extends Model
{
    use HasFactory;
    protected $table = 'codigo_postal';

    public function imoveis()
    {
        return $this->hasMany(Imovel::class);
    }
}
