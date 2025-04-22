<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Exception;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'matricula' => 'required|string|unique:clientes,matricula',
                'saldo' => 'required|numeric|min:0',
                'nome' => 'required|string|max:255',
                'data_nascimento' => 'required|date',
                'genero' => 'required|in:Masculino,Feminino,Outro',
                'endereco' => 'required|string',
                'cep' => 'required|regex:/^\d{5}-\d{3}$/',
                'cpf' => 'required|string|size:14|unique:clientes,cpf',
                'rg' => 'nullable|string|max:12',
                'celular' => 'required|regex:/^\(\d{2}\) \d{5}-\d{4}$/',
                'email' => 'required|email|unique:clientes,email',
            ]);

            Cliente::create($validated);

            return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
        } catch (Exception $ex) {
            return redirect()->route('clientes.create')->with('error', $ex->getMessage())->withInput();
        }
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
{
    try {
        $validated = $request->validate([
            'matricula' => 'required|string|unique:clientes,matricula,' . $cliente->id,
            'saldo' => 'required|numeric|min:0',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'genero' => 'required|in:Masculino,Feminino,Outro',
            'endereco' => 'required|string',
            'cep' => 'required|regex:/^\d{5}-\d{3}$/',
            'cpf' => 'required|string|size:14|unique:clientes,cpf,' . $cliente->id,
            'rg' => 'nullable|string|max:12',
            'celular' => 'required|regex:/^\(\d{2}\) \d{5}-\d{4}$/',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
        ]);

        $cliente->update($validated);

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    } catch (Exception $ex) {
        return redirect()->route('clientes.edit', $cliente->id)->with('error', $ex->getMessage())->withInput();
    }
}


    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();
            return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
        } catch (Exception $ex) {
            return redirect()->route('clientes.index')->with('error', $ex->getMessage());
        }
    }
}
