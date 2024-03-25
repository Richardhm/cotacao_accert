<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operadoras extends Model
{
    use HasFactory;

    public function planos()
    {
        return $this->belongsToMany(Planos::class,'operadora_planos','operadora_id','plano_id');

    }


}
