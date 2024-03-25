<?php

namespace App\Models;

use App\Models\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;

class TenantOperadora extends Model
{
    use Tenantable;
    protected $guarded = ['id'];

    public function operadoras()
    {
        return $this->hasMany(Operadoras::class);
    }



}
