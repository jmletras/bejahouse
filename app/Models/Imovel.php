<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Foto;
use App\Models\Localidade;
use App\Models\CodigoPostal;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imoveis';

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'id_imovel');
    }
	
	public function codigo_postal()
    {
        return $this->belongsTo(CodigoPostal::class, 'codigo_postal');
    }
	
	public function ref_localidade()
    {
        return $this->belongsTo(Localidade::class, 'localidade');
    }

    public function ref_concelho()
    {
        return $this->belongsTo(Concelho::class, 'concelho');
    }
}
