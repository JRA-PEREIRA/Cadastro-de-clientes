<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
    'cliente_id',
    'produto_id',
    'quantidade',
    'valor_unitario',
    'valor_total',
];

}
