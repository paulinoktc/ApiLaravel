<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'status'
    ];


    public function contratos()
    {
        return $this->hasMany(Contratos::class, 'cliente_id');
    }

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i',
    ];
}
