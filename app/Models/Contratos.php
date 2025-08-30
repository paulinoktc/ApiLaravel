<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
    protected $table = 'contratos';
    protected $fillable = [
        'cliente_id',
        'numero_contrato',
        'monto',
        'fecha_inicio',
        'fecha_fin'
    ];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }
}
