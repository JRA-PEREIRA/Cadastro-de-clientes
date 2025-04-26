<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depósito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Depósito</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('depositos.store') }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-3">
                <label for="matricula" class="form-label">Identificação / Matrícula do Cliente</label>
                <input type="text" name="matricula" id="matricula" placeholder="Ex: 123456" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor Depositado</label>
                <input type="number" name="valor" id="valor" step="0.01" placeholder="Ex: 100.00" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">← Voltar para lista de clientes</a>
        </form>
    </div>
</body>
</html>