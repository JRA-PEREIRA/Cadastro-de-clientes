<?php
namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Produto;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function create()
    {
        $produtos = Produto::orderBy('nome')->get();
        $clientes = Cliente::orderBy('nome')->get();
        
        return view('vendas.create', compact('produtos', 'clientes'));
    }
    
    public function store(Request $request)
    {
    $validated = $request->validate([
        'produto_id' => 'required|exists:produtos,id',
        'quantidade' => 'required|integer|min:1',
        'cliente_id' => 'required|exists:clientes,id'
    ]);

    try {
        $produto = Produto::findOrFail($validated['produto_id']);

        $validated['valor_unitario'] = $produto->valor;
        $validated['valor_total'] = $validated['quantidade'] * $validated['valor_unitario'];

        Venda::create($validated);

        return redirect()->route('vendas.create')
                         ->with('success', 'Venda registrada com sucesso!');
    } catch (\Exception $e) {
        return back()->withErrors('Erro ao registrar a venda.')->withInput();
    }
    }


}