<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2>Cadastrar Novo Cliente</h2>

        @if(session('error'))
            <div style="background: red; color: white;">{{ session('error') }}</div>
        @endif

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
        
            <div style="display: flex; gap: 20px; margin-bottom: 15px;"> 
                <div style="flex: 1;">
                    <label for="matricula">Identificador (Matrícula)</label>
                    <input type="text" name="matricula" id="matricula" placeholder="Ex: 123456" value="{{ old('matricula') }}">
                </div>
        
                <div style="flex: 1;">
                    <label for="saldo">Saldo</label>
                    <input type="number" name="saldo" id="saldo" step="0.01" placeholder="Ex: 100.00" value="{{ old('saldo') }}">
                </div>
            </div>
        
            <label for="nome">Nome</label> 
            <input type="text" name="nome" id="nome" required value="{{ old('nome') }}">
        
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" required value="{{ old('data_nascimento') }}">
        
            <label for="genero">Gênero</label>
            <select name="genero" id="genero" required>
                <option value="">-- Selecione --</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>
            </select>
        
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" required value="{{ old('endereco') }}">
        
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" maxlength="9" placeholder="00000-000" required value="{{ old('cep') }}">
        
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" required value="{{ old('cpf') }}">
        
            <label for="rg">RG</label>
            <input type="text" name="rg" id="rg" placeholder="Opcional" value="{{ old('rg') }}">
        
            <label for="celular">Celular</label>
            <input type="text" name="celular" id="celular" placeholder="(00) 00000-0000" required value="{{ old('celular') }}">
        
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required value="{{ old('email') }}">
        
            <button type="submit">Salvar Cliente</button>
        </form>
        

        <a class="back-link" href="{{ route('clientes.index') }}">← Voltar para lista de clientes</a>
    </div>
</body>
</html>
