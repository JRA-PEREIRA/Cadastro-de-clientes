<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    <h1>Cadastro de produto</h1>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf

        <div>
            <label for="">Nome do poduto</label>
            <input type="text" name="produto">
        </div>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Produtos</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
            <div class="container mt-5">
                <h1>Cadastro de Produto</h1>
        
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
        
                <form action="{{ route('produtos.store') }}" method="POST" class="mt-4">
                    @csrf
        
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Produto</label>
                        <input type="text" name="nome" id="nome" class="form-control" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" name="valor" id="valor" step="0.01" class="form-control" required>
                    </div>
        
                    <div class="mb-3">
                        <input type="submit" value="Salvar" class="btn btn-primary">
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
                    </div>
                </form>
        
                @if(isset($produtos) && $produtos->count() > 0)
                    <h2 class="mt-5">Produtos Cadastrados</h2>
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </body>
        </html>
        <div>
            <label for="">Valor</label>
            <input type="text" name="valor">
        </div>

        <div>
            <input type="submit" value="Salvar">
        </div>



    </form>
    
</body>
</html>
