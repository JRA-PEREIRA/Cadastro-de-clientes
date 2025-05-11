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

        {{-- Mensagem de sucesso --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Mensagens de erro --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulário de Venda --}}
        <form method="POST" action="{{ route('vendas.store') }}">
            @csrf

            <div class="mb-3">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select class="form-select" name="cliente_id" id="cliente_id" required>
                    <option value="">Selecione um cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">
                            {{ $cliente->nome }} {{ isset($cliente->matricula) ? "(Mat: $cliente->matricula)" : '' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="produto_id" class="form-label">Produto</label>
                <select class="form-select" name="produto_id" id="produto_id" required>
                    <option value="">Selecione um produto</option>
                    @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}" data-valor="{{ $produto->valor }}">
                            {{ $produto->nome }} - R$ {{ number_format($produto->valor, 2, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" class="form-control" min="1" value="1" required>
            </div>

            <div class="mb-3">
                <label for="valor_unitario" class="form-label">Valor Unitário</label>
                <input type="number" name="valor_unitario" id="valor_unitario" step="0.01" class="form-control" min="0.01" readonly required>
            </div>

            <div class="mb-3">
                <label for="valor_total" class="form-label">Valor Total</label>
                <input type="text" id="valor_total" class="form-control" disabled>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script>
        const produtoSelect = document.getElementById('produto_id');
        const quantidadeInput = document.getElementById('quantidade');
        const valorUnitarioInput = document.getElementById('valor_unitario');
        const valorTotalInput = document.getElementById('valor_total');

        produtoSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const valor = selectedOption.getAttribute('data-valor');

            if (valor) {
                valorUnitarioInput.value = parseFloat(valor).toFixed(2);
                calcularTotal();
            }
        });

        quantidadeInput.addEventListener('input', calcularTotal);
        valorUnitarioInput.addEventListener('input', calcularTotal);

        function calcularTotal() {
            const quantidade = parseFloat(quantidadeInput.value) || 0;
            const valorUnitario = parseFloat(valorUnitarioInput.value) || 0;
            const total = quantidade * valorUnitario;

            valorTotalInput.value = (total > 0) ? total.toFixed(2) : '';
        }
    </script>
</body>
</html>
