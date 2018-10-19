<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Voucher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="vouchers";
    protected $fillable = [
        'id',
        'user_id',
        'monto_bruto',
        'monto_neto',
        'p_pago',
        'desc_pago',
        'cant_cripto',
        'tipo_cripto',
        'nume_boleta',
        'igv',
        'token',
        'correo',
        'tipo_pago',
        'competed',
        'fecha_emision',
        'contabilizador_paypal',
        'contabilizador_culqi'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
