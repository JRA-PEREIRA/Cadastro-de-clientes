<?php

namespace App\Http\Controllers;

use App\Models\Venda;

use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function create()
    {
        return view('vendas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'produto_id' => 'required|integer',
            'quantidade' => 'required|integer|min:1',
            'valor_unitario' => 'required|numeric|min:0.01',
            'cliente_id' => 'required|integer'
        ]);

        $validated['valor_total'] = $validated['quantidade'] * $validated['valor_unitario'];

        Venda::create($validated);

        return redirect()->route('vendas.create')
                         ->with('success', 'Venda registrada com sucesso!');
    }
}