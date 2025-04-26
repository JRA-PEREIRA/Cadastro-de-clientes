<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container { max-width: 800px; margin: 20px auto; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 8px 15px; }
        .back-link { display: block; margin-top: 20px; }
        .error { color: red; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Cliente</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="matricula">Identificador (Matrícula)</label>
                    <input type="text" name="matricula" id="matricula" required value="{{ $cliente->matricula }}" class="form-control">
                </div>
                
                <div class="col-md-6">
                    <label for="saldo">Saldo</label>
                    <input type="number" name="saldo" id="saldo" min="0" step="0.01" required value="{{ $cliente->saldo }}" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required value="{{ $cliente->nome }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" required value="{{ $cliente->data_nascimento }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="genero">Gênero</label>
                <select name="genero" id="genero" required class="form-control">
                    <option value="">-- Selecione --</option>
                    <option value="Masculino" {{ $cliente->genero == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Feminino" {{ $cliente->genero == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                    <option value="Outro" {{ $cliente->genero == 'Outro' ? 'selected' : '' }}>Outro</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" required value="{{ $cliente->endereco }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" maxlength="9" placeholder="00000-000" required value="{{ $cliente->cep }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" required value="{{ $cliente->cpf }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="rg">RG</label>
                <input type="text" name="rg" id="rg" placeholder="Opcional" value="{{ $cliente->rg }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="celular">Celular</label>
                <input type="text" name="celular" id="celular" placeholder="(00) 00000-0000" required value="{{ $cliente->celular }}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" required value="{{ $cliente->email }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Alterar Cliente</button>
            <a class="btn btn-secondary" href="{{ route('clientes.index') }}">← Voltar para lista de clientes</a>
        </form>
    </div>
</body>
</html>