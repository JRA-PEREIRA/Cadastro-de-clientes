<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'matricula', 'saldo',
        'nome', 'data_nascimento', 'genero', 'endereco',
        'cep', 'cpf', 'rg', 'celular', 'email',
    ];
    
    
}
