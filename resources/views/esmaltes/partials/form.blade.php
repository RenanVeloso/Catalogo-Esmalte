<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $esmalte->nome ?? '') }}">
    @error('nome') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="marca" class="form-label">Marca</label>
    <input type="text" name="marca" class="form-control" value="{{ old('marca', $esmalte->marca ?? '') }}">
    @error('marca') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="cor" class="form-label">Cor</label>
    <input type="text" name="cor" class="form-control" value="{{ old('cor', $esmalte->cor ?? '') }}">
    @error('cor') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" name="foto" class="form-control">
    @if(!empty($esmalte->foto))
        <img src="{{ asset('storage/' . $esmalte->foto) }}" width="100" class="mt-2">
    @endif
    @error('foto') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn btn-success">{{ $submit }}</button>
<a href="{{ route('esmaltes.index') }}" class="btn btn-secondary">Voltar</a>
