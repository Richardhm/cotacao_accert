<?php

namespace App\Models;

use App\Models\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;

class Configuracoes extends Model
{
    use Tenantable;
    protected $guarded = ['id'];

    public function planos()
    {
        return $this->belongsTo(Planos::class,'plano_id');
    }




}
