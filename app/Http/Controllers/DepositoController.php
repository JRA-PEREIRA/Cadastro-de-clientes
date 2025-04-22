<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;


class DepositoController extends Controller
{
    public function create()
    {
        return view('depositos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'matricula' => 'required|string',
            'valor' => 'required|numeric|min:0.01',
        ]);
    
        $cliente = Cliente::where('matricula', $request->matricula)->first();
    

        
        if (!$cliente) {
            return redirect()->back()->with('error', 'Cliente não encontrado com essa matrícula.');
        }
    
        $cliente->saldo += $request->valor;
        $cliente->save();
    
        return redirect()->route('clientes.index')->with('success', 'Depósito realizado com sucesso!');
    }
    
}
