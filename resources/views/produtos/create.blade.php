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
