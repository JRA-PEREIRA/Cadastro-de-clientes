<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de clientes</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Clientes</h1>
            <a href="{{ route('clientes.create') }}" class="btn btn-success">Novo Cliente</a>
            <a href="{{ route('depositos.create') }}" class="btn btn-success">Depositar</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    
        <ul class="list-group list-group-numbered">
            @foreach($clientes as $cliente)
                <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $cliente->nome }}</div>
                        Matrícula: {{ $cliente->matricula }}<br>
                        Saldo: R$ {{ number_format($cliente->saldo, 2, ',', '.') }}<br>
                        E-mail: {{ $cliente->email }}<br>
                        Celular: {{ $cliente->celular }}<br>
                        Nascimento: {{ $cliente->data_nascimento }}
                    </div>
                    <span class="badge rounded-pill me-2">
                        <a class="btn btn-sm btn-primary" href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                    </span>
                    <span class="badge rounded-pill">
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Excluir</button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
