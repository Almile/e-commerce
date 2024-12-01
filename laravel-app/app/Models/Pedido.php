<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_usuario',
        'endereco_entrega',
        'metodo_pagamento',
        'valor_pedido',
    ];

    public function items()
    {
        return $this->hasMany(item_pedido::class, 'id_pedido');
    }
}
