<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhes do Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Detalhes do Cliente</h1>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">{{ $cliente->nome }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Matrícula: {{ $cliente->matricula }}</h6>
                
                <div class="row mt-4">
                    <div class="col-md-6">
                        <p><strong>CPF:</strong> {{ $cliente->cpf }}</p>
                        <p><strong>RG:</strong> {{ $cliente->rg ?? 'Não informado' }}</p>
                        <p><strong>Data de Nascimento:</strong> {{ date('d/m/Y', strtotime($cliente->data_nascimento)) }}</p>
                        <p><strong>Gênero:</strong> {{ $cliente->genero }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Celular:</strong> {{ $cliente->celular }}</p>
                        <p><strong>E-mail:</strong> {{ $cliente->email }}</p>
                        <p><strong>Endereço:</strong> {{ $cliente->endereco }}</p>
                        <p><strong>CEP:</strong> {{ $cliente->cep }}</p>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h4>Saldo: R$ {{ number_format($cliente->saldo, 2, ',', '.') }}</h4>
                </div>
                
                <div class="mt-4">
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>