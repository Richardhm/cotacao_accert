<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;
use App\Models\Traits\Tenantable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable,Tenantable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'tenant_id',
        'email',

        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function cabecalho()
    {
        return $this->belongsTo(Cabecalho::class);
    }

    public function pdfPerfil()
    {
        return $this->hasOne(PdfPerfil::class);
    }

    public function storeCabecalho(Cabecalho $cabecalho,String $cor_fundo,String $cor_fonte)
    {
        return $this->pdfPerfil()->updateOrCreate(
            ['cabecalho_id'=>$cabecalho->id],
            [
                'cor_fundo' => $cor_fundo,
                'cor_fonte' => $cor_fonte
            ]
        );
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_id');
    }



}
