@csrf

<div>
    <label>Nome:</label>
    <input type="text" name="nome" value="{{ old('nome', $esmalte->nome ?? '') }}">
</div>

<div>
    <label>Marca:</label>
    <input type="text" name="marca" value="{{ old('marca', $esmalte->marca ?? '') }}">
</div>

<div>
    <label>Cor:</label>
    <input type="text" name="cor" value="{{ old('cor', $esmalte->cor ?? '') }}">
</div>

<div>
    <label>Foto:</label>
    <input type="file" name="foto">
    @if (!empty($esmalte->foto))
        <br>
        <img src="{{ asset('storage/' . $esmalte->foto) }}" alt="Foto" width="100">
    @endif
</div>

<button type="submit">Salvar</button>
