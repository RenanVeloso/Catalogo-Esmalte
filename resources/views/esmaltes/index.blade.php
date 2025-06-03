<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

@extends('layouts.app')

@section('content')
<h1 class="mb-4">Catálogo de Esmaltes</h1>

<a href="{{ route('esmaltes.create') }}" class="btn btn-primary mb-3">+ Adicionar Esmalte</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nome</th>
            <th>Marca</th>
            <th>Cor</th>
            <th>Foto</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($esmaltes as $esmalte)
            <tr>
                <td>{{ $esmalte->nome }}</td>
                <td>{{ $esmalte->marca }}</td>
                <td>{{ $esmalte->cor }}</td>
                <td>
                    @if($esmalte->foto)
                        <img src="{{ asset('storage/' . $esmalte->foto) }}" width="60">
                    @else
                        —
                    @endif
                </td>
                <td>
                    <a href="{{ route('esmaltes.edit', $esmalte) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('esmaltes.destroy', $esmalte) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Nenhum esmalte encontrado.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection