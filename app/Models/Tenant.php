<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    public function operadoras()
    {
        return $this->belongsToMany(Operadoras::class,'tenant_operadoras','tenant_id','operadora_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }




}
