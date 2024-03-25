<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfPerfil extends Model
{
    use HasFactory;

    public function cabecalho()
    {
        return $this->belongsTo(Cabecalho::class);
    }

}
