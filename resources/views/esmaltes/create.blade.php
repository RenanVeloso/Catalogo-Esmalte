<h1>Cadastrar Esmalte</h1>

@extends('layouts.app')

@section('content')
<h2>Adicionar Esmalte</h2>

<form action="{{ route('esmaltes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @include('esmaltes.partials.form', ['submit' => 'Salvar'])

</form>
@endsection