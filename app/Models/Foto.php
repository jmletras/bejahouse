<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Imovel;

class Foto extends Model
{
    use HasFactory;

    public function imovel()
    {
        return $this->belongsTo(Imovel::class);
    }
}
