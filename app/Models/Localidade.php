<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Imovel;
use App\Models\Concelho;
use App\Models\CodigoPostal;

class Localidade extends Model
{
    use HasFactory;

    public function imoveis()
    {
        return $this->hasMany(Imovel::class, 'localidade');
    }
	
	public function concelho()
    {
        return $this->belongsTo(Concelho::class);
    }
	
	public function cod_postais()
    {
        return $this->hasMany(CodigoPostal::class, 'id_localidade')->orderBy('desig_postal', 'ASC');
    }
}
