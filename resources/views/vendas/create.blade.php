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
                <label for="cliente_id" class="form-label">Cliente:</label>
                <select class="form-control" id="cliente_id" name="cliente_id" required>
                    <option value="">Selecione um cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }} (Mat: {{ $cliente->matricula }})</option>
                    @endforeach
                </select>
            </div>
        
            <div class="mb-3">
                <label for="produto_id" class="form-label">Produto:</label>
                <select class="form-control" id="produto_id" name="produto_id" required>
                    <option value="">Selecione um produto</option>
                    @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}" data-valor="{{ $produto->valor }}">{{ $produto->nome }} - R$ {{ number_format($produto->valor, 2, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" value="1" required>
            </div>
        
            <div class="mb-3">
                <label for="valor_unitario" class="form-label">Valor Unitário:</label>
                <input type="number" step="0.01" class="form-control" id="valor_unitario" name="valor_unitario" min="0.01" required>
            </div>
        
            <div class="mb-3">
                <label for="valor_total" class="form-label">Valor Total:</label>
                <input type="text" class="form-control" id="valor_total" name="valor_total" readonly>
            </div>
        
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simples cálculo do valor total (opcional)
        document.getElementById('produto_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const valor = selectedOption.getAttribute('data-valor');
            document.getElementById('valor_unitario').value = valor;
            calcularTotal();
        });

        document.getElementById('quantidade').addEventListener('input', calcularTotal);
        document.getElementById('valor_unitario').addEventListener('input', calcularTotal);

        function calcularTotal() {
            const quantidade = parseFloat(document.getElementById('quantidade').value) || 0;
            const valorUnitario = parseFloat(document.getElementById('valor_unitario').value) || 0;
            const valorTotal = quantidade * valorUnitario;
            document.getElementById('valor_total').value = valorTotal.toFixed(2);
        }
    </script>
</body>
</html>