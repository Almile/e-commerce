<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_pedido extends Model
{
    use HasFactory;
    protected $table = 'item_pedido';
    protected $fillable = [
        'id_pedido',
        'id_produto',
        'quantidade',
        'preco',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class,  'id_produto');
    }
}
