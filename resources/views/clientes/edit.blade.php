<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit de clientes</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2>Editar Cliente</h2>

        @if(session('error'))
            <div style="background: red; color: white;">{{ session('error') }}</div>
        @endif

        <form action="{{ route('clientes.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label for="matricula">Identificador (Matrícula)</label>
            <input type="text" name="matricula" id="matricula" required value="{{ $cliente->matricula }}">

            <label for="saldo">Saldo</label>
            <input type="number" name="saldo" id="saldo" min="0" step="0.01" required value="{{ $cliente->saldo }}">

            <input type="hidden" name="id" value="{{ $cliente->id }}">

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required value="{{ $cliente->nome }}">

            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" required value="{{ $cliente->data_nascimento }}">

            <label for="genero">Gênero</label>
            <select name="genero" id="genero" required>
                <option value="">-- Selecione --</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>
            </select>

            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" required value="{{ $cliente->endereco }}">

            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" maxlength="9" placeholder="00000-000" required value="{{ $cliente->cep }}">

            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" required value="{{ $cliente->cpf }}">

            <label for="rg">RG</label>
            <input type="text" name="rg" id="rg" placeholder="Opcional" value="{{ $cliente->rg }}">

            <label for="celular">Celular</label>
            <input type="text" name="celular" id="celular" placeholder="(00) 00000-0000" required value="{{ $cliente->celular }}">

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required value="{{ $cliente->email }}">

            <button type="submit">Alterar Cliente</button>
        </form>

        <a class="back-link" href="{{ route('clientes.index') }}">← Voltar para lista de clientes</a>
    </div>
</body>
</html>