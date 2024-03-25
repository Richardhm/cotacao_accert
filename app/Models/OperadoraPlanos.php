<?php

namespace App\Models;

use App\Models\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;

class OperadoraPlanos extends Model
{
    use Tenantable;
    protected $guarded = ['id'];
}
