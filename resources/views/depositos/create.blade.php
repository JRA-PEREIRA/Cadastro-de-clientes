<div class="container">
    <h2>Depósito</h2>

    @if(session('success'))
        <div style="background: green; color: white; padding: 10px; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('depositos.store') }}" method="POST">
        @csrf

        <label for="matricula">Identificação / Matrícula do Cliente</label>
        <input type="text" name="matricula" id="matricula" placeholder="Ex: 123456" required>

        <label for="valor">Valor Depositado</label>
        <input type="number" name="valor" id="valor" step="0.01" placeholder="Ex: 100.00" required>

        <button type="submit">Salvar</button>
    </form>

    <a class="back-link" href="{{ route('clientes.index') }}">← Voltar para lista de clientes</a>
</div>
