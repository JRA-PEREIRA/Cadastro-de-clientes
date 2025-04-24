<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Registrar Venda</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('vendas.store') }}">
            @csrf

            <div class="mb-3">
                <label for="produto_id" class="form-label">Produto ID:</label>
                <input type="text" class="form-control" id="produto_id" name="produto_id" required>
            </div>

            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" required>
            </div>

            <div class="mb-3">
                <label for="valor_unitario" class="form-label">Valor Unitário:</label>
                <input type="number" step="0.01" class="form-control" id="valor_unitario" name="valor_unitario" min="0.01" required>
            </div>

            <div class="mb-3">
                <label for="cliente_id" class="form-label">Cliente ID:</label>
                <input type="text" class="form-control" id="cliente_id" name="cliente_id" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>