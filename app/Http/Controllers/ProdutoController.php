<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function create(){
        
        return view('produtos.create');
        
    }
    
    public function store(Request $request){
      
        $produto = Produto::where('nome', $request->produto)->first();

        if($produto){
            dd('Produto já cadastrado!');
        }

        Produto::create([
            'nome' => $request->produto, //nome (esquerda)= a tabela; direita = produto formulário
            'valor' => $request->valor 
        ]);

        dd('produto cadastrado');
    }

}
