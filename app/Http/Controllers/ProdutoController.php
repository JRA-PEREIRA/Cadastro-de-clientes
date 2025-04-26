<?php

// app/Http/Controllers/ProdutoController.php
namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Exibe o formulário de cadastro
    public function create()
    {
        $produtos = Produto::orderBy('nome')->get(); // Lista ordenada
        return view('produtos.create', compact('produtos'));
    }

    // Salva um novo produto
    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'nome' => 'required|string|unique:produtos,nome',
            'valor' => 'required|numeric|min:0.01',
        ]);

        // Cria o produto
        Produto::create([
            'nome' => $request->nome,
            'valor' => $request->valor,
        ]);

        // Redireciona com mensagem de sucesso
        return redirect()->route('produtos.create')->with('success', 'Produto cadastrado!');
    }
}
